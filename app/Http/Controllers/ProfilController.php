<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function update(Request $request)
        {
    $user = auth()->user();
    $profile = $user->profile;
    $profile->update($request->only([
        'jenis_kelamin',
        'agama',
        'pendidikan_terakhir',
        'tempat_lahir',
        'tanggal_lahir',
        'pekerjaan',
        'Alamat',
        'provinsi',
        'Kabupaten',
        'Kecamatan',
        'desa'
    ]));
    
    return response()->json(['message' => 'Profile updated successfully']);
}
}