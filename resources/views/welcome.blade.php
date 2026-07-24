<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRAN LOTO COLOMBIA</title>
    <style>
        :root {
            --bg-dark: #0f4c3a;
            --bg-mid: #13634a;
            --bg-soft: #1a7a5a;
            --text-main: #f5f2cf;
            --text-soft: #dce9df;
            --gold: #f6cd5b;
            --gold-deep: #c5901f;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-main);
            background:
                radial-gradient(circle at 12% 18%, rgba(255, 224, 127, 0.22), transparent 32%),
                radial-gradient(circle at 78% 28%, rgba(255, 255, 255, 0.1), transparent 25%),
                linear-gradient(135deg, var(--bg-dark), var(--bg-mid) 60%, var(--bg-soft));
        }

        .card {
            width: 100%;
            min-height: 100vh;
            padding: clamp(140px, 17vw, 175px) 24px 24px;
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 26px;
            align-items: center;
            position: relative;
            isolation: isolate;
            background-image: url('{{ $backgrounds['hero'] }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .card::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            background: rgba(0, 0, 0, 0.18);
        }

        .extra-block {
            width: 100%;
            min-height: 260px;
            margin: 0;
            background-color: #ffffff;
            background-image: url("{{ $backgrounds['jackpot'] }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border: none;
            border-radius: 0;
            box-shadow: none;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            isolation: isolate;
            overflow: hidden;
        }

        .extra-block::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            background: linear-gradient(90deg, rgba(11, 8, 24, 0.7) 0%, rgba(7, 19, 28, 0.45) 45%, rgba(7, 19, 28, 0.7) 100%);
        }

        .jackpot-overlay {
            text-align: center;
            padding: 18px 16px;
        }

        .jackpot-overlay h2 {
            margin: 0;
            font-size: clamp(30px, 5vw, 62px);
            line-height: 1;
            letter-spacing: 1px;
            color: #ffd76f;
            text-shadow: 0 0 14px rgba(255, 215, 111, 0.45), 0 8px 20px rgba(0, 0, 0, 0.45);
            font-weight: 900;
        }

        .jackpot-overlay p {
            margin: 8px 0 0;
            max-width: none;
            color: #f8fbff;
            font-size: clamp(18px, 3vw, 36px);
            font-weight: 800;
            text-shadow: 0 4px 14px rgba(0, 0, 0, 0.45);
        }

        .jackpot-chip {
            display: inline-block;
            margin-top: 14px;
            padding: 8px 14px;
            border-radius: 999px;
            background: linear-gradient(180deg, #ffe9a8, #f6cd5b);
            color: #3f2a08;
            font-weight: 800;
            font-size: 14px;
            border: 1px solid #bb8a27;
        }

        .white-block {
            width: 100%;
            min-height: 460px;
            margin: 0;
            background:
                linear-gradient(100deg, rgba(34, 14, 46, 0.93) 0%, rgba(43, 16, 58, 0.9) 45%, rgba(25, 18, 44, 0.92) 100%),
                url("{{ asset('images/premio mayor.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border: none;
            padding: 34px 20px 40px;
        }

        .white-block-blank {
            background:
                linear-gradient(0deg, rgba(255, 255, 255, 0.56), rgba(255, 255, 255, 0.56)),
                url("{{ $backgrounds['resultados'] }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 620px;
            padding: 30px 16px 38px;
        }

        .results-shell {
            width: min(1120px, 100%);
            margin: 0 auto;
        }

        .results-title {
            margin: 0 0 18px;
            text-align: center;
            color: #1f2937;
            font-size: clamp(30px, 4vw, 44px);
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .year-filter {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin: 0 0 22px;
        }

        .year-filter label {
            font-size: 14px;
            font-weight: 700;
            color: #1f2937;
        }

        .year-filter select {
            padding: 8px 16px;
            border-radius: 8px;
            border: 1.5px solid var(--gold-deep);
            background: #ffffff;
            color: #1f2937;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
        }

        .year-filter select:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(246, 205, 91, 0.35);
        }

        .results-empty {
            text-align: center;
            color: #6b7280;
            font-size: 15px;
            grid-column: 1 / -1;
        }

        .results-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
        }

        .month-card {
            background: #f8fafc;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            padding: 12px;
        }

        .month-card h4 {
            margin: 0 0 8px;
            color: #111827;
            font-size: 22px;
            font-weight: 800;
        }

        .month-card ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 7px;
        }

        .month-card li {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            color: #1f2937;
            font-size: 13px;
            line-height: 1.25;
            border-bottom: 1px dashed #d1d5db;
            padding-bottom: 5px;
        }

        .month-card li:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .draw-date {
            color: #374151;
            font-weight: 600;
            white-space: nowrap;
        }

        .draw-numbers {
            color: #111827;
            font-weight: 700;
            text-align: right;
        }

        .draw-super {
            color: #b3161a;
            margin-left: 4px;
        }

        .content-shell {
            width: min(1120px, 100%);
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 30px;
            align-items: center;
        }

        .info-panel {
            color: #f8eefc;
        }

        .info-title {
            margin: 0 0 10px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(34px, 5vw, 58px);
            line-height: 0.98;
            color: #ffffff;
            letter-spacing: 0.5px;
        }

        .info-subtitle {
            margin: 0 0 16px;
            color: #f8c8ff;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 0.7px;
        }

        .info-divider {
            width: 110px;
            height: 3px;
            background: linear-gradient(90deg, #f6cd5b, #d99cff);
            border-radius: 20px;
            margin: 0 0 18px;
        }

        .info-description {
            margin: 0;
            max-width: none;
            color: #e7dcf2;
            font-size: clamp(16px, 2vw, 21px);
            line-height: 1.5;
        }

        .image-panel {
            display: flex;
            justify-content: center;
        }

        .feature-image {
            width: 100%;
            max-width: 520px;
            border-radius: 16px;
            border: 4px solid rgba(255, 255, 255, 0.8);
            display: block;
            box-shadow: 0 22px 56px rgba(7, 3, 15, 0.45);
            object-fit: cover;
            aspect-ratio: 16 / 10;
        }

        .badge {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 999px;
            background: rgba(246, 205, 91, 0.22);
            color: #fff2b5;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 18px;
            border: 1px solid rgba(246, 205, 91, 0.45);
        }

        h1 {
            margin: 0 0 14px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(34px, 5.2vw, 72px);
            line-height: 0.98;
            text-wrap: balance;
        }

        p {
            margin: 0;
            max-width: 56ch;
            color: var(--text-soft);
            font-size: clamp(16px, 2.1vw, 20px);
            line-height: 1.6;
        }

        .cta {
            margin-top: 28px;
            display: inline-block;
            text-decoration: none;
            background: linear-gradient(180deg, #ffd973, var(--gold));
            color: #3f2a08;
            padding: 13px 24px;
            border-radius: 12px;
            font-weight: 700;
            border: 1px solid var(--gold-deep);
            transition: transform 0.15s ease, box-shadow 0.15s ease;
            box-shadow: 0 8px 24px rgba(34, 26, 7, 0.28);
        }

        .cta:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 26px rgba(34, 26, 7, 0.36);
        }

        .admin-shortcut {
            position: fixed;
            bottom: 22px;
            right: 22px;
            z-index: 50;
            text-decoration: none;
            background: linear-gradient(180deg, #ffd973, var(--gold));
            color: #3f2a08;
            padding: 12px 20px;
            border-radius: 999px;
            font-weight: 700;
            font-size: 14px;
            border: 1px solid var(--gold-deep);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.35);
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .admin-shortcut:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.4);
        }

        .hero-copy {
            max-width: 800px;
            padding-left: clamp(8px, 4vw, 64px);
        }

        .corner-logo {
            position: absolute;
            top: 20px;
            width: clamp(100px, 9.5vw, 150px);
            height: auto;
            z-index: 3;
            filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.45));
        }

        .corner-logo--left {
            left: 20px;
        }

        .corner-logo--right {
            right: 20px;
        }

        .winner-card {
            justify-self: end;
            width: min(460px, 100%);
            background: transparent;
            color: #111827;
            border-radius: 14px;
            padding: 28px;
            box-shadow: none;
            border: none;
        }

        .winner-card h3 {
            margin: 0 0 16px;
            font-size: clamp(24px, 3.2vw, 30px);
            color: #ffffff;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.65), 0 1px 2px rgba(0, 0, 0, 0.85);
        }

        .winner-balls {
            display: flex;
            flex-wrap: nowrap;
            gap: clamp(6px, 1.6vw, 12px);
            margin: 0;
        }

        .winner-ball {
            flex: 0 0 auto;
            width: clamp(38px, 7vw, 56px);
            height: clamp(38px, 7vw, 56px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at 32% 26%, #fff6d1 0%, #ffd76a 35%, #f0b429 65%, #b9790a 100%);
            border: 1px solid #8a5a06;
            color: #1a1205;
            font-weight: 800;
            font-size: clamp(19px, 3.5vw, 29px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.35), inset 0 -4px 6px rgba(0, 0, 0, 0.15), inset 0 3px 5px rgba(255, 255, 255, 0.6);
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .winner-ball--super {
            background: radial-gradient(circle at 32% 26%, #ff9a9a 0%, #e2312d 35%, #b3161a 65%, #7a0d10 100%);
            border-color: #5c0a0d;
            color: #0a0a0a;
            text-shadow: 0 1px 1px rgba(255, 255, 255, 0.35);
        }

        .winner-draw {
            display: inline-block;
            margin: 20px 0 0;
            padding: 12px 26px;
            font-size: clamp(24px, 3.2vw, 30px);
            color: #ffffff;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.65), 0 1px 2px rgba(0, 0, 0, 0.85);
            border: 1.5px solid #d4af37;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.14);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.55), inset 0 -1px 0 rgba(0, 0, 0, 0.35), 0 2px 6px rgba(0, 0, 0, 0.25);
        }

        /* --- Animaciones e interaccion --- */

        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes logoDrop {
            from {
                opacity: 0;
                transform: translateY(-16px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes ballPop {
            0% {
                opacity: 0;
                transform: scale(0.4) translateY(12px);
            }
            65% {
                opacity: 1;
                transform: scale(1.12) translateY(-3px);
            }
            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .corner-logo {
            animation: logoDrop 0.7s cubic-bezier(0.22, 1, 0.36, 1) both;
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        .corner-logo--left:hover {
            transform: scale(1.08) rotate(-4deg);
        }

        .corner-logo--right:hover {
            transform: scale(1.08) rotate(4deg);
        }

        .hero-copy .cta {
            animation: fadeSlideUp 0.8s cubic-bezier(0.22, 1, 0.36, 1) 0.35s both;
        }

        .winner-card {
            animation: fadeSlideUp 0.8s cubic-bezier(0.22, 1, 0.36, 1) 0.25s both;
        }

        .winner-ball {
            animation: ballPop 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) both;
            transition: transform 0.5s cubic-bezier(0.45, 0, 0.2, 1), box-shadow 0.3s ease;
        }

        .winner-ball:hover {
            transform: perspective(320px) rotateY(360deg) scale(1.1);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.4), inset 0 -4px 6px rgba(0, 0, 0, 0.15), inset 0 3px 5px rgba(255, 255, 255, 0.6);
        }

        .jackpot-overlay h2 {
            transition: text-shadow 0.3s ease;
        }

        .extra-block:hover .jackpot-overlay h2 {
            text-shadow: 0 0 22px rgba(255, 215, 111, 0.7), 0 8px 20px rgba(0, 0, 0, 0.45);
        }

        /* Letreros y textos: pequeño "salto" individual al pasar el mouse */
        .jackpot-overlay h2,
        .jackpot-overlay p,
        .info-title,
        .info-subtitle,
        .info-description,
        .results-title,
        .winner-card h3,
        .winner-draw,
        .month-card h4 {
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            cursor: default;
        }

        .jackpot-overlay h2:hover,
        .jackpot-overlay p:hover,
        .info-title:hover,
        .info-subtitle:hover,
        .info-description:hover,
        .results-title:hover,
        .winner-card h3:hover,
        .winner-draw:hover,
        .month-card h4:hover {
            transform: scale(1.045) translateY(-2px);
        }

        .feature-image {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .image-panel:hover .feature-image {
            transform: scale(1.02);
            box-shadow: 0 26px 60px rgba(7, 3, 15, 0.55);
        }

        .month-card {
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        }

        .month-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
            border-color: var(--gold-deep);
        }

        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(26px);
            transition: opacity 0.7s cubic-bezier(0.22, 1, 0.36, 1), transform 0.7s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .reveal-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            .corner-logo,
            .hero-copy .cta,
            .winner-card,
            .winner-ball,
            .winner-ball:hover {
                animation: none !important;
            }

            .reveal-on-scroll {
                opacity: 1;
                transform: none;
                transition: none;
            }

            .winner-ball:hover,
            .month-card:hover,
            .image-panel:hover .feature-image,
            .jackpot-overlay h2:hover,
            .jackpot-overlay p:hover,
            .info-title:hover,
            .info-subtitle:hover,
            .info-description:hover,
            .results-title:hover,
            .winner-card h3:hover,
            .winner-draw:hover,
            .month-card h4:hover {
                transform: none;
            }
        }

        @media (max-width: 900px) {
            .card {
                grid-template-columns: 1fr;
                padding: 132px 20px 42px;
            }

            .corner-logo {
                width: 80px;
            }

            .extra-block {
                width: 100%;
                min-height: 220px;
                margin: 0;
            }

            .jackpot-overlay h2 {
                letter-spacing: 0.4px;
            }

            .white-block {
                min-height: 380px;
                padding: 24px 14px 32px;
            }

            .white-block-blank {
                min-height: 520px;
                padding: 24px 12px 30px;
            }

            .results-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .month-card h4 {
                font-size: 20px;
            }

            .content-shell {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .info-title {
                font-size: clamp(30px, 8vw, 46px);
            }

            .info-description {
                font-size: 17px;
            }

            .hero-copy {
                padding-left: 0;
            }

            .winner-card {
                justify-self: start;
            }
        }
    </style>
</head>
<body>
    @auth
        @if (auth()->user()->isAdmin())
            <a href="{{ route('configuracion.edit') }}" class="admin-shortcut">Configuracion</a>
        @endif
    @endauth

    <main class="card">
        <img src="{{ asset('images/logo.png') }}" alt="Gran Loto Colombia" class="corner-logo corner-logo--left">
        <img src="{{ asset('images/logo.png') }}" alt="Gran Loto Colombia" class="corner-logo corner-logo--right">

        <section class="hero-copy">
            <h1>{{ $texts['hero']['title'] }}</h1>
            <p>{{ $texts['hero']['body'] }}</p>
            <a href="#" class="cta">Verificar Sorteos</a>
        </section>

        <aside class="winner-card" aria-label="Resultado destacado">
            <h3>Numero ganador</h3>
            <div class="winner-balls">@foreach ($draw->mainNumbers() as $winnerNumber)<span class="winner-ball" style="animation-delay: {{ 0.3 + $loop->index * 0.08 }}s">{{ str_pad($winnerNumber, 2, '0', STR_PAD_LEFT) }}</span>@endforeach<span class="winner-ball winner-ball--super" style="animation-delay: {{ 0.3 + count($draw->mainNumbers()) * 0.08 }}s">{{ str_pad($draw->super_number, 2, '0', STR_PAD_LEFT) }}</span></div>
            <p class="winner-draw">Sorteo: {{ $draw->draw_number }}</p>
        </aside>
    </main>

    <section class="extra-block" aria-label="Bloque de premio mayor">
        <div class="jackpot-overlay reveal-on-scroll">
            <h2>{{ $texts['jackpot']['title'] }}</h2>
            <p>{{ $texts['jackpot']['body'] }}</p>
            <span class="jackpot-chip">Sorteo destacado</span>
        </div>
    </section>

    <section class="white-block" aria-label="Modulo informativo de la landing">
        <div class="content-shell reveal-on-scroll">
            <aside class="image-panel" aria-label="Imagen de la promocion">
                <img class="feature-image" src="{{ $backgrounds['promo'] }}" alt="Imagen promocional de la landing">
            </aside>

            <article class="info-panel">
                <h3 class="info-title">{{ $texts['promo']['title'] }}</h3>
                <p class="info-subtitle">PLATAFORMA SEGURA DE SORTEOS VIRTUALES</p>
                <div class="info-divider" aria-hidden="true"></div>
                <p class="info-description">{{ $texts['promo']['body'] }}</p>
            </article>
        </div>
    </section>

    <section class="white-block white-block-blank" id="resultados-anteriores" aria-label="Modulo de resultados por mes">
        <div class="results-shell">
            <h3 class="results-title reveal-on-scroll">Resultados Anteriores</h3>

            @if ($years->isNotEmpty())
                <form method="GET" action="{{ route('landing') }}#resultados-anteriores" class="year-filter">
                    <label for="anio">Filtrar por año</label>
                    <select name="anio" id="anio" onchange="this.form.submit()">
                        @foreach ($years as $year)
                            <option value="{{ $year }}" @selected($year == $selectedYear)>{{ $year }}</option>
                        @endforeach
                    </select>
                </form>
            @endif

            <div class="results-grid">
                @forelse ($previousDraws as $monthKey => $monthDraws)
                    <article class="month-card reveal-on-scroll" style="transition-delay: {{ $loop->index * 0.08 }}s">
                        <h4>{{ ucfirst(\Carbon\Carbon::createFromFormat('Y-m', $monthKey)->locale('es')->translatedFormat('F Y')) }}</h4>
                        <ul>
                            @foreach ($monthDraws as $previousDraw)
                                <li>
                                    <span class="draw-date">{{ $previousDraw->draw_date->format('Y-m-d') }}</span>
                                    <span class="draw-numbers">
                                        {{ collect($previousDraw->numbers())->map(fn ($n) => str_pad($n, 2, '0', STR_PAD_LEFT))->implode(' ') }}
                                        @if (! is_null($previousDraw->super_number))
                                            <span class="draw-super">{{ str_pad($previousDraw->super_number, 2, '0', STR_PAD_LEFT) }}</span>
                                        @endif
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </article>
                @empty
                    <p class="results-empty">
                        @if ($selectedYear)
                            Aun no hay resultados anteriores para {{ $selectedYear }}.
                        @else
                            Aun no hay resultados anteriores registrados.
                        @endif
                    </p>
                @endforelse
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Una vez termina la animacion de entrada, se libera "transform"
            // para que las transiciones de :hover (giro, sobresalto) funcionen.
            var entranceTargets = document.querySelectorAll(
                '.corner-logo, .hero-copy .cta, .winner-card, .winner-ball'
            );

            entranceTargets.forEach(function (el) {
                el.addEventListener('animationend', function () {
                    el.style.animation = 'none';
                }, { once: true });
            });

            var revealTargets = document.querySelectorAll('.reveal-on-scroll');

            if (!('IntersectionObserver' in window) || revealTargets.length === 0) {
                revealTargets.forEach(function (el) { el.classList.add('is-visible'); });
                return;
            }

            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });

            revealTargets.forEach(function (el) { observer.observe(el); });
        });
    </script>
</body>
</html>
