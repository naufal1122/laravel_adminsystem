<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    protected $table = 'warga';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'alamat',
        'status',
        'pekerjaan',
        'kewarganegaraan',
        'tempat_lahir',
        'tanggal_lahir',
        'golongan_darah',
    ];
}
