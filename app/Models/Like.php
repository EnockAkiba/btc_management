<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable=['news_id','user_id','slug'];

    public function news(){
        return $this->belongsTo(News::class);
    }
}
