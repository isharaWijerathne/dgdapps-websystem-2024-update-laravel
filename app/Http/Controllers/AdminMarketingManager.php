<?php

namespace App\Http\Controllers;

use App\Models\MarketingManager;
use Illuminate\Http\Request;

class AdminMarketingManager extends Controller
{
    public function showManagerList(){

        $mks = MarketingManager::get(); 

        return view("admin.marketing.marketing-manager-list",compact("mks"));
    }

    public function changeStatus(Request $request){
        try {
            $validater = $request->validate([
               'id' => ['required','string','max:9'],
            ]);
   
            $selected_recode = MarketingManager::where("mm_id","=",$request->id)->first();
   
            //get current status
            $current_status = $selected_recode->is_active;
   
            $newStats = true;
            if($current_status == true){
   
               $newStats = false;
            }else{
               $newStats = true;
            }
   
            $selected_recode->save();
   
            MarketingManager::where("mm_id","=",$request->id)->update([
               'is_active' =>$newStats
            ]);
   
            return redirect()->route("marketing-manager-list")->with("success","You have successfully change admin status.");
   
   
         } catch (\Throwable $th) {
            return redirect()->route("marketing-manager-list")->with("error","Your action has been canceled");
         }

    }


    public function deleteMM(Request $request){

        try {
            $validater = $request->validate([
                //mm_id
               'id' => ['required','string','max:9'],
            ]);
   

            //delete news
            $selected_news = MarketingManager::where("mm_id","=",$request->id)->first();
            $selected_news->delete();

            return redirect()->route("news-list")->with("success","You have successfully news .");
   
   
         } catch (\Throwable $th) {
            return redirect()->route("news-list")->with("error","Your action has been canceled");
         }

    }
}
