<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemesananDiskusi extends Model
{
    public $table = 't_pemesanan_diskusi';
    use SoftDeletes;

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
