<?php

namespace App\Http\Controllers;

use App\ProductClient;
use Illuminate\Http\Request;

class ProductClientController extends Controller
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
     * @param  \App\ProductClient  $productClient
     * @return \Illuminate\Http\Response
     */
    public function show(ProductClient $productClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductClient  $productClient
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductClient $productClient)
    {
        return view('admin.product.our_client.edit',['productClient'=>$productClient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductClient  $productClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductClient $productClient)
    {
        $this->validate($request, [
            'client_headline' => 'required', 
        ]);
        
        $data_product=[
            'client_headline' => $request->client_headline,
        ];
        $productClient->update($data_product);
        
        session()->flash('success', 'Successfully Updated');
        return redirect('/products/'. $productClient->product_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductClient  $productClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductClient $productClient)
    {
        //
    }
}
