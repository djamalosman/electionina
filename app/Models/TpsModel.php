<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpsModel extends Model
{
    public $timestamps = true;
    protected $table = 'tps';
    protected $guarded = [];
    use HasFactory;
}