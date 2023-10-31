<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akar extends Model
{
    use HasFactory;
    protected $table ='akar_kuadrat';
    
    protected $fillable = ['input', 'angka', 'jenis', 'waktu'];
}
