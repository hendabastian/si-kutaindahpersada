<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RABVerifikasi extends Model
{
    public $table = 't_rab_verifikasi';
    use SoftDeletes;
}
