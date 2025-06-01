<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query pencarian dan filter
        $query = Document::query();

        if ($request->filled('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        // Sorting
        $sort = $request->sort == 'asc' ? 'asc' : 'desc';
        $query->orderBy('created_at', $sort);

        // Pagination
        $documents = $query->paginate(10);

        return view('manajemen.index', [
            'documents' => $documents,
            'page' => $documents->currentPage(),
            'totalPages' => $documents->lastPage(),
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

        return redirect()->back()->with('success', 'Dokumen berhasil disetujui.');
    }

    public function reject($id)
    {
        $document = Document::findOrFail($id);
        $document->status = 'Ditolak';
        $document->save();

        return redirect()->back()->with('success', 'Dokumen berhasil ditolak.');
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);

        // Jika ada file terkait, hapus file dari storage (opsional)
        // Storage::delete($document->file_path);

        $document->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
    }

    public function bulkAction(Request $request)
    {
        $action = $request->input('action');
        $selectedIds = $request->input('selected', []);

        if (empty($selectedIds)) {
            return redirect()->back()->with('error', 'Tidak ada dokumen yang dipilih.');
        }

        if ($action == 'delete') {
            // Hapus banyak dokumen sekaligus
            Document::whereIn('id', $selectedIds)->delete();

            return redirect()->back()->with('success', 'Dokumen terpilih berhasil dihapus.');
        } elseif ($action == 'export') {
            // Export data dokumen (misal CSV)
            $documents = Document::whereIn('id', $selectedIds)->get();

            $filename = 'dokumen_export_' . now()->format('Ymd_His') . '.csv';

            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=\"$filename\"",
            ];

            $callback = function () use ($documents) {
                $file = fopen('php://output', 'w');
                // Header CSV
                fputcsv($file, ['ID', 'Nama', 'Pengunggah', 'Tanggal', 'Status', 'Jenis', 'Ukuran']);

                foreach ($documents as $doc) {
                    fputcsv($file, [
                        $doc->id,
                        $doc->name,
                        $doc->uploader,
                        $doc->created_at->format('Y-m-d'),
                        $doc->status,
                        $doc->jenis,
                        $doc->size,
                    ]);
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }

        return redirect()->back()->with('error', 'Aksi tidak dikenal.');
    }
}
