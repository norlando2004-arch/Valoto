<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BackgroundImage extends Model
{
    protected $fillable = [
        'slot',
        'path',
    ];

    public const SLOTS = [
        'hero' => [
            'label' => 'Portada principal (seccion "La fortuna llama a tu puerta")',
            'default' => 'images/imagenvaloto1.webp',
        ],
        'jackpot' => [
            'label' => 'Bloque de premio mayor',
            'default' => 'images/premio mayor.png',
        ],
        'promo' => [
            'label' => 'Imagen promocional (seccion GRANLOTO MILLONARIA)',
            'default' => 'images/imagenvaloto1.webp',
        ],
        'resultados' => [
            'label' => 'Fondo de "Resultados Anteriores"',
            'default' => 'images/resultados.png',
        ],
    ];

    public static function urlFor(string $slot): string
    {
        $config = self::SLOTS[$slot] ?? null;

        if (! $config) {
            abort(404);
        }

        $path = self::where('slot', $slot)->value('path');

        return $path
            ? Storage::disk('public')->url($path)
            : asset($config['default']);
    }
}
