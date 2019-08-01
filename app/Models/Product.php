<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'product_code',
    	'name',
    	'slug',
    	'category_id',
    	'admin_id',
    	'description',
    	'thumbnail',
        'price',
    	'rating',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function productDetail()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
