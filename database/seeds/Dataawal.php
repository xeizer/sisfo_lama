<?php

use App\User;
use Illuminate\Database\Seeder;
use App\Role;

class Dataawal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Membuat ROLE
        $superadmin = Role::create([
            'name' => 'su',
            'display_name' => 'Super Admin'
        ]);
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator'
        ]);
        $kepalasekolah = Role::create([
            'name' => 'kepsek',
            'display_name' => 'Kepala Sekolah'
        ]);
        $guru = Role::create([
            'name' => 'guru',
            'display_name' => 'Guru'
        ]);
        $tu = Role::create([
            'name' => 'tu',
            'display_name' => 'Tata Usaha'
        ]);
        $siswa = Role::create([
            'name' => 'siswa',
            'display_name' => 'Siswa'
        ]);
        $ortu = Role::create([
            'name' => 'ortu',
            'display_name' => 'Orang Tua'
        ]);

        // user super
        $su = User::create([
            'name' => 'Super Admin',
            'username' => 'admingood',
            'password' => bcrypt('rahasia'),
            'email' => ' sudo@smkn7ptk.sch.id'
        ])->attachRole('su');


    }
}
