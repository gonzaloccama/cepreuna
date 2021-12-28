<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaPostsComment extends Model
{
    use HasFactory;

    protected $table = 'media_posts_comments';

    protected $fillable = [
        'node_id',
        'node_type',
        'user_id',
        'user_type',
        'text',
        'image',
        'created_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
