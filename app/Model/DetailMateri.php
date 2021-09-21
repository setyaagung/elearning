<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetailMateri extends Model
{
    protected $table = 'detail_materi';
    protected $primaryKey = 'id_detail_materi';
    protected $fillable = ['id_materi', 'judul', 'jenis', 'kelas', 'slug', 'video', 'file', 'zoom', 'deskripsi', 'status'];
}
