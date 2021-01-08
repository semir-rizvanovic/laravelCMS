<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function newsletter() {
        $newsletter = DB::table('newsletters')->get();
        return view('admin.newsletter.newsletter', compact ('newsletter'));
    }
    public function storenewsletter(request $request) {
        $data = array();
        $data['email'] = $request->email;
        DB::table('newsletters')->insert($data);
        $notification=array(
            'messege'=>'Uspješno ste dodali Email za Newsletter listu.',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
    public function deletenewsletter($id) {
        DB::table('newsletters')->where('id', $id)->delete();
        $notification=array(
            'messege'=>'Uspješno ste obrisali Email sa liste.',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
    public function editnewsletter($id) {
        $newsletter = DB::table('newsletters')->where('id', $id)->first();
        return view('admin.category.edit_newsletter',compact('newsletter'));
    }
    public function updatenewsletter(Request $request, $id) {
        $validateData = $request->validate([
            'email' => 'required|max:255',
        ]);

        $data=array();
        $data['email']=$request->email;
        $update=DB::table('newsletters')->where('id', $id)->update($data);
        if($update) {
        $notification=array(
            'messege'=>'Uspješno ste uredili Email adresu.',
            'alert-type'=>'success'
             );
           return Redirect()->route('admin.newsletter')->with($notification);
    }else{
        $notification=array(
            'messege'=>'Niste ništa promjenili !',
            'alert-type'=>'error'
             );
           return Redirect()->route('admin.newsletter')->with($notification);
    }
    }
}
