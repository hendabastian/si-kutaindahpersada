<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfoPembangunan extends Model
{
    public $table = 'm_info_pembangunan';
    use SoftDeletes;
}
