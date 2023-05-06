<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $this->authorize('viewAny', User::class);
        $users = User::all();
        // $users = User::search()->paginate(4);
        $param = [
            'users' => $users,
        ];
        return view('admin.users.index', $param);
    }
    public function showAdmin()
    {
        $admins = Group::get();
        $param = [
            'admins' => $admins,
        ];
        return view('user.admin', $param);
    }

    public function create()
    {
        $this->authorize('create', User::class);
        $groups = Group::all();
        $param = [
            'groups' => $groups,
        ];
        return view('admin.users.create', $param);
    }
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'image' => 'required',
                'gender' => 'required',
                'birthday' => 'required',
                'group_id' => 'required',
            ],
            [
                'name.required' => 'Bạn không được để trống !',
                'email.required' => 'Bạn không được để trống !',
                'password.required' => 'Bạn không được để trống !',
                'address.required' => 'Bạn không được để trống !',
                'phone.required' => 'Bạn không được để trống !',
                'image.required' => 'Bạn không được để trống !',
                'gender.required' => 'Bạn không được để trống !',
                'birthday.required' => 'Bạn không được để trống !',
                'group_id.required' => 'Bạn không được để trống !',
            ]
        );
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        // $file = $request->image;
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images/users', $fileName);
            $path = str_replace('public/', '', $path);
            $user->image = $path;
            
        }
        $user->save();
  

        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];
        // Mail::send('admin.mail.mail', compact('data'), function ($email) use($request) {
        //     $email->subject('NowSaiGon');
        //     $email->to($request->email, $request->name);
        // });

        $notification = [
            'message' => 'Đăng ký thành công!',
            'alert-type' => 'success'
        ];
        alert()->success('Thêm thành công!');
        return redirect()->route('user.index')->with($notification);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $user = User::findOrFail($id);
        $param =[
            'user'=>$user,
        ];
        return view('admin.users.profile', $param);
        


        // $productshow-> show();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('view', User::class);
        $user = User::find($id);
        $groups = Group::get();
        $param = [
            'user' => $user ,
            'groups' => $groups
        ];
        return view('admin.users.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        $file = $request->image;
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images/users', $fileName);
            $path = str_replace('public/', '', $path);
            $user->image = $path;
            
        }
        $user->save();
        $notification = [
            'message' => 'Chỉnh Sửa Thành Công!',
            'alert-type' => 'success'
        ];
        alert()->success('Cập nhật thành công!');
        return redirect()->route('user.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->Delete();
        alert()->success('Xóa thành công!');
        return redirect()->route('user.index');
    }
    public function search(Request $request){
        $search = $request->input('search');
        if(!$search){
            return redirect()->route('product.index');
        }
        $users = User::where('name','LIKE','%'.$search.'%')->paginate(2);
        return view('admin.users.index',compact('users'));
      }
}
