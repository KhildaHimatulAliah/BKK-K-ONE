<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kandidat extends Model
{
    use HasFactory;  // Pastikan Anda menggunakan trait ini jika Anda menggunakan factory.

    protected $table = "kandidats";
    protected $primaryKey = "id";  // Perbaiki kesalahan pengetikan di sini
    protected $fillable = [
        'nik', 'name', 'tempat_lahir', 'tanggal_lahir', 'asal_sekolah', 'jurusan', 'no_wa', 'dosis_vaksin', 'ijazah', 'kk','ktp', 
        'sks','akta_kelahiran', 'skck', 'foto', 'user_id', 'jenis_kelamin','berat_badan', 'tinggi_badan','cv', 'ak_1'
    ];
    
    // Hapus fungsi kandidat() yang tidak perlu di bawah ini
}
