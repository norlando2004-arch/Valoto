<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreviousDraw extends Model
{
    protected $fillable = [
        'draw_date',
        'number_1',
        'number_2',
        'number_3',
        'number_4',
        'number_5',
    ];

    protected $casts = [
        'draw_date' => 'date',
    ];

    public function numbers(): array
    {
        return [
            $this->number_1,
            $this->number_2,
            $this->number_3,
            $this->number_4,
            $this->number_5,
        ];
    }

    public static function availableYears()
    {
        return static::orderByDesc('draw_date')
            ->pluck('draw_date')
            ->map(fn ($date) => $date->format('Y'))
            ->unique()
            ->values();
    }
}
