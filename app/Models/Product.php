<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vendor() {
        return $this->beLongsTo(User::class, 'vendor_id', 'id');
    }

    public function category() {
        return $this->beLongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory() {
        return $this->beLongsTo(SubCategory::class, 'subcategory_id', 'id');
    }

    public function brand() {
        return $this->beLongsTo(Brand::class, 'brand_id', 'id');
    }
}
