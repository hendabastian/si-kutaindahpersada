<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratPerintahKerja extends Model
{
    public $table = 't_surat_perintah_kerja';
    use SoftDeletes;
}
