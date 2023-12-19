<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    use HasFactory;

    protected $fillable=['designation'];
    
    public function promotions(){
        return $this->hasMany(Promotion::class);
    }
}
