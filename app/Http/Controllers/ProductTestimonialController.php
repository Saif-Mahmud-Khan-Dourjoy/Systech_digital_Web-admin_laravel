<?php

namespace App\Http\Controllers;

use App\ProductTestimonial;
use Illuminate\Http\Request;

class ProductTestimonialController extends Controller
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
        return view('admin.product.testimonial.create');
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
            'client_image' => 'required',
            'client_comment' => 'required',
            'client_name' => 'required',
            'client_designation' => 'required',
        ]);

        $image = $request->file('client_image');
        $destinationPath = 'img/product/testimonial/';
        $originalFile = $image->getClientOriginalName();
        $uniqueName = date("Y-m-d").time().$originalFile;
        $image->move($destinationPath, $uniqueName);
        $product_client_image_originalPath = $destinationPath.$uniqueName;

        $data_product_testimonial=[
            'product_id' => $request->product_id,
            'client_image' => $product_client_image_originalPath,
            'client_comment' => $request->client_comment,
            'client_name' => $request->client_name,
            'client_designation' => $request->client_designation,
        ];
        $product_testimonial = ProductTestimonial::create($data_product_testimonial);

        session()->flash('success', 'Successfully Added');

        return redirect('/products/'. $request->product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductTestimonial  $productTestimonial
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTestimonial $productTestimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductTestimonial  $productTestimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTestimonial $productTestimonial)
    {
        return view('admin.product.testimonial.edit',['productTestimonial'=> $productTestimonial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductTestimonial  $productTestimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductTestimonial $productTestimonial)
    {
        $this->validate($request, [
            'client_comment' => 'required', 
            'client_name' => 'required', 
            'client_designation' => 'required', 
            'client_image' => 'mimes:jpeg,bmp,png,jpg', 
        ]);
        $image=$request->file('client_image');
        if(!is_null($image)){
            unlink($productTestimonial->client_image);
            $image = $request->file('client_image');
            $destinationPath = 'img/product/photo/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = date("Y-m-d").time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $data_product=[
                'client_comment' => $request->client_comment,
                'client_name' => $request->client_name,
                'client_designation' => $request->client_designation,
                'client_image' => $originalPath,
            ];
            $productTestimonial->update($data_product);

        }
        else{
            $data_product=[
                'client_comment' => $request->client_comment,
                'client_name' => $request->client_name,
                'client_designation' => $request->client_designation,
                'client_image' => $productTestimonial->client_image,
            ];
            $productTestimonial->update($data_product);
        }

        session()->flash('success', 'Successfully Updated');
        return redirect('/products/'. $productTestimonial->product_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductTestimonial  $productTestimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductTestimonial $productTestimonial)
    {
        unlink($productTestimonial->client_image);
        $productTestimonial->delete();
        session()->flash('success', 'Successfully Deleted');
        return redirect('/products/'. $productTestimonial->product_id);
    }
}
