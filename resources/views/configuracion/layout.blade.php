<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Configuracion') | Baloto</title>
    <style>
        :root {
            --bg-dark: #0f4c3a;
            --bg-mid: #13634a;
            --gold: #f6cd5b;
            --gold-deep: #c5901f;
            --text-main: #1f2937;
            --text-soft: #6b7280;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f4f6;
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 260px;
            flex-shrink: 0;
            background: linear-gradient(180deg, var(--bg-dark), var(--bg-mid));
            color: #f5f2cf;
            padding: 28px 20px;
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-user {
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid rgba(245, 242, 207, 0.15);
        }

        .sidebar-user-name {
            margin: 0 0 10px;
            font-size: 13px;
            font-weight: 600;
            color: #e5f4ea;
        }

        .sidebar-logout {
            width: 100%;
            background: rgba(255, 255, 255, 0.06);
            color: #f5f2cf;
            border: 1px solid rgba(245, 242, 207, 0.25);
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .sidebar-logout:hover {
            background: rgba(255, 255, 255, 0.12);
        }

        .sidebar-brand {
            font-size: 20px;
            font-weight: 800;
            color: var(--gold);
            margin: 0 0 20px;
            letter-spacing: 0.5px;
        }

        .sidebar-back {
            display: inline-block;
            margin: 0 0 24px;
            color: #e5f4ea;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            opacity: 0.85;
        }

        .sidebar-back:hover {
            opacity: 1;
            text-decoration: underline;
        }

        .sidebar-nav {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 6px;
        }

        .sidebar-nav a {
            display: block;
            padding: 11px 14px;
            border-radius: 8px;
            color: #e5f4ea;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .sidebar-nav a.active {
            background: rgba(246, 205, 91, 0.16);
            color: var(--gold);
            border: 1px solid rgba(246, 205, 91, 0.4);
        }

        .content {
            flex: 1;
            min-width: 0;
            padding: 40px clamp(20px, 4vw, 56px);
        }

        .content-header h1 {
            margin: 0 0 4px;
            font-size: clamp(20px, 3vw, 26px);
        }

        .content-header p {
            margin: 0 0 28px;
            color: var(--text-soft);
            font-size: 14px;
        }

        .status {
            background: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 22px;
            font-size: 14px;
            font-weight: 600;
        }

        .errors {
            background: #fee2e2;
            border: 1px solid #fca5a5;
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 22px;
            font-size: 14px;
        }

        .errors ul {
            margin: 4px 0 0;
            padding-left: 18px;
        }

        .panel {
            background: #ffffff;
            border-radius: 14px;
            padding: 28px;
            max-width: 720px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
            border: 1px solid #e5e7eb;
        }

        .panel + .panel {
            margin-top: 24px;
        }

        .panel h2 {
            margin: 0 0 6px;
            font-size: 18px;
        }

        .panel .hint {
            margin: 0 0 22px;
            font-size: 13px;
            color: var(--text-soft);
        }

        fieldset {
            border: none;
            margin: 0 0 24px;
            padding: 0;
        }

        legend {
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            color: var(--text-soft);
            margin-bottom: 12px;
        }

        .balls-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 10px;
        }

        .field label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
            color: var(--text-main);
        }

        .field input,
        .field select {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 15px;
            text-align: center;
            font-weight: 700;
        }

        .field input:focus,
        .field select:focus {
            outline: none;
            border-color: var(--gold-deep);
            box-shadow: 0 0 0 3px rgba(246, 205, 91, 0.25);
        }

        .field.super input {
            border-color: #dc2626;
            color: #991b1b;
        }

        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .field-row .field input,
        .field-row .field select {
            text-align: left;
            font-weight: 500;
        }

        .role-form {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .role-form select {
            padding: 6px 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            font-size: 13px;
        }

        .role-form button {
            background: #e5e7eb;
            color: var(--text-main);
            border: 1px solid #d1d5db;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .role-form button:hover {
            background: #d1d5db;
        }

        .role-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .role-badge.admin {
            background: rgba(246, 205, 91, 0.2);
            color: var(--gold-deep);
        }

        .role-badge.user {
            background: #e5e7eb;
            color: var(--text-soft);
        }

        .actions-cell {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .submit-row {
            margin-top: 8px;
        }

        button.save {
            background: linear-gradient(180deg, #ffd973, var(--gold));
            color: #3f2a08;
            border: 1px solid var(--gold-deep);
            padding: 12px 26px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
        }

        button.save:hover {
            filter: brightness(1.03);
        }

        .table-scroll {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table.data-table {
            width: 100%;
            min-width: 520px;
            border-collapse: collapse;
            font-size: 14px;
        }

        table.data-table th {
            text-align: left;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            color: var(--text-soft);
            padding: 8px 10px;
            border-bottom: 2px solid #e5e7eb;
        }

        table.data-table td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
            font-weight: 600;
        }

        table.data-table tr:last-child td {
            border-bottom: none;
        }

        .delete-form button {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .delete-form button:hover {
            background: #fecaca;
        }

        .empty-row {
            padding: 18px 10px;
            color: var(--text-soft);
            text-align: center;
        }

        .pagination-links {
            margin-top: 18px;
        }

        /* Tablet: la barra lateral se mantiene fija pero mas angosta para dejar
           mas espacio al contenido (ej. iPad en horizontal, laptops pequeños). */
        @media (max-width: 1100px) {
            .sidebar {
                width: 210px;
                padding: 24px 16px;
            }
        }

        /* Tablet en vertical / pantallas medianas: la barra lateral pasa a ser
           una franja horizontal arriba del contenido, igual que en movil. */
        @media (max-width: 880px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 18px 20px;
                position: static;
                height: auto;
                overflow-y: visible;
            }

            .sidebar-nav {
                grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            }

            .sidebar-user {
                margin-top: 18px;
                padding-top: 16px;
            }

            .content {
                padding: 28px clamp(16px, 4vw, 40px);
            }

            .field-row {
                grid-template-columns: 1fr;
            }
        }

        /* Movil: reducimos aun mas el espaciado y compactamos las balotas. */
        @media (max-width: 640px) {
            .panel {
                padding: 20px;
            }

            .balls-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            table.data-table {
                font-size: 12px;
            }

            .content .upload-row input[type="file"] {
                min-width: 0;
                width: 100%;
            }

            .actions-cell {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 380px) {
            .balls-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-header p {
                font-size: 13px;
            }
        }

        @yield('extra-style')
    </style>
</head>
<body>
    <aside class="sidebar">
        <p class="sidebar-brand">Panel Administrador</p>

        <a href="{{ route('landing') }}" class="sidebar-back">&larr; Volver al inicio</a>

        <ul class="sidebar-nav">
            <li><a href="{{ route('configuracion.edit') }}" @class(['active' => request()->routeIs('configuracion.edit')])>Resultado del sorteo</a></li>
            <li><a href="{{ route('configuracion.historial.index') }}" @class(['active' => request()->routeIs('configuracion.historial.*')])>Resultados anteriores</a></li>
            <li><a href="{{ route('configuracion.imagenes.edit') }}" @class(['active' => request()->routeIs('configuracion.imagenes.*')])>Imagenes de fondo</a></li>
            <li><a href="{{ route('configuracion.textos.edit') }}" @class(['active' => request()->routeIs('configuracion.textos.*')])>Textos del landing</a></li>
            <li><a href="{{ route('configuracion.usuarios.index') }}" @class(['active' => request()->routeIs('configuracion.usuarios.*')])>Personas registradas</a></li>
        </ul>

        <div class="sidebar-user">
            <p class="sidebar-user-name">{{ auth()->user()->name }}</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-logout">Cerrar sesion</button>
            </form>
        </div>
    </aside>

    <main class="content">
        <div class="content-header">
            <h1>@yield('title', 'Configuracion')</h1>
            <p>@yield('subtitle')</p>
        </div>

        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="errors">
                Revisa los siguientes campos:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <script>
        document.querySelectorAll('.balls-grid input').forEach(function (input) {
            function pad() {
                var digits = input.value.replace(/\D/g, '').slice(0, 2);
                input.value = digits === '' ? '' : digits.padStart(2, '0');
            }

            input.addEventListener('input', function () {
                input.value = input.value.replace(/\D/g, '').slice(0, 2);
            });
            input.addEventListener('blur', pad);
            pad();
        });
    </script>
</body>
</html>
