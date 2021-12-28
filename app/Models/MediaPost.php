<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaPost extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getNextId()
    {
        $statement = DB::select("show table status like 'media_posts'");
        return $statement[0]->Auto_increment;
    }
}
