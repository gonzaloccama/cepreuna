<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(CategoryEmployment::class, 'category_employment');
    }
}
