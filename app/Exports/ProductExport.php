<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.name', 'products.price','products.quantity',
        'products.created_at', 'products.updated_at','categories.name as cateName'
        )->get();
    }
    public function headings() :array
    {
    	return ["Tên Sản Phẩm", "Giá(VND)", "Số Lượng","Ngày Nhập","Ngày Sửa","Danh Mục"];
    }

}
