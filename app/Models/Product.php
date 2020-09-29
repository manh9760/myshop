<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model {
    protected $table = 'products';
    protected $guarded = [''];
    
    public function category() {
    	return $this->belongsTo(Category::class,'category_id'); // Trường category_id trong bảng products
    }

    public function keywords() {
    	return $this->belongsToMany(Keyword::class,'products_keywords', 'pk_product_id', 'pk_keyword_id');
    }
}
