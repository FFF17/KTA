<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\provinsi;
use App\Kabupaten;
use App\Kecamatan;
use App\Kelurahan;
use App\User;
use Auth;
use DB;
class UserController extends Controller
{
    
 public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){


    	$prov = Provinsi::where('kode',Auth::user()->provinsi)->first();
        $kab = Kabupaten::where('kode',Auth::user()->kabupaten)->first();
        $kec = Kecamatan::where('kode',Auth::user()->kecamatan)->first();
        $kel = Kelurahan::where('kode',Auth::user()->kelurahan)->first();
        $user = User::all();

      	return view('User/home')->with(['prov' => $prov,'kab' => $kab,'kec' => $kec,'kel' => $kel,'user' => $user]);

    }

		     public function hapus($id){

		    DB::table('users')->where('id',$id)->delete();
		    return redirect('/home');
		}

		public function getMessage($id){
		      $user = DB::table('users')->where('id',$id)->first();
		      $prov = DB::table('provinsis')->where('kode',$user->provinsi)->first();
		      $kab = DB::table('kabupatens')->where('kode',$user->kabupaten)->first();
		      $kec = DB::table('kecamatans')->where('kode',$user->kecamatan)->first();
		      $kel = DB::table('kelurahans')->where('kode',$user->kelurahan)->first();
		    return view('User/show')->with(['user' => $user,'prov' => $prov,'kab' => $kab,'kec' => $kec,'kel' => $kel]);
		    }



		    public function edit($id){

		    $user = DB::table('users')->where('id',$id)->first();
		    $prov = DB::table('provinsis')->where('kode',$user->provinsi)->first();
		    $provinsis = DB::table('provinsis')->pluck("provinsi","kode");
		    dd($user);
		    return view('User/edit')->with(['user' => $user,'provinsis' => $provinsis,'prov' => $prov]);
		 
		}

		  public function getKabupaten($id) 
		{   	

		        $kabupatens = DB::table("kabupatens")->where("provinsi",$id)->pluck("kabupaten","kode");
		        return json_encode($kabupatens);
		}
		public function getKecamatan($id) 
		{		 

				 $kecamatans = DB::table("kecamatans")->where("kabupaten",$id)->pluck("kecamatan","kode");
		        return json_encode($kecamatans);
		}

		    public function getKelurahan($id) 
		{        
		        $kelurahans = DB::table("kelurahans")->where("kecamatan",$id)->pluck("kelurahan","kode");
		        return json_encode($kelurahans);
		}
		}
