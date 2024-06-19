@extends('layouts.app')
@extends('Admin.admin')

@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-12">
        <div class="my-2 offset-md-2">
            <div style="margin-left: 8px; font-size: 18px; font-weight: bold; margin-top: 26px;">
                <h4>
                    <i class="fas fa-shipping-fast"></i> Data Pesanan
                </h4>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <div class="my-2 p-3 bg-body rounded shadow-sm offset-md-2">
                <div class="table-responsive">
                    <table class="table table-striped" style="text-align: center;">
                        <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th class="col-md-1">No.Transaksi</th>
                                <th class="col-md-1">Produk</th>
                                <th class="col-md-1">Jumlah</th>
                                <th class="col-md-1">Total Belanja</th>
                                <th class="col-md-2">No. Resi</th>
                                <th class="col-md-2">Status</th>
                                <th class="col-md-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detailTransaksi as $detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail->no_transaksi }}</td>
                                <td>{{ $detail->nama_produk }}</td>
                                <td>{{ $detail->jumlah }}</td>
                                <td>Rp. {{ $detail->total }}00</td>
                                <td>{{ $detail->tracking_number ? $detail->tracking_number : 'Belum Tersedia' }}</td>
                                <td style="position: relative;">
                                    <form id="statusForm-{{ $detail->id }}" action="{{ route('admin.update_status', $detail) }}" method="POST" style="display: flex; align-items: center;">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="form-control mb-2" style="flex: 1;">
                                            <option value="Pesanan Diterima" {{ $detail->status == 'Pesanan Diterima' ? 'selected' : '' }}>Pesanan Diterima</option>
                                            <option value="Pembayaran Terverifikasi" {{ $detail->status == 'Pembayaran Terverifikasi' ? 'selected' : '' }}>Pembayaran Terverifikasi</option>
                                            <option value="Pesanan Diproses" {{ $detail->status == 'Pesanan Diproses' ? 'selected' : '' }}>Pesanan Diproses</option>
                                            <option value="Pesanan Dikirim" {{ $detail->status == 'Pesanan Dikirim' ? 'selected' : '' }}>Pesanan Dikirim</option>
                                            <option value="Pesanan Selesai" {{ $detail->status == 'Pesanan Selesai' ? 'selected' : '' }}>Pesanan Selesai</option>
                                        </select>
                                        <div class="form-check ml-2" style="position: absolute; top: 50%; transform: translateY(-50%); right: 10px;">
                                            <label class="form-check-label" for="statusCheckbox-{{ $detail->id }}" style="cursor: pointer;">
                                                <input class="form-check-input status-checkbox" type="checkbox" id="statusCheckbox-{{ $detail->id }}" data-order-id="{{ $detail->id }}" {{ $detail->status == 'Pesanan Selesai' ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editTrackingNumberModal-{{ $detail->id }}">
                                        Edit Resi
                                    </button>

                                    <!-- Modal Edit Resi-->
                                    <div class="modal fade" id="editTrackingNumberModal-{{ $detail->id }}" tabindex="-1" role="dialog" aria-labelledby="editTrackingNumberModalLabel-{{ $detail->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editTrackingNumberModalLabel-{{ $detail->id }}">Edit No. Resi</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('admin.update_tracking_number', $detail) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="tracking_number">No. Resi</label>
                                                            <input type="text" name="tracking_number" class="form-control" value="{{ $detail->tracking_number }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                        <button type="submit" class="btn btn-light" style="background-color: #804343; color: white;">Update No. Resi</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // status update checkbox
        document.querySelectorAll('.status-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const orderId = checkbox.getAttribute('data-order-id');
                const form = document.getElementById(`statusForm-${orderId}`);
                form.submit();
            });
        });

        //  tracking number update 
        document.querySelectorAll('.update-tracking-number-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const orderId = form.getAttribute('data-order-id');
                const formData = new FormData(form);

                fetch(`/admin/update_tracking_number/${orderId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.querySelector(`#order-${orderId} .tracking-number`).textContent = data.tracking_number || 'Belum Tersedia';
                        $(`#editTrackingNumberModal-${orderId}`).modal('hide');
                    } else {
                        alert('Update failed');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>

@endsection
