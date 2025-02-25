<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birthdate',
        'birthtime',
        'phone',
        'address',
        'email',
    ];

    public function memberFamily(): BelongsTo
    {
        return $this->belongsTo(MemberFamily::class, 'member_family_id');
    }
}
