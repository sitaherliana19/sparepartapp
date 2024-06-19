@extends('layouts.main')
@section('container')

    <div class="d-flex justify-content-center mt-6">
        <div class="card">
            <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                @foreach ($cartItems as $index => $item)
                    <div class="mb-3">
                         <p> Anda akan melakukan pembelian produk </p>
                        <p><strong>{{ $item->product->title }}</strong></p>
                        <p> dengan harga </p>
                        <p><strong>Rp. {{($item->product->price)}}.000</strong></p>
                    </div>
                @endforeach
                <button type="button" class="btn btn-light mt-2" style="background-color: #804343; color: white;" id="pay-button">
                    Bayar Sekarang
                </button>
                <a href="https://forms.gle/J8EStvWLhVJECHtX8" class="btn btn-light mt-2" style="background-color: #804343; color: white; mt-2" target="_blank">Upload Bukti Pembayaran</a>
                <a href="/pesanan-saya" class="btn btn-light mt-2" style="background-color: #804343; color: white; mt-2" target="_blank">Lihat Pesanan Saya</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-YourClientKey"></script>
<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                setTimeout(function() {
                    // Redirect ke halaman form Google setelah 4 menit
                    window.location.href = "https://forms.gle/J8EStvWLhVJECHtX8";
                }, 240000); // 240000 milidetik = 4 menit
            },
            onPending: function(result) {
                // Redirect ke halaman pesanan jika pembayaran masih tertunda
                window.location.href = "{{ route('pesanan.index') }}";
            },
            onError: function(result) {
                // Tampilkan pesan error jika pembayaran gagal
                alert("Pembayaran gagal: " + result.status_message);
            }
        });
    });
</script>
@endsection
