<?php

namespace App\Models;

use App\Models\MarketingManager;
use Illuminate\Database\Eloquent\Model;

class CustomerContact extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'contact_id',
        'customer_name',
        'email',
        'contact_number',
        'selected_package',
        'mk_id',
        'mm_ans',
        "status",
        "is_mk_can_reply"
    ];

    public function MarketingManager(){

        return $this->hasMany(MarketingManager::class,"id","mk_id");
    }
}
