<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TanggalPerencanaan extends Model
{
    public $table = 'tanggal_perencanaan';
    use SoftDeletes;
}
