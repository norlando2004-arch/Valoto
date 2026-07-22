@extends('configuracion.layout')

@section('title', 'Resultados anteriores')
@section('subtitle', 'Agrega los sorteos pasados; apareceran automaticamente en el landing agrupados por mes y año.')

@section('content')
    <div class="panel">
        <h2>Agregar resultado anterior</h2>
        <p class="hint">Se agrupara solo bajo el mes y año de la fecha que elijas.</p>

        <form method="POST" action="{{ route('configuracion.historial.store') }}">
            @csrf

            <fieldset>
                <legend>Numeros del sorteo</legend>
                <div class="balls-grid" style="grid-template-columns: repeat(5, 1fr);">
                    @for ($i = 1; $i <= 5; $i++)
                        <div class="field">
                            <label for="number_{{ $i }}">Bola {{ $i }}</label>
                            <input
                                type="number"
                                min="0"
                                max="99"
                                id="number_{{ $i }}"
                                name="number_{{ $i }}"
                                value="{{ old('number_' . $i) }}"
                                required
                            >
                        </div>
                    @endfor
                </div>
            </fieldset>

            <fieldset>
                <legend>Fecha del sorteo</legend>
                <div class="field-row">
                    <div class="field">
                        <label for="draw_date">Fecha</label>
                        <input
                            type="date"
                            id="draw_date"
                            name="draw_date"
                            value="{{ old('draw_date') }}"
                            required
                        >
                    </div>
                </div>
            </fieldset>

            <div class="submit-row">
                <button type="submit" class="save">Agregar resultado</button>
            </div>
        </form>
    </div>

    <div class="panel">
        <h2>Historial registrado</h2>
        <p class="hint">{{ $previousDraws->total() }} resultado(s) en total.</p>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Numeros</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($previousDraws as $previousDraw)
                    <tr>
                        <td>{{ $previousDraw->draw_date->format('Y-m-d') }}</td>
                        <td>{{ collect($previousDraw->numbers())->map(fn ($n) => str_pad($n, 2, '0', STR_PAD_LEFT))->implode(' ') }}</td>
                        <td>
                            <form
                                class="delete-form"
                                method="POST"
                                action="{{ route('configuracion.historial.destroy', $previousDraw) }}"
                                onsubmit="return confirm('¿Eliminar este resultado?');"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="empty-row">Aun no has agregado resultados anteriores.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination-links">
            {{ $previousDraws->links() }}
        </div>
    </div>
@endsection
