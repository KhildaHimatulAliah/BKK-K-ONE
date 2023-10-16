<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageAlur extends Model
{
    protected $table = "page_alurs";
    protected $primarykey = "id";
    protected $fillable = [
        'gambar','judul','deskripsi','tahap_1','tahap_2','tahap_3','tahap_4'];

    public function contenthome() {
        return $this->belongTo(Page_home::class);
    }
}
