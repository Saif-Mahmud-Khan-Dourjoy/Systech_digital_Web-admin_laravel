<?php

namespace App\Http\Controllers;

use App\ProductStatistic;
use Illuminate\Http\Request;

class ProductStatisticController extends Controller
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
     * @param  \App\ProductStatistic  $productStatistic
     * @return \Illuminate\Http\Response
     */
    public function show(ProductStatistic $productStatistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductStatistic  $productStatistic
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductStatistic $productStatistic)
    {

        return view('admin.product.statistics.edit',['productStatistic'=> $productStatistic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductStatistic  $productStatistic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductStatistic $productStatistic)
    {
        $this->validate($request, [
            'statistic_number' => 'required', 
            'statistic_text' => 'required', 
            'statistic_icon' => 'mimes:jpeg,bmp,png,jpg', 
        ]);
        $image=$request->file('statistic_icon');
        if(!is_null($image)){
            unlink($productStatistic->statistic_icon);
            $image = $request->file('statistic_icon');
            $destinationPath = 'img/product/icon/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = date("Y-m-d").time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $data_product=[
                'statistic_number' => $request->statistic_number,
                'statistic_text' => $request->statistic_text,
                'statistic_icon' => $originalPath,
            ];
            $productStatistic->update($data_product);

        }
        else{
            $data_product=[
                'statistic_number' => $request->statistic_number,
                'statistic_text' => $request->statistic_text,
                'statistic_icon' => $productStatistic->statistic_icon,
            ];
            $productStatistic->update($data_product);
        }

        session()->flash('success', 'Successfully Updated');
        return redirect('/products/'. $productStatistic->product_id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductStatistic  $productStatistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductStatistic $productStatistic)
    {
        //
    }
}
