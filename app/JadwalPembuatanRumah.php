<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalPembuatanRumah extends Model
{
    public $table = 't_jadwal_pembuatan_rumah';
    use SoftDeletes;
}
