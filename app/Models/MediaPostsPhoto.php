<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaPostsPhoto extends Model
{
    use HasFactory;

    public function getNextId()
    {
        $statement = DB::select("show table status like 'media_posts_photos'");
        return $statement[0]->Auto_increment;
    }
}
