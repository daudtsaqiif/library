<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $fillable =[
        'category_id',
        'place_id',
        'title',
        'author',
        'edition',
        'publishing',
        'isbn',
        'image',
        'pdf',
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }
    
    public function place(){
        return $this->belongsTo(place::class);
    }
}
