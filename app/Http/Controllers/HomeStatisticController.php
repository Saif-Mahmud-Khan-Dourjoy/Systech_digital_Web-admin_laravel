<?php

namespace App\Http\Controllers;

use App\HomeStatistic;
use Illuminate\Http\Request;



class HomeStatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $statistic=HomeStatistic::all();
        return view('admin.home.statistic.index',['statistics'=>$statistic]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.home.statistic.create');
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
            'statistic_number.*'=>'required',
            'statistic_text.*' => 'required',
            // 'icon.*' => 'required|mimes:jpeg,jpg,bmp,png|unique:home_statistics',
        ]);
        for($i=0;$i<count($request->input('statistic_number'));$i++){
            $homeStatistic= new HomeStatistic;
            $homeStatistic->statistic_number=$request->input('statistic_number')[$i];
            $homeStatistic->statistic_text=$request->input('statistic_text')[$i];
            if($request->hasFile('icon')){
            $image = $request->file('icon')[$i];
            $destinationPath = 'img/home/homestatistic/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $homeStatistic->icon=$originalPath;
        }
            $homeStatistic->save();

        }


            session()->flash('success', 'Successfully Added');
             return redirect('/homestatistics');
        }
    /**
     * Display the specified resource.
     *
     * @param  \App\HomeStatistic  $homeStatistic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $single_statistic=HomeStatistic::find($id);
       return view('admin.home.statistic.view',['ss'=>$single_statistic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeStatistic  $homeStatistic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
       $statistic = HomeStatistic::find($id); 
       return view('admin.home.statistic.edit',['statistic'=>$statistic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeStatistic  $homeStatistic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $this->validate($request, [
            'statistic_number'=>'required',
            'statistic_text' => 'required',
            'icon' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $icon=HomeStatistic::find($id);
        $icon_image=$icon->icon;

        $statistic_number=$request->input('statistic_number');
        $statistic_text=$request->input('statistic_text');
       
        if($request->hasFile('icon')){
            
            unlink($icon_image);
            $image = $request->file('icon');
            $destinationPath = 'img/home/homestatistic/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
           
           $data=array(
             'statistic_number'=>$statistic_number,
             'statistic_text'=>$statistic_text,
             'icon'=>$originalPath,
           );
          HomeStatistic::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/homestatistics');

        }
        else{
          $data=array(
             'statistic_number'=>$statistic_number,
             'statistic_text'=>$statistic_text
             
           );

          HomeStatistic::where('id',$id)->update($data);
          session()->flash('update', 'Successfully updated');
            return redirect('/homestatistics');
            
        }

         

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeStatistic  $homeStatistic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homeStatistic=HomeStatistic::find($id);
        unlink($homeStatistic->icon);
        $homeStatistic->delete();
        session()->flash('danger', 'Successfully Deleted');
        return redirect('/homestatistics');
    }
       
}
