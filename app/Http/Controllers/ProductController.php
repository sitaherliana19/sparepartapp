<?php

namespace App\Http\Controllers;

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
        $jumlahbaris =5;
        if(strlen($katakunci)){
            $data = product::where('product_code', 'like','%'.$katakunci.'%')
                ->orWhere('title', 'like', '%'.$katakunci.'%')
                ->paginate($jumlahbaris);        
        }else{
            $data = product::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view ('products.index', compact(['data', 'pr']));

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
        Session::flash('id',$request->id);
        Session::flash('title',$request->title);
        Session::flash('price',$request->price);
        Session::flash('stock',$request->stock);
        Session::flash('product_code',$request->product_code);
        Session::flash('description',$request->description);

        $data =[
            'id' =>$request->id,
            'title'=>$request->title,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'product_code'=>$request->product_code,
            'description'=>$request->description,
        ];
        Product::create($data);

        return redirect()->to('products')->with('sucess', 'Berhasil menambahkan data');
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
        $data =[
            'id' =>$request->id,
            'title'=>$request->title,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'description'=>$request->description,
        ];
        Product::where('product_code', $id)->update($data);
        
        return redirect()->to('products')->with('sucess', 'Berhasil melakukan update data');
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
