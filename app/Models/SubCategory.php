<?php

namespace App\Models;

use App\Models\SubCategoryImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    
    use HasFactory;
    
    protected $fillable = ['title', 'category_id', 'description', 'image'];


    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function getImageAttribute($value)
    {
        return $value ? asset(Storage::url($value)) : null;
    }

    public function images()
    {
        return $this->hasMany(SubCategoryImage::class);
    }
}
