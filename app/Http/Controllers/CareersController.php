<?php

namespace App\Http\Controllers;


use App\Models\Careers;
use Illuminate\Http\Request;
use App\utils\StaticGenerator;

class CareersController extends Controller
{
    //show public careers view
    public function index(){

        return view("careers");
    }


    //create careers database recode
    public function create(Request $request){

       try {
         
         /*
         * INPUT FILED
         *  header / header_url / closing_date / seat_count / body /
         */

         //validator
         $validater = $request->validate([
            "header" =>['required','string'],
            'header_url' => ['required','string'],
            'closing_date' => ['required'],
            'seat_count' => ['required','numeric'],
            'body' => ['required','string']

         ]);

         //get last created instance

         $last_created_db_recode = Careers::query()->orderByDesc("careers_id")->first();

            
         // create new id
         
         $next_id = "";
         if($last_created_db_recode == null){
            $next_id = "CAR-0001";
         }else{
            $next_id = StaticGenerator::getNextId($last_created_db_recode->careers_id);
         }
         
         //create recode

         $created_db_recode = Careers::create([
            'careers_id' => $next_id,
            'header' => $request->header,
            'header_url' => $request->header_url,
            'closing_date' => $request->closing_date,
            'body' => $request->body,
            'seat' => $request->seat_count,
            'is_active' => true

         ]);

         
         return redirect()->back()->with("success","You have successfully created careers recode. ");

       } catch (\Throwable $th) {

        
         //error handle
          return redirect()->back()->with("error","Your action has been canceled");
         
       }


       
    }


    //show careers list
    public function showCareersList()
    {
      $careers = Careers::paginate(25);
      return view("admin.careers.careers-list",compact("careers"));
    }



    //show edit window

    public function showEditWindow($id)
    {
      $careers = Careers::where("careers_id","=",$id)->first();
      return view("admin.careers.edit-careers",compact("careers")); 
    }


    //edit careers

    public function editCareers(Request $request){
      
       try {
        /*
         * INPUT FILED
         *  id / header / header_url / closing_date / seat_count / body /
         */

        // validator
         $validater = $request->validate([
            'id' => ['required','string','max:9'],
            "header" =>['required','string'],
            'header_url' => ['required','string'],
            'closing_date' => ['required'],
            'seat_count' => ['required','numeric'],
            'body' => ['required','string']

         ]);

         //update data

         $update_result = Careers::where("careers_id","=",$request->id)
                                 ->update([
                                    'careers_id' => $request->id,
                                    'header' => $request->header,
                                    'header_url' => $request->header_url,
                                    'closing_date' => $request->closing_date,
                                    'body' => $request->body,
                                    'seat' => $request->seat_count,
                                 ]);


         return redirect()->route("careers-list")->with("success","You have successfully updated careers recode. ");

       } catch (\Throwable $th) {
         return redirect()->route("careers-list")->with("error","Your action has been canceled");
       }
    }


    //delete post
    public function deletePost(Request $request){
         
      try {
         $validater = $request->validate([
            'id' => ['required','string','max:9'],
         ]);

         $deleted_recode = Careers::where("careers_id","=",$request->id)->delete();

         return redirect()->route("careers-list")->with("success","You have successfully deleted careers recode.");


      } catch (\Throwable $th) {
         return redirect()->route("careers-list")->with("error","Your action has been canceled");
      }
    }


    //change status
    public function changeStatus(Request $request){

      try {
         $validater = $request->validate([
            'id' => ['required','string','max:9'],
         ]);

         $selected_recode = Careers::where("careers_id","=",$request->id)->first();

         //get current status
         $current_status = $selected_recode->is_active;

         $newStats = true;
         if($current_status == true){

            $newStats = false;
         }else{
            $newStats = true;
         }

         $selected_recode->save();

         Careers::where("careers_id","=",$request->id)->update([
            'is_active' =>$newStats
         ]);

         return redirect()->route("careers-list")->with("success","You have successfully change careers status.");


      } catch (\Throwable $th) {
         return redirect()->route("careers-list")->with("error","Your action has been canceled");
      }
    }
}


