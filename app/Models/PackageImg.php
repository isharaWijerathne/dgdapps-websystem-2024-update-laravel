<?php

namespace App\Models;

use App\Models\Package;
use Illuminate\Database\Eloquent\Model;

class PackageImg extends Model
{
    
    public $timestamps = false;
    protected $fillable = [
        'package_imgs_id',
        'package_id',
        'img_location',
        'is_active'
    ];

    public function Package(){
        return $this->belongsTo(Package::class);
    }
}
