<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemeriksaanLokasiAttachment extends Model
{
    public $table = 't_pemeriksaan_lokasi_attachment';
    use SoftDeletes;
}
