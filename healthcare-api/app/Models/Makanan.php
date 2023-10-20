<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    protected $table = "Makanan";
    protected $fillable = ['id_makanan', 'jenis_makanan', 'kalori_makanan'];
}
