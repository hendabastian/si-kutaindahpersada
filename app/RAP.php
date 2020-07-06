<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model untuk (Rencana Anggaran Pembelian) "t_rap". 
 */
class RAP extends Model
{
    public $table = 't_rap';
    use SoftDeletes;
}
