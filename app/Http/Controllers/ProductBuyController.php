<?php

namespace App\Http\Controllers;

use App\ProductBuy;
use Illuminate\Http\Request;

class ProductBuyController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductBuy  $productBuy
     * @return \Illuminate\Http\Response
     */
    public function show(ProductBuy $productBuy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductBuy  $productBuy
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductBuy $productBuy)
    {
        return view('admin.product.product_buy.edit',['productBuy'=>$productBuy]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductBuy  $productBuy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductBuy $productBuy)
    {
        $this->validate($request, [
            'sell_headline' => 'required',
            'sell_button_text' => 'required',
            'sell_text' => 'required',
        ]);
        $data_product=[
            'sell_headline' => $request->sell_headline,
            'sell_text' => $request->sell_text,
            'sell_button_text' => $request->sell_button_text,
        ];

        $productBuy->update($data_product);

        session()->flash('success', 'Successfully Updated');
        return redirect('/products/'. $productBuy->product_id);
        
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductBuy  $productBuy
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductBuy $productBuy)
    {
        //
    }
}
