@extends('configuracion.layout')

@section('title', 'Imagenes de fondo')
@section('subtitle', 'Cambia la imagen de cada seccion del landing. Cada seccion tiene su propio espacio: subir una imagen nueva reemplaza solo la de esa seccion.')

@section('extra-style')
    <style>
        .panel.panel-wide {
            max-width: 960px;
        }

        .image-slot-frame {
            width: 100%;
            overflow: hidden;
            border-radius: 10px;
            border: 1px solid #d1d5db;
            margin-bottom: 6px;
            background: #f3f4f6;
        }

        .image-slot-preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        .image-slot-hint {
            margin: 0 0 16px;
            font-size: 12px;
            color: var(--text-soft);
        }

        /* Cada seccion del landing tiene un espacio distinto: el marco de la
           vista previa respeta esa misma proporcion para que la imagen nunca
           se salga de su espacio ni engañe al elegirla. */
        .image-slot-frame[data-slot="hero"] {
            aspect-ratio: 21 / 9;
        }

        .image-slot-frame[data-slot="jackpot"] {
            aspect-ratio: 21 / 5;
        }

        .image-slot-frame[data-slot="promo"] {
            aspect-ratio: 16 / 10;
            max-width: 420px;
        }

        .image-slot-frame[data-slot="resultados"] {
            aspect-ratio: 21 / 10;
        }

        .image-slot-tag {
            display: inline-block;
            font-size: 12px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 999px;
            margin-bottom: 14px;
        }

        .image-slot-tag.custom {
            background: #dcfce7;
            color: #166534;
        }

        .image-slot-tag.default {
            background: #e5e7eb;
            color: #374151;
        }

        .upload-row {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        .upload-row input[type="file"] {
            flex: 1;
            min-width: 220px;
            font-size: 13px;
        }
    </style>
@endsection

@section('content')
    @foreach ($slots as $item)
        <div class="panel panel-wide">
            <h2>{{ $item['label'] }}</h2>
            <span class="image-slot-tag {{ $item['isCustom'] ? 'custom' : 'default' }}">
                {{ $item['isCustom'] ? 'Imagen personalizada' : 'Imagen por defecto' }}
            </span>

            <div class="image-slot-frame" data-slot="{{ $item['slot'] }}">
                <img
                    src="{{ $item['preview'] }}"
                    alt="Vista previa de {{ $item['label'] }}"
                    class="image-slot-preview"
                >
            </div>
            <p class="image-slot-hint">Vista previa a la proporcion real que ocupa en el landing.</p>

            <form
                method="POST"
                action="{{ route('configuracion.imagenes.update', $item['slot']) }}"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="upload-row">
                    <input type="file" name="image" accept="image/png,image/jpeg,image/webp" required>
                    <button type="submit" class="save">Actualizar imagen</button>
                </div>
                <p class="hint" style="margin-top: 10px; margin-bottom: 0;">JPG, PNG o WEBP, maximo 8 MB.</p>
            </form>
        </div>
    @endforeach
@endsection
