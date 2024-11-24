<?php

namespace App\Models;

use App\Models\PackageImg;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
 
    public $timestamps = false;
    protected $fillable = [
        'package_id',
        'package_type',
        'header',
        'header_url',
        'card_url',
        'created_time',
        'body',
        'is_active',
        'price'
    ];


    public function PackageImg(){
        return $this->hasMany(PackageImg::class);
    }
}
