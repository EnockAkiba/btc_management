<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable=['user_id','title','type','picture','video','description','slug'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function like(){
        return $this->hasMany(Like::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
