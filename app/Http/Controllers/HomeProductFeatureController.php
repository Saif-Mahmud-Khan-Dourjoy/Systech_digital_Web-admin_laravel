<?php

namespace App\Http\Controllers;

use App\HomeProductFeature;
use Illuminate\Http\Request;

class HomeProductFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $productFeature=HomeProductFeature::all();
        return view('admin.home.productfeatures.index',['productFeature'=>$productFeature]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home.productfeatures.create');
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
            'head_text.*'=>'required',
            'sub_text.*' => 'required'
            // 'icon.*' => 'required|mimes:jpeg,jpg,bmp,png|unique:home_product_features',
        ]);
            for($i=0;$i<count($request->input('head_text'));$i++){
            $productFeature= new HomeProductFeature;
            $productFeature->head_text=$request->input('head_text')[$i];
            $productFeature->sub_text=$request->input('sub_text')[$i];
            $image = $request->file('icon')[$i];
            $destinationPath = 'img/home/productFeature/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $productFeature->icon=$originalPath;
            $productFeature->save();

        }


            session()->flash('success', 'Successfully Added');
             return redirect('/home_product_features');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $productFeature=HomeProductFeature::find($id);
       return view('admin.home.productfeatures.view',['productFeature'=>$productFeature]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productFeature = HomeProductFeature::find($id); 
       return view('admin.home.productfeatures.edit',['productFeature'=>$productFeature]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'head_text'=>'required',
            'sub_text' => 'required',
            'icon' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $productFeature=HomeProductFeature::find($id);
        $icon_image=$productFeature->icon;

        $head_text=$request->input('head_text');
        $sub_text=$request->input('sub_text');
       
        if($request->hasFile('icon')){
            
            unlink($icon_image);
            $image = $request->file('icon');
            $destinationPath = 'img/home/productFeature/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
           
           $data=array(
             'head_text'=>$head_text,
             'sub_text'=>$sub_text,
             'icon'=>$originalPath,
           );
          HomeProductFeature::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/home_product_features');

        }
        else{
          $data=array(
             'head_text'=>$head_text,
             'sub_text'=>$sub_text
             
           );

          HomeProductFeature::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/home_product_features');
            
        }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $productFeature=HomeProductFeature::find($id);
        unlink($productFeature->icon);
        $productFeature->delete();
        session()->flash('danger', 'Successfully Deleted');
        return redirect('/home_product_features');
    }
}
