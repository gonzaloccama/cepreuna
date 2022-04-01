<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    use HasFactory;

    public function children()
    {
        return $this->hasMany(PrivacyPolicy::class, 'group');
    }

    public function parent()
    {
        return $this->belongsTo(PrivacyPolicy::class, 'group');
    }
}
