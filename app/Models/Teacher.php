<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable=['user_id','picture','biography','gmail','slug'];

    public function quizzes(){
        return $this->hasMany(Quiz::class)->orderByDesc('id');;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
