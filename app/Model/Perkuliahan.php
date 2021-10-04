<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Perkuliahan extends Model
{
    protected $table = 'perkuliahan';
    protected $primaryKey  = 'id_perkuliahan';
    protected $fillable = [
        'id_user',
        'id_matkul',
        'program_studi',
        'kelas',
        'semester'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'id_matkul');
    }
}
