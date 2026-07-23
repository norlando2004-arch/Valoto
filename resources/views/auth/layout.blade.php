<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Acceso') | Valoto</title>
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
            min-height: 100vh;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--bg-dark), var(--bg-mid));
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .auth-card {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        .auth-brand {
            font-size: 20px;
            font-weight: 800;
            color: var(--gold-deep);
            margin: 0 0 6px;
        }

        .auth-card h1 {
            margin: 0 0 24px;
            font-size: 22px;
            color: var(--text-main);
        }

        .field {
            margin-bottom: 16px;
        }

        .field label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
            color: var(--text-main);
        }

        .field input {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 14px;
        }

        .field input:focus {
            outline: none;
            border-color: var(--gold-deep);
            box-shadow: 0 0 0 3px rgba(246, 205, 91, 0.25);
        }

        .field-check {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--text-soft);
            margin-bottom: 20px;
        }

        button.save {
            width: 100%;
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

        .auth-switch {
            margin-top: 20px;
            text-align: center;
            font-size: 13px;
            color: var(--text-soft);
        }

        .auth-switch a {
            color: var(--gold-deep);
            font-weight: 700;
            text-decoration: none;
        }

        .errors {
            background: #fee2e2;
            border: 1px solid #fca5a5;
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .errors ul {
            margin: 4px 0 0;
            padding-left: 18px;
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <p class="auth-brand">Valoto Admin</p>
        <h1>@yield('heading')</h1>

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
    </div>
</body>
</html>
