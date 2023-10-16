<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageArtikel extends Model
{
    use HasFactory;

    protected $table = "page_artikels";
    protected $primaryKey = "id";
    protected $fillable = ['judul', 'foto', 'deskripsi', 'created_at'];

}

