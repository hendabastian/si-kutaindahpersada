<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailBrosur extends Model
{
    public $table = 'm_brosur_detail';
    use SoftDeletes;
}
