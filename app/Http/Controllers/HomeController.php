<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'siswa') {
            return redirect()->route('collaborative.filtering');
        } else {
            $settings = Setting::first();
            
            // Initialize statistics variables
            $jumlahBuku = Buku::count();
            $jumlahDenda = Peminjaman::sum('total_denda');
            $jumlahPeminjam = Peminjaman::distinct('user_id')->count();
            $jumlahPengembalian = Peminjaman::where('status', 'DIKEMBALIKAN')->count();
            
            return view('dashboard', compact('settings', 'jumlahBuku', 'jumlahDenda', 'jumlahPeminjam', 'jumlahPengembalian'));
        }
    }
}
