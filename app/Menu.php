<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['nama_menu', 'kode', 'peran', 'link', 'icon', 'urutan', 'enable'];
}
