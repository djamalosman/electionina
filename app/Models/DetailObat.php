<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailObat extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 't_history_obat';
    protected $guarded = [];
    protected $fillable=[
        'id_obat',
        'id_schedule_detail',
        'jam',
        'path'
    ];
}
