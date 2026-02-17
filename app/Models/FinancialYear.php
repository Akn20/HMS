<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialYear extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function scopeForDate($query, $date)
    {
        return $query->where('start_date', '<=', $date)
            ->where('end_date', '>=', $date);
    }

    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class, 'hospital_financial_years')
            ->withPivot(['is_current', 'locked'])
            ->withTimestamps();
    }
}
