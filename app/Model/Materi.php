<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';
    protected $primaryKey = 'id_materi';
    protected $fillable = ['id_user', 'id_matkul', 'kategori', 'deskripsi', 'semester', 'status'];

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'id_matkul');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
