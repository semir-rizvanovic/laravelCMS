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
    public function coupon() {
        $coupon = DB::table('coupons')->get();
        return view('admin.coupon.coupon', compact ('coupon'));
    }
    public function storecoupon(request $request) {
        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;
        DB::table('coupons')->insert($data);
        $notification=array(
            'messege'=>'Uspješno ste dodali Kupon.',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);

    }
    public function deletecoupon($id) {
        DB::table('coupons')->where('id', $id)->delete();
        $notification=array(
            'messege'=>'Uspješno ste obrisali Kupon.',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
    public function editcoupon($id) {
        $coupon = DB::table('coupons')->where('id', $id)->first();
        return view('admin.category.edit_coupon',compact('coupon'));
    }
    public function updatecoupon(Request $request, $id) {
        $validateData = $request->validate([
            'coupon' => 'required|max:255',
            'discount' => 'required|max:255',
        ]);

        $data=array();
        $data['coupon']=$request->coupon;
        $data['discount']=$request->discount;
        $update=DB::table('coupons')->where('id', $id)->update($data);
        if($update) {
        $notification=array(
            'messege'=>'Uspješno ste uredili Kupon.',
            'alert-type'=>'success'
             );
           return Redirect()->route('admin.coupon')->with($notification);
    }else{
        $notification=array(
            'messege'=>'Niste ništa promjenili !',
            'alert-type'=>'error'
             );
           return Redirect()->route('admin.coupon')->with($notification);
    }
    }
}
