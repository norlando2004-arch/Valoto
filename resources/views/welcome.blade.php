<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valoto | Landing</title>
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
            background-image: url('{{ asset('images/imagenvaloto1.webp') }}');
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
            background-image: url("{{ asset('images/premio mayor.png') }}");
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
                url("{{ asset('images/resultados.png') }}");
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
            font-size: clamp(13px, 2vw, 19px);
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
    <main class="card">
        <img src="{{ asset('images/logo.png') }}" alt="Gran Loto Colombia" class="corner-logo corner-logo--left">
        <img src="{{ asset('images/logo.png') }}" alt="Gran Loto Colombia" class="corner-logo corner-logo--right">

        <section class="hero-copy">
            <h1>La fortuna llama<br>a tu puerta</h1>
            <p>
                Participa en nuestros sorteos y vive la adrenalina de ganar.
                Esta version optimizada busca una apariencia promocional de alta gama, inspirada en las mejores referencias.
            </p>
            <a href="#" class="cta">Verificar Sorteos</a>
        </section>

        <aside class="winner-card" aria-label="Resultado destacado">
            <h3>Numero ganador</h3>
            <div class="winner-balls">@foreach (['02', '11', '19', '27', '40', '05'] as $winnerNumber)<span @class(['winner-ball', 'winner-ball--super' => $loop->last])>{{ $winnerNumber }}</span>@endforeach</div>
            <p class="winner-draw">Sorteo: 2531</p>
        </aside>
    </main>

    <section class="extra-block" aria-label="Bloque de premio mayor">
        <div class="jackpot-overlay">
            <h2>PREMIO MAYOR!</h2>
            <p>4.150 Millones de Pesos</p>
            <span class="jackpot-chip">Sorteo destacado</span>
        </div>
    </section>

    <section class="white-block" aria-label="Modulo informativo de la landing">
        <div class="content-shell">
            <aside class="image-panel" aria-label="Imagen de la promocion">
                <img class="feature-image" src="{{ asset('images/imagenvaloto1.webp') }}" alt="Imagen promocional de la landing">
            </aside>

            <article class="info-panel">
                <h3 class="info-title">GRANLOTO MILLONARIA</h3>
                <p class="info-subtitle">PLATAFORMA SEGURA DE SORTEOS VIRTUALES</p>
                <div class="info-divider" aria-hidden="true"></div>
                <p class="info-description">
                    GRANLOTO MILLONARIA es una plataforma dedicada a sorteos virtuales,
                    pensada para que todos puedan participar de forma sencilla. Te ofrecemos
                    una experiencia clara, opciones de premios destacadas y promociones que
                    hacen cada jugada mas emocionante.
                </p>
            </article>
        </div>
    </section>

    <section class="white-block white-block-blank" aria-label="Modulo de resultados por mes">
        <div class="results-shell">
            <h3 class="results-title">Resultados Anteriores</h3>

            <div class="results-grid">
                <article class="month-card">
                    <h4>Julio 2026</h4>
                    <ul>
                        <li><span class="draw-date">2026-07-01</span><span class="draw-numbers">15 24 28 30 11</span></li>
                        <li><span class="draw-date">2026-07-04</span><span class="draw-numbers">03 07 21 40 02</span></li>
                        <li><span class="draw-date">2026-07-08</span><span class="draw-numbers">02 23 39 40 04</span></li>
                        <li><span class="draw-date">2026-07-11</span><span class="draw-numbers">10 15 19 31 13</span></li>
                        <li><span class="draw-date">2026-07-15</span><span class="draw-numbers">11 20 36 61 01</span></li>
                    </ul>
                </article>

                <article class="month-card">
                    <h4>Junio 2026</h4>
                    <ul>
                        <li><span class="draw-date">2026-06-03</span><span class="draw-numbers">11 20 37 38 02</span></li>
                        <li><span class="draw-date">2026-06-06</span><span class="draw-numbers">04 10 13 34 07</span></li>
                        <li><span class="draw-date">2026-06-10</span><span class="draw-numbers">13 16 99 30 10</span></li>
                        <li><span class="draw-date">2026-06-17</span><span class="draw-numbers">05 17 27 30 11</span></li>
                        <li><span class="draw-date">2026-06-27</span><span class="draw-numbers">02 11 25 32 15</span></li>
                    </ul>
                </article>

                <article class="month-card">
                    <h4>Mayo 2026</h4>
                    <ul>
                        <li><span class="draw-date">2026-05-02</span><span class="draw-numbers">09 18 19 22 08</span></li>
                        <li><span class="draw-date">2026-05-06</span><span class="draw-numbers">11 12 20 30 03</span></li>
                        <li><span class="draw-date">2026-05-13</span><span class="draw-numbers">20 23 25 28 84</span></li>
                        <li><span class="draw-date">2026-05-20</span><span class="draw-numbers">04 17 23 39 12</span></li>
                        <li><span class="draw-date">2026-05-27</span><span class="draw-numbers">08 23 37 94 14</span></li>
                    </ul>
                </article>

                <article class="month-card">
                    <h4>Abril 2026</h4>
                    <ul>
                        <li><span class="draw-date">2026-04-01</span><span class="draw-numbers">09 11 15 28 04</span></li>
                        <li><span class="draw-date">2026-04-08</span><span class="draw-numbers">07 18 29 33 11</span></li>
                        <li><span class="draw-date">2026-04-15</span><span class="draw-numbers">11 15 20 25 09</span></li>
                        <li><span class="draw-date">2026-04-22</span><span class="draw-numbers">05 22 25 27 14</span></li>
                        <li><span class="draw-date">2026-04-29</span><span class="draw-numbers">04 12 13 31 08</span></li>
                    </ul>
                </article>
            </div>
        </div>
    </section>
</body>
</html>
