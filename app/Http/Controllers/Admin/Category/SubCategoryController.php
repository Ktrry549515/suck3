<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function subcategories()
    {
        $category = DB::table('categories')->get();
        $subcat = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', 'categories.id')
            ->select('subcategories.*', 'categories.category_name')/*撈出category_name*/
            ->get();
        return view('admin.category.subcategory', compact('category', 'subcat'));
    }

    public function storesubcat(Request $request)
    {
        $validateData = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('subcategories')->insert($data);

        $notification = array(
            'messege' => '子類別已成功插入',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    /*刪除 SubCategory*/
    public function DeleteSubcat($id)
    {
        DB::table('subcategories')->where('id', $id)->delete();

        $notification = array(
            'messege' => '子類別已成功刪除',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /*編輯 SubCategory*/
    public function EditSubcat($id)
    {
        $subcat = DB::table('subcategories')->where('id', $id)->first();
        $category = DB::table('categories')->get();
        return view('admin.category.edit_subcat', compact('subcat', 'category'));
    }
    /*上傳 SubCategory*/
    public function UpdateSubcat(Request $request, $id)
    {
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('subcategories')->where('id', $id)->update($data);

        $notification = array(
            'messege' => '子類別更新成功',
            'alert-type' => 'success'
        );
        return Redirect()->route('sub.categories')->with($notification);
    }
}
