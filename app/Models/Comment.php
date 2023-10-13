<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['slug','new_id','user_id','content','picture'];

    public function new(){
        return $this->belongsTo(News::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
