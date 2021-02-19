<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\provinsi;
use App\Kabupaten;
use App\Kecamatan;
use App\Kelurahan;
use Auth;
use App\User;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $countTotalDay = DB::table('users')->where('created_at','>=', date('Y-m-d'))->count();
      $countTotalMonth = DB::table('users')->whereMonth('created_at','>=',date('m'))->where('email','!=', 'admin@admin.com')->count();
      $countTotal = DB::table('users')->where('email','!=', 'admin@admin.com')->count();      
     
       return view('home')->with(['countTotalDay' => $countTotalDay,'countTotalMonth' => $countTotalMonth,'countTotal' => $countTotal]);
    }

   
}
