<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable=['teacher_id','promotion_id','content','file','dateBigin','dateEnd','slug'];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function promotion(){
        return $this->belongsTo(Promotion::class);
    }
    public function appleys(){
        return $this->hasManyThrough(Applay::class, Register::class);
    }
}
