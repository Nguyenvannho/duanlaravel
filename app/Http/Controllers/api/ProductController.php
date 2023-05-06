<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    protected $productService;
    public function index( )
    {
        $products = Product::all();
        return response()->json($products,200);
    }
    public function product_detail($id)
    {
        $product = Product::with('category')->find($id);
        return response()->json($product, 200);
    }
    public function category_list()
    {
        $categories = Category::with('products')->take(10)->get();
        return response()->json($categories, 200);
    }
    public function product_new()
    {
        $product = Product::take(6)->get();
        return response()->json($product, 200);
    }
}   