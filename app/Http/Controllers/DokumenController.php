<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DokumenController extends Controller
{
    public function index(Request $request)
    {
        $query = Document::query();

        // Pencarian berdasarkan judul atau deskripsi (kata kunci)
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function($sub) use ($q) {
                $sub->where('title', 'like', "%$q%")
                    ->orWhere('description', 'like', "%$q%");
            });
        }

        // Filter kategori jika ada
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $documents = $query->latest()->paginate(10);
        // Tampilkan halaman daftar dokumen
        return view('dokumen.index');
    }
    public function upload()
    {
        // Tampilkan halaman upload dokumen
        return view('dokumen.upload');
    }
}
