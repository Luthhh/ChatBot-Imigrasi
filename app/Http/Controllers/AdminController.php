<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Halaman Dashboard
    public function index(Request $request)
    {
        $this->authorizeCS();

        // Ambil tahun unik dari data pemohon
        $tahunList = User::where('role', 'pemohon')
            ->selectRaw('YEAR(created_at) as tahun')
            ->distinct()
            ->orderBy('tahun', 'desc') // atau 'asc' kalau mau dari paling lama
            ->pluck('tahun');


        // Tahun yang dipilih (default = tahun sekarang)
        $tahunDipilih = $request->input('tahun', date('Y'));

        // Hitung total pemohon di tahun yang dipilih
        $totalPengguna = User::where('role', 'pemohon')
            ->whereYear('created_at', $tahunDipilih)
            ->count();

        // Ambil jumlah pemohon per bulan di tahun terpilih
        $pemohonPerBulan = User::selectRaw('MONTH(created_at) as bulan, COUNT(*) as jumlah')
            ->where('role', 'pemohon')
            ->whereYear('created_at', $tahunDipilih)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Siapkan array bulan dan data
        $labels = [];
        $data = [];
        foreach (range(1, 12) as $bulan) {
            $labels[] = date("F", mktime(0, 0, 0, $bulan, 1));
            $record = $pemohonPerBulan->firstWhere('bulan', $bulan);
            $data[] = $record ? $record->jumlah : 0;
        }

        return view('admin.dashboard', compact('totalPengguna', 'labels', 'data', 'tahunList', 'tahunDipilih'));
    }

    // Halaman List User
    public function manageUsers()
    {
        $this->authorizeCS();
        $users = User::all();
        return view('admin.manage-users', compact('users'));
    }

    // Form Tambah User
    public function createUser()
    {
        $this->authorizeCS();
        return view('admin.create-user');
    }

    // Simpan User Baru
    public function storeUser(Request $request)
    {
        $this->authorizeCS();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('admin.users')->with('success', 'User berhasil ditambahkan');
    }

    // Form Edit User
    public function editUser($id)
    {
        $this->authorizeCS();
        $user = User::findOrFail($id);
        return view('admin.edit-user', compact('user'));
    }

    // Update Data User
    public function updateUser(Request $request, $id)
    {
        $this->authorizeCS();
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required'
        ]);

        $data = $request->only(['name', 'email', 'role']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users')->with('success', 'User berhasil diperbarui');
    }

    // Hapus User
    public function deleteUser($id)
    {
        $this->authorizeCS();
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User berhasil dihapus');
    }

    // Pengecekan Role CS
    private function authorizeCS()
    {
        if (Auth::user()->role !== 'cs') {
            abort(403, 'Hanya Customer Service yang dapat mengakses halaman ini.');
        }
    }

    // Halaman Edit Profil
    public function editProfile()
    {
        $user = Auth::user();
        return view('admin.edit-profile', compact('user'));
    }

    // Update Profil
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed'
        ]);

        $data = $request->only(['name', 'email']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui');
    }



}
