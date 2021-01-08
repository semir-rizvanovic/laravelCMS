<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;

class CartController extends Controller
{
    public function addToCart($id){
        $product = DB::table('products')->where('id', $id)->first();
        $data = array();

        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';

                Cart::add($data);
                return \Response::json(['success' => 'Proizvod je dodat u Korpu!']);
        }else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';

                Cart::add($data);
                return \Response::json(['success' => 'Proizvod je dodat u Korpu!']);
        }
    }
    public function check(){
        $content = Cart::content();
        return response()->json($content);
    }
    public function showCart() {
        $cart = Cart::content();
        return view('pages.cart', compact('cart'));
    }
    public function removeCart($rowId) {
        Cart::remove($rowId);
        $notification=array(
            'messege'=>'Uspješno obrisan proizvod iz Korpe.',
            'alert-type'=>'error'
             );
           return Redirect()->back()->with($notification);

    }
    public function UpdateCart(Request $request){

    	$rowId = $request->productid;
    	$qty = $request->qty;
    	Cart::update($rowId, $qty);
    	$notification=array(
                        'messege'=>'Product Quantity Updated',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);

    }


}
