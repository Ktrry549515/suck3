<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /*首頁*/
    public function Coupon()
    {
        $coupon = DB::table('coupons')->get();
        return view('admin.coupon.coupon', compact('coupon'));
    }

    /*新增 */
    public function StoreCoupon(Request $request)
    {
        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;
        DB::table('coupons')->insert($data);

        $notification = array(
            'messege' => '優惠券已成功插入',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    /*刪除 */
    public function DeleteCoupon($id)
    {
        DB::table('coupons')->where('id', $id)->delete();

        $notification = array(
            'messege' => '優惠券已成功刪除',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    /*編輯 */
    public function EditCoupon($id)
    {
        $coupon = DB::table('coupons')->where('id', $id)->first();
        return view('admin.coupon.edit_coupon', compact('coupon'));
    }

    /*上傳 */
    public function UpdateCoupon(Request $request, $id)
    {
        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;
        DB::table('coupons')->where('id', $id)->update($data);

        $notification = array(
            'messege' => '優惠券更新成功',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.coupon')->with($notification);
    }



    /*Newslater */
    public function Newslater()
    {
        $sub = DB::table('newslaters')->get();
        return view('admin.coupon.newslater', compact('sub'));
    }

    public function DeleteSub($id)
    {
        DB::table('newslaters')->where('id', $id)->delete();

        $notification = array(
            'messege' => '用戶已成功刪除',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
