<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Returbuku;
use App\Models\Setting;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $settings = Setting::first();
        $buku = Buku::query();

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $buku->where('nama_buku', 'like', '%' . $searchTerm . '%');
        }

        $buku = $buku->paginate(10);

        return view('book.index', compact('settings', 'buku'));
    }

    // public function search(Request $request)
    // {
    //     $search = $request->get('search');
    //     $books = Buku::where('nama_buku', 'LIKE', "%{$search}%")
    //         ->orWhere('penulis', 'LIKE', "%{$search}%")
    //         ->get();

    //     return response()->json($books);
    // }

    // user-books
    public function userBooks(Request $request)
    {
        $settings = Setting::first();
        $bukuQuery = Buku::query();
    
        // Filter berdasarkan nama buku jika ada input pencarian
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $bukuQuery->where('nama_buku', 'like', '%' . $searchTerm . '%');
        }
    
        // Filter berdasarkan kategori jika ada pilihan kategori
        if ($request->has('kategori') && !empty($request->kategori)) {
            $kategori = $request->kategori;
            $bukuQuery->where('kategori', $kategori);
        }
    
        // Ambil buku dengan paginasi
        $buku = $bukuQuery->paginate(10);
    
        // Ambil semua kategori buku untuk digunakan di filter dropdown
        $kategoriOptions = Buku::distinct()->pluck('kategori');
    
        return view('book.user-books', compact('settings', 'buku', 'kategoriOptions'));
    }    

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_buku' => 'required|string',
            'nama_buku' => 'required|string',
            'penulis' => 'required|string',
            'kategori' => 'required|string',
            'tahun_rilis' => 'nullable|string',
            'stok' => 'required|integer',
            'ebook' => 'nullable|file|mimes:pdf,epub|max:20480',
            'cover' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle e-book upload
        $ebookPath = null;
        if ($request->hasFile('ebook')) {
            $ebookPath = $request->file('ebook')->store('ebooks', 'public');
        }

        // Handle cover upload
        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        Buku::create([
            'kode_buku' => $validatedData['kode_buku'],
            'nama_buku' => $validatedData['nama_buku'],
            'penulis' => $validatedData['penulis'],
            'kategori' => $validatedData['kategori'],
            'tahun_rilis' => $validatedData['tahun_rilis'],
            'stok' => $validatedData['stok'],
            'ebook_path' => $ebookPath,
            'cover_path' => $coverPath,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $settings = Setting::first();
        $buku = Buku::findOrFail($id);

        return view('book.show', compact('settings', 'buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);

        $buku->peminjaman()->delete();
        // $buku->returbuku()->delete();

        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Data Buku berhasil dihapus.');
    }
}
