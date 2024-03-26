<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SubCategory extends Model
{
    
    use HasFactory;
    
    protected $fillable = ['title', 'category_id', 'image'];


    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function getImageAttribute($value)
    {
        return $value ? asset(Storage::url($value)) : null;
    }
}
