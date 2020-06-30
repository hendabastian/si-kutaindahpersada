<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model untuk (Rencana Anggaran Biaya) "t_rab". 
 */
class RAB extends Model
{
    public $table = 't_rab';
    use SoftDeletes;
}
