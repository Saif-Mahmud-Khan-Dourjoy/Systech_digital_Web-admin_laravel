<?php

namespace App\Http\Controllers;

use App\HomeNews;
use Illuminate\Http\Request;

class HomeNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=HomeNews::all();
        return view('admin.home.news.index',['news'=>$news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.home.news.create');
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
            'headline.*'=>'required',
            'sub_text.*' => 'required'
            // 'image.*' => 'required|mimes:jpeg,jpg,bmp,png|unique:home_news',
        ]);
            for($i=0;$i<count($request->input('headline'));$i++){
            $news= new HomeNews;
            $news->headline=$request->input('headline')[$i];
            $news->sub_text=$request->input('sub_text')[$i];
            $image = $request->file('image')[$i];
            $destinationPath = 'img/home/news/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $news->image=$originalPath;
            $news->date=date("Y-m-d");
            $news->status=1;
            $news->save();

        }


            session()->flash('success', 'Successfully Added');
             return redirect('/home_news');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeNews  $homeNews
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news=HomeNews::find($id);
       return view('admin.home.news.view',['news'=>$news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeNews  $homeNews
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $news = HomeNews::find($id); 
       return view('admin.home.news.edit',['news'=>$news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeNews  $homeNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'headline'=>'required',
            'sub_text' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $news=HomeNews::find($id);
        $icon_image=$news->image;

        $headline=$request->input('headline');
        $sub_text=$request->input('sub_text');
       
        if($request->hasFile('image')){
            
            unlink($icon_image);
            $image = $request->file('image');
            $destinationPath = 'img/home/news/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
           
           $data=array(
             'headline'=>$headline,
             'sub_text'=>$sub_text,
             'image'=>$originalPath,
           );
          HomeNews::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/home_news');

        }
        else{
          $data=array(
             'headline'=>$headline,
             'sub_text'=>$sub_text
             
           );

          HomeNews::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/home_news');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeNews  $homeNews
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news=HomeNews::find($id);
        unlink($news->image);
        $news->delete();
        session()->flash('danger', 'Successfully Deleted');
        return redirect('/service_features');

    }
}
