<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $fillable = [
        'kode_buku',
        'nama_buku',
        'penulis',
        'kategori',
        'tahun_rilis',
        'stok',
        'ebook_path',
        'cover_path',
    ];
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
    public function returbuku()
    {
        return $this->hasMany(Returbuku::class);
    }
}
