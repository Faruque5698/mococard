<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trx extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function currency()
    {
        return $this->belongsTo(Currency::class,'currency_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getTypeAttribute(){
        return $this->trx_type;
    }
}
