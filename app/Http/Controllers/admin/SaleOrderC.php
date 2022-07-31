<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SaleOrder;
use App\Models\Products;

class SaleOrderC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // post // pending sale order

        if (Products::where('id', $request->product_id)->first()) {
        } else {
            // It does not exist
            return response()->json([
                'msg' => 'Produk dengan id '. $request->product_id .' tidak ditemukan',
                'code' => 0,
            ]);
        }

        $pending_sale_order = SaleOrder::create([

            'invoice' => 'INV' . time(), // valid invoice
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'approved' => $request->approved,
            
        ]);

        return response()->json([
            'msg' => 'Order dibuat... harap menunggu approval admin!',
            'code' => 1,
            'data' => $request->all()
        ]);
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
        if ($sale_order = SaleOrder::where('id', $id)->first()) {
        } else {
            // It does not exist
            return response()->json([
                'msg' => 'Sale order dengan id '. $id .' tidak ditemukan, mohon cek kembali',
                'code' => 0,
            ]);
        }
         
        $sale_order->approved = !$sale_order->approved; //switch (approve / cancel)
         
        $sale_order->save();
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
}
