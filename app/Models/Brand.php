<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['image'];


    public function getImageAttribute($value)
    {
        return $value ? asset(Storage::url($value)) : null;
    }

}
