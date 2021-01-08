<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function kategorijeVijesti() {
        $kategorijeVijesti = DB::table('post_category')->get();
        return view('admin.vijesti.kategorije.index', compact('kategorijeVijesti'));
    }
    public function kategorijeVijestiDodaj(Request $request){
        $validateData = $request->validate([
            'category_name_ba' => 'required|max:255',
            'category_name_en' => 'required|max:255',
            ]);


        $data = array(); 
        $data['category_name_ba'] = $request->category_name_ba;
        $data['category_name_en'] = $request->category_name_en;
        DB::table('post_category')->insert($data);
        $notification=array(
            'messege'=>'Uspješno ste dodali kategoriju Vijesti.',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
    public function deleteVijestiKategorija ($id) {
        DB::table('post_category')->where('id', $id)->delete();
        $notification=array(
            'messege'=>'Uspješno ste obrisali kategoriju Vijesti.',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
    public function editVijestiKategorija ($id) {
        $vijesti_category = DB::table('post_category')->where('id', $id)->first();
        return view('admin.vijesti.kategorije.edit',compact('vijesti_category'));

    }
    public function updateVijestiKat(Request $request, $id) {

        $data=array();
        $data['category_name_ba']=$request->category_name_ba;
        $data['category_name_en']=$request->category_name_en;

        $update=DB::table('post_category')->where('id', $id)->update($data);
        if($update) {
        $notification=array(
            'messege'=>'Uspješno ste uredili kategoriju Vijesti.',
            'alert-type'=>'success'
             );
           return Redirect()->route('kategorije.vijesti')->with($notification);
    }else{
        $notification=array(
            'messege'=>'Niste ništa promjenili !',
            'alert-type'=>'error'
             );
           return Redirect()->route('kategorije.vijesti')->with($notification);
        }
    }

    public function create() {
        $vijestiKategorije = DB::table('post_category')->get();
        return view('admin.vijesti.create', compact('vijestiKategorije'));
    }
    public function store(Request $request) {
        $data = array();
        $data['post_title_ba'] = $request->post_title_ba;
        $data['datum'] = $request->datum;
        $data['category_id'] = $request->category_id;
        $data['details_ba'] = $request->details_ba;

        $post_image = $request->file('post_image');
        if ($post_image) {
            $post_image_name = hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
            Image::make($post_image)->save('public/media/news/'.$post_image_name);
            $data['post_image'] = 'public/media/news/'.$post_image_name;

            DB::table('posts')->insert($data);
            $notification=array(
                'messege'=>'Uspješno ste dodali Vijest.',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.news')->with($notification);
    }else {
        $data['post_image'] = '';
        DB::table('posts')->insert($data);
            $notification=array(
                'messege'=>'Uspješno ste dodali Vijest bez slike.',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.news')->with($notification);
        }
    }
    public function index() {
        $post = DB::table('posts')
                        ->join('post_category', 'posts.category_id', 'post_category.id')
                        ->select('posts.*', 'post_category.category_name_ba')
                        ->get();
                        
                        return view('admin.vijesti.index', compact('post'));
                    }

    public function deleteNews($id) {
        $post = DB::table('posts')->where('id', $id)->first();
        $image1 = $post->post_image;
        unlink($image1);

        DB::table('posts')->where('id', $id)->delete();
        $notification=array(
            'messege'=>'Uspješno ste obrisali Vijest.',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        }
    public function editNews($id) {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('admin.vijesti.edit', compact('post'));
    }
    public function updateNews(Request $request, $id) {
        $old_image = $request->old_image;
        $data = array();
        $data['post_title_ba'] = $request->post_title_ba;
        $data['datum'] = $request->datum;
        $data['category_id'] = $request->category_id;
        $data['details_ba'] = $request->details_ba;

        $post_image = $request->file('post_image');
        if ($post_image) {
            unlink($old_image);
            $post_image_name = hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
            Image::make($post_image)->save('public/media/news/'.$post_image_name);
            $data['post_image'] = 'public/media/news/'.$post_image_name;

            DB::table('posts')->where('id', $id)->update($data);
            $notification=array(
                'messege'=>'Uspješno ste uredili Vijest.',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.news')->with($notification);
    }else {
        $data['post_image'] = $old_image;
        DB::table('posts')->where('id', $id)->update($data);
        $notification=array(
                'messege'=>'Uspješno ste uredili Vijest bez nove slike.',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.news')->with($notification);
        }
    }
}  
