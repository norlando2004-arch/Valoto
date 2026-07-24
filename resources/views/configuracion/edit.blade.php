@extends('configuracion.layout')

@section('title', 'Configuracion')
@section('subtitle', 'Actualiza el numero ganador que se muestra en el landing.')

@section('content')
    <div class="panel">
        <h2>Resultado destacado</h2>
        <p class="hint">Estos valores se reflejan de inmediato en la seccion "Numero ganador" del landing.</p>

        <form method="POST" action="{{ route('configuracion.update') }}">
            @csrf
            @method('PUT')

            <fieldset>
                <legend>Numeros ganadores (balotas doradas)</legend>
                <div class="balls-grid">
                    @for ($i = 1; $i <= 5; $i++)
                        <div class="field">
                            <label for="number_{{ $i }}">Bola {{ $i }}</label>
                            <input
                                type="text"
                                inputmode="numeric"
                                maxlength="2"
                                id="number_{{ $i }}"
                                name="number_{{ $i }}"
                                value="{{ str_pad(old('number_' . $i, $draw->{'number_' . $i}), 2, '0', STR_PAD_LEFT) }}"
                                required
                            >
                        </div>
                    @endfor

                    <div class="field super">
                        <label for="super_number">Superbalota</label>
                        <input
                            type="text"
                            inputmode="numeric"
                            maxlength="2"
                            id="super_number"
                            name="super_number"
                            value="{{ str_pad(old('super_number', $draw->super_number), 2, '0', STR_PAD_LEFT) }}"
                            required
                        >
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Datos del sorteo</legend>
                <div class="field-row">
                    <div class="field">
                        <label for="draw_number">Numero de sorteo</label>
                        <input
                            type="number"
                            min="1"
                            id="draw_number"
                            name="draw_number"
                            value="{{ old('draw_number', $draw->draw_number) }}"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="draw_date">Fecha del sorteo</label>
                        <input
                            type="date"
                            id="draw_date"
                            name="draw_date"
                            value="{{ old('draw_date', $draw->draw_date->format('Y-m-d')) }}"
                            required
                        >
                    </div>
                </div>
            </fieldset>

            <div class="submit-row">
                <button type="submit" class="save">Guardar cambios</button>
            </div>
        </form>
    </div>
@endsection
