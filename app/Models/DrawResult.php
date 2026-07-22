<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrawResult extends Model
{
    protected $fillable = [
        'number_1',
        'number_2',
        'number_3',
        'number_4',
        'number_5',
        'super_number',
        'draw_number',
        'draw_date',
    ];

    protected $casts = [
        'draw_date' => 'date',
    ];

    public static function current(): self
    {
        return static::first() ?? static::create([
            'number_1' => 2,
            'number_2' => 11,
            'number_3' => 19,
            'number_4' => 27,
            'number_5' => 40,
            'super_number' => 5,
            'draw_number' => 2531,
            'draw_date' => now()->toDateString(),
        ]);
    }

    public function mainNumbers(): array
    {
        return [
            $this->number_1,
            $this->number_2,
            $this->number_3,
            $this->number_4,
            $this->number_5,
        ];
    }
}
