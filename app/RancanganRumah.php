<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RancanganRumah extends Model
{
    public $table = 't_rancangan_rumah';
    use SoftDeletes;

    public function getAttachments()
    {
        return $this->hasMany(RancanganRumahAttachment::class, 'rancangan_rumah_id', 'id');
    }

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 1:
                return '<span class="label label-warning"><i class="fa fa-spinner fa-spin"></i> Menunggu Approval Konsumen</span>';
                break;
            case 2:
                return '<span class="label label-primary">Telah Diapprove Konsumen</span>';
                break;
            case 0:
                return '<span class="label label-danger">Rancangan ditolak oleh konsumen</span>';;
                break;
        }
    }
}
