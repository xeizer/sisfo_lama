<?php

namespace App\Imports;

use App\Guru;
use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportGuru implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

        $hitung = 0;
        $gagal = 0;
        $namagagal = '';

        foreach ($collection as $row) {
            $user = User::create([
                'name' => $row['nama'],
                'username' => $row['username'],
                'email' => $row['email'],
                'password' => $row[''],
                'jkel' => $row[''],
                'tlp' => $row[''],
                'agama' => $row[''],
                'alamat' => $row[''],
                'ktp' => $row[''],
                'no_kk' => $row[''],
                'no_akte' => $row[''],
                'tempat_lahir' => $row[''],
                'tanggal_lahir' => $row[''],
            ]);

            if (isset($row['username'])) {
                //cek dulu apakah ada baris kosong
                if ((!is_null($row['username'])) or ((!is_null($row['nama']))) or (!is_null($row['password']))) {
                    //lengkapi nanti dengan pengecekan tiap not null setiap row
                    //pakai firstOrCreate tapi sementara stick ke klasik if
                    //$user = User::firstOrCreate([]);
                    if (!User::where('username', $row['username'])->first()) {
                        $user = new User();
                        $user->nama = $row['nama'];
                        $user->username = $row['username'];
                        $user->password = bcrypt($row['password']);
                        $user->email = $row['email'];
                        $user->save();

                        $userid = User::where('username', $row['username'])->value('id');

                        $guru = new Guru();
                        $guru->user_id = $userid;
                        $guru->nip = $row['nip'];
                        $guru->nuptk = $row['nuptk'];
                        $guru->jkel = $row['jenis_kelamin'];
                        $guru->agama = $row['agama'];
                        $guru->hp = $row['hp'];
                        $guru->alamat = $row['alamat'];
                        $guru->status = $row['status'];
                        $guru->save();

                        $user->attachRole('guru');
                        $hitung++;
                        session([
                            'berhasil' => 'Import Berhasil = ' . $hitung,
                        ]);
                    } elseif (User::where('username', $row['username'])->first()) {
                        $gagal++;
                        $namagagal = $namagagal . " " . $row['nama'] . ", ";
                        session([
                            'kegagalan' => ' Duplikat = ' . $gagal . '<br /> nama:' . $namagagal,
                        ]);
                    }
                }
            }
        }
    }
}
