@extends('configuracion.layout')

@section('title', 'Textos del landing')
@section('subtitle', 'Cambia el titulo y el texto de cada seccion. Cada campo tiene un limite de caracteres para que no se desborde su espacio en el diseño.')

@section('extra-style')
    <style>
        .panel.panel-wide {
            max-width: 720px;
        }

        .field.text-field {
            margin-bottom: 18px;
        }

        .field.text-field textarea {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 14px;
            font-family: inherit;
            resize: vertical;
            min-height: 90px;
            text-align: left;
            font-weight: 400;
        }

        .field.text-field input[type="text"] {
            text-align: left;
            font-weight: 500;
        }

        .char-counter {
            margin: 6px 0 0;
            font-size: 12px;
            color: var(--text-soft);
        }
    </style>
@endsection

@section('content')
    @foreach ($slots as $item)
        <div class="panel panel-wide">
            <h2>{{ $item['label'] }}</h2>
            <p class="hint">Titulo maximo {{ $item['title_max'] }} caracteres. Texto maximo {{ $item['body_max'] }} caracteres.</p>

            <form method="POST" action="{{ route('configuracion.textos.update', $item['slot']) }}">
                @csrf
                @method('PUT')

                <div class="field text-field">
                    <label for="title_{{ $item['slot'] }}">Titulo</label>
                    <input
                        type="text"
                        id="title_{{ $item['slot'] }}"
                        name="title"
                        maxlength="{{ $item['title_max'] }}"
                        value="{{ old('title', $item['current']['title']) }}"
                        oninput="document.getElementById('title_count_{{ $item['slot'] }}').textContent = this.value.length"
                        required
                    >
                    <p class="char-counter">
                        <span id="title_count_{{ $item['slot'] }}">{{ strlen($item['current']['title']) }}</span> / {{ $item['title_max'] }} caracteres
                    </p>
                </div>

                <div class="field text-field">
                    <label for="body_{{ $item['slot'] }}">Texto</label>
                    <textarea
                        id="body_{{ $item['slot'] }}"
                        name="body"
                        maxlength="{{ $item['body_max'] }}"
                        oninput="document.getElementById('body_count_{{ $item['slot'] }}').textContent = this.value.length"
                        required
                    >{{ old('body', $item['current']['body']) }}</textarea>
                    <p class="char-counter">
                        <span id="body_count_{{ $item['slot'] }}">{{ strlen($item['current']['body']) }}</span> / {{ $item['body_max'] }} caracteres
                    </p>
                </div>

                <div class="submit-row">
                    <button type="submit" class="save">Guardar texto</button>
                </div>
            </form>
        </div>
    @endforeach
@endsection
