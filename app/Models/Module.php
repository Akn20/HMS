<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'module_label',
        'module_display_name',
        'parent_module',
        'priority',
        'icon',
        'file_url',
        'page_name',
        'type',
        'access_for'
    ];
}
