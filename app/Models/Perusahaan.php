<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = "perusahaans";
    protected $primarykey = "id";
    protected $fillable = [
        'nama','logo','alamat','detail'];

    public function lowongan() {
        return $this->belongTo(PageLowongan::class);
    }
}
