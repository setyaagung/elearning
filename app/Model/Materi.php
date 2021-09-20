<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';
    protected $primaryKey = 'id_materi';
    protected $fillable = [
        'id_user', 'id_matkul', 'kategori', 'deskripsi', 'semester',
        'group_a',
        'group_b',
        'group_c',
        'group_d',
        'group_e',
        'group_f',
        'group_g',
        'group_h',
        'group_umum',
        'status'
    ];

    public function scopeFilter($query, array $filters)
    {
        //$query->when($filters['search'] ?? false, function ($query, $search) {
        //    return $query->where('deskripsi', 'like', '%' . $search . '%');
        //});

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->whereHas('matakuliah', function ($query) use ($search) {
                $query->where('nama_matkul', 'like', '%' . $search . '%');
            });
        });
    }

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'id_matkul');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
