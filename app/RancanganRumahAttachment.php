<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RancanganRumahAttachment extends Model
{
    public $table = 't_rancangan_rumah_attachments';
    use SoftDeletes;
}
