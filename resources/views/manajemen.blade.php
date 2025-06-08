<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Manajemen Dokumen - EconoDocs</title>
  <link rel="stylesheet" href="css/app.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
  <style>
    .font-econodocs {
      font-family: 'Pacifico', cursive;
    }
  </style>
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Header & Navigation -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow-sm z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <a href="#" class="text-3xl font-['Pacifico'] text-primary">EconoDocs</a>
            </div>
            
            <div class="relative mx-4 flex-grow max-w-3xl">
                <div class="relative w-full">
                    <input type="text" placeholder="Cari dokumen ekonomi..." class="w-full pl-10 pr-10 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center text-gray-400">
                        <i class="ri-search-line"></i>
                    </div>
                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center text-gray-400 cursor-pointer">
                        <i class="ri-filter-3-line"></i>
                    </div>
                </div>
            </div>
            
            <nav class="hidden md:flex items-center space-x-6">
                <a href="{{ route('admin.dashboard') }}" class="text-gray-900 hover:text-primary font-medium text-sm">Beranda</a>
                <a href="{{ route('admin.dokumen.show', ['id' => 1]) }}" class="text-gray-600 hover:text-primary font-medium text-sm">Dokumen</a>
                <a href="{{ route('manajemen') }}" class="text-gray-600 hover:text-primary font-medium text-sm">Manajemen</a>
                
                <div class="relative">
                    <button id="popupBtn" class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                        <i class="ri-user-line text-xl text-gray-600"></i>
                    </button>
                </div>
            </nav>
        </div>
    </header>
    <div id="popupProfil" class="bg-white p-4 rounded-lg shadow-md hidden fixed top-[72px] right-16 z-50 w-xl content-start">Add commentMore actions
        <div id="logout" class="mt-4">
            <i class="ri-logout-box-r-line text-lg text-gray-600 hover:text-primary"></i>
            <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf
        <button type="submit" class="text-sm text-gray-600 hover:text-primary px-4 bg-transparent border-none cursor-pointer">Logout</button>
    </form>
        </div>
    </div>
  <!-- Summary Cards -->
  <section class="flex justify-between px-8 mt-6 mb-2 space-x-4">
    <div class="bg-white rounded-xl shadow p-4 w-1/5 flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Total Dokumen</p>
        <p class="text-2xl font-bold">{{ $documents->count() }}</p>
      </div>
      <div class="bg-blue-100 w-12 h-12 rounded-full flex items-center justify-center">
        <i class="fas fa-file-alt text-blue-600 text-xl"></i>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow p-4 w-1/5 flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Menunggu</p>
        <p class="text-2xl font-bold text-yellow-500">
          {{ $documents->where('status', 'Menunggu')->count() }}
        </p>
      </div>
      <div class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center">
        <i class="fas fa-clock text-yellow-500 text-xl"></i>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow p-4 w-1/5 flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Disetujui</p>
        <p class="text-2xl font-bold text-green-500">
          {{ $documents->where('status', 'Disetujui')->count() }}
        </p>
      </div>
      <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center">
        <i class="fas fa-check text-green-500 text-xl"></i>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow p-4 w-1/5 flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Ditolak</p>
        <p class="text-2xl font-bold text-red-500">
          {{ $documents->where('status', 'Ditolak')->count() }}
        </p>
      </div>
      <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center">
        <i class="fas fa-times text-red-500 text-xl"></i>
      </div>
    </div>
  </section>

  <!-- Filter + Table -->
  <main class="px-8 py-2">
    <form method="GET" action="{{ url('/manajemen') }}"
      class="bg-white border border-gray-300 rounded-lg p-4 mb-4 flex justify-between items-center">
      <div class="flex gap-4">
        <select class="w-30" name="status" class="border border-gray-300 rounded-md px-4 py-2 text-sm bg-white">
          <option value="">Semua Status</option>
          <option value="Menunggu" {{ request('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
          <option value="Disetujui" {{ request('status') == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
          <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>
        <select class="w-30" name="jenis" class="border border-gray-300 rounded-md px-4 py-2 text-sm bg-white">
          <option value="">Semua Jenis</option>
        </select>
        <select class="w-30" name="sort" class="border border-gray-300 rounded-md px-4 py-2 text-sm bg-white">
          <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Terbaru</option>
          <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Terlama</option>
        </select>
      </div>
      <div class="relative">
        <input type="text" name="q" value="{{ request('q') }}"
          class="border border-gray-300 rounded-md px-10 py-2 text-sm bg-white" placeholder="Cari dokumen..." />
        <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
      </div>
    </form>

    <!-- Flash Message -->
    @if (session('success'))
      <div class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 border border-green-200">
        {{ session('success') }}
      </div>
    @endif
    @if (session('error'))
      <div class="mb-4 px-4 py-3 rounded bg-red-100 text-red-800 border border-red-200">
        {{ session('error') }}
      </div>
    @endif
    <!-- End Flash Message -->
    
    <div class="bg-white rounded-xl shadow overflow-x-auto">
      <table class="min-w-full text-sm">
        <thead class="bg-blue-600 text-white">
          <tr>
            <th class="p-3 text-left">
              <input type="checkbox" id="select-all" />
            </th>
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
                <input type="checkbox" name="selected[]" value="{{ $doc->id }}" form="bulk-action-form" />
              </td>
              <td class="p-3 text-blue-600 font-medium">
                {{ $doc->title }}
                <span class="text-gray-400 block text-xs">-</span>
              </td>
              <td class="p-3">{{ $doc->user->username ?? '-' }}</td>
              <td class="p-3">{{ $doc->created_at->format('d-m-Y') }}</td>
              <td class="p-3">
                @php
                  $statusColors = [
                    'Menunggu' => 'bg-yellow-100 text-yellow-600',
                    'Disetujui' => 'bg-green-100 text-green-600',
                    'Ditolak' => 'bg-red-100 text-red-600',
                  ];
                  $colorClass = $statusColors[$doc->status ?? ''] ?? 'bg-gray-100 text-gray-600';
                @endphp
                <span class="{{ $colorClass }} px-2 py-1 rounded-full text-xs">{{ $doc->status ?? '-' }}</span>
              </td>
              <td class="p-3 flex gap-2">
                @if ($doc->status == 'Menunggu')
                  <form action="{{ url('/manajemen/' . $doc->id . '/approve') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" title="Setujui"
                      class="text-green-600 hover:text-green-800 focus:outline-none">
                      <i class="fas fa-check"></i>
                    </button>
                  </form>
                  <form action="{{ url('/manajemen/' . $doc->id . '/reject') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" title="Tolak"
                      class="text-red-600 hover:text-red-800 focus:outline-none">
                      <i class="fas fa-times"></i>
                    </button>
                  </form>
                @endif

                <form action="{{ route('manajemen.destroy', $doc->id) }}" method="POST" class="inline"
                  onsubmit="return confirm('Yakin ingin hapus dokumen ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" title="Hapus"
                    class="text-gray-600 hover:text-gray-800 focus:outline-none">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
          @if ($documents->isEmpty())
            <tr>
              <td colspan="6" class="text-center p-4 text-gray-500">Tidak ada data dokumen.</td>
            </tr>
          @endif
        </tbody>
      </table>
      <!-- Pagination & Actions -->
      <div class="px-4 py-2 border-t border-gray-200 flex justify-between items-center text-sm">
        <form id="bulk-action-form" method="POST" action="{{ url('/manajemen/bulk-action') }}" class="flex gap-2">
          @csrf
          <button type="submit" name="action" value="delete" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded flex items-center gap-2 hover:bg-gray-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0H7m3-3h4a1 1 0 011 1v1H8V5a1 1 0 011-1z" />
            </svg>
            Hapus Terpilih
          </button>
          <button type="submit" name="action" value="export" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded flex items-center gap-2 hover:bg-gray-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
            </svg>
            Ekspor Data
          </button>
        </form>

        <div class="flex justify-end items-center gap-2 p-4">
          <a href="{{ $page > 1 ? url('/manajemen?page=' . ($page - 1)) : '#' }}"
             class="px-3 py-1 border rounded {{ $page <= 1 ? 'text-gray-400 cursor-not-allowed' : 'hover:bg-gray-200' }}">
              &laquo;
          </a>
          @for ($i = 1; $i <= $totalPages; $i++)
              <a href="{{ url('/manajemen?page=' . $i) }}"
                 class="px-3 py-1 border rounded {{ $page == $i ? 'bg-blue-600 text-white' : 'hover:bg-gray-200' }}">
                  {{ $i }}
              </a>
          @endfor
          <a href="{{ $page < $totalPages ? url('/manajemen?page=' . ($page + 1)) : '#' }}"
             class="px-3 py-1 border rounded {{ $page >= $totalPages ? 'text-gray-400 cursor-not-allowed' : 'hover:bg-gray-200' }}">
              &raquo;
          </a>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
    <footer class="relative bg-white pt-16 pb-6 text-gray-700">
    <div class="container mx-auto px-4 relative z-10 w-full">
        <div class="flex flex-wrap flex-col text-center pb-4 lg:text-center w-1/2 items-center mx-auto">
            <div class="w-full px-4">
                <h4 class="text-3xl mb-2 font-['Pacifico'] text-primary text-center">EconoDocs</h4>
                <h5 class="text-lg mt-0 mb-2 text-gray-600">
                    Platform repository dokumen ekonomi terlengkap di Indonesia. Akses ribuan dokumen untuk kebutuhan akademis dan profesional.
                </h5>
                <div class="mt-6 mb-6 flex justify-center space-x-3">
                    <a href="#" target="_blank" class="text-blue-600 hover:text-blue-800 transition-colors duration-300 transform hover:scale-110 p-2 rounded-full hover:bg-blue-100">
                        <i class="ri-facebook-circle-fill text-3xl"></i>                    
                    </a>
                    <a href="#" target="_blank" class="text-blue-600 hover:text-blue-800 transition-colors duration-300 transform hover:scale-110 p-2 rounded-full hover:bg-blue-100">
                        <i class="ri-twitter-fill text-3xl"></i>
                    </a>
                    <a href="#" target="_blank" class="text-blue-600 hover:text-blue-800 transition-colors duration-300 transform hover:scale-110 p-2 rounded-full hover:bg-blue-100">
                        <i class="ri-instagram-line text-3xl"></i>            
                    </a>        
                    <a href="#" target="_blank" class="text-blue-600 hover:text-blue-800 transition-colors duration-300 transform hover:scale-110 p-2 rounded-full hover:bg-blue-100">
                        <i class="ri-linkedin-box-fill text-3xl"></i>
                    </a>
                    <a href="#" target="_blank" class="text-blue-600 hover:text-blue-800 transition-colors duration-300 transform hover:scale-110 p-2 rounded-full hover:bg-blue-100">
                        <i class="ri-github-fill text-3xl"></i>
                    </a>
                </div>
            </div>
            
        </div>
        <div class="flex flex-wrap items-center md:justify-between justify-center mt-4">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-white font-semibold py-1">
                    © <span id="get-current-year">2025</span> All Rights Reserved.
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-20 md:h-32 lg:h-40 overflow-hidden z-0">
        <svg class="waves-svg absolute bottom-0 left-0 w-[200%] h-16 md:h-24 text-blue-500 opacity-80"
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="24 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="wave-animation-1">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="currentColor"/>
            </g>
        </svg>

        <svg class="waves-svg absolute bottom-0 left-0 w-[200%] h-20 md:h-28 text-blue-600 opacity-60"
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="24 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave-2" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="wave-animation-2">
                <use xlink:href="#gentle-wave-2" x="48" y="3" fill="currentColor"/>
            </g>
        </svg>

        <svg class="waves-svg absolute bottom-0 left-0 w-[200%] h-24 md:h-32 text-primary opacity-40"
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="24 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave-3" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="wave-animation-3">
                <use xlink:href="#gentle-wave-3" x="48" y="5" fill="currentColor"/>
            </g>
        </svg>

         <svg class="waves-svg absolute bottom-0 left-0 w-[200%] h-28 md:h-40 text-blue-800 opacity-90"
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="24 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave-4" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="wave-animation-4">
                <use xlink:href="#gentle-wave-4" x="48" y="7" fill="currentColor"/>
            </g>
        </svg>
    </div>
</footer>

  <script>
    document.getElementById('select-all').addEventListener('change', function (e) {
      let checked = e.target.checked;
      document.querySelectorAll('input[name="selected[]"]').forEach(cb => cb.checked = checked);
    });
  </script>
  <script id="profil">Add commentMore actions
        const popupBtn = document.getElementById('popupBtn');
        const popupProfil = document.getElementById('popupProfil');

        popupBtn.addEventListener('click', function(e) {
            popupProfil.classList.toggle('hidden');
        });

        document.addEventListener('click', function (e) {
            if (!popupProfil.contains(e.target) && !popupBtn.contains(e.target)) {
                popupProfil.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
