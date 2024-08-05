<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department_model extends Model
{
    use HasFactory;
    protected $table = "departments";
    protected $fillable=[
        'department_name',
    ];

    public function department()
    {
        return $this->hasMany(department_model::class, 'department_id');
    }
}
