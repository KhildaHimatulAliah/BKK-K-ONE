<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageHome extends Model
{
    use HasFactory;

    protected $table = "page_homes";
    protected $primaryKey = "id";
    protected $fillable = [
        'gambar','teks_1','teks_2','teks_3'
    ];

    // Jika Anda benar-benar memiliki kasus penggunaan untuk relasi ini:
    public function home() {
        return $this->belongsTo(PageHome::class);
    }
}


