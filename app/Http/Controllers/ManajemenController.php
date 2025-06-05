<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;

class ManajemenController extends Controller
{
    public function index(Request $request)
    {
        $documents = Dokumen::query();

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

        return view('manajemen.index', [
            'documents' => $results,
            'page' => $page,
            'totalPages' => ceil($total / $perPage),
        ]);
    }

    public function show($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        return view('manajemen.show', compact('dokumen'));
    }

    public function approve($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        $dokumen->status = 'Disetujui';
        $dokumen->save();

        return back()->with('success', 'Dokumen disetujui.');
    }

    public function reject($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        $dokumen->status = 'Ditolak';
        $dokumen->save();

        return back()->with('success', 'Dokumen ditolak.');
    }

    public function destroy($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        $dokumen->delete();

        return back()->with('success', 'Dokumen dihapus.');
    }

    public function bulkAction(Request $request)
    {
        $ids = $request->input('selected', []);
        $action = $request->input('action');

        if (empty($ids)) {
            return back()->with('error', 'Tidak ada dokumen yang dipilih.');
        }

        if ($action === 'delete') {
            Dokumen::whereIn('id', $ids)->delete();
            return back()->with('success', 'Dokumen terpilih berhasil dihapus.');
        }

        if ($action === 'export') {
            return back()->with('info', 'Fitur ekspor belum diimplementasikan.');
        }

        return back()->with('error', 'Aksi tidak valid.');
    }
}
