<?php

namespace App\Http\Controllers;

use App\Models\DrawResult;
use App\Models\PreviousDraw;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
            'number_1' => ['required', 'integer', 'between:0,99'],
            'number_2' => ['required', 'integer', 'between:0,99'],
            'number_3' => ['required', 'integer', 'between:0,99'],
            'number_4' => ['required', 'integer', 'between:0,99'],
            'number_5' => ['required', 'integer', 'between:0,99'],
            'super_number' => ['required', 'integer', 'between:0,99'],
            'draw_number' => ['required', 'integer', 'min:1', Rule::unique('previous_draws', 'draw_number')],
            'draw_date' => ['required', 'date'],
        ], [
            'draw_number.unique' => 'Ese numero de sorteo ya fue usado en un resultado anterior. Ingresa uno diferente.',
        ]);

        PreviousDraw::create($validated);

        DrawResult::current()->update($validated);

        return redirect()
            ->route('configuracion.edit')
            ->with('status', 'Resultado guardado. Ya quedo en el historial con esos numeros exactos.');
    }
}
