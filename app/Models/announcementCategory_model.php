<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announcementCategory_model extends Model
{
    use HasFactory;
    protected $table = 'announcementCategories';
    protected $fillable = [
        'category_name',
    ];
    public function announcements()
    {
        return $this->hasMany(announcementCategory_model::class, 'announcement_category_id');
    }

}
