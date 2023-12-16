<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survei extends Model
{
    use HasFactory;

    protected $fillable = [
        'pilihan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}