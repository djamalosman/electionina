<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    public $timestamps = true;
    protected $table = 'm_pasien';
    protected $guarded = [];
    use HasFactory;
}
