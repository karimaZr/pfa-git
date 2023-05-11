<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showuser()
    {  
        
        $user = User::where('role',auth()->user()->role)->find(auth()->user()->id);
        
        
        $element = DB::table('element__modules')
                ->where('user_id', auth()->user()->id)
                ->get();
    return view('backend.layouts.profil', ['user' => $user,'element' =>$element]);

     
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('backend.layouts.app');
    // }
}
