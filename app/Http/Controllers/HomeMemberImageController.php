<?php

namespace App\Http\Controllers;

use App\HomeMemberImage;
use Illuminate\Http\Request;

class HomeMemberImageController extends Controller
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
     * @param  \App\HomeMemberImage  $homeMemberImage
     * @return \Illuminate\Http\Response
     */
    public function show(HomeMemberImage $homeMemberImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeMemberImage  $homeMemberImage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $img = HomeMemberImage::find($id); 
       return view('admin.home.award.member_image_edit',['img'=>$img]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeMemberImage  $homeMemberImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            
        // 'member_image' => 'required|mimes:jpeg,jpg,bmp,png|unique:home_member_images',

        ]);
        
        $member_img=HomeMemberImage::find($id);
        $image_prev=$member_img->image;
         if($request->hasFile('member_image')){
            
            unlink($image_prev);
            $image = $request->file('member_image');
            $destinationPath = 'img/home/member/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
           
           $data=array(
             'image'=>$originalPath,
           );
          HomeMemberImage::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect()->route('home_awards.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeMemberImage  $homeMemberImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $member_img=HomeMemberImage::find($id);
        unlink($member_img->image);
        $member_img->delete();
        session()->flash('delete', 'Successfully deleted');
       return redirect()->route('home_awards.index');
    }
}
