<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table ='karyawan';
    protected $fillable =['nip', 'nama_karyawan', 'gaji_karyawan', 'alamat', 'jenis_kelamin', 'departemen_id'];
}
