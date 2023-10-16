<?php

namespace App\Models;

use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lowongan extends Model
{
    protected $table = "lowongans";
    protected $primarykey = "id";
    protected $fillable = [
       'foto', 'id_perusahaan', 'tanggal_berakhir', 'informasi_lainnya', 'name', 'deskripsi', 'keahlian', 'kualifikasi', 'kategori_jurusan', 'batas_pelamar', 'tanggal_dimulai'];

    public function perusahaan() {
        return $this->belongsTo(Perusahaan::class, "id_perusahaan");
    }
    public function pengajuan() {
        return $this->hasMany(Pengajuan::class, "id_lowongan");
    }

}
