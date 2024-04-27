<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['heading','image'];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id'); // Use 'category_id' as the foreign key
    }
    


    public function popularproducts()
    {
        return $this->hasMany(PopularProducts::class);
    } 



    public function getImageAttribute($value)
    {
        return $value ? asset(Storage::url($value)) : null;
    }
}
