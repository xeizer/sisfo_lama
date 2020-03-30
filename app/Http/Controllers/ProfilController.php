<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('profil.index')->with([
            'judul' => 'Profil'
        ]);
    }
    public function update(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
            'username' => 'required|unique:users,username,' . Auth::id(),
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'jkel' => 'required',
            'tlp' => 'numeric',
            'agama' => 'required',
            'alamat' => 'required',
            'ktp' => 'numeric',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'date',
        ]);

        if (Hash::check($req->password, Auth::user()->password)) {
            User::find(Auth::id())->update([
                'name' => $req->name,
                'username' => $req->username,
                'email' => $req->email,
                'jkel' => $req->jkel,
                'tlp' => $req->tlp,
                'agama' => $req->agama,
                'alamat' => $req->alamat,
                'ktp' => $req->ktp,
                'tempat_lahir' => $req->tempat_lahir,
                'tanggal_lahir' => $req->tanggal_lahir,
            ]);
            if ($req->password_baru) {
                User::find(Auth::id())->update([
                    'password' => bcrypt($req->password_baru)
                ]);
            };

            Session::flash("flash_notif", [
                "judul" => "Berhasil",
                "type" => "success",
                "pesan" => "Berhasil Mengubah data ",
                "icon" => "fa-check-circle"
            ]);
            return back();
        } else {

            return back()->withErrors([
                'pesan' => 'Kesalahan Password'
            ]);
        }
    }
    public function setting()
    {
        return view('profil.setting')->with([
            'judul' => "Setting"
        ]);
    }
}
