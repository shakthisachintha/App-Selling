<?php

namespace App\Http\Controllers;

use App\App__plans_category;
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
        // $app->category_id=$request->cat;
        $app->hprice=$request->hprice;
        $app->position=$request->position;
        
        $app->save();

        foreach ($request->cat as $cat) {
            $app_cat=new App__plans_category();
            $app_cat->app__plans_id=$app->id;
            $app_cat->category_id=$cat;
            $app_cat->save();
        }
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
        return view('admin.addcat',["cats"=>Category::all()]);
    }

    public function catSave(Request $request){
        $cat=new Category();
        $cat->name=$request->name;
        $cat->position=$request->position;
        if($request->file('icon')){
            $path = $request->file('icon')->store('public/appcats');
            $cat->icon=$path;
        }
        $cat->save();
        return redirect()->back()->with("success","Category ($request->name) Saved.");
    }

    public function catEdit($id){
        $cat=Category::findOrFail($id);
        return view("admin.editcat",["cat"=>$cat]);
    }

    public function catUpdate(Request $request){
        $cat=Category::findOrFail($request->id);
        $cat->name=$request->name;
        $cat->position=$request->position;
        if($request->file('icon')){
            $path = $request->file('icon')->store('public/appcats');
            $cat->icon=$path;
        }
        $cat->save();
        return redirect()->route('addcat')->with("success","Category ($request->name) Updated.");
    }

    public function catDel($id){
        $cat=Category::find($id);
        $def=Category::where('name',"General Apps")->first();
        $apps=App_Plans::where('category_id',$id)->get();
        foreach ($apps as $app) {
            $app->category_id=$def->id;
            $app->save();
        }
        $cat->forceDelete();
        return redirect()->route('addcat')->with('success',"Category $cat->name Deleted");
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
        $app->hprice=$request->hprice;
        $app->position=$request->position;
        $app->save();

        $cats=App__plans_category::where('app__plans_id',$app->id)->get();
        foreach ($cats as $dsa) {
            $dsa->delete();
        }
    
        foreach ($request->cat as $cat) {
            $app_cat=new App__plans_category();
            $app_cat->app__plans_id=$app->id;
            $app_cat->category_id=$cat;
            $app_cat->save();
        }
    
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
        $cats=App__plans_category::where('app__plans_id',$id)->get();
        foreach ($cats as $cat) {
            print_r($cat);
            $ca=App__plans_category::find($cat->id);
            $ca->forceDelete();
        }
        return redirect()->route('plans.index')->with('success',"Application Plan $app->name Is Permanatly Deleted");
    }
}
