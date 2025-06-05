<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document; // Pastikan model Document sudah dibuat

class UploadController extends Controller
{
    public function upload() //Menampilkan halaman upload
    {
        return view('upload');
    }

    public function store(Request $request) //Menyimpan data upload
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'instansi' => 'nullable|string',
            'document' => 'required|file|mimes:pdf,docx,xlsx,csv,zip|max:10240', // 10MB
        ]);

        // Simpan file ke storage/app/public/documents
        $path = $request->file('document')->store('documents', 'public');

        // Simpan data ke database
        Document::create([
            'user_id' => auth()->id(), // Ambil ID user yang sedang login
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'instansi' => $validated['instansi'],
            'file_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Dokumen berhasil diunggah!');
    }
}
