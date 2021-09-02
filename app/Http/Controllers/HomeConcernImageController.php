<?php

namespace App\Http\Controllers;

use App\HomeConcernImage;
use Illuminate\Http\Request;

class HomeConcernImageController extends Controller
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
     * @param  \App\HomeConcernImage  $homeConcernImage
     * @return \Illuminate\Http\Response
     */
    public function show(HomeConcernImage $homeConcernImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeConcernImage  $homeConcernImage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $img = HomeConcernImage::find($id); 
       return view('admin.home.award.concern_image_edit',['img'=>$img]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeConcernImage  $homeConcernImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
            
        // 'concern_image' => 'required|mimes:jpeg,jpg,bmp,png|unique:home_concern_images',

        ]);
        
        $concern_img=HomeConcernImage::find($id);
        $image_prev=$concern_img->image;
         if($request->hasFile('concern_image')){
            
            unlink($image_prev);
            $image = $request->file('concern_image');
            $destinationPath = 'img/home/concern/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
           
           $data=array(
             'image'=>$originalPath,
           );
          HomeConcernImage::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect()->route('home_awards.index');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeConcernImage  $homeConcernImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $concern_img=HomeConcernImage::find($id);
        unlink($concern_img->image);
        $concern_img->delete();
        session()->flash('delete', 'Successfully deleted');
       return redirect()->route('home_awards.index');
    }
}
