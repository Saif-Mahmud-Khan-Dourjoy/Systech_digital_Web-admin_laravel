<?php

namespace App\Http\Controllers;

use App\HomeRecognition;
use Illuminate\Http\Request;

class HomeRecognitionController extends Controller
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
     * @param  \App\HomeRecognition  $homeRecognition
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $recognition=HomeRecognition::find($id);
       return view('admin.home.award.view_recognition',['recognition'=>$recognition]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeRecognition  $homeRecognition
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $recognition = HomeRecognition::find($id); 
       return view('admin.home.award.recognition_edit',['recognition'=>$recognition]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeRecognition  $homeRecognition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $this->validate($request, [
            'link'=>'required',
        // 'image' => 'mimes:jpeg,jpg,bmp,png|unique:home_recognitions',

        ]);

       $recognition=HomeRecognition::find($id);
        $image_prev=$recognition->image;

        $link=$request->input('link');
       
        if($request->hasFile('image')){
            
            unlink($image_prev);
            $image = $request->file('image');
            $destinationPath = 'img/home/recognition/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
           
           $data=array(
             'link'=>$link,
             'image'=>$originalPath,
           );
          HomeRecognition::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/home_awards');

        }
        else{
          $data=array(
              'link'=>$link,
             
           );

          HomeRecognition::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/home_awards');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeRecognition  $homeRecognition
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeRecognition $homeRecognition)
    {
        //
    }
}
