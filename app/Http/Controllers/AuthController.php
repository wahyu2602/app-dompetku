<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // AUTH -> REGISTRASI
    public function Register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirmpassword' => 'required'
        ]);

        if (!$request['password'] === $request['confirmpassword']) {
            return back()->withInput()->with('errorpassword', 'Password Confirm Harus Sama');
        }

        if (!$validated) {
            return back()->withInput();
        }

        $getDBUsers = DB::table('users')->get();
        $dbUsers = DB::table('users');
        $dbDompetStat = DB::table('dompet_status');
        $dbKategoriStat = DB::table('kategori_status');
        $dbTransaksiStat = DB::table('transaksi_status');

        if ($getDBUsers->isEmpty()) {
            $dbUsers->insert([
                'name' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'user',
            ]);
            $dbDompetStat->insert([
                ['status_dompet' => 'Aktif'],
                ['status_dompet' => 'Tidak Aktif']
            ]);
            $dbKategoriStat->insert([
                ['status_kategori' => 'Aktif'],
                ['status_kategori' => 'Tidak Aktif']
            ]);
            $dbTransaksiStat->insert([
                ['status_transaksi' => 'Masuk'],
                ['status_transaksi' => 'Keluar']
            ]);
        }

        if (!$getDBUsers->isEmpty()) {
            $dbUsers->insert([
                'name' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'user',
            ]);
        }

        return back()->with('sukses', 'Akun Berhasil Dibuat, Silahkan Login');
    }

    // AUTH -> LOGIN
    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'role' => 'user'])) {
            $request->session()->regenerate();
            return redirect()->intended('user');
        }

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'role' => 'admin'])) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        return back()->with([
            'email' => 'Email dan Password salah!',
            'password' => 'Email dan Password salah!'
        ]);
    }

    // AUTH -> LOGOUT
    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
