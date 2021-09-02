<?php

namespace App\Http\Controllers;

use App\ServiceFeature;
use Illuminate\Http\Request;

class ServiceFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
     $serviceFeature=ServiceFeature::all();
        return view('admin.home.serviceFeature.index',['serviceFeature'=>$serviceFeature]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home.serviceFeature.create');
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
            // 'icon.*' => 'required|mimes:jpeg,jpg,bmp,png|unique:service_features',
        ]);
            for($i=0;$i<count($request->input('head_text'));$i++){
            $serviceFeature= new ServiceFeature;
            $serviceFeature->head_text=$request->input('head_text')[$i];
            $serviceFeature->sub_text=$request->input('sub_text')[$i];
            $image = $request->file('icon')[$i];
            $destinationPath = 'img/home/serviceFeature/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $serviceFeature->icon=$originalPath;
            $serviceFeature->save();

        }


            session()->flash('success', 'Successfully Added');
             return redirect('/service_features');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceFeature  $serviceFeature
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $serviceFeature=ServiceFeature::find($id);
       return view('admin.home.serviceFeature.view',['serviceFeature'=>$serviceFeature]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceFeature  $serviceFeature
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviceFeature = ServiceFeature::find($id); 
       return view('admin.home.serviceFeature.edit',['serviceFeature'=>$serviceFeature]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceFeature  $serviceFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'head_text'=>'required',
            'sub_text' => 'required',
            'icon' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $serviceFeature=ServiceFeature::find($id);
        $icon_image=$serviceFeature->icon;

        $head_text=$request->input('head_text');
        $sub_text=$request->input('sub_text');
       
        if($request->hasFile('icon')){
            
            unlink($icon_image);
            $image = $request->file('icon');
            $destinationPath = 'img/home/serviceFeature/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
           
           $data=array(
             'head_text'=>$head_text,
             'sub_text'=>$sub_text,
             'icon'=>$originalPath,
           );
          ServiceFeature::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/service_features');

        }
        else{
          $data=array(
             'head_text'=>$head_text,
             'sub_text'=>$sub_text
             
           );

          ServiceFeature::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/service_features');
            
        }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceFeature  $serviceFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $serviceFeature=ServiceFeature::find($id);
        unlink($serviceFeature->icon);
        $serviceFeature->delete();
        session()->flash('danger', 'Successfully Deleted');
        return redirect('/service_features');
    }
}
