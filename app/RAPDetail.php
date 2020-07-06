<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RAPDetail extends Model
{
    public $table = 't_rap_detail';
    use SoftDeletes;
}
