<?php

namespace App\Http\Controllers;

use App\HomeClient;
use Illuminate\Http\Request;

class HomeClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=HomeClient::all();
        return view('admin.home.client.index',['clients'=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.home.client.create');
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
            'client_name.*'=>'required',
        ]);
        for($i=0;$i<count($request->input('client_name'));$i++){
            $clients= new HomeClient;
            $clients->client_name=$request->input('client_name')[$i];
            $clients->save();

        }

         session()->flash('success', 'Successfully Added');
             return redirect('/home_clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeClient  $homeClient
     * @return \Illuminate\Http\Response
     */
    public function show(HomeClient $homeClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeClient  $homeClient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $clients = HomeClient::find($id); 
       return view('admin.home.client.edit',['clients'=>$clients]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeClient  $homeClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'client_name'=>'required',
        ]);
        
        $client=HomeClient::find($id);

        $client->client_name=$request->input('client_name');
        $client->update();

         session()->flash('update', 'Successfully updated');
             return redirect('/home_clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeClient  $homeClient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clients=HomeClient::find($id);
       
        $clients->delete();
        session()->flash('danger', 'Successfully Deleted');
        return redirect('/home_clients');
    }
}
