<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreeLight extends Model
{
    use HasFactory;

    protected $fillable = [
        'memeber_id',
        'name',
        'birth_date',
        'birth_time',
        'remark',
    ];

    public function member(): BelongTo
    {
        return $this->belongsTo(Member::class);
    }
}
