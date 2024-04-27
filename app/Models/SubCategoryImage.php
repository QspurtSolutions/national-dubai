<?php 

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryImage extends Model
{
    protected $fillable = ['sub_category_id', 'image_path'];
 
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
