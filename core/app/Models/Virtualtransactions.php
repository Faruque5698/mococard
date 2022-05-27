<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Virtualtransactions extends Model
{
    use HasFactory;

    public function card(){
        return $this->hasOne(VirtualCard::class,'id','virtual_card_id');
    }

    public function user_info(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
