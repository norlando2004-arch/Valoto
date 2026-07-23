<?php

namespace App\Http\Controllers;

use App\Models\PreviousDraw;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PreviousDrawController extends Controller
{
    public function index(): View
    {
        return view('configuracion.historial', [
            'previousDraws' => PreviousDraw::orderByDesc('draw_date')->paginate(20),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'draw_date' => ['required', 'date'],
            'number_1' => ['required', 'integer', 'between:0,99'],
            'number_2' => ['required', 'integer', 'between:0,99'],
            'number_3' => ['required', 'integer', 'between:0,99'],
            'number_4' => ['required', 'integer', 'between:0,99'],
            'number_5' => ['required', 'integer', 'between:0,99'],
            'super_number' => ['required', 'integer', 'between:0,99'],
        ]);

        PreviousDraw::create($validated);

        return redirect()
            ->route('configuracion.historial.index')
            ->with('status', 'Resultado anterior agregado correctamente.');
    }

    public function destroy(PreviousDraw $previousDraw): RedirectResponse
    {
        $previousDraw->delete();

        return redirect()
            ->route('configuracion.historial.index')
            ->with('status', 'Resultado eliminado.');
    }
}
