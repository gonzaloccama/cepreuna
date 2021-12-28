<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(CategoryStatement::class, 'category_statement');
    }
}
