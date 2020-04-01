<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Menu::create([
            'nama_menu' => 'Sekolah',
            'kode' => 'sekolah',
            'parent' => '0',
            'peran' => 'su|admin',
            'link' => 'home',
            'icon' => 'ti-home',
            'enable' => true,
            'urutan' => 1,
        ]);
        Menu::create([
            'nama_menu' => 'Kesiswaan',
            'kode' => 'kesiswaan',
            'parent' => Menu::where('kode', 'sekolah')->first()->id,
            'peran' => 'su|admin',
            'link' => "home",
            'icon' => 'ti-user',
            'enable' => true,
            'urutan' => 11,
        ]);
        Menu::create([
            'nama_menu' => 'Semua Siswa',
            'kode' => 'semua_siswa',
            'parent' => Menu::where('kode', 'kesiswaan')->first()->id,
            'peran' => 'su|admin',
            'link' => "home",
            'icon' => 'ti-home',
            'enable' => true,
            'urutan' => 111,
        ]);
        Menu::create([
            'nama_menu' => 'Guru',
            'kode' => 'guru',
            'parent' => Menu::where('kode', 'sekolah')->first()->id,
            'peran' => 'su|admin',
            'link' => "home",
            'icon' => 'fas fa-chalkboard-teacher',
            'enable' => true,
            'urutan' => 12,
        ]);
        ///////////////////////////////////////////////
        Menu::create([
            'nama_menu' => 'Setup Sekolah',
            'kode' => 'setup_sekolah',
            'parent' => '0',
            'peran' => 'su|admin',
            'link' => 'home',
            'icon' => 'ti-home',
            'urutan' => 2,
            'enable' => true
        ]);
    }
}
