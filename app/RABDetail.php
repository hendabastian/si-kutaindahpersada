<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RABDetail extends Model
{
    public $table = 't_rab_detail';
    use SoftDeletes;
}
