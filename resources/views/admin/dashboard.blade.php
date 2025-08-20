@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

        <!-- Stats Cards -->
         <div class="mb-3">
            <form method="GET" action="{{ route('admin.dashboard') }}">
                <label for="tahun">Pilih Tahun:</label>
                <select name="tahun" id="tahun" onchange="this.form.submit()" class="form-select w-auto d-inline-block">
                    @foreach($tahunList as $tahun)
                        <option value="{{ $tahun }}" {{ $tahun == $tahunDipilih ? 'selected' : '' }}>
                            {{ $tahun }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
        
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body d-flex flex-column">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                                    Total Pemohon
                                </div>
                                <div class="h5 mb-0 fw-bold text-gray-800">{{ $totalPengguna }}</div>
                            </div>

                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sesi Chat (Bulan Ini) Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body d-flex flex-column">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs fw-bold text-success text-uppercase mb-1">
                                    Sesi Chat (Bulan Ini)</div>
                                <div class="h5 mb-0 fw-bold text-gray-800">120</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Sesi Chat Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body d-flex flex-column">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs fw-bold text-info text-uppercase mb-1">Total Sesi Chat
                                </div>
                                <div class="h5 mb-0 me-3 fw-bold text-gray-800">540</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengguna Aktif Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs fw-bold text-warning text-uppercase mb-1">
                                    Pengguna Aktif</div>
                                <div class="h5 mb-0 fw-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Pemohon Per Bulan -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 fw-bold text-primary">Grafik Pemohon Per Bulan ({{ $tahunDipilih }})</h6>
            </div>
            <div class="card-body">
                <canvas id="pemohonChart"></canvas>
            </div>
        </div>

        <!-- Recent Chats Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 fw-bold text-primary">Sesi Chat Terbaru</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Sesi</th>
                                <th>Nama Pemohon</th>
                                <th>Topik</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Contoh Data Dinamis --}}
                            <tr>
                                <td>CHAT-001</td>
                                <td>Pemohon Budi</td>
                                <td>Perpanjangan KITAS</td>
                                <td><span class="badge bg-success">Selesai</span></td>
                                <td>2023-10-27</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-info" title="Lihat Detail"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger" title="Hapus Sesi"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>CHAT-002</td>
                                <td>Pemohon Ani</td>
                                <td>Cara membuat paspor baru</td>
                                <td><span class="badge bg-warning">Menunggu Balasan</span></td>
                                <td>2023-10-28</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-info" title="Lihat Detail"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger" title="Hapus Sesi"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>CHAT-003</td>
                                <td>Pemohon Citra</td>
                                <td>Biaya visa kunjungan</td>
                                <td><span class="badge bg-info">Sedang Berlangsung</span></td>
                                <td>2023-10-29</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-info" title="Lihat Detail"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger" title="Hapus Sesi"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('pemohonChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Jumlah Pemohon',
                    data: @json($data),
                    backgroundColor: 'rgba(11, 93, 148, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true, ticks: { precision: 0 } }
                }
            }
        });
    </script>
@endsection