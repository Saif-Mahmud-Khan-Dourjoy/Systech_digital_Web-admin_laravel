<?php

namespace App\Http\Controllers;

use App\ProductDescription;
use Illuminate\Http\Request;

class ProductDescriptionController extends Controller
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
     * @param  \App\ProductDescription  $productDescription
     * @return \Illuminate\Http\Response
     */
    public function show(ProductDescription $productDescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductDescription  $productDescription
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDescription $productDescription)
    {
        return view('admin.product.product_description.edit',['productDescription'=> $productDescription]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductDescription  $productDescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductDescription $productDescription)
    {
        $this->validate($request, [
            'product_description_headline' => 'required',
            'product_description_text' => 'required',
            'request_for_demo_button_link' => 'required', 
            'download_brochure_button_link' => 'required', 
            'product_description_video' => 'mimes:mp4', 
        ]);
        $image=$request->file('product_description_video');
        if(!is_null($image)){
            unlink($productDescription->product_description_video);
            $image = $request->file('product_description_video');
            $destinationPath = 'img/product/video/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = date("Y-m-d").time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $data_product=[
                'product_description_headline' =>  $request->product_description_headline,
                'product_description_text' => $request->product_description_text,
                'request_for_demo_button_link' => $request->request_for_demo_button_link,
                'download_brochure_button_link' => $request->download_brochure_button_link,
                'product_description_video' => $originalPath,
            ];
            $productDescription->update($data_product);

        }
        else{
            $data_product=[
                'product_description_headline' =>  $request->product_description_headline,
                'product_description_text' => $request->product_description_text,
                'request_for_demo_button_link' => $request->request_for_demo_button_link,
                'download_brochure_button_link' => $request->download_brochure_button_link,
                'product_description_video' => $productDescription->product_description_video,
            ];
            $productDescription->update($data_product);
        }

        session()->flash('success', 'Successfully Updated');
        return redirect('/products/'. $productDescription->product_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductDescription  $productDescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductDescription $productDescription)
    {
        //
    }
}
