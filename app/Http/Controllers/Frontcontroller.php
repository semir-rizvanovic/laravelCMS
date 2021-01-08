<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Frontcontroller extends Controller
{
    public function storenewsletter(request $request) {
        $validateData = $request->validate([
            'email' => 'required|unique:newsletters|max:55',
        ]);

        $data = array();
        $data['email'] = $request->email;
        DB::table('newsletters')->insert($data);
        $notification=array(
            'messege'=>'Uspješno ste se pretplatili za Newsletter listu.',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
            }
    }
