<?php

namespace App\Http\Controllers;

use App\Models\BackgroundImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BackgroundImageController extends Controller
{
    public function edit(): View
    {
        $slots = collect(BackgroundImage::SLOTS)->map(function (array $config, string $slot) {
            return [
                'slot' => $slot,
                'label' => $config['label'],
                'preview' => BackgroundImage::urlFor($slot),
                'isCustom' => BackgroundImage::where('slot', $slot)->whereNotNull('path')->exists(),
            ];
        })->values();

        return view('configuracion.imagenes', [
            'slots' => $slots,
        ]);
    }

    public function update(Request $request, string $slot): RedirectResponse
    {
        if (! array_key_exists($slot, BackgroundImage::SLOTS)) {
            abort(404);
        }

        $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:8192'],
        ]);

        $record = BackgroundImage::firstOrNew(['slot' => $slot]);

        if ($record->path) {
            Storage::disk('public')->delete($record->path);
        }

        $record->path = $request->file('image')->store('backgrounds', 'public');
        $record->save();

        return redirect()
            ->route('configuracion.imagenes.edit')
            ->with('status', 'Imagen actualizada correctamente.');
    }
}
