<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    public function subCategory(){
        return $this->belongsTo('App\Models\SubCategory');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
