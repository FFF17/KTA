<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
        'nik'  => 1,
        'first_name' => 'Admin',
        'last_name' => 'Admin',
        'tempat_lahir' => 'Admin',
        'tanggal_lahir' => '2001-05-24',
        'jk' => 'A',
        'provinsi' => 'A',
        'kabupaten' => 'A',
        'kecamatan' => 'A',
        'kelurahan' => 'A',
        'alamat' => 'A',
        'status' => 'A',
        'telepon' => '0',
        'telepon' => '0',
        'email' => 'admin@admin.com',
        'foto' => bcrypt('admin.jpg'),
        'password' => bcrypt('adminadmin'),
        'generate_code'=> '12345678'	
	
	]);   

		
 	}


}
