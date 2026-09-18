<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'cutis';

    protected $fillable = [
        'nip',
        'nama_karyawan',
        'jabatan',
        'unit_kerja',
        'kategori_cuti',
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan',
        'alamat',
        'nomor_telepon',
        'lampiran',
        'status',
    ];
}
