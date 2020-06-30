<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalPembuatanRumahVerifikasi extends Model
{
    public $table = 't_jadwal_pembuatan_rumah_verifikasi';
    use SoftDeletes;
}
