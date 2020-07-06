<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemesananDetail extends Model
{
    public $table = 't_pemesanan_detail';
    use SoftDeletes;
}
