<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Car extends Model
{
    use HasFactory , softDeletes ;
    protected $fillable = [
        'carTitle',
        'description',
        'image',
        'published',
        'category_id',
        'mobile'

        ];

        public function category( ) {
            return $this->belongsTo(Category::class);
        }
}