<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nis extends Model
{
    protected $table = "nis";
    protected $primarykey = "id";
    protected $fillable = [
    'nama', 'nis'];
    public function contenthome() {
        return $this->belongTo(PageArtikel::class);
    }
}
