<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicicletas extends Model
{
    use HasFactory;
    protected $fillable = [
        'Marca',
        'Ruedas'
    ];
    protected $table = 'bicicletas';
    public $timestamps = false;
}
