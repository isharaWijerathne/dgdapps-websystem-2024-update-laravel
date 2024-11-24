<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;

class NewsImg extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'news_imgs_id',
        'news_id',
        'img_location',
        'is_active'
    ];



    public function News(){
        return $this->belongsTo(News::class);
    }
}
