<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection,WithHeadings
{
    public function collection()
{/////////join
    return DB::table('orders')
    ->join('customers', 'orders.customer_id', '=', 'customers.id')
    ->select('customers.name', 'customers.address', 'customers.phone','orders.created_at'
    )->get();
}
public function headings() :array
{
    ////////các cột của bảng excel
    return ["Tên Sản Phẩm","Địa Chỉ", "SĐT","Ngày mua"];
}
}
