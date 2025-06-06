<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class ManajemenController extends Controller
{
    public function index(Request $request)
    {
        $documents = Document::query();

        if ($request->filled('q')) {
            $documents->where('name', 'like', '%' . $request->q . '%');
        }

        if ($request->filled('status')) {
            $documents->where('status', $request->status);
        }

        $perPage = 10;
        $page = $request->get('page', 1);
        $total = $documents->count();
        $results = $documents->latest()->skip(($page - 1) * $perPage)->take($perPage)->get();

        return view('manajemen', [
            'documents' => $results,
            'page' => $page,
            'totalPages' => ceil($total / $perPage),
        ]);
    }

    public function show($id)
    {
        $document = Document::findOrFail($id);
        return view('manajemen.show', compact('document'));
    }

    public function approve($id)
    {
        $document = Document::findOrFail($id);
        $document->status = 'Disetujui';
        $document->save();

        return back()->with('success', 'Dokumen disetujui.');
    }

    public function reject($id)
    {
        $document = Document::findOrFail($id);
        $document->status = 'Ditolak';
        $document->save();

        return back()->with('success', 'Dokumen ditolak.');
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();

        return redirect()->route('manajemen')->with('success', 'Dokumen dihapus.');
    }

    public function bulkAction(Request $request)
    {
        $ids = $request->input('selected', []);
        $action = $request->input('action');

        if (empty($ids)) {
            return back()->with('error', 'Tidak ada dokumen yang dipilih.');
        }

        if ($action === 'delete') {
            Document::whereIn('id', $ids)->delete();
            return redirect()->route('manajemen')->with('success', 'Dokumen berhasil dihapus.');
        }

        if ($action === 'export') {
            return back()->with('info', 'Fitur ekspor belum diimplementasikan.');
        }

        return redirect()->back()->with('error', 'Gagal menghapus dokumen.');
    }
}
