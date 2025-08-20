@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Manajemen User</h1>

    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row g-2 align-items-center">
                <div class="col-12 col-md-4">
                    <h6 class="m-0 fw-bold text-primary">Daftar Pengguna</h6>
                </div>
                <div class="col-12 col-md-8">
                    <div class="d-flex flex-wrap align-items-center justify-content-md-end gap-2">
                        <!-- Filter Role -->
                        <select id="roleFilter" class="form-select form-select-sm w-auto" aria-label="Filter by role">
                            <option value="" selected>Semua Role</option>
                            <option value="pemohon">Pemohon</option>
                            <option value="cs">CS</option>
                        </select>
                        <!-- Search -->
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" id="searchInput" class="form-control" placeholder="Cari nama atau email..." aria-label="Search users">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <!-- Tombol Tambah -->
                        <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Tambah User
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="userTable" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center" width="50px">No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center" width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="badge bg-{{ $user->role == 'cs' ? 'primary' : 'secondary' }}">{{ ucfirst($user->role) }}</span></td>
                            <td class="text-center">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data pengguna.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Script Filter & Search -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const roleFilter = document.getElementById("roleFilter");
    const searchInput = document.getElementById("searchInput");
    const rows = document.querySelectorAll("#userTable tbody tr");

    function filterTable() {
        const role = roleFilter.value.toLowerCase();
        const search = searchInput.value.toLowerCase();

        rows.forEach(row => {
            // Pastikan baris ini bukan baris 'Tidak ada data'
            if (row.cells.length < 5) {
                return;
            }
            const name = row.cells[1]?.textContent.toLowerCase() || '';
            const email = row.cells[2]?.textContent.toLowerCase() || '';
            const userRole = row.cells[3]?.textContent.toLowerCase() || '';

            const matchRole = role === "" || userRole.trim() === role;
            const matchSearch = name.includes(search) || email.includes(search);

            if (matchRole && matchSearch) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    roleFilter.addEventListener("change", filterTable);
    searchInput.addEventListener("keyup", filterTable);
});
</script>
@endsection
