<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App_Plans;
use App\Category;
use App\Http\Requests\SaveApp;
use Intervention\Image\ImageManagerStatic as Image;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps=App_Plans::all();
        return view('admin.allplans',["apps"=>$apps]);
    }

    public function display(){
        $plans=App_Plans::all();
        return view('user.allaps',['plans'=>$plans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addplan',["cats"=>Category::all()]);
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
            $image       = $request->file('icon');
            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(890, 593);
        
            $image_resize->save(storage_path("app/public/appimage/" .$filename));
            $path="appimage/".$filename;
            $app->icon=$path;
        }
       
        $app->name=$request->name;
        $app->prevLink=$request->prevlink;
        $app->videoLink=$request->videolink;
        $app->price=$request->price;
        $app->category_id=$request->cat;
        $app->hprice=$request->hprice;
        
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
        
    }

    public function addCat(){
        return view('admin.addcat');
    }

    public function catSave(Request $request){
        $cat=new Category();
        $cat->name=$request->name;
        if($request->file('icon')){
            $path = $request->file('icon')->store('public/appcats');
            $cat->icon=$path;
        }
        $cat->save();
        return redirect()->back()->with("success","Category ($request->name) Saved.");
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $app=App_Plans::find($id);
        return view('admin.editplan',["app"=>$app,"cats"=>Category::all()]);
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
            $image       = $request->file('icon');
            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(890, 593);
        
            $image_resize->save(storage_path("app/public/appimage/" .$filename));
            $path="appimage/".$filename;
            $app->icon=$path;
        }
       
        $app->name=$request->name;
        $app->prevLink=$request->prevlink;
        $app->videoLink=$request->videolink;
        $app->price=$request->price;
        $app->category_id=$request->cat;
        $app->hprice=$request->hprice;
        
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
        $app=App_Plans::find($id);
        $app->forceDelete();
        return redirect()->route('plans.index')->with('success',"Application Plan $app->name Is Permanatly Deleted");
    }
}
