<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;
use App\Console\Requests;

session_start();

class SlideController extends Controller
{
    //
    public function insertFormSlide(){
        return view('admin.insert_slide');
    }
    public function insertSlide(Request $request){
        $image = $request->file('image_slide');
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s");
        $data = array();
        if($image){
            if(!$request->name_slide == "" && !$request->link_slide == ""){
                $get_name_image = $image->getClientOriginalName();
                $new_image = current(explode('.',$get_name_image)).'.'.$image->getClientOriginalExtension(); // getClientOriginalExtension la lay duoi file anh
                $link_anh = 'http://192.168.55.104/example-app/public/upload_image/slide/'.$new_image;
                $image->move('public/upload_image/slide',$new_image);
                $data['image_slide'] = $link_anh;
                $data['name_slide'] = $request->name_slide;
                $data['link_slide'] = $request->link_slide;
                $data['created_at'] = $date;
                $data['updated_at'] = $date;
                $insert_slide = DB::table('slide')->insert($data);
                if($insert_slide){
                    Session::put('message',"Insert slide ".$request->name_slide." success");
                    return Redirect::to('/list-slide');
                }else{
                    Session::put('message',"Insert slide ".$request->name_slide." fail!");
                    return Redirect::to('/list-slide');
                }
            }else{
                return Redirect::to('/insert-slide');
            } 
        }else{
            return Redirect::to('/insert-slide');
        }
        
    }
    public function listSlide(){
        $list_slide = DB::table('slide')->get();
        return view('admin.list_slide')->with('list_slide',$list_slide);
    }
    public function editFormSlide($id_slide){
        $edit_slide_by_id = DB::table('slide')->where('id_slide',$id_slide)->get();
        return view('admin.edit_slide')->with('list_slide',$edit_slide_by_id);
    }
    public function editSlide($id_slide,Request $request){
        $image = $request->file('image_slide');
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s");
        $data = array();
        if($image){
            if(!$request->name_slide == "" && !$request->link_slide == ""){
                $get_name_image = $image->getClientOriginalName();
                $new_image = current(explode('.',$get_name_image)).'.'.$image->getClientOriginalExtension(); // getClientOriginalExtension la lay duoi file anh
                $link_anh = 'http://192.168.55.104/example-app/public/upload_image/slide/'.$new_image;
                $image->move('public/upload_image/slide',$new_image);
                $data['image_slide'] = $link_anh;
                $data['name_slide'] = $request->name_slide;
                $data['link_slide'] = $request->link_slide;
                $data['updated_at'] = $date;
                $update_slide = DB::table('slide')->where('id_slide',$id_slide)->update($data);
                if($update_slide){
                    Session::put('message',"Update slide ".$request->name_slide." success");
                    return Redirect::to('/list-slide');
                }else{
                    Session::put('message',"Update slide ".$request->name_slide." fail!");
                    return Redirect::to('/list-slide');
                }
            }else{
                return Redirect::back();
            } 
        }else{
            return Redirect::back();
        }
    }
    public function deleteSlide($id_slide){
        $delete_slide = DB::table('slide')->where('id_slide',$id_slide)->delete();
        if($delete_slide){
            Session::put('message',"Delete success!");
            return Redirect::to('/list-slide');
        }else{
            Session::put('message',"Delete fail!");
            return Redirect::to('/list-slide');
        }
    }
}
