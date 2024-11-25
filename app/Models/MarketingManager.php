<?php

namespace App\Models;


use App\Models\CustomerContact;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MarketingManager extends Authenticatable
{
     /** @use HasFactory<\Database\Factories\UserFactory> */
     use HasFactory, Notifiable;
     protected $guard = 'marketing_manager';

     /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
     protected $fillable = [
        'mm_id',
         'first_name',
         'last_name',
         'email',
         'password',
         'is_active'
     ];
 
     //set marketing manager guard
     

     /**
      * The attributes that should be hidden for serialization.
      *
      * @var array<int, string>
      */
     protected $hidden = [
         'password',
         'remember_token',
     ];                     
 
     /**
      * Get the attributes that should be cast.
      *
      * @return array<string, string>
      */
     protected function casts(): array
     {
         return [
             'email_verified_at' => 'datetime',
             'password' => 'hashed',
         ];
     }

     public function CustomerContact(){
        return $this->belongsTo(CustomerContact::class);
     }
}
