<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfoPembangunanDetail extends Model
{
    public $table = 'm_info_pembangunan_detail';
    use SoftDeletes;
}
