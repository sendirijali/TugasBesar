<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Courier;
use Illuminate\Database\Eloquent\Builder;

class Tracking extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'resi',
        'alamat',
        'handphone',
        'deskripsi',
    ];

    public function courier():BelongsTo
    {
        return $this->belongsTo(User::class, 'courier_id');
    }
    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
             fn($query, $search)=>
            $query->where('resi', 'like', '%' . $search .'%')
        );
    }
}
