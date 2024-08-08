<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        $now = Carbon::now();
        $tahun_bulan = $now->year . $now->month;
        $cek = User::count();

        if ($cek == 0) {
            $urut = 'K-' + 100001;
            $kode = $tahun_bulan . $urut;
            dd($kode);
        } else {
            $ambil = User::all()->last();
            $urut = (int)substr($ambil->kode, -6) + 1;
            $kode = 'K-' . $tahun_bulan . $urut;
        }
        return view('user.index', compact('user', 'kode'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'kode' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string',
                'level' => 'required|in:admin,kasir,owner',
            ]);

            $user = new User;
            $user->kode = $request->kode;
            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->level = $request->level;
            $user->save();

            return redirect('/owner/user')->with('sukses', 'Data Berhasil di Simpan');
        } catch (\Exception $e) {
            return redirect('/owner/user')->with('gagal', 'Data Tidak Berhasil di Simpan. Pesan Kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $user->nama = $request->nama;
            $user->email = $request->email;

            // Memeriksa apakah password dimasukkan
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            return redirect('/owner/user')->with('sukses', 'Data Berhasil di Edit');
        } catch (\Exception $e) {
            return redirect('/owner/user')->with('gagal', 'Data Tidak Berhasil di Edit. Pesan Kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/owner/user')->with('sukses', 'Data Berhasil Di Hapus');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function updateProfile(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $user->nama = $request->nama;
            $user->email = $request->email;

            // Memeriksa apakah password dimasukkan
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            return redirect('/owner/user')->with('sukses', 'Data Berhasil di Edit');
        } catch (\Exception $e) {
            return redirect('/owner/user')->with('gagal', 'Data Tidak Berhasil di Edit. Pesan Kesalahan: ' . $e->getMessage());
        }
    }
}
