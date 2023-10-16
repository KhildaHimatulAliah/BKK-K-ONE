<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahapanPengajuan extends Model
{
    protected $table = "tahapan_pengajuans";
    protected $primarykey = "id";
    protected $fillable = ['id_tahapan', 'id_pengajuan', 'status'];


    public function tahapan(){
        return $this->belongsTo(Tahapan::class, "id_tahapan");
    }
}
