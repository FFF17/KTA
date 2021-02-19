<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

     public function postRegister(Request $r){
        

        $count = User::where('created_at','>=', date('Y-m-d').' 00:00:00')->count();
        $generate_code = 'U'.date("ymd").($count+1).'00';


    $r->validate([
      'nik' => 'required|min:16|unique:users',
      'email' => 'required|unique:users',
      'provinsi'=> 'required',
      'kabupaten'=> 'required',
      'kecamatan'=> 'required',
      'kelurahan'=> 'required',
      'jk'=> 'required',
      'status'=> 'required',
      'foto'=> 'required',
    ]);
        $user = new User;
        $user->nik = $r->nik;
        $user->first_name = $r->first_name;
        $user->last_name = $r->last_name;
        $user->tempat_lahir = $r->tempat_lahir;
        $user->tanggal_lahir = $r->tanggal_lahir;
        $user->jk = $r->jk;
        $user->provinsi = $r->provinsi;
        $user->kabupaten = $r->kabupaten;
        $user->kecamatan = $r->kecamatan;
        $user->kelurahan = $r->kelurahan;
        $user->alamat = $r->alamat;
        $user->status = $r->status;
        $user->telepon = $r->telepon;
        $user->email = $r->email;
        $user->password = bcrypt($r->password);
        
        $file = $r->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
        $user->foto = $nama_file;
        $user->generate_code = $generate_code;
        $user->save();

        if (Auth::attempt(['nik' => $user->nik, 'password' => $r->password])) {
            if (Auth::viaRemember()) {
              return redirect()->intended('/home');
            }else{
              return redirect(url('/home'));
            }
        }
    }

    public function getProvinsi()
    {
        $provinsis = DB::table('provinsis')->pluck("provinsi","kode");
        return view('auth/register',compact('provinsis'));
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
