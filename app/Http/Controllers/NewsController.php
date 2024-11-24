<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsImg;
use Illuminate\Http\Request;
use App\utils\StaticGenerator;
use File;

class NewsController extends Controller
{
    //createNews
    public function createNews(Request $request){

        try {
            
            //input -> card_header,news_url, header, body , imgs[]

            //request validator
            $validater = $request->validate([
                                    
                                    'header' =>['required','string'],
                                    'body' => ["required",'string'],
                                    'news_url' => ["required",'string'],
                                    'card_header' => ["required",'string'],
                                    'imgs.*' =>['mimes:jpg,jpeg,png','max:6000'] ]);


            //genarate id

            $next_news_id = "";
            $last_created_news = News::query()->orderByDesc("news_id")->first(); 
            if($last_created_news == null){
                $next_news_id = "NWS-0001";
             }else{
                $next_news_id = StaticGenerator::getNextId($last_created_news->news_id);
            }

            
            //create package recode

            $created_package_recode = News::create([
                'news_id' => $next_news_id,
                'header' => $request->header,
                'header_url' => $request->news_url,
                'news_card_header' => $request->card_header,
                'create_time' => now(),
                'body' => $request->body,
                'is_active' => true,
                
            ]);
            

            //get last create news img id from db
            $last_created_newsImg_before_upload = NewsImg::query()->orderByDesc("news_imgs_id")->first();
            $next_news_imgs_id = "";
            if($last_created_newsImg_before_upload == null){
                $next_news_imgs_id = "NIM-0001";
            }else{
                $next_news_imgs_id = StaticGenerator::getNextId($last_created_newsImg_before_upload->news_imgs_id);
            }

            //image upload to server

            if ($files = $request->file('imgs')) {

                foreach ($files as $file) {
        
                    // Generate a unique filename
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '_' . uniqid() . '.' . $extension; 
        
                    //news image location
                    $path = 'uploads/news_imgs/'.$next_news_id;
        
                   
                    //create db recode

                    $new_news_imgs_recode = NewsImg::create([
                        "news_imgs_id" => $next_news_imgs_id,
                        "news_id" => $next_news_id,
                        "img_location" => $filename,
                        "is_active" => true
                    ]);
        
                    //set next package_imgs id
                    
                    $next_news_imgs_id = StaticGenerator::getNextId($next_news_imgs_id);

                    // Ensure the directory exists
                    if (!file_exists($path)) {
                        mkdir($path, 0755, true);
                    }
        
                    // Move the uploaded file
                    try {
                        $file->storeAs($path, $filename,'public');
        
                        
                    } catch (\Exception $e) {
        
                        return redirect()->back()->with("error","File upload service error");
                    }
        
                   
                }
            }


            return redirect()->back()->with("success","You have successfully created news recode. ");


        } catch (\Throwable $th) {
            
            return redirect()->back()->with("error","Your action has been canceled");
        }
    }


    public function showList(){

        $news = News::get();
        return view('admin.news.news-list',compact("news"));
    }

    public function showEditWindow($id){

        //get packageData
        $news = News::where("news_id", "=",$id)->first();

        //get pic data
        $pics = NewsImg::where("news_id","=",$id)->get();


        return view('admin.news.edit-news',[
            "news" => $news,
            "pics" => $pics
        ]);
       
    }

    public function editNews(Request $request){
        // try {

            //input -> news_id , header , header_url , news_card_header ,  body , imgs
            
             //request validator
             
             $validater = $request->validate([
                'news_id' => ['required','string','max:9'],    
                'header' =>['required','string'],
                'body' => ["required",'string'],
                'header_url' => ["required",'string'],
                'news_card_header' => ["required",'string'],
                'imgs.*' =>['mimes:jpg,jpeg,png','max:6000'] ]);


            //update data
            $update_news = News::where("news_id","=",$request->news_id)
                                     ->update([
                                        'header' => $request->header,
                                        'header_url' => $request->header_url,
                                        'news_card_header' => $request->news_card_header,
                                        'body' => $request->body,
                                    ]);
                                     


            //get last create package category id from db
            $last_created_newsImg_before_upload = NewsImg::query()->orderByDesc("news_imgs_id")->first();
            $next_news_imgs_id = "";
            if($last_created_newsImg_before_upload == null){
                $next_news_imgs_id = "NIM-0001";
            }else{
                $next_news_imgs_id = StaticGenerator::getNextId($last_created_newsImg_before_upload->news_imgs_id);
            }



            //upload image

            if ($files = $request->file('imgs')) {

                foreach ($files as $file) {
        
                    // Generate a unique filename
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '_' . uniqid() . '.' . $extension; 
        
                    //news image location
                    $path = 'uploads/news_imgs/'.$request->news_id;
        
                   
                    //create db recode

                    $new_news_imgs_recode = NewsImg::create([
                        "news_imgs_id" => $next_news_imgs_id,
                        "news_id" => $request->news_id,
                        "img_location" => $filename,
                        "is_active" => true
                    ]);
        
                    //set next package_imgs id
                    
                    $next_news_imgs_id = StaticGenerator::getNextId($next_news_imgs_id);

                    // Ensure the directory exists
                    if (!file_exists($path)) {
                        mkdir($path, 0755, true);
                    }
        
                    // Move the uploaded file
                    try {
                        $file->storeAs($path, $filename,'public');
        
                        
                    } catch (\Exception $e) {
        
                        return redirect()->route("news-list")->with("error","File upload service error");
                    }
        
                   
                }
            }
                         
            
            //upload pic
            return redirect()->route("news-list")->with("success","You have successfully update package recode. ");


        // } catch (\Throwable $th) {
        //     //throw $th;
        //     return redirect()->route("news-list")->with("error","Your action has been canceled");

        // }
    }


    public function changeStatus(Request $request){
        try {
            $validater = $request->validate([
               'id' => ['required','string','max:9'],
            ]);
   
            $selected_recode = News::where("news_id","=",$request->id)->first();
   
            //get current status
            $current_status = $selected_recode->is_active;
   
            $newStats = true;
            if($current_status == true){
   
               $newStats = false;
            }else{
               $newStats = true;
            }
   
            $selected_recode->save();
   
            News::where("news_id","=",$request->id)->update([
               'is_active' =>$newStats
            ]);
   
            return redirect()->route("news-list")->with("success","You have successfully change careers status.");
   
   
         } catch (\Throwable $th) {
            return redirect()->route("news-list")->with("error","Your action has been canceled");
         }

    }


    public function deletePackage(Request $request){

        try {
            $validater = $request->validate([
               'news_id' => ['required','string','max:9'],
            ]);
   

            //delete news
            $selected_news = News::where("news_id","=",$request->news_id);
            $selected_news->delete();

            //delete image data
            $selected_recode = NewsImg::with("news_id","=",$request->package_id);
            $selected_recode->delete();
   
           //delete Image file
            if(File::exists(public_path('storage/uploads/news_imgs/'.$request->news_id))){
                 File::deleteDirectory(public_path('storage/uploads/news_imgs/'.$request->news_id));
           
             }else{
                 return redirect()->route("news-list")->with("error","Your action has been canceled");
             }
 
          
            return redirect()->route("news-list")->with("success","You have successfully news .");
   
   
         } catch (\Throwable $th) {
            return redirect()->route("news-list")->with("error","Your action has been canceled");
         }

    }
}
