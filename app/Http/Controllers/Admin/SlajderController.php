<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class SlajderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function slajder() {
        $slajder = DB::table('slajder')->get();
        return view('admin.slajder', compact('slajder'));
    }
    public function storeSlajder(Request $request) {
        $validateData = $request->validate([
            'naslov' => 'required|unique:slajder|max:55',
        
        ]);
        $data = array();
        $data['naslov'] = $request->naslov;
        $data['opis'] = $request->opis;
        $image = $request->file('slika');
        if($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/slajder/' ;
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            $data ['slika'] = $image_url;
            $slajd = DB::table('slajder')->insert($data);
            $notification=array(
                'messege'=>'Uspješno ste dodali slajder.',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
        }else {
            $cat = DB::table('slajder')->insert($data);
            $notification=array(
                'messege'=>'Uspješno dodato.',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
        }
    }
    public function deleteSlajder($id) {
        $data = DB::table('slajder')->where('id', $id)->first();
        $image = $data->slika;
        unlink($image);
        $slajder = DB::table('slajder')->where('id', $id)->delete();
        $notification=array(
            'messege'=>'Uspješno ste obrisali Slajder.',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
    public function editSlajder($id) {
        $slajder = DB::table('slajder')->where('id', $id)->first();
        return view('admin.edit_slajder',compact('slajder'));
    }

    public function updateSlajder(Request $request, $id) {
        $old_image = $request->old_image;
        $data = array();
        $data['naslov'] = $request->naslov;
        $data['opis'] = $request->opis;

        $image = $request->file('slika');
        if($image) {
            unlink($old_image);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/slajder/' ;
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            $data ['slika'] = $image_url;
            $brand = DB::table('slajder')->where('id', $id)->update($data);
            $notification=array(
                'messege'=>'Uspješno ste izmjenili Slajder.',
                'alert-type'=>'success'
                 );
               return Redirect()->route('slajder')->with($notification);
        }else {
            $brand = DB::table('slajder')->where('id', $id)->update($data);
            $notification=array(
                'messege'=>'Promjenili ste slajder (bez slike).',
                'alert-type'=>'success'
                 );
               return Redirect()->route('slajder')->with($notification);

        }
    }


}
