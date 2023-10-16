<?php

namespace App\Models;

use App\Models\Lowongan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tahapan extends Model
{
    protected $table = "tahapans";
    protected $primarykey = "id";
    protected $fillable = ['name', 'id_lowongan'];

    public function lowongan() {
        return $this->belongTo(Lowongan::class);
    }

    public function tahapan_pengajuan(){
        return $this->hasMany(TahapanPengajuan::class, "id_tahapan");
    }
}
