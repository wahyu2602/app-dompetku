<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    public function scopeGetKategori($query, $idUser)
    {
        return $query->join('kategori_status', 'kategori.status_id', '=', 'kategori_status.id_kategori')->where('id_users', '=', $idUser)->get();
    }

    public function scopeGetKategoriId($query, $idKategori)
    {
        return $query->where('id', $idKategori);
    }

    public function scopeGetKategoriDetail($query, $idKategori)
    {
        return $query->join('kategori_status', 'kategori.status_id', '=', 'kategori_status.id_kategori')->where('id', $idKategori)->get();
    }

    public function scopeStatusKategori($query, $idUser, $idKategori)
    {
        return $query->where('id_users', $idUser)
            ->where('id', $idKategori);
    }

    public function scopeFilterStatusKategori($query, $idUser, $statusKategori)
    {
        return $query->join('kategori_status', 'kategori.status_id', '=', 'kategori_status.id_kategori')
            ->where('id_users', $idUser)
            ->where('status_id', $statusKategori)->get();
    }
}
