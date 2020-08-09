<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrontController extends Controller
{
    public function StoreNewslater(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|unique:newslaters|max:55',
        ]);

        $data = array();
        $data['email'] = $request->email;
        DB::table('newslaters')->insert($data);

        $notification = array(
            'messege' => '感謝您的訂閱',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function OrderTraking(Request $request)
    {
        $code = $request->code;
        $track = DB::table('orders')->where('status_code', $code)->first();
        if ($track) {
            // echo "<pre>";
            // print_r($track);
            return view('pages.tracking', compact('track'));
        } else {
            $notification = array(
                'messege' => '狀態碼無效',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
