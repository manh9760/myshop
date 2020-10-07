<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromCollection, WithHeadings {

	private $transactions;
	public function __construct($transactions) {
		$this->transactions = $transactions;	
	}

    public function collection() {
        $transactions = $this->transactions;
        $formattedTransactions = [];

        foreach ($transactions as $key => $item) {
        	$formattedTransactions [] = [
        		'id' => $item->id,
        		'total_money' => number_format($item->total_money, 0, ',', '.'),
        		'full_name' => $item->full_name,
        		'email' => $item->email,
        		'phone' => $item->phone,
        		'status' => $item->getStatus($item->status)['name'],
        		'user_type' => $item->user_id ? "Thành viên" : "Chưa đăng ký",
        		'created_at' => $item->created_at->format("d/m/Y"),
        	];
        }
        return collect($formattedTransactions);
    }

    public function headings(): array {
        return [
            'Mã số',
            'Tổng tiền (VNĐ)',
            'Tên khách hàng',
            'Địa chỉ email',
            'Số điện thoại',
            'Trạng thái',
            'Khách hàng',
            'Ngày tạo',
        ];
    }
}
