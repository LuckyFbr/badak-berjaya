<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_kelamin',
        'pendidikan_terakhir',
        'tempat_lahir',
        'tanggal_lahir',
        'pekerjaan',
        'Alamat',
        'provinsi',
        'Kabupeten',
        'Kecamatan',
        'desa',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}