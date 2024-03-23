<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'name', 'designation', 'image'];

    public function getImageAttribute($value)
    {
        return $value ? asset(Storage::url($value)) : null;
    }


}
