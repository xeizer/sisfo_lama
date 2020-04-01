<?php

namespace App\Http\Livewire;

use App\Jurusan;
use Session;
use Livewire\Component;

class LwJurusan extends Component
{
    public $kode = '';
    public $nama_jurusan = '';
    public function render()
    {
        return view('livewire.lw-jurusan', [
            'jurusan' => Jurusan::all(),
        ]);
    }
    public function tambahJurusan()
    {
        Jurusan::create([
            'kode' => $this->kode,
            'nama_jurusan' => $this->nama_jurusan,
        ]);
        $data = [
            "judul" => "Berhasil",
            "type" => "success",
            "pesan" => "Berhasil menyimpan " . $this->nama_jurusan,
            "icon" => "fa-check-circle"
        ];
        $this->emit('postAdded', $data);
        Session::flash("flash_notif", [
            "judul" => "Berhasil",
            "type" => "success",
            "pesan" => "Tersimpan ",
            "icon" => "fa-check-circle"
        ]);
        $this->kode = '';
        $this->nama_jurusan = '';
    }
}
