<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings {

	private $products;
	public function __construct($products) {
		$this->products = $products;	
	}

    public function collection() {
        $products = $this->products;
        $formattedTransactions = [];

        foreach ($products as $key => $item) {
        	$formattedProducts [] = [
        		'id' => $item->id,
        		'name' => $item->name,
        		'price_old' => number_format($item->price_old, 0, ',', '.'),
        		'sale' => $item->sale,
        		'price' => number_format($item->price, 0, ',', '.'),
        		'number' => $item->number,
        		'active' => $item->active ? "Hiện" : "Ẩn",
        		'created_at' => $item->created_at->format("d/m/Y"),
        	];
        }
        return collect($formattedProducts);
    }

    public function headings(): array {
        return [
            'Mã số',
            'Tên sản phẩm',
            'Giá nhập (VNĐ)',
            'Giảm giá (%)',
            'Giá bán (VNĐ)',
            'Số lượng (Cái)',
            'Trạng thái',
            'Ngày tạo',
        ];
    }
}
