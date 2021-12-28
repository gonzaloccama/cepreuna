<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaPostsReaction extends Model
{
    use HasFactory;

    protected $table = 'media_posts_reactions';

    protected $fillable = [
        'post_id',
        'user_id',
        'reaction',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
