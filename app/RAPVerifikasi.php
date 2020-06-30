<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RAPVerifikasi extends Model
{
    public $table = 't_rap_verifikasi';
    use SoftDeletes;
}
