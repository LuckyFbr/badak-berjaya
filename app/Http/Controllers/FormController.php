<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use App\Models\Kritik;

class FormController extends Controller
{

    public function kritikForm(Request $request){

        $validator = Validator::make($request->all(), [
            'judul'  => 'required',
            'isi_pesan'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = auth()->user();
       
        $kritik = $user->kritik()->create([
            'judul' => $request->judul,
            'isi_pesan' => $request->isi_pesan,
            
        ]);

        
        return response()->json(['message' => 'Kritik created successfully'], 201);
    }

    public function RiwayatKritik(){
        $user = auth()->user();

        $riwayatKritik = $user->kritik()->get();

        return response()->json($riwayatKritik, 201);
    }

    public function PengaduanForm(Request $request){

        $validator = Validator::make($request->all(), [
            'judul'  => 'required',
            'isi_pesan'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = auth()->user();
       
        $pengaduan = $user->pengaduan()->create([
            'judul' => $request->judul,
            'isi_pesan' => $request->isi_pesan,
            
        ]);

        
        return response()->json(['message' => 'Pengaduan created successfully'], 201);
    }

    public function RiwayatPengaduan(){
        $user = auth()->user();

        $riwayatPengaduan = $user->pengaduan()->get();

        return response()->json($riwayatPengaduan, 201);
    }

    public function Survei(Request $request){
        $user = auth()->user();
       
        $pengaduan = $user->survei()->create([
            'pilihan' => $request->pilihan
        ]);
    }
}