<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class AdminController extends Controller
{
    // Tampilkan daftar dokumen pending
    public function index()
    {
        $documents = Document::where('status', 'pending')->get();
        return view('admin.review.index', compact('documents'));
    }

    // Tampilkan detail dokumen untuk review
    public function show($id)
    {
        $document = Document::findOrFail($id);
        return view('document-admin', compact('document'));
    }

    // Admin menyetujui dokumen
    public function approve($id)
    {
        $document = Document::findOrFail($id);
        $document->status = 'approved';
        $document->save();

        return redirect()->route('admin.review')->with('success', 'Dokumen disetujui.');
    }

    // Admin menolak dokumen
    public function reject($id)
    {
        $document = Document::findOrFail($id);
        $document->status = 'rejected';
        $document->save();

        return redirect()->route('admin.review')->with('error', 'Dokumen ditolak.');
    }

    // Fungsi untuk memeriksa koneksi dan tabel documents di database
    public function checkDocumentsTable()
    {
        try {
            $count = Document::count();
            return response()->json([
                'success' => true,
                'message' => "Tabel 'documents' ditemukan. Jumlah data: $count"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Tabel 'documents' tidak ditemukan atau terjadi error: " . $e->getMessage()
            ]);
        }
    }
}
