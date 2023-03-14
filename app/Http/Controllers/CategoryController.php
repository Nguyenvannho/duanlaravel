<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(2);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create',compact('categories'));

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
                'name.required' => 'Không được để trống phần này',
            ]
            // $.ajax(option)
            // alertify.success('Cập nhật thành công');

        );
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        alert()->success('Thêm thể loại thành công!');
        return redirect()->route('category.index');
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
        $categories = Category::find($id);
        return view('admin.categories.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->save();
        alert()->success('Cập nhật thể loại thành công!');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->Delete();
        alert()->success('Thể loại đã vào thùng rác!');
        return redirect()->route('category.index');
    }
    public function trash()
    {
        $softs = Category::onlyTrashed()->get();
        return view('admin.categories.trash', compact('softs'));
    }
    public function restore($id)
    {
        try {
            $softs = Category::withTrashed()->find($id);
            $softs->restore();
            alert()->success('Khôi Phục Thể Loại Thành Công!');
            return redirect()->route('category.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('category.index');
        }
    }
      //xóa vĩnh viễn
      public function deleteforever($id)
      {
          try {
              $softs = Category::withTrashed()->find($id);
              $softs->forceDelete();
            alert()->success('Xóa Vĩnh Viễn Thành Công!');
              return redirect()->route('category.index');
          } catch (\exception $e) {
              Log::error($e->getMessage());
              toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
              return redirect()->route('category.index');
          }
      }
    public function search(Request $request){
        $search = $request->input('search');
        if(!$search){
            return redirect()->route('category.index');
        }
        $categories = Category::where('name','LIKE','%'.$search.'%')->paginate(2);
        return view('admin.categories.index',compact('categories'));
      }
}
