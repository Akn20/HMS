<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;



class User extends Authenticatable
{
    use SoftDeletes;
    
    
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'mobile',
        'mpin',
        'role_id',
        'status'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}

