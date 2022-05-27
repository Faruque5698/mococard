<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;

class VirtualCard extends Model
{
    use HasFactory;


    public function plan(){
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
