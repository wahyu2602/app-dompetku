<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    use HasFactory;

    protected $table = 'dompet';

    public function scopeGetDompet($query, $type)
    {
        return $query->join('dompet_status', 'dompet.status_id', '=', 'dompet_status.id_dompet')->where('id_users', '=', $type)->get();
    }

    public function scopeGetDompetId($query, $type)
    {
        return $query->where('id', $type);
    }

    public function scopeGetDompetDetail($query, $type)
    {
        return $query->join('dompet_status', 'dompet.status_id', '=', 'dompet_status.id_dompet')->where('id', $type)->get();
    }

    public function scopeStatusDompet($query, $idUser, $idDompet)
    {
        return $query->where('id_users', $idUser)
            ->where('id', $idDompet);
    }

    public function scopeFilterStatusDompet($query, $idUser, $statusDompet)
    {
        return $query->join('dompet_status', 'dompet.status_id', '=', 'dompet_status.id_dompet')
            ->where('id_users', $idUser)
            ->where('status_id', $statusDompet)->get();
    }
}
