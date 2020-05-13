<?php

use App\Jurusan;
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
            'color' => 'primary',
            'display_name' => 'Super Admin'
        ]);
        $admin = Role::create([
            'name' => 'admin',
            'color' => 'inverse-primary',
            'display_name' => 'Administrator'
        ]);
        $kepalasekolah = Role::create([
            'name' => 'kepsek',
            'color' => 'success',
            'display_name' => 'Kepala Sekolah'
        ]);
        $guru = Role::create([
            'name' => 'guru',
            'color' => 'inverse-success',
            'display_name' => 'Guru'
        ]);
        $tu = Role::create([
            'name' => 'tu',
            'color' => 'info',
            'display_name' => 'Tata Usaha'
        ]);
        $siswa = Role::create([
            'name' => 'siswa',
            'color' => 'danger',
            'display_name' => 'Siswa'
        ]);
        $ortu = Role::create([
            'name' => 'ortu',
            'color' => 'inverse-danger',
            'display_name' => 'Orang Tua'
        ]);

        // user super
        $su = User::create([
            'name' => 'Super Admin',
            'username' => 'admingood',
            'password' => bcrypt('rahasia'),
            'email' => ' sudo@smkn7ptk.sch.id',
            'tempat_lahir' => 'Pontianak',
            'tanggal_lahir' => '1987/10/28',
            'agama' => 'Islam',
            'jkel' => 'L',
            'tlp' => '0987656787655',
            'alamat' => 'Jl. Apel Gg Langsat no 33'
        ])->attachRole('su')->attachRole('admin')->attachRole('guru');

        $su = User::create([
            'name' => 'Teguh Firmansyah',
            'username' => 'teguh',
            'password' => bcrypt('rahasia'),
            'email' => ' teguh@smkn7ptk.sch.id',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1979/05/15',
            'agama' => 'Islam',
            'jkel' => 'L',
            'tlp' => '08115733755',
            'alamat' => 'Jl. Prt. Bugis Gg. Akasia'
        ])->attachRole('su')->attachRole('admin')->attachRole('guru');

        Jurusan::create([
            'kode' => 'RPL',
            'nama_jurusan' => 'Rekayasa Perangkat Lunak',
        ]);
        Jurusan::create([
            'kode' => 'TKJ',
            'nama_jurusan' => 'Teknik Komputer dan Jaringan',
        ]);
        Jurusan::create([
            'kode' => 'MM',
            'nama_jurusan' => 'Multimedia',
        ]);
        Jurusan::create([
            'kode' => 'AK',
            'nama_jurusan' => 'Akuntansi Keuangan dan Lembaga',
        ]);
        Jurusan::create([
            'kode' => 'TLAS',
            'nama_jurusan' => 'Teknik Pengelasan',
        ]);
        Jurusan::create([
            'kode' => 'TBSM',
            'nama_jurusan' => 'Teknik dan Bisnis Sepeda Motor',
        ]);
    }
}
