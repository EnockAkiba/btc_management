<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable=['slug','user_id','promotion_id','index','extension','vacation','respoName','respoNumber'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function promotion(){
        return $this->belongsTo(Promotion::class);
    }

    public function applay(){
        return $this->hasMany(Applay::class);
    }

}

