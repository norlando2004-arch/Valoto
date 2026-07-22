<?php

namespace App\Http\Controllers;

use App\Models\DrawResult;
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
            'number_1' => ['required', 'integer', 'between:0,99'],
            'number_2' => ['required', 'integer', 'between:0,99'],
            'number_3' => ['required', 'integer', 'between:0,99'],
            'number_4' => ['required', 'integer', 'between:0,99'],
            'number_5' => ['required', 'integer', 'between:0,99'],
            'super_number' => ['required', 'integer', 'between:0,99'],
            'draw_number' => ['required', 'integer', 'min:1'],
            'draw_date' => ['required', 'date'],
        ]);

        DrawResult::current()->update($validated);

        return redirect()
            ->route('configuracion.edit')
            ->with('status', 'Resultado actualizado correctamente.');
    }
}
