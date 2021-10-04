<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetailPerkuliahan extends Model
{
    protected $table = 'detail_perkuliahan';
    protected $primaryKey = 'id_detail_perkuliahan';
    protected $fillable = [
        'id_perkuliahan',
        'tanggal',
        'kompetensi_dasar',
        'sub_kompetensi',
        'file'
    ];
}
