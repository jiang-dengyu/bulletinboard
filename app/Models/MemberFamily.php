<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberFamily extends Model
{
    use HasFactory;

    public function member(): HasMany
    {
        return $this->hasMany(Member::class, 'member_family_id');
    }
}
