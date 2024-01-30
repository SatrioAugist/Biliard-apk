<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;



class ReservationsM extends Model
{
    use HasFactory;
    protected $table ="reservations";
    protected $primarykey = "id";
    protected $fillable = [
        'id',
        'nama_pelanggan',
        'table_id',
        'jam_mulai',
        'jam_akhir',
        'jumlah_jam',
        'harga_bayar',
        'status',
        'created_at',
    ];

    public function searchableAs()
    {
        return 'reservations';
    }

    public function toSearchableArray()
    {
        return [
            'nama_pelanggan'     => $this->nama_pelanggan,
            'created_at'     => $this->created_at->toIso8601String(),
        ];
    }


    
}
