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
    
    public function category() {
        $category = Category::all();
        return view('admin.category.category', compact('category'));
    }
    public function storecategory(Request $request) {
        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
        
        ]);
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['description'] = $request->description;
        $image = $request->file('categoryImage');
        if($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/category/' ;
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            $data ['categoryImage'] = $image_url;
            $cat = DB::table('categories')->insert($data);
            $notification=array(
                'messege'=>'Uspješno ste dodali Kategoriju.',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
        }else {
            $cat = DB::table('categories')->insert($data);
            $notification=array(
                'messege'=>'Uspješno dodato.',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
        }

    }
    public function deletecategory($id) {
        $data = DB::table('categories')->where('id', $id)->first();
        $image = $data->categoryImage;
        unlink($image);
        $category = DB::table('categories')->where('id', $id)->delete();
        $notification=array(
            'messege'=>'Uspješno ste obrisali Kategoriju.',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }

    public function editcategory($id) {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit_category',compact('category'));
    }

    public function updatecategory(Request $request, $id) {
        $old_image = $request->old_image;
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['description'] = $request->description;

        $image = $request->file('categoryImage');
        if($image) {
            unlink($old_image);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/category/' ;
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            $data ['categoryImage'] = $image_url;
            $brand = DB::table('categories')->where('id', $id)->update($data);
            $notification=array(
                'messege'=>'Uspješno ste izmjenili Kategoriju.',
                'alert-type'=>'success'
                 );
               return Redirect()->route('categories')->with($notification);
        }else {
            $brand = DB::table('categories')->where('id', $id)->update($data);
            $notification=array(
                'messege'=>'Promjenili ste Kategoriju (bez slike).',
                'alert-type'=>'success'
                 );
               return Redirect()->route('categories')->with($notification);

        }
    }
}
