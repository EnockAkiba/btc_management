<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
     
    protected $fillable=['departement_id','extension_id','slug','designation','price','dateBegin','dateEnd'];
    
    public function departement(){
        return $this->belongsTo(Departement::class);
    }

    public function register(){
        return $this->belongsTo(Register::class);
    }

    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }

    public function extension(){
        return $this->belongsTo(Extension::class);
    }

}
