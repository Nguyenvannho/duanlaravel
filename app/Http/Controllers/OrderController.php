<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Order::paginate(5);
        return view('admin.orders.index', compact('items'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $order = new Order();
        // $order->name = $request->name;
        // $order->note = $request->note;
        // $order->address = $request->address;
        // $order->phone = $request->phone;
        // $order->quantity = $request->quantity;
        // $order->save();
        // alert()->success('Thêm khách hàng thành công!');
        // return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        
        $items=DB::table('ordersdetail')
        ->join('orders','ordersdetail.order_id','=','orders.id')
        ->join('products','ordersdetail.product_id','=','products.id')
        ->select('products.*', 'ordersdetail.*','orders.id')
        ->where('orders.id','=',$id)->get();
        // dd($items);
        return view('admin.orders.order_detail',compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orders = Order::find($id);
        $param = [
            // 'order' => $order
        ];
        return view('admin.orders.edit',$param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = new Order();
        $order->name = $request->name;
        $order->note = $request->note;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->quantity = $request->quantity;
        $order->save();

        return redirect()->route('order.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->forceDelete();
        return redirect()->route('order.index');
        //
    }
    public function search(Request $request){
        $search = $request->input('search');
        if(!$search){
            return redirect()->route('product.index');
        }
        $items = Order::join('customers', 'orders.customer_id', '=', 'customers.id')
        ->where('name','LIKE','%'.$search.'%')
        ->get();
        // dd($items);
        return view('admin.orders.index',compact('items'));
      }
      public function exportOrder(){
        return Excel::download(new OrderExport, 'order.xlsx');
    }
}
