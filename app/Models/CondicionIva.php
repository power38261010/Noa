<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CondicionIva extends Model {
    use HasFactory;

    protected $fillable = [
        'codigo',
        'condicion_iva',
        'alicuota',
    ];
}
