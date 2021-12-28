<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    use HasFactory;

    public function executive()
    {
        return $this->belongsTo(TeamMember::class, 'website_executive');
    }
}
