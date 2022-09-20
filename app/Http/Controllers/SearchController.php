<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    public function searchForm(Request $request){
        if($request->option_search == 0){
            $search_cate = DB::table('category')->where('name_cate','like','%'.$request->name_search.'%')->get();
            if($search_cate){
                return view('admin.list_cate')->with('list_cate',$search_cate);
            }else{

            }
        }else if($request->option_search == 1){
            $search_type = DB::table('type_of_cate')->join('category','type_of_cate.id_cate','category.id_cate')
            ->where('name_type','like','%'.$request->name_search.'%')
            ->select('type_of_cate.*','category.name_cate')->get();
            $count_type = $search_type->count();
            $count_page = ceil($count_type / 3);
            if($search_type){
                return view('admin.list_type_of_cate')->with('list_type',$search_type)->with('count_pages',$count_page);
            }else{

            }
        }else if($request->option_search == 2){
            $search_news = DB::table('news')->join('type_of_cate','news.id_type','=','type_of_cate.id_type')
            ->where('name_news','like','%'.$request->name_search.'%')->orWhere('type_of_cate.name_type','like','%'.$request->name_search.'%')->get();
            if($search_news){
                // print_r($search_news);
                return view('admin.list_news')->with('list_news',$search_news);
            }else{

            }
        }else if($request->option_search == 3){
            $search_slide = DB::table('slide')->where('name_slide','like','%'.$request->name_search.'%')->get();
            if($search_slide){
                return view('admin.list_slide')->with('list_slide',$search_slide);
            }else{

            }
        }
    }
}
