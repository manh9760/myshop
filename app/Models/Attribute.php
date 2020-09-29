<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Attribute extends Model {
    protected $table = 'attributes';
    protected $guarded = [''];
    protected $types = [
    	1 => [
    		'name' => "Thương hiệu",
    		'class' => "label label-info",
    	],
    	2 => [
    		'name' => "Xuất xứ",
    		'class' => "label label-warning",
    	],
    ];

    public function getType() {
    	return Arr::get($this->types, $this->type, "[N\A]");
    }

    public function category() {
    	return $this->belongsTo(Category::class,'category_id');
    }
}
