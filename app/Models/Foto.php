<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    public $table = "master.foto";

    protected $fillable = [
        "id",
        "judul",
        "deskripsi_foto",
        "tanggal_unggah",
        "lokasi_file"
    ];
}
