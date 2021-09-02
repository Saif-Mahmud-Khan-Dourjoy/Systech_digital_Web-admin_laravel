<?php

namespace App\Http\Controllers;

use App\HomeMajorClient;
use Illuminate\Http\Request;

class HomeMajorClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $homeMajorClient=HomeMajorClient::all();
        return view('admin.home.majorClient.index',['homeMajorClient'=>$homeMajorClient]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.home.majorClient.create');
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
            'link.*'=>'required',
           
            // 'image.*' => 'required|mimes:jpeg,jpg,bmp,png|unique:home_major_clients',
        ]);
            for($i=0;$i<count($request->input('link'));$i++){
            $major_clients= new HomeMajorClient;
            $major_clients->link=$request->input('link')[$i];
            $image = $request->file('image')[$i];
            $destinationPath = 'img/home/major_clients/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $major_clients->image=$originalPath;
      
            $major_clients->save();

        }


            session()->flash('success', 'Successfully Added');
             return redirect('/home_major_clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeMajorClient  $homeMajorClient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $major_clients=HomeMajorClient::find($id);
       return view('admin.home.majorClient.view',['major_clients'=>$major_clients]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeMajorClient  $homeMajorClient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $major_clients = HomeMajorClient::find($id); 
       return view('admin.home.majorClient.edit',['major_clients'=>$major_clients]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeMajorClient  $homeMajorClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $this->validate($request, [
            'link'=>'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $major_clients=HomeMajorClient::find($id);
        $image_prev=$major_clients->image;

        $link=$request->input('link');
       
        if($request->hasFile('image')){
            
            unlink($image_prev);
            $image = $request->file('image');
            $destinationPath = 'img/home/major_clients/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
           
           $data=array(
             'link'=>$link,           
             'image'=>$originalPath,
           );
          HomeMajorClient::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/home_major_clients');

        }
        else{
          $data=array(
             'link'=>$link,
             
           );

          HomeMajorClient::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/home_major_clients');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeMajorClient  $homeMajorClient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $major_clients=HomeMajorClient::find($id);
        unlink($major_clients->image);
        $major_clients->delete();
        session()->flash('danger', 'Successfully Deleted');
        return redirect('/home_major_clients');
    }
}
