<?php

namespace App\Http\Livewire;

use App\Jurusan;
use Session;
use Livewire\Component;

class LwJurusan extends Component
{
    public $kode = '';
    public $nama_jurusan = '';
    public $id_terpilih;
    public $updateMode = false;
    public function render()
    {
        return view('livewire.lw-jurusan', [
            'jurusan' => Jurusan::all(),
        ]);
    }
    public function batal()
    {
        $this->kode = '';
        $this->nama_jurusan = '';
        $this->updateMode = false;
        $this->emit('loadingend');
    }
    public function tambahJurusan()
    {
        $this->validate([
            'kode' => 'required|unique:jurusans',
            'nama_jurusan' => 'required',
        ]);

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

    public function editJurusan($id)
    {
        $data = Jurusan::findOrFail($id);
        $this->id_terpilih = $data->id;
        $this->kode = $data->kode;
        $this->nama_jurusan = $data->nama_jurusan;
        $this->updateMode = true;
        $this->emit('loadingend');
    }
    public function updateJurusan()
    {
        $this->validate([
            'kode' => 'required|unique:jurusans',
            'nama_jurusan' => 'required',
        ]);
        if ($this->id_terpilih) {
            $updatedata = Jurusan::findOrFail($this->id_terpilih)->update([
                'kode' => $this->kode,
                'nama_jurusan' => $this->nama_jurusan,
            ]);
            $data = [
                "judul" => "Berhasil",
                "type" => "success",
                "pesan" => "Berhasil memperbaharui " . $this->nama_jurusan,
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
            $this->updateMode = false;
        }
    }

    public function hapusJurusan($id)
    {

        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        $data = [
            "judul" => "Berhasil",
            "type" => "success",
            "pesan" => "Berhasil menghapus " . $jurusan->nama_jurusan,
            "icon" => "fa-check-circle"
        ];
        $this->emit('postDelete', $data);
        Session::flash("flash_notif", [
            "judul" => "Berhasil",
            "type" => "success",
            "pesan" => "Terhapus ",
            "icon" => "fa-check-circle"
        ]);
        $this->kode = '';
        $this->nama_jurusan = '';
    }
}
