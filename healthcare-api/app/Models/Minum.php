<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minum extends Model
{
    use HasFactory;
    protected $table = "Minum";
    protected $fillable = ['id_minum', 'jumlah_minum'];
}
