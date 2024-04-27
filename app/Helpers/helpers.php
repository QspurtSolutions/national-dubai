<?php

use App\Models\Categories;

if (!function_exists('getCategories')) {
    function getCategories()
    {
        return Categories::take(5)->get();
    }
}
