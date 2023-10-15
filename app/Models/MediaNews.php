<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaNews extends Model
{
    use HasFactory;

    protected $fillable=['new_id','picture'];

    public function news(){
        return $this->belongsTo(News::class);
    }
}
