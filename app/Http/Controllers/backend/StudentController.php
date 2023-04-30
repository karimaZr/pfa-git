<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Allstudent()
    {   $all=DB::table('users')
            ->get();
       
        return view('backend.user.student',compact('all'));
    }

}
