<?php

namespace App\Models;

use App\Models\User;
use App\Models\TahapanPengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengajuan extends Model
{
    protected $table = "pengajuans";
    protected $primarykey = "id";
    protected $fillable = [
        'status', 'id_user', 'id_lowongan'];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function lowongan() {
        return $this->belongsTo(Lowongan::class, 'id_lowongan');
    }
    public function tahapan_pengajuan(){
        return $this->hasMany(TahapanPengajuan::class, "id_pengajuan");
    }
}
