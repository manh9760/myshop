<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\User;

class Transaction extends Model {
	protected $table = 'transactions';
    protected $guarded = [''];

    protected $statuses = [
    	1 => [
    		'name' => "Tiếp nhận",
    		'class' => "label label-info",
    	],
    	2 => [
    		'name' => "Đang vận chuyển",
    		'class' => "label label-warning",
    	],
    	3 => [
    		'name' => "Đã giao",
    		'class' => "label label-success",
    	],
    	4 => [
    		'name' => "Đã hủy",
    		'class' => "label label-danger",
    	],
    ];

    public function getStatus() {
    	return Arr::get($this->statuses, $this->status, "[N\A]");
    }
}
