<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $customers = Customer::paginate(3);
        return view('admin.customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->gender = $request->gender;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $customer->image = $path;
            $customer->save();
        }
        alert()->success('Thêm khách hàng thành công!');
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        return view('admin.customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        {
            $customer = Customer::findOrFail($id);
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->gender = $request->gender;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $fieldName = 'image';
            if ($request->hasFile($fieldName)) {
                $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
                $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
                $extenshion = $request->file($fieldName)->getClientOriginalExtension();
                $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
                $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
                $path = str_replace('public/', '', $path);
                $customer->image = $path;
            }
            alert()->success('Cập nhật khách hàng thành công!');
    
            $customer->save();
    
            return redirect()->route('customer.index');
            //
        }
        
    
    }
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $customer = Customer::findOrFail($id);
        $customer->Delete();
        alert()->success('Xóa thể loại thành công!');
        return redirect()->route('customer.index');
    }
    public function search(Request $request){
        $search = $request->input('search');
        if(!$search){
            return redirect()->route('product.index');
        }
        $customers = Customer::where('name','LIKE','%'.$search.'%')->paginate(2);
        return view('admin.customers.index',compact('customers'));
      }
}