<?php
// buat penangkap error jika invoice sama
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Models\Products;

class PurchaseOrderC extends Controller
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
        // post // restock

        if (Products::where('id', $request->product_id)->first()) {
        } else {
            // It does not exist
            return response()->json([
                'msg' => 'Produk dengan id '. $request->product_id .' tidak ditemukan',
                'code' => 0,
            ]);
        }
        
        try {
            $add_stock = PurchaseOrder::create($request->all());
            return $add_stock->toJson(JSON_PRETTY_PRINT);
         } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                // duplicate key error  
                return response()->json([
                    'msg' => 'Terjadi kesalahan pada invoice, duplikasi',
                    'code' => 0,
                ]);
            }
         }

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
