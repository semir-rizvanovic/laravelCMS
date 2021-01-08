<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class IkoniceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function ikonice() {
        $ikonice = DB::table('ikonice')->get();
        return view('admin.ikonice', compact('ikonice'));
    }
    public function storeIkonice(Request $request) {
        $validateData = $request->validate([
            'opis' => 'required|unique:ikonice|max:150',
        
        ]);
        $data = array();
        $data['opis'] = $request->opis;
        $image = $request->file('slika');
        if($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/ikonice/' ;
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            $data ['slika'] = $image_url;
            $slajd = DB::table('ikonice')->insert($data);
            $notification=array(
                'messege'=>'Uspješno ste dodali Ikonicu.',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
        }else {
            $cat = DB::table('ikonice')->insert($data);
            $notification=array(
                'messege'=>'Uspješno dodato.',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
        }
    }
    public function deleteIkonice($id) {
        $data = DB::table('ikonice')->where('id', $id)->first();
        $image = $data->slika;
        unlink($image);
        $ikonice = DB::table('ikonice')->where('id', $id)->delete();
        $notification=array(
            'messege'=>'Uspješno ste obrisali Ikonicu.',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
    public function editIkonice($id) {
        $ikonice = DB::table('ikonice')->where('id', $id)->first();
        return view('admin.edit_ikonice',compact('ikonice'));
    }

    public function updateIkonice(Request $request, $id) {
        $old_image = $request->old_image;
        $data = array();
        $data['opis'] = $request->opis;

        $image = $request->file('slika');
        if($image) {
            unlink($old_image);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/ikonice/' ;
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            $data ['slika'] = $image_url;
            $brand = DB::table('ikonice')->where('id', $id)->update($data);
            $notification=array(
                'messege'=>'Uspješno ste izmjenili Ikonicu.',
                'alert-type'=>'success'
                 );
               return Redirect()->route('ikonice')->with($notification);
        }else {
            $brand = DB::table('ikonice')->where('id', $id)->update($data);
            $notification=array(
                'messege'=>'Promjenili ste Ikonicu (bez slike).',
                'alert-type'=>'success'
                 );
               return Redirect()->route('ikonice')->with($notification);

        }
    }


}
