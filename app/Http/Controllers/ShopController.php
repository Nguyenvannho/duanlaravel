<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index()
{
    $products = Product::all();
    $param = [
        'products'=>$products,
    ];
    return view('shop.home',$param);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "nameVi" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                'image' => $product->image,
                'max' => $product->quantity,
            ];
        }
        session()->put('cart', $cart);
        $data = [];
        $data['cart'] = session()->has('cart');
        // dd($data);
        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        $categorys = Category::get();
        $param = [
            'product' => $product,
            'categorys' => $categorys
        ];
        return view('shop.detail', $param);
    }
    public function cart()
    {
        $products = Product::get();
        $categories = Category::all();
        $param = [
            'products' => $products,
            'categories' => $categories,
        ];
        return view('shop.cart', $param);
    }
    public function checkOuts()
    {
        return view('shop.checkout');
    }
    public function Order(Request $request)
    {
        if ($request->product_id == null) {
            return redirect()->back();
        } else {
            $id = Auth::guard('customers')->user()->id;
            $data = Customer::find($id);
            $data->address = $request->address;
            $data->email = $request->email;
            $data->phone = $request->phone;
            if (isset($request->note)) {
                $data->note = $request->note;
            }
            $data->save();

            $order = new Order();
            $order->customer_id = Auth::guard('customers')->user()->id;
            $order->date_at = date('Y-m-d H:i:s');
            $order->total = $request->totalAll;
            $order->save();
        }
        $count_product = count($request->product_id);
        for ($i = 0; $i < $count_product; $i++) {
            $orderItem = new OrderDetail();

            $orderItem->order_id =  $order->id;
            $orderItem->product_id = $request->product_id[$i];
            $orderItem->quantity = $request->quantity[$i];
            $orderItem->total = $request->total[$i];

            $orderItem->save();
            session()->forget('cart');
            DB::table('products')
                ->where('id', '=', $orderItem->product_id)
                ->decrement('quantity', $orderItem->quantity);
        }
      
        alert()->success('Đặt hàng thành công!');


        return redirect()->route('shop.index');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            alert()->success('Cập Nhật Đơn Hàng Thành Công!');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            alert()->success('Xóa Đơn Hàng Thành Công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function register()
    {
        return view('shop.register');
    }
    public function checkregister(StoreRegisterRequest $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:customers|email',
            'password' => 'required|min:6',
        ]);

        $notifications = [
            'ok' => 'ok',
        ];
        $notification = [
            'message' => 'error',
        ];
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->gender = $request->gender;
        $customer->address =  $request->address;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);

        if ($request->password == $request->confirmpassword) {
            alert()->success('Đăng ký tài khoản thành công!');
            $customer->save();
            
            return redirect()->route('shop.index');
        } else {
            return redirect()->route('shop.index')->with($notification);
        }
    }
    public function login()
    {
        return view('shop.login');
    }
    public function checklogin(Request $request)
    {
        // try {
        //     $credentials = $request->only('email', 'password');
        //     if (Auth::attempt($credentials)) {
        //         // Đăng nhập thành công
        //         return redirect()->intended('/dashboard');
        //     } else {
        //         throw new \Exception('Tài khoản hoặc mật khẩu không đúng');
        //     }
        // } catch (\Exception $e) {
        //     return back()->withErrors(['email' => $e->getMessage()]);
        // }
        $notification = [
            'message' => 'error',
        ];
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr)) {
            alert()->success('Đăng nhập trang shop thành công!');
            return redirect()->route('shop.index');
        } else {
           alert()->error('Tài khoản hoặc mật khẩu không đúng, 
           Vui lòng đăng nhập lại!');
           return redirect()->route('shop.index');
           
        }
        
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('shop.index');
    }
    // public function remove(Request $request)
    //     {
    //         if ($request->id) {
    //             $cart = session()->get('cart');
    //             if (isset($cart[$request->id])) {
    //                 unset($cart[$request->id]);
    //                 session()->put('cart', $cart);
    //             }
    //             session()->put('cart', $cart);
    //         }
    //         alert()->success('Xóa Đơn Hàng Thành Công!');

    //     }
    public function quenmatkhau(Request $request)
    {
        $customer = Customer::where('email', $request->email)->first();
        if ($customer) {
            $pass = Str::random(6);
            $customer->password = bcrypt($pass);
            $customer->save();
            $data = [
                'name' => $customer->name,
                'pass' => $pass,
                'email' => $customer->email,
            ];
            Mail::send('shop.email.password', compact('data'), function ($email) use ($customer) {
                $email->subject('Shop shop');
                $email->to($customer->email, $customer->name);
            });
        }
        return redirect()->route('shop.checklogin');

}
}
