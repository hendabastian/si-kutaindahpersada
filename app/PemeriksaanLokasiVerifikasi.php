<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemeriksaanLokasiVerifikasi extends Model
{
    public $table = 't_pemeriksaan_lokasi';
    use SoftDeletes;
}
