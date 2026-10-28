<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyalur extends Model
{
    use HasFactory;

    protected $table = 'penyalurs';
    protected $fillable = ['nama_lembaga', 'bidang', 'alamat', 'kontak', 'image'];
}