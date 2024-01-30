<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablesM extends Model
{
    use HasFactory;

    protected $table = "tables";

    protected $fillable = [
        'id',
        'merk',
        'ukuran',
        'harga',
    ];
}
