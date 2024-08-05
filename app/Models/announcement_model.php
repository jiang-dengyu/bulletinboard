<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announcement_model extends Model
{
    use HasFactory;
    protected $table = 'announcements';
    protected $fillable = [
        'announcement_title',
        'content',
        'attachment',
        'image',
        'stage',
        'announcement_category_id',
        'department',
        'publish_date',
        'remove_date'
    ];

    public function category()
    {
        return $this-> belongsTo(announcementCategory_model::class, 'announcement_category_id');
    }
}
