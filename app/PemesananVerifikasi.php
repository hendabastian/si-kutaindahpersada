<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemesananVerifikasi extends Model
{
    public $table = 't_pemesanan_verifikasi';
    use SoftDeletes;
}
