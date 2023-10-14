<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
     
    protected $fillable=['departement_id','slug','designation','price','dateBegin','dateEnd'];
    public function departement(){
        return $this->belongsTo(Departement::class);
    }

    public function inscrire(){
        return $this->hasMany(Inscrire::class);
    }
}