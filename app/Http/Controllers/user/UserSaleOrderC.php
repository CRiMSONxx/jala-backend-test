<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SaleOrder;
use App\Models\Products;

class UserSaleOrderC extends Controller
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

            'invoice' => '-' . time(), //empty random invoice
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            
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
