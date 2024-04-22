<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Categories extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['heading','image'];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id'); // Use 'category_id' as the foreign key
    }
    public function getImageAttribute($value)
    {
        return $value ? asset(Storage::url($value)) : null;
    }
}
