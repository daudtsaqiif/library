<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable =[
        'place_id',
        'name'
    ];

    public function book(){
        return $this->hasMany(book::class);
    }
    public function place(){
        return $this->belongsTo(place::class);
    }
}
