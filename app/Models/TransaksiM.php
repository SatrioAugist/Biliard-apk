<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class TransaksiM extends Model
{
    use HasFactory;

    protected $table="transaksi";

    protected $fillable = [
        'id',
        'reservations_id',
        'uang_bayar',
        'uang_kembali',
        'created_at',
    ];

    public function searchableAs()
    {
        return 'transaksi';
    }

    public function toSearchableArray()
    {
        return [
            'nama_pelanggan'     => $this->nama_pelanggan,
            'created_at'     => $this->created_at->toIso8601String(),
        ];
    }
}
