<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $this->authorize('viewAny',Group::class);
        $groups = Group::paginate(4);
        $users= User::get();
        $param = [
            'groups' => $groups,
            'users' => $users
        ];
        return view('admin.groups.index', $param );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Group::class);
        return view('admin.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Bạn không được để trống!',
            ]
        );
        $group = new Group();
        $group->name = $request->name;
        $group->save();
        alert()->success('Thêm thành công!');
        return redirect()->route('group.index');
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
        $this->authorize('update',Group::class);
        $group = Group::find($id);
        return view('admin.groups.edit', compact('group') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $group = Group::find($id);
        $group->name = $request->name;
        $group->save();
        $notification = [
            'message' => 'Chỉnh Sửa Thành Công!',
            'alert-type' => 'success'
        ];
        alert()->success('Cập nhật thành công!');

        return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $group = Group::find($id);
        $group->delete();
        alert()->success('Xóa nhân viên thành công!');

        return redirect()->back();
    }
    public function detail($id)
    {
        $group=Group::find($id);

        $current_user = Auth::user();
        $userRoles = $group->roles->pluck('id', 'name')->toArray();
        // dd($userRoles);
        $roles = Role::all()->toArray();
        $group_names = [];
        /////lấy tên nhóm quyền
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'group' => $group,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'group_names' => $group_names,
        ];
        return view('admin.groups.detail',$params);
    }
    public function group_detail(Request $request,$id)
    {
        $notification = [
            'message' => 'Cấp Quyền Thành Công!',
            'alert-type' => 'success'
        ];
        $group= Group::find($id);
        $group->roles()->detach();
        $group->roles()->attach($request->roles);
        alert()->success('Cấp quyền thành công!');

        return redirect()->route('group.index')->with($notification);;
    }
}
