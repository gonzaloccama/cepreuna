<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaMessage extends Model
{
    use HasFactory;

    public function from_usr()
    {
        return $this->belongsTo(User::class, 'from_user');
    }
}
