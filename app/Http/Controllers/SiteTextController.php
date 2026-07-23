<?php

namespace App\Http\Controllers;

use App\Models\SiteText;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteTextController extends Controller
{
    public function edit(): View
    {
        $slots = collect(SiteText::SLOTS)->map(function (array $config, string $slot) {
            return array_merge($config, [
                'slot' => $slot,
                'current' => SiteText::for($slot),
            ]);
        })->values();

        return view('configuracion.textos', [
            'slots' => $slots,
        ]);
    }

    public function update(Request $request, string $slot): RedirectResponse
    {
        if (! array_key_exists($slot, SiteText::SLOTS)) {
            abort(404);
        }

        $config = SiteText::SLOTS[$slot];

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:'.$config['title_max']],
            'body' => ['required', 'string', 'max:'.$config['body_max']],
        ]);

        SiteText::updateOrCreate(['slot' => $slot], $validated);

        return redirect()
            ->route('configuracion.textos.edit')
            ->with('status', 'Texto actualizado correctamente.');
    }
}
