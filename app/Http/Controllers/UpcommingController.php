<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upcomming;
use Intervention\Image\ImageManagerStatic as Image;

class UpcommingController extends Controller
{
    public function index(){
        $apps=Upcomming::all();
        return view('admin.upcomming',["apps"=>$apps]);
    }

    public function save(Request $request){
        $app=new Upcomming();
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
        return redirect()->back()->with('success', "Upcomming App ($request->name #$app->id) Saved!");
    }

    public function delete($id){
        $app=Upcomming::find($id);
        $app->forceDelete();
        return redirect()->route('addup')->with('success',"Upcomming App ($app->name #$app->id) Deleted!");
    }

    public function update(Request $request){
        $app=Upcomming::findOrFail($request->id);
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
        return redirect()->route('addup')->with('success', "Upcomming App ($request->name #$app->id) Updated!");
    }

    public function edit($id){
        $app=Upcomming::findOrFail($id);
        return view('admin.editupcomming',["app"=>$app]);
    }
}
