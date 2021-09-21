<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';
    protected $primaryKey = 'id_tugas';
    protected $fillable = ['id_detail_materi', 'id_mahasiswa', 'file'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}
