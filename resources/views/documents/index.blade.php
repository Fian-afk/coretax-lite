<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Dokumen - EconoDocs</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
  <style>
    .font-econodocs {
      font-family: 'Pacifico', cursive;
    }
  </style>
</head>

<body class="bg-gray-100 text-gray-800">
  <!-- Header -->
  <header class="bg-white shadow p-4 flex items-center justify-between">
    <div class="flex items-center gap-6 flex-grow">
      <h1 class="text-2xl font-bold text-blue-600 ml-6 mr-6 font-econodocs">EconoDocs</h1>
      <div class="relative flex-grow max-w-4xl">
        <form method="GET" action="{{ url('/manajemen') }}">
          <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari Dokumen Ekonomi..."
            class="w-full pl-10 pr-10 py-2 rounded-md bg-white border border-gray-300" />
          <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
          <i class="fas fa-sliders-h absolute right-3 top-2.5 text-gray-400"></i>
        </form>
      </div>
    </div>
    <nav class="flex items-center gap-12 ml-20">
      <a href="#" class="text-sm font-semibold text-gray-700">Beranda</a>
      <a href="#" class="text-sm font-semibold text-gray-700">Dokumen</a>
      <a href="#" class="text-sm font-semibold text-gray-700">Manajemen</a>
      <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center font-bold">AD</div>
    </nav>
  </header>

  <!-- Summary Cards -->
  <section class="flex justify-between px-8 mt-6 mb-2 space-x-4">
    <div class="bg-white rounded-xl shadow p-4 w-1/5 flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Total Dokumen</p>
        <p class="text-2xl font-bold">32</p>
      </div>
      <div class="bg-blue-100 w-12 h-12 rounded-full flex items-center justify-center">
        <i class="fas fa-file-alt text-blue-600 text-xl"></i>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow p-4 w-1/5 flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Menunggu</p>
        <p class="text-2xl font-bold text-yellow-500">10</p>
      </div>
      <div class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center">
        <i class="fas fa-clock text-yellow-500 text-xl"></i>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow p-4 w-1/5 flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Disetujui</p>
        <p class="text-2xl font-bold text-green-500">12</p>
      </div>
      <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center">
        <i class="fas fa-check text-green-500 text-xl"></i>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow p-4 w-1/5 flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Ditolak</p>
        <p class="text-2xl font-bold text-red-500">10</p>
      </div>
      <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center">
        <i class="fas fa-times text-red-500 text-xl"></i>
      </div>
    </div>
  </section>

  <!-- Filter + Table -->
  <main class="px-8 py-2">
    <form method="GET" action="{{ url('/manajemen') }}" class="bg-white border border-gray-300 rounded-lg p-4 mb-4 flex justify-between items-center">
      <div class="flex gap-4">
        <select name="status" class="border border-gray-300 rounded-md px-4 py-2 text-sm bg-white">
          <option value="">Semua Status</option>
          <option value="Menunggu" {{ request('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
          <option value="Disetujui" {{ request('status') == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
          <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>
        <select name="jenis" class="border border-gray-300 rounded-md px-4 py-2 text-sm bg-white">
          <option value="">Semua Jenis</option>
          <!-- Tambahkan opsi jenis jika ada -->
        </select>
        <select name="sort" class="border border-gray-300 rounded-md px-4 py-2 text-sm bg-white">
          <option value="desc">Terbaru</option>
          <option value="asc">Terlama</option>
        </select>
      </div>
      <div class="relative">
        <input type="text" name="q" value="{{ request('q') }}" class="border border-gray-300 rounded-md px-10 py-2 text-sm bg-white" placeholder="Cari dokumen..." />
        <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
      </div>
    </form>

    <form method="POST" action="{{ url('/manajemen/bulk-action') }}">
      @csrf
      <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full text-sm">
          <thead class="bg-blue-600 text-white">
            <tr>
              <th class="p-3 text-left"><input type="checkbox" /></th>
              <th class="p-3 text-left">Nama Dokumen</th>
              <th class="p-3 text-left">Pengunggah</th>
              <th class="p-3 text-left">Tanggal</th>
              <th class="p-3 text-left">Status</th>
              <th class="p-3 text-left">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($documents as $doc)
              <tr class="border-t">
                <td class="p-3">
                  <input type="checkbox" name="selected[]" value="{{ $doc['id'] ?? '' }}" />
                </td>
                <td class="p-3 text-blue-600 font-medium">
                  {{ $doc['name'] }}
                  <span class="text-gray-400 block text-xs">{{ $doc['size'] }}</span>
                </td>
                <td class="p-3">{{ $doc['uploader'] }}</td>
                <td class="p-3">{{ $doc['date'] }}</td>
                <td class="p-3">
                  @php
                    $statusColors = [
                      'Menunggu' => 'bg-yellow-100 text-yellow-600',
                      'Disetujui' => 'bg-green-100 text-green-600',
                      'Ditolak' => 'bg-red-100 text-red-600',
                    ];
                    $colorClass = $statusColors[$doc['status']] ?? 'bg-gray-100 text-gray-600';
                  @endphp
                  <span class="{{ $colorClass }} px-2 py-1 rounded-full text-xs">{{ $doc['status'] }}</span>
                </td>
                <td class="p-3 flex gap-2">
                  <!-- Lihat dokumen (GET) -->
                  <a href="{{ url('/manajemen/' . ($doc['id'] ?? 0)) }}" title="Lihat">
                    <i class="fas fa-eye text-blue-600 cursor-pointer"></i>
                  </a>

                  <!-- Setujui dokumen (POST) -->
                  <form method="POST" action="{{ url('/manajemen/' . ($doc['id'] ?? 0) . '/approve') }}">
                    @csrf
                    <button type="submit" title="Setujui" class="focus:outline-none">
                      <i class="fas fa-check text-green-500 cursor-pointer"></i>
                    </button>
                  </form>

                  <!-- Tolak dokumen (POST) -->
                  <form method="POST" action="{{ url('/manajemen/' . ($doc['id'] ?? 0) . '/reject') }}">
                    @csrf
                    <button type="submit" title="Tolak" class="focus:outline-none">
                      <i class="fas fa-times text-red-500 cursor-pointer"></i>
                    </button>
                  </form>

                  <!-- Hapus dokumen (DELETE) -->
                  <form method="POST" action="{{ url('/manajemen/' . ($doc['id'] ?? 0)) }}" onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" title="Hapus" class="focus:outline-none">
                      <i class="fas fa-trash text-gray-500 cursor-pointer"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <!-- Pagination & Actions -->
        <div class="px-4 py-2 border-t border-gray-200 flex justify-between items-center text-sm">
          <div class="flex gap-2">
            <button type="submit" name="action" value="delete"
              class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded flex items-center gap-2 hover:bg-gray-50">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0H7m3-3h4a1 1 0 011 1v1H8V5a1 1 0 011-1z" />
              </svg>
              Hapus Terpilih
            </button>
            <button type="submit" name="action" value="export"
              class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded flex items-center gap-2 hover:bg-gray-50">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
              </svg>
              Ekspor Data
            </button>
          </div>

          <div class="flex justify-end items-center gap-2 p-4">
            <a href="{{ $page > 1 ? url('/manajemen?page=' . ($page - 1)) : '#' }}"
              class="px-3 py-1 border rounded {{ $page <= 
