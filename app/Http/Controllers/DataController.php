<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use DB;

class DataController extends Controller
{

public function getProvinsi()
    {
        $provinsis = DB::table('provinsis')->pluck("provinsi","kode");
        return view('dropdown',compact('provinsis'));
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
        $kelurahans = DB::table("kelurahans")->where("kecamatan",$id)->pluck("kelurahan","id");
        return json_encode($kelurahans);
}
}