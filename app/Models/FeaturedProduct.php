<?php

namespace App\Models;

use App\Models\SubCategoryImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeaturedProduct extends Model
{
    
    use HasFactory;
    
    protected $fillable = ['title',  'description', 'image'];

    public function getImageAttribute($value)
    {
        return $value ? asset(Storage::url($value)) : null;
    }

  
}
