<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageLowongan extends Model
{
    use HasFactory; // Jangan lupa gunakan trait HasFactory jika Anda ingin menggunakan Factory

    protected $table = "lowongans";
    protected $primaryKey = "id"; // Perbaiki typo di sini
    protected $fillable = [
        'foto','id_perusahaan','tanggal_publish','tanggal_berakhir','posisi_lowongan',
        'id_tahapan','judul_1','judul_2','judul_3','judul_4','judul_5',
        'teks_1','teks_2','teks_3','teks_4','teks_5'
    ];

    // Hapus atau perbaiki fungsi relasi ini sesuai kebutuhan Anda
    // public function someRelation() {
    //     return $this->belongsTo(SomeModel::class);
    // }
}
