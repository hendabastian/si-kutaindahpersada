<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemesananAttachment extends Model
{
    public $table = 't_pemesanan_attachment';
    use SoftDeletes;
}
