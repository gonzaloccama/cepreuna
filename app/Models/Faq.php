<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    public function section()
    {
        return $this->belongsTo(FaqSection::class, 'faq_section_faq');
    }
}
