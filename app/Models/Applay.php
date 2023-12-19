<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applay extends Model
{
    use HasFactory;

    protected $fillable=['quiz_id','register_id','content','file','slug'];

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function register(){
        return $this->belongsTo(Register::class);
    }
}
