<?php

namespace App\Models;

use App\Models\NewsImg;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'news_id',
        'header',
        'header_url',
        'body',
        'news_card_header',
        'create_time',
        'is_active'
    ];

    public function NewsImg(){
        return $this->hasMany(NewsImg::class);
    }
}
