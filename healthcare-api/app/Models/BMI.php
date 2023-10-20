<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BMI extends Model
{
    use HasFactory;
    protected $table = 'bmi';
    protected $fillable = ['tinggi_tubuh', 'berat_badan'];
}
