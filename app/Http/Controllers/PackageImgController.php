<?php

namespace App\Http\Controllers;


use App\Models\PackageImg;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PackageImgController extends Controller
{
    public function changeStatus(Request $request){

        try {
           $validater = $request->validate([
              'id' => ['required','string','max:9'],
           ]);
  
           $selected_recode = PackageImg::where("package_imgs_id","=",$request->id)->first();
  
           //get current status
           $current_status = $selected_recode->is_active;
  
           $newStats = true;
           if($current_status == true){
  
              $newStats = false;
           }else{
              $newStats = true;
           }
  
           $selected_recode->save();
  
           PackageImg::where("package_imgs_id","=",$request->id)->update([
              'is_active' =>$newStats
           ]);
  
           return redirect()->route("package-list")->with("success","You have successfully change package image status.");
  
  
        } catch (\Throwable $th) {
           return redirect()->route("package-list")->with("error","Your action has been canceled");
        }
    }


    public function deleteImg(Request $request){

        try {
           $validater = $request->validate([
              'package_imgs_id' => ['required','string','max:9'],
              'package_id' => ['required','string','max:9'],
               'img_location' =>['required'] 
           ]);
  
           $selected_recode = PackageImg::where("package_imgs_id","=",$request->package_imgs_id);
           $selected_recode->delete();
  
          
           if(File::exists(public_path('storage/uploads/package_imgs/'.$request->package_id."/".$request->img_location))){
                File::delete(public_path('storage/uploads/package_imgs/'.$request->package_id."/".$request->img_location));
          
            }else{
                return redirect()->route("package-list")->with("error","Your action has been canceled");
            }

         
           return redirect()->route("package-list")->with("success","You have successfully delete selected image.");
  
  
        } catch (\Throwable $th) {
           return redirect()->route("package-list")->with("error","Your action has been canceled");
        }
    }
}
