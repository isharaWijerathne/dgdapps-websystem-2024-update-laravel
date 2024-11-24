<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageImg;
use Illuminate\Http\Request;
use App\utils\StaticGenerator;
use File;
use Storage;

class PackageController extends Controller
{
    public function index(){


        return view('packages');
    }

    public function createPackage(Request $request){

        try {
            
            //input -> package_type, package_url, header, body, price, imgs[]

            //request validator
            $validater = $request->validate([
                                    "package_type" =>['required','string'],
                                    'package_url'=>['required','string'],
                                    'header' =>['required','string'],
                                    'body' => ["required",'string'],
                                    'card_url' => ["required",'string'],
                                    'price' => ['required','numeric'],
                                    'imgs.*' =>['mimes:jpg,jpeg,png','max:6000'] ]);


            //genarate id

            $next_package_id = "";
            $last_created_package = Package::query()->orderByDesc("package_id")->first(); 
            if($last_created_package == null){
                $next_package_id = "PAC-0001";
             }else{
                $next_package_id = StaticGenerator::getNextId($last_created_package->package_id);
            }

            
            //create package recode

            $created_package_recode = Package::create([
                'package_id' => $next_package_id,
                'package_type' => $request->package_type,
                'header' => $request->header,
                'header_url' => $request->package_url,
                'card_url' => $request->card_url,
                'price' => $request->price,
                'created_time' => now(),
                'body' => $request->body,
                'is_active' => true,
                
            ]);
            

            //get last create package category id from db
            $last_created_packageImg_before_upload = PackageImg::query()->orderByDesc("package_imgs_id")->first();
            $next_package_imgs_id = "";
            if($last_created_packageImg_before_upload == null){
                $next_package_imgs_id = "PIM-0001";
            }else{
                $next_package_imgs_id = StaticGenerator::getNextId($last_created_packageImg_before_upload->package_imgs_id);
            }

            //image upload to server

            if ($files = $request->file('imgs')) {

                foreach ($files as $file) {
        
                    // Generate a unique filename
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '_' . uniqid() . '.' . $extension; 
        
                    //news image location
                    $path = 'uploads/package_imgs/'.$next_package_id;
        
                   
                    //create db recode

                    $new_package_imgs_recode = PackageImg::create([
                        "package_imgs_id" => $next_package_imgs_id,
                        "package_id" => $next_package_id,
                        "img_location" => $filename,
                        "is_active" => true
                    ]);
        
                    //set next package_imgs id
                    
                    $next_package_imgs_id = StaticGenerator::getNextId($next_package_imgs_id);

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


            return redirect()->back()->with("success","You have successfully created package recode. ");


        } catch (\Throwable $th) {
            
            return redirect()->back()->with("error","Your action has been canceled");
        }
    }


    public function showList(){


        $packages = Package::get();

        return view('admin.packages.package-list',compact("packages"));
    }

    public function showEditWindow($id){

       //get packageData
        $package = Package::where("package_id", "=",$id)->first();

        //get pic data
        $pics = PackageImg::where("package_id","=",$id)->get();


        return view('admin.packages.edit-package',[
            "package" => $package,
            "pics" => $pics
        ]);
    }


    public function EditPackage(Request $request){
        try {

            //input -> ackage_type, package_url, header, body, price, imgs[] , package_id

             //request validator
             $validater = $request->validate([
                'package_id' => ['required','string','max:9'],
                "package_type" =>['required','string'],
                'package_url'=>['required','string'],
                'header' =>['required','string'],
                'body' => ["required",'string'],
                'card_url' => ["required",'string'],
                'price' => ['required','numeric'],
                'imgs.*' =>['mimes:jpg,jpeg,png','max:6000'] ]);


            //update data
            $update_package = Package::where("package_id","=",$request->package_id)
                                     ->update([
                                        'package_type' => $request->package_type,
                                        'header' => $request->header,
                                        'header_url' => $request->package_url,
                                        'card_url' => $request->card_url,
                                        'price' => $request->price,
                                        'body' => $request->body,
                                     ]);    
        


            //get last create package category id from db
            $last_created_packageImg_before_upload = PackageImg::query()->orderByDesc("package_imgs_id")->first();
            $next_package_imgs_id = "";
            if($last_created_packageImg_before_upload == null){
                $next_package_imgs_id = "PIM-0001";
            }else{
                $next_package_imgs_id = StaticGenerator::getNextId($last_created_packageImg_before_upload->package_imgs_id);
            }



            //upload image

            if ($files = $request->file('imgs')) {

                foreach ($files as $file) {
        
                    // Generate a unique filename
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '_' . uniqid() . '.' . $extension; 
        
                    //news image location
                    $path = 'uploads/package_imgs/'.$request->package_id;
        
                   
                    //create db recode

                    $new_package_imgs_recode = PackageImg::create([
                        "package_imgs_id" => $next_package_imgs_id,
                        "package_id" => $request->package_id,
                        "img_location" => $filename,
                        "is_active" => true
                    ]);
        
                    //set next package_imgs id
                    
                    $next_package_imgs_id = StaticGenerator::getNextId($next_package_imgs_id);

                    // Ensure the directory exists
                    if (!file_exists($path)) {
                        mkdir($path, 0755, true);
                    }
        
                    // Move the uploaded file
                    try {
                        $file->storeAs($path, $filename,'public');
        
                        
                    } catch (\Exception $e) {
        
                        return redirect()->route("package-list")->with("error","File upload service error");
                    }
        
                   
                }
            }
                         
            
            //upload pic
            return redirect()->route("package-list")->with("success","You have successfully update package recode. ");


        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route("package-list")->with("error","Your action has been canceled");

        }
    }


    public function changeStatus(Request $request){
        try {
            $validater = $request->validate([
               'id' => ['required','string','max:9'],
            ]);
   
            $selected_recode = Package::where("package_id","=",$request->id)->first();
   
            //get current status
            $current_status = $selected_recode->is_active;
   
            $newStats = true;
            if($current_status == true){
   
               $newStats = false;
            }else{
               $newStats = true;
            }
   
            $selected_recode->save();
   
            Package::where("package_id","=",$request->id)->update([
               'is_active' =>$newStats
            ]);
   
            return redirect()->route("package-list")->with("success","You have successfully change careers status.");
   
   
         } catch (\Throwable $th) {
            return redirect()->route("package-list")->with("error","Your action has been canceled");
         }

    }


    public function deletePackage(Request $request){

        try {
            $validater = $request->validate([
               'package_id' => ['required','string','max:9'],
            ]);
   

            //delete package
            $selected_package = Package::where("package_id","=",$request->package_id);
            $selected_package->delete();

            //delete image data
            $selected_recode = PackageImg::with("package_id","=",$request->package_id);
            $selected_recode->delete();
   
           //delete Image file
            if(File::exists(public_path('storage/uploads/package_imgs/'.$request->package_id))){
                 File::deleteDirectory(public_path('storage/uploads/package_imgs/'.$request->package_id));
           
             }else{
                 return redirect()->route("package-list")->with("error","Your action has been canceled");
             }
 
          
            return redirect()->route("package-list")->with("success","You have successfully delete selected image.");
   
   
         } catch (\Throwable $th) {
            return redirect()->route("package-list")->with("error","Your action has been canceled");
         }

    }


}
