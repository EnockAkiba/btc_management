<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable=['new_id','user_id','slug'];

    public function new(){
        return $this->belongsTo(News::class);
    }
}
