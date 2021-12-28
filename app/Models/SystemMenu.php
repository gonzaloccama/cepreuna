<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemMenu extends Model
{
    use HasFactory;

    protected $table = 'system_menus';

    protected $fillable = [
        'id',
        'name',
        'menu_icon',
        'route',
        'is_route',
        'page',
        'order',
        'parent',
        'type',
        'section',
    ];

    public function up()
    {
        return $this->belongsTo(SystemMenu::class, 'parent');
    }

    public function children()
    {
        return $this->hasMany(SystemMenu::class, 'parent', 'id');
    }
}
