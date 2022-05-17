<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\News;
use App\Models\User;
use App\Models\Admin;


class AdminController extends Controller
{
    public function index()
    {   
        
        $data1=News::all();
        return view('newses.admindashboard',[
            'articles'=>$data1,
            
            
        ]);
    }
    public function show()
    {
        if(Gate::allows('admin-show')){
            return view('admins.admindashboard');
        }else{
            return back()->with('error','Unauthorize');
        }
    }
    public function __construct(){
        $this->middleware('auth');
    }
}
