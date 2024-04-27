<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PopularProducts extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'subcategory_id', 'description', 'image'];


    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function getImageAttribute($value)
    {
        return $value ? asset(Storage::url($value)) : null;
    }
}
