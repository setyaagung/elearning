<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';
    protected $fillable = ['id_detail_materi', 'id_mahasiswa', 'waktu'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}
