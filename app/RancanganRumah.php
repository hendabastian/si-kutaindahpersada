<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RancanganRumah extends Model
{
    public $table = 't_rancangan_rumah';
    use SoftDeletes;
}
