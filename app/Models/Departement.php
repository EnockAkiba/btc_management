<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    protected $fillable=['slug','title','description','picture'];

    public function promotions(){
        return $this->hasMany(Promotion::class);
    }
}
