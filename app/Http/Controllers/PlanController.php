<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App_Plans;
use App\Http\Requests\SaveApp;

class PlanController extends Controller
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

    

    public function store(SaveApp $request)
    {
    
        $app=new App_Plans();

        if(request()->file('icon')){
            $file = request()->file('icon');
            $path=$file->store('appimage', ['disk' => 'public']);
            $path="storage/".$path;
            $app->icon=$path;
        }
       
        $app->name=$request->name;
        $app->prevLink=$request->prevlink;
        $app->videoLink=$request->videolink;
        $app->price=$request->price;
        
        $app->save();
        return redirect()->back()->with('success', "App Plan ($request->name #$app->id) Saved!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,SaveApp $request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveApp $request, $id)
    {
        $app=App_Plans::find($id);
        
        if(request()->file('icon')){
            $file = request()->file('icon');
            $path=$file->store('appimage', ['disk' => 'public']);
            $path="storage/".$path;
            $app->icon=$path;
        }
       
        $app->name=$request->name;
        $app->prevLink=$request->prevlink;
        $app->videoLink=$request->videolink;
        $app->price=$request->price;
        
        $app->save();
        return redirect()->back()->with('success', "App Plan ($request->name #$app->id) Saved!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "delete";
    }
}
