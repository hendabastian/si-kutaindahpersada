<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratPerintahKerjaVerifikasi extends Model
{
    public $table = 't_surat_perintah_kerja_verifikasi';
    use SoftDeletes;
}
