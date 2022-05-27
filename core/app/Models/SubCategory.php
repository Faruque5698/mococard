<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SendGrid\Mail\Category;

class SubCategory extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function card(){
        return $this->hasMany('App\Models\Card', 'sub_category_id', 'id');
    }

}
