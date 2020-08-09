<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /*category首頁*/
    public function category()
    {
        $category = Category::all();
        return view('admin.category.category', compact('category'));
    }

    /*category新增*/
    public function storecategory(Request $request)
    {
        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        //1  $data = array();
        //1  $data['category_name'] = $request->category_name;
        //1  DB::table('categories')->insert($data);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();



        $notification = array(
            'messege' => '分類已成功添加',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    /*category刪除*/
    public function Deletecategory($id)
    {
        DB::table('categories')->where('id', $id)->delete();

        $notification = array(
            'messege' => '分類成功刪除',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    /*category編輯*/
    public function Editcategory($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit_category', compact('category'));
    }

    /*category上傳*/
    public function Updatecategory(Request $request, $id)
    {
        $validateData = $request->validate([
            'category_name' => 'required|max:255',
        ]);

        $data = array();
        $data['category_name'] = $request->category_name;
        $update = DB::table('categories')->where('id', $id)->update($data);

        if ($update) {
            $notification = array(
                'messege' => '分類成功更新',
                'alert-type' => 'success'
            );
            return Redirect()->route('categories')->with($notification);
        } else {
            $notification = array(
                'messege' => '沒有更新',
                'alert-type' => 'error'
            );
            return Redirect()->route('categories')->with($notification);
        }
    }
}
