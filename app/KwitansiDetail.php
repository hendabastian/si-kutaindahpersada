<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KwitansiDetail extends Model
{
    public $table = 't_kwitansi_detail';
    use SoftDeletes;
}
