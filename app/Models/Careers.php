<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Careers extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'careers_id',
        'header',
        'header_url',
        'body',
        'seat',
        'closing_date',
        'is_active'
    ];

}
