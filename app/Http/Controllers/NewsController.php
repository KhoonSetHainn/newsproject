<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\News;

class NewsController extends Controller
{
    public function index(){
        $data=News::latest()->paginate(5);
        
        return view('newses.index',[
            'newses'=>$data
        ]);
    }
    public function detail($id){
        $data=News::find($id);

        return view('newses.detail',[
            'news'=>$data
        ]);
    }
    public function add(){
        $data=[
            ["id"=>1,"name"=>"News"],
            ["id"=>2,"name"=>"Tech"],
        ];
         
        return view('newses.add',['categories'=>$data]);
    }
    public function create(){
       
        $validator=validator(request()->all(),[
            'title'=>'required',
            'body'=>'required',
            'category_id'=>'required',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }


        $news=new News;
        $news->title=request()->title;
        $news->body=request()->body;
        $news->category_id=request()->category_id;
        $news->user_id=auth()->user()->id;
        $news->save();

        return redirect('/newses');
    }
    public function delete($id){
        $news=News::find($id);
        if(Gate::allows('news-delete',$news) ){
            $news->delete();
            return redirect('/newses')->with('info','Article Deleted');
        }else {
            return redirect('/newses')->with('error','Unauthorize');
        }
     
       
    }
    public function adminDelete($id){

        $article=News::find($id)->delete();
         return redirect('/admins');
     }
     
    public function __construct()
    {
        $this->middleware('auth')->except(['index','detail']);
    }
   
}