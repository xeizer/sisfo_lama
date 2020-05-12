<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Imports\GuruImport;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importGuru(Request $request)
    {
        //$path=$request->file('file')->getRealPath();
        Excel::import(new ImportGuru, request()->file('file'));
        //dd(session()->get('berhasil').' '.session()->get('kegagalan'));
        Session::flash("flash_notif", [
            "judul" => "Berhasil",
            "type" => "success",
            "pesan" => "Tersimpan ",
            "icon" => "fa-check-circle"
        ]);
        return redirect()->route('guru.index');
    }
    public function guru()
    {
        $data = Guru::with('user')->get();
        return DataTables::of($data)
            ->addColumn('aksi', function () {
                return view('guru.komponen.aksi');
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function index()
    {
        return view('guru.index', [
            'judul' => 'Semua Guru',
            'active' => 'guru',
            'active2' => 'semua_guru',
            'data' => Guru::cursor(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        //
    }
}
