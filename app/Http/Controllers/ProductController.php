<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $pr = Product::get();
        $kp = KategoriProduk::get();
        $jumlahbaris =5;
        if(strlen($katakunci)){
            $data = product::where('product_code', 'like','%'.$katakunci.'%')
                ->orWhere('title', 'like', '%'.$katakunci.'%')
                ->orderBy('id', 'desc')
                ->paginate($jumlahbaris);        
        }else{
            $data = product::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view ('products.index', compact(['data', 'pr', 'kp']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required',
        'category_id' => 'required',
        'price' => 'required',
        'stock' => 'required',
        'product_code' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $fileName = $request->image->getClientOriginalName();

    $request->image->storeAs('public/images', $fileName);

    $data = [
        'title' => $request->title,
        'category_id' => $request->category_id,
        'price' => $request->price,
        'stock' => $request->stock,
        'product_code' => $request->product_code,
        'description' => $request->description,
        'image' => $fileName,
    ];

    Product::create($data);

    return redirect()->route('products.index')->with('success', 'Berhasil menambahkan data');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        $title = 'Detail Produk: ' . $product->Produk;
        return view('products.produk_show', compact('product', 'title'));
        
    }

    // Fungsi untuk menangani pembelian produk
    // public function purchase(Request $request, $id)
    // {
    //     $product = Product::findOrFail($id);
    //     $quantity = $request->input('quantity');

    //     // Validasi jumlah
    //     $request->validate([
    //         'quantity' => 'required|integer|min:1|max:' . $product->stock,
    //     ]);

    //     // Proses pembelian (contoh sederhana, perlu disesuaikan dengan kebutuhan)
    //     if ($product->stock >= $quantity) {
    //         $product->stock -= $quantity;
    //         $product->save();

    //         return redirect()->route('produk_show', ['id' => $id])
    //             ->with('success', 'Produk berhasil dibeli!');
    //     } else {
    //         return redirect()->route('produk_show', ['id' => $id])
    //             ->with('error', 'Jumlah stok tidak mencukupi!');
    //     }
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = product::where('product_code',$id)->first();
        return view('products.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'description'=>$request->description,
            // 'image'=>$fileName,
        ];

        if ($request->hasFile('image')) {
            $fileName = $request->image->getClientOriginalName();

            $request->image->storeAs('./public/', $fileName);

            $data['image'] = $fileName;
        }

        Product::where('product_code', $id)->update($data);
        
        return redirect()->to('products')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       product::where('product_code', $id)->delete();
       return redirect()->to('products')->with('success', 'Berhasil menghapus data');
    }
}
