<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gelato extends Model
{
    use HasFactory;

    protected $table = 'gelato';

    protected $fillable = [
        'gelatoNama',
        'gelatoDesc',
        'gelatoHarga',
        'gelatoStok',
        'gelatoJenis',
        'image'
    ];
}