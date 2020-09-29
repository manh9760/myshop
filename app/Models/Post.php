<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Post extends Model {
	protected $table = 'posts';
    protected $guarded = [''];

    public function menu() {
    	return $this->belongsTo(Menu::class,'menu_id');
    }
}
