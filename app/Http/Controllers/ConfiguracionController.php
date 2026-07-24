<?php

namespace App\Http\Controllers;

use App\Models\DrawResult;
use App\Models\PreviousDraw;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConfiguracionController extends Controller
{
    public function edit(): View
    {
        return view('configuracion.edit', [
            'draw' => DrawResult::current(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'number_1' => ['required', 'regex:/^\d{1,2}$/', 'between:0,99'],
            'number_2' => ['required', 'regex:/^\d{1,2}$/', 'between:0,99'],
            'number_3' => ['required', 'regex:/^\d{1,2}$/', 'between:0,99'],
            'number_4' => ['required', 'regex:/^\d{1,2}$/', 'between:0,99'],
            'number_5' => ['required', 'regex:/^\d{1,2}$/', 'between:0,99'],
            'super_number' => ['required', 'regex:/^\d{1,2}$/', 'between:0,99'],
            'draw_number' => ['required', 'integer', 'min:1'],
            'draw_date' => ['required', 'date'],
        ]);

        PreviousDraw::create($validated);

        DrawResult::current()->update($validated);

        return redirect()
            ->route('configuracion.edit')
            ->with('status', 'Resultado guardado. Ya quedo en el historial con esos numeros exactos.');
    }
}
