<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    // DASHBOARD USER ----------------------------------------------------------------------------------
    public function DashboardUsers()
    {
        return view('pages.users.dashboard');
    }

    // MASTER -> DOMPET ---------------------------------------------------------------------------------
    public function Dompet()
    {
        $getDompet = DB::table('dompet')->join('dompet_status', 'dompet.status_id', '=', 'dompet_status.id_dompet')->where('id_users', '=', Auth::id())->get();

        return view('pages.users.master.dompet.index', [
            'datadompet' => $getDompet,
            'nomor' => 1
        ]);
    }

    public function GET_ADD_DOMPET()
    {
        $dompetStatus = DB::table('dompet_status')->get();
        return view('pages.users.master.dompet.add', [
            'dompetStatusAktif' => $dompetStatus[0],
            'dompetStatusNon' => $dompetStatus[1]
        ]);
    }

    public function POST_ADD_DOMPET(Request $request)
    {
        $validate = $request->validate([
            'namadompet' => 'required|min:5',
            'deskripsi' => 'max:100',
            'status_dompet' => 'required'
        ]);

        DB::table('dompet')->insert([
            'id_users' => Auth::id(),
            'nama' => $validate['namadompet'],
            'referensi' => $request['referensi'],
            'deskripsi' => $validate['deskripsi'],
            'status_id' => $validate['status_dompet']
        ]);

        return back()->with('sukses', 'Data Dompet Berhasil Di Tambah');
    }

    public function GET_EDIT_DOMPET(Request $request)
    {
        $dataDompet = DB::table('dompet')->where('id', $request['id'])->get();
        $dompetStatus = DB::table('dompet_status')->get();
        return view('pages.users.master.dompet.edit', [
            'datadompet' => $dataDompet[0],
            'dompetStatusAktif' => $dompetStatus[0],
            'dompetStatusNon' => $dompetStatus[1]
        ]);
    }

    public function POST_EDIT_DOMPET(Request $request)
    {
        $request->validate([
            'namadompet' => 'required',
            'deskripsi' => 'max:100'
        ]);

        DB::table('dompet')->where('id', $request['id'])->update([
            'nama' => $request['namadompet'],
            'referensi' => $request['referensi'],
            'deskripsi' => $request['deskripsi'],
            'status_id' => $request['status_dompet']
        ]);

        return redirect('user/dompet')->with('sukses', 'Data Berhasil Di Ubah');
    }

    public function DOMPET_DETAIL(Request $request)
    {
        $dompetDetail = DB::table('dompet')->join('dompet_status', 'dompet.status_id', '=', 'dompet_status.id_dompet')->where('id', $request['id'])->get();

        return view('pages.users.master.dompet.detail', [
            'detail' => $dompetDetail[0]
        ]);
    }

    // MASTER -> KATEGORI --------------------------------------------------------------------------------
    public function kategori()
    {
        $getKategori = DB::table('kategori')->join('kategori_status', 'kategori.status_id', '=', 'kategori_status.id_kategori')->where('id_users', '=', Auth::id())->get();
        return view('pages.users.master.kategori.index', [
            'datakategori' => $getKategori,
            'nomor' => 1
        ]);
    }

    public function GET_ADD_KATEGORI()
    {
        $getStatusKategori = DB::table('kategori_status')->get();
        return view('pages.users.master.kategori.add', [
            'statusKategoriAktif' => $getStatusKategori[0],
            'statusKategoriNon' => $getStatusKategori[1]
        ]);
    }

    public function POST_ADD_KATEGORI(Request $request)
    {
        $validate = $request->validate([
            'namakategori' => 'required|min:5',
            'deskripsi' => 'max:100',
            'status_kategori' => 'required'
        ]);

        DB::table('kategori')->insert([
            'id_users' => Auth::id(),
            'nama_kategori' => $validate['namakategori'],
            'deskripsi_kategori' => $validate['deskripsi'],
            'status_id' => $validate['status_kategori']
        ]);

        return back()->with('sukses', 'Data Dompet Berhasil Di Tambah');
    }

    public function GET_EDIT_KATEGORI(Request $request)
    {
        $dataKategori = DB::table('kategori')->where('id', $request['id'])->get();
        $kategoriStatus = DB::table('kategori_status')->get();
        return view('pages.users.master.kategori.edit', [
            'datakategori' => $dataKategori[0],
            'kategoriStatusAktif' => $kategoriStatus[0],
            'kategoriStatusNon' => $kategoriStatus[1]
        ]);
    }

    public function POST_EDIT_KATEGORI(Request $request)
    {
        $request->validate([
            'namakategori' => 'required',
            'deskripsi' => 'max:100'
        ]);

        DB::table('kategori')->where('id', '=', $request['id'])->update([
            'nama_kategori' => $request['namakategori'],
            'deskripsi_kategori' => $request['deskripsi'],
            'status_id' => $request['status_kategori']
        ]);

        return redirect('user/kategori')->with('sukses', 'Data Berhasil Di Ubah');
    }

    public function KATEGORI_DETAIL(Request $request)
    {
        $kategoriDetail = DB::table('kategori')->join('kategori_status', 'kategori.status_id', '=', 'kategori_status.id_kategori')->where('id', $request['id'])->get();

        return view('pages.users.master.kategori.detail', [
            'detail' => $kategoriDetail[0]
        ]);
    }

    // TRANSAKSI -> DOMPET_MASUK --------------------------------------------------------------------------
    public function Dompet_Masuk()
    {
        $dataTransaksiMasuk = DB::table('transaksi_masuk')->join('transaksi_status', 'transaksi_masuk.status_id', '=', 'transaksi_status.id_transaksi')->join('dompet', 'transaksi_masuk.dompet_id', '=', 'dompet.id')->join('kategori', 'transaksi_masuk.kategori_id', '=', 'kategori.id')->where('transaksi_masuk.id_users', '=', Auth::id())->get();
        return view('pages.users.transaksi.dompet_masuk.index', [
            'dataTransaksi' => $dataTransaksiMasuk,
            'nomor' => 1
        ]);
    }

    public function GET_ADD_DOMPET_MASUK()
    {
        $dataKategori = DB::table('kategori')->where('id_users', '=', Auth::id())->where('status_id', '=', 1)->get();
        $dataDompet = DB::table('dompet')->where('id_users', '=', Auth::id())->where('status_id', '=', 1)->get();
        $dataDompetMasuk = DB::table('transaksi_masuk')->where('id_users', Auth::id())->get();

        if ($dataDompetMasuk->isEmpty()) {
            $kode = 0;
        } else {
            $kode = $dataDompetMasuk[0]->id;
        }

        $kode++;
        $autoKode = 'WIN';
        $dataKode = $autoKode . sprintf("%06s", $kode);
        return view('pages.users.transaksi.dompet_masuk.add', [
            'kode' => $dataKode,
            'datakategori' => $dataKategori,
            'datadompet' => $dataDompet
        ]);
    }

    public function POST_ADD_DOMPET_MASUK(Request $request)
    {
        $validate = $request->validate([
            'nilai' => 'required|numeric',
            'deskripsi' => 'max:100'
        ]);

        $dataDompetMasuk = DB::table('transaksi_masuk')->where('id_users', Auth::id())->get();

        if ($dataDompetMasuk->isEmpty()) {
            $kode = 0;
        } else {
            $kode = $dataDompetMasuk[0]->id;
        }

        $kode++;
        $autoKode = 'WIN';
        $dataKode = $autoKode . sprintf("%06s", $kode);

        DB::table('transaksi_masuk')->insert([
            'id_users' => Auth::id(),
            'kode' => $dataKode,
            'deskripsi_transaksi' => $validate['deskripsi'],
            'tanggal' => date('Y-m-d'),
            'nilai' => $validate['nilai'],
            'dompet_id' => $request['dompet'],
            'kategori_id' => $request['kategori'],
            'status_id' => 1
        ]);

        if ($validate['nilai'] <= 0) {
            return back()->with('errornilai', 'Nilai Tidak Boleh Minus');
        }

        return redirect('user/transaksi_masuk')->with('sukses', 'Data Berhasil Di Simpan');
    }

    // TRANSAKSI -> DOMPET_KELUAR ---------------------------------------------------------------------------
    public function Dompet_Keluar()
    {
        $dataTransaksiKeluar = DB::table('transaksi_keluar')->join('transaksi_status', 'transaksi_keluar.status_id', '=', 'transaksi_status.id_transaksi')->join('dompet', 'transaksi_keluar.dompet_id', '=', 'dompet.id')->join('kategori', 'transaksi_keluar.kategori_id', '=', 'kategori.id')->where('transaksi_keluar.id_users', '=', Auth::id())->get();
        return view('pages.users.transaksi.dompet_keluar.index', [
            'dataTransaksi' => $dataTransaksiKeluar,
            'nomor' => 1
        ]);
    }

    public function GET_ADD_DOMPET_KELUAR()
    {
        $dataKategori = DB::table('kategori')->where('id_users', '=', Auth::id())->where('status_id', '=', 1)->get();
        $dataDompet = DB::table('dompet')->where('id_users', '=', Auth::id())->where('status_id', '=', 1)->get();
        $dataDompetKeluar = DB::table('transaksi_keluar')->where('id_users', Auth::id())->get();

        if ($dataDompetKeluar->isEmpty()) {
            $kode = 0;
        } else {
            $kode = $dataDompetKeluar[0]->id;
        }

        $kode++;
        $autoKode = 'WOUT';
        $dataKode = $autoKode . sprintf("%06s", $kode);
        return view('pages.users.transaksi.dompet_keluar.add', [
            'kode' => $dataKode,
            'datakategori' => $dataKategori,
            'datadompet' => $dataDompet
        ]);
    }

    public function POST_ADD_DOMPET_KELUAR(Request $request)
    {
        $validate = $request->validate([
            'nilai' => 'required|numeric',
            'deskripsi' => 'max:100'
        ]);

        $dataDompetMasuk = DB::table('transaksi_keluar')->where('id_users', Auth::id())->get();

        if ($dataDompetMasuk->isEmpty()) {
            $kode = 0;
        } else {
            $kode = $dataDompetMasuk[0]->id;
        }

        $kode++;
        $autoKode = 'WOUT';
        $dataKode = $autoKode . sprintf("%06s", $kode);

        DB::table('transaksi_keluar')->insert([
            'id_users' => Auth::id(),
            'kode' => $dataKode,
            'deskripsi_transaksi' => $validate['deskripsi'],
            'tanggal' => date('Y-m-d'),
            'nilai' => $validate['nilai'],
            'dompet_id' => $request['dompet'],
            'kategori_id' => $request['kategori'],
            'status_id' => 2
        ]);

        if ($validate['nilai'] <= 0) {
            return back()->with('errornilai', 'Nilai Tidak Boleh Minus');
        }

        return redirect('user/transaksi_keluar')->with('sukses', 'Data Berhasil Di Simpan');
    }

    // LAPORAN -> TRANSAKSI_LAPORAN -------------------------------------------------------------------------
    public function Laporan()
    {
        $dataKategori = DB::table('kategori')->where('id_users', '=', Auth::id())->where('status_id', '=', 1)->get();
        $dataDompet = DB::table('dompet')->where('id_users', '=', Auth::id())->where('status_id', '=', 1)->get();
        $statusTransaksi = DB::table('transaksi_status')->get();
        return view('pages.users.laporan.index', [
            'datakategori' => $dataKategori,
            'datadompet' => $dataDompet,
            'transaksimasuk' => $statusTransaksi[0],
            'transaksikeluar' => $statusTransaksi[1]
        ]);
    }

    public function RESULT(Request $request)
    {
    }
}
