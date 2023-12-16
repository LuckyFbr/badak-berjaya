<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skck extends Model
{
    use HasFactory;

    protected $fillable = [
            'tgl_datang',
            'foto_skck_lama',
            'keperluan',
            'rumus_sdk_jari_kanan',
            'rumus_sdk_jari_kiri',
            'pas_foto',
            'cara_bayar',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAttribute($key, $value)
    {
        if (empty($value)) {
            $value = null;
        }

        return parent::setAttribute($key, $value);
    }
}