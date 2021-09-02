<?php

namespace App\Http\Controllers;

use App\ProductDescriptionPoint;
use Illuminate\Http\Request;

class ProductDescriptionPointController extends Controller
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
        // $this->validate($request, [
        //     'point.*' => 'required',
        // ]);
        // exit();
        // foreach($request->point as $p){
        //     $data_product=[
        //         'product_description_id' => $request->product_description_id,
        //         'point' =>  $p,
        //     ];
        //     $productDescriptionPoint = ProductDescriptionPoint::create($data_product);
        // }
        // session()->flash('success', 'Successfully Added');
        // return redirect('/products/'. $request->product_id);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'point.*' => 'required',
        ]);

        foreach($request->point as $p){
            $data_product=[
                'product_description_id' => $request->product_description_id,
                'point' =>  $p,
            ];
            $productDescriptionPoint = ProductDescriptionPoint::create($data_product);
        }
        session()->flash('success', 'Point Successfully Added');
        return redirect('/products/'. $request->product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductDescriptionPoint  $productDescriptionPoint
     * @return \Illuminate\Http\Response
     */
    public function show(ProductDescriptionPoint $productDescriptionPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductDescriptionPoint  $productDescriptionPoint
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDescriptionPoint $productDescriptionPoint)
    {
        return view('admin.product.product_description_point.edit',['productDescriptionPoint'=> $productDescriptionPoint]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductDescriptionPoint  $productDescriptionPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductDescriptionPoint $productDescriptionPoint)
    {
        $this->validate($request, [
            'point' => 'required',
        ]);
        $data_product=[
            'point' =>  $request->point,
        ];
        $productDescriptionPoint->update($data_product);
        session()->flash('success', 'Successfully Updated');
        return redirect('/products/'. $productDescriptionPoint->product_description->product_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductDescriptionPoint  $productDescriptionPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductDescriptionPoint $productDescriptionPoint)
    {
        $productDescriptionPoint->delete();

        session()->flash('success', 'Point Successfully Deleted');
        return redirect('/products/'. $productDescriptionPoint->product_description->product_id);
    }
}
