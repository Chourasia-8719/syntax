<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\News;
use App\Models\Comment;

use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function index(){
        $news_data = News::all();
        return view('home',compact('news_data'));
    }

    public function view_comments(Request $request,$id){
        return view('comments',['id'=>$id]);
    }
    public function comment_save(Request $request){
        Comment::create([
            'first_name'=>$request['first_name'],
            'last_name'=>$request['last_name'],
            'email'=>$request['email'],
            'comment'=>$request['comment'],
            'news_id'=>$request['news_id'],
        ]);
    }

    public function news_comments($id){
        $data =  News::with('comments')->where(['id'=>$id])->first();
       if(isset($data) && $data !== ''){
        $total =  count($data['comments']);
        return view('detailNews',['data'=>$data,'total'=>$total]);   
       }
    }
}
