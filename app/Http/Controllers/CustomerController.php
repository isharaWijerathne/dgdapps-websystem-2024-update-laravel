<?php

namespace App\Http\Controllers;

use App\Models\CustomerContact;
use App\Models\MarketingManager;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){

        // $cus = CustomerContact::with(['marketingManager' => function ($query){
        //     $query->orderBy('id');
        // } ]   )->get();

        $cus = CustomerContact::with(['marketingManager' => function($q){
                $q->select("id","mm_id");
        }])->get();

        return view("admin.customer.customer-contact-view",compact("cus"));
    }
}
