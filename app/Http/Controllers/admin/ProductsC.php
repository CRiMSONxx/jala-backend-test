<?php
// belum tambah stok# di admin/user
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // lihat produk beserta stocknya
        $products = Products::take(10)
                    ->get();
        return $products->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // post

        if (Products::where('SKU', $request->SKU)->first()) {
            // It exist
            return response()->json([
                'msg' => 'Produk dengan SKU "'. $request->SKU .'" sudah ada, mohon menggunakan SKU lain',
                'code' => 0,
            ]);
        }
        if (Products::where('nama', $request->nama)->first()) {
            // It exist
            return response()->json([
                'msg' => 'Produk dengan nama "'. $request->nama .'" sudah ada, mohon menggunakan nama lain',
                'code' => 0,
            ]);
        }

        $product = Products::create($request->all());
        return $product->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /*
    
        $data = array(
                'SKU' => 'SKU' . strval(mt_rand(100000, 1000000)),
                'nama' => 'Barang ' . range('A','Z') . strval(mt_rand(1, 100)),
                'harga' => 1
        );
        return Response::json(array('name' => 'Steve', 'state' => 'CA'));

        */
}
