<?php

namespace App\Http\Controllers;

use App\Models\NewsImg;
use Illuminate\Http\Request;
use File;
class NewsImgController extends Controller
{
    public function changeStatus(Request $request){

        try {
           $validater = $request->validate([
              'id' => ['required','string','max:9'],
           ]);
  
           $selected_recode = NewsImg::where("news_imgs_id","=",$request->id)->first();
  
           //get current status
           $current_status = $selected_recode->is_active;
  
           $newStats = true;
           if($current_status == true){
  
              $newStats = false;
           }else{
              $newStats = true;
           }
  
           $selected_recode->save();
  
           NewsImg::where("news_imgs_id","=",$request->id)->update([
              'is_active' =>$newStats
           ]);
  
           return redirect()->route("news-list")->with("success","You have successfully change package image status.");
  
  
        } catch (\Throwable $th) {
           return redirect()->route("news-list")->with("error","Your action has been canceled");
        }
    }

    public function deleteImg(Request $request){

        try {
           $validater = $request->validate([
              'news_imgs_id' => ['required','string','max:9'],
              'news_id' => ['required','string','max:9'],
               'img_location' =>['required'] 
           ]);
  
           $selected_recode = NewsImg::where("news_imgs_id","=",$request->news_imgs_id);
           $selected_recode->delete();
  
          
           if(File::exists(public_path('storage/uploads/news_imgs/'.$request->news_id."/".$request->img_location))){
                File::delete(public_path('storage/uploads/news_imgs/'.$request->news_id."/".$request->img_location));
          
            }else{
                return redirect()->route("news-list")->with("error","Your action has been canceled");
            }

         
           return redirect()->route("news-list")->with("success","You have successfully delete selected image.");
  
  
        } catch (\Throwable $th) {
           return redirect()->route("news-list")->with("error","Your action has been canceled");
        }
    }

    
}
