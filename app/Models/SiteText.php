<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteText extends Model
{
    protected $fillable = [
        'slot',
        'title',
        'body',
    ];

    public const SLOTS = [
        'hero' => [
            'label' => 'Portada principal (seccion "La fortuna llama a tu puerta")',
            'title_max' => 60,
            'body_max' => 220,
            'default_title' => 'La fortuna llama a tu puerta',
            'default_body' => 'Participa en nuestros sorteos y vive la adrenalina de ganar. Esta version optimizada busca una apariencia promocional de alta gama, inspirada en las mejores referencias.',
        ],
        'jackpot' => [
            'label' => 'Bloque de premio mayor',
            'title_max' => 30,
            'body_max' => 50,
            'default_title' => 'PREMIO MAYOR!',
            'default_body' => '4.150 Millones de Pesos',
        ],
        'promo' => [
            'label' => 'Modulo informativo (GRANLOTO MILLONARIA)',
            'title_max' => 45,
            'body_max' => 320,
            'default_title' => 'GRANLOTO MILLONARIA',
            'default_body' => 'GRANLOTO MILLONARIA es una plataforma dedicada a sorteos virtuales, pensada para que todos puedan participar de forma sencilla. Te ofrecemos una experiencia clara, opciones de premios destacadas y promociones que hacen cada jugada mas emocionante.',
        ],
    ];

    public static function for(string $slot): array
    {
        $config = self::SLOTS[$slot] ?? null;

        if (! $config) {
            abort(404);
        }

        $record = self::where('slot', $slot)->first();

        return [
            'title' => $record->title ?? $config['default_title'],
            'body' => $record->body ?? $config['default_body'],
        ];
    }
}
