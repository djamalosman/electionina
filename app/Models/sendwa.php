<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sendwa extends Model
{
    public $timestamps = false;
    protected $table = 't_hisschedule';
    protected $guarded = [];
    use HasFactory;
}
