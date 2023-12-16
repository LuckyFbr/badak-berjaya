<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sim extends Model
{
    use HasFactory;

    protected $fillable = [
            'jenis_permohonan',
            'tgl_datang',
            'gol_sim',
            'tinggi',
            'berkacamata',
            'cacat_fisik',
            'sim',
            'jenis_sim',
            'foto_sim_lama',
            'masa_berlaku_sim',
            'surat_sehat',
            'surat_psikologi',
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