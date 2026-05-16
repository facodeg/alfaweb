<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - AlfaApps</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
    <link rel="stylesheet" href="/assets/icons/fontawesome/css/all.min.css">
    <style>
        :root {
            --primary: #5B5FEF;
            --primary-dark: #4347D6;
            --primary-light: #8E91F4;
            --coral: #FF6B81;
            --orange: #FFA552;
            --mint: #4FD1A5;
            --bg: #F2F4F8;
            --surface: #FFFFFF;
            --surface-alt: #F7F8FB;
            --text: #1F2233;
            --muted: #7A7E92;
            --border: #E5E7EE;
            --danger: #EF4444;
            --shadow: 0 24px 70px rgba(17, 26, 64, 0.12);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            color: var(--text);
            font-family: "Plus Jakarta Sans", Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background:
                radial-gradient(circle at 12% 12%, rgba(91, 95, 239, 0.20), transparent 28rem),
                radial-gradient(circle at 88% 14%, rgba(255, 107, 129, 0.18), transparent 24rem),
                linear-gradient(135deg, #F6F7FF 0%, #F2F4F8 52%, #FFFFFF 100%);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font: inherit;
        }

        .page {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 28px;
        }

        .shell {
            width: min(1180px, 100%);
            min-height: 700px;
            display: grid;
            grid-template-columns: 1.02fr 0.98fr;
            gap: 0;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.72);
            border-radius: 36px;
            background: rgba(255, 255, 255, 0.76);
            box-shadow: var(--shadow);
            backdrop-filter: blur(18px);
        }

        .showcase {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 42px;
            overflow: hidden;
            color: #fff;
            background: linear-gradient(145deg, var(--primary), var(--primary-dark));
        }

        .showcase::before,
        .showcase::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.13);
        }

        .showcase::before {
            width: 360px;
            height: 360px;
            top: -120px;
            right: -110px;
        }

        .showcase::after {
            width: 250px;
            height: 250px;
            left: -88px;
            bottom: -72px;
        }

        .brand,
        .hero,
        .preview {
            position: relative;
            z-index: 1;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            width: fit-content;
            font-weight: 900;
        }

        .brand-mark {
            width: 56px;
            height: 56px;
            display: grid;
            place-items: center;
            border-radius: 21px;
            color: var(--primary);
            background: #fff;
            font-size: 23px;
            box-shadow: 0 18px 36px rgba(0, 0, 0, 0.15);
        }

        .brand-title {
            display: block;
            font-size: 25px;
            letter-spacing: -0.04em;
        }

        .brand-subtitle {
            display: block;
            margin-top: 2px;
            color: rgba(255, 255, 255, 0.72);
            font-size: 13px;
            font-weight: 700;
        }

        .hero {
            max-width: 470px;
        }

        .kicker {
            margin: 0 0 14px;
            color: rgba(255, 255, 255, 0.72);
            font-size: 13px;
            font-weight: 900;
            letter-spacing: 0.24em;
            text-transform: uppercase;
        }

        .hero h1 {
            margin: 0 0 18px;
            font-size: clamp(38px, 5vw, 58px);
            line-height: 1.02;
            letter-spacing: -0.06em;
        }

        .hero p {
            margin: 0;
            color: rgba(255, 255, 255, 0.82);
            font-size: 16px;
            line-height: 1.8;
        }

        .preview {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 14px;
            align-items: end;
        }

        .metric-stack {
            display: grid;
            gap: 12px;
        }

        .metric {
            padding: 16px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.13);
            backdrop-filter: blur(10px);
        }

        .metric small,
        .metric strong {
            display: block;
        }

        .metric small {
            color: rgba(255, 255, 255, 0.70);
            font-weight: 800;
        }

        .metric strong {
            margin-top: 7px;
            font-size: 22px;
        }

        .phone-card {
            min-height: 250px;
            padding: 18px;
            border-radius: 30px;
            color: var(--text);
            background: rgba(255, 255, 255, 0.93);
            box-shadow: 0 26px 60px rgba(0, 0, 0, 0.18);
        }

        .phone-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .dot {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            color: #fff;
            background: linear-gradient(135deg, var(--coral), var(--orange));
        }

        .phone-title {
            font-weight: 900;
            letter-spacing: -0.03em;
        }

        .phone-line {
            height: 12px;
            margin-bottom: 10px;
            border-radius: 999px;
            background: var(--surface-alt);
        }

        .phone-line.short {
            width: 64%;
        }

        .phone-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-top: 18px;
        }

        .phone-tile {
            padding: 14px;
            border-radius: 18px;
            background: #EEF0FF;
            color: var(--primary);
            font-weight: 900;
            font-size: 13px;
        }

        .form-panel {
            display: grid;
            place-items: center;
            padding: 42px;
            background: rgba(255, 255, 255, 0.64);
        }

        .form-wrap {
            width: 100%;
            max-width: 430px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 30px;
            color: var(--primary);
            font-size: 14px;
            font-weight: 900;
        }

        .form-title {
            margin: 0 0 10px;
            font-size: clamp(32px, 4vw, 42px);
            line-height: 1.05;
            letter-spacing: -0.055em;
        }

        .form-subtitle {
            margin: 0 0 24px;
            color: var(--muted);
            line-height: 1.75;
        }

        .alert {
            margin-bottom: 16px;
            padding: 13px 15px;
            border-radius: 16px;
            font-size: 14px;
            font-weight: 800;
        }

        .alert-success {
            color: #138A62;
            background: #E9FBF4;
        }

        .alert-danger {
            color: var(--danger);
            background: #FFF1F3;
        }

        .google-button,
        .submit-button {
            width: 100%;
            min-height: 54px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            border-radius: 18px;
            font-size: 15px;
            font-weight: 900;
            cursor: pointer;
            transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
        }

        .google-button {
            border: 1px solid var(--border);
            color: var(--text);
            background: #fff;
            box-shadow: 0 14px 32px rgba(17, 26, 64, 0.07);
        }

        .google-button:hover,
        .submit-button:hover {
            transform: translateY(-1px);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 24px 0;
            color: var(--muted);
            font-size: 13px;
            font-weight: 900;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .field {
            margin-bottom: 17px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 900;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;
            left: 17px;
            top: 50%;
            color: #A3A8BB;
            transform: translateY(-50%);
        }

        .input-wrap input {
            width: 100%;
            min-height: 54px;
            padding: 0 16px 0 46px;
            border: 1px solid var(--border);
            border-radius: 18px;
            outline: none;
            color: var(--text);
            background: var(--surface-alt);
            transition: 0.18s ease;
        }

        .input-wrap input:focus {
            border-color: var(--primary);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(91, 95, 239, 0.10);
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 4px 0 22px;
            color: var(--muted);
            font-size: 14px;
        }

        .check-label {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            cursor: pointer;
        }

        .check-label input {
            width: 17px;
            height: 17px;
            accent-color: var(--primary);
        }

        .submit-button {
            border: 0;
            color: #fff;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            box-shadow: 0 18px 36px rgba(91, 95, 239, 0.28);
        }

        .login-note {
            margin: 22px 0 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
            text-align: center;
        }

        @media (max-width: 980px) {
            .shell {
                grid-template-columns: 1fr;
                min-height: auto;
            }

            .showcase {
                gap: 34px;
                min-height: 430px;
            }
        }

        @media (max-width: 620px) {
            .page {
                padding: 14px;
            }

            .shell {
                border-radius: 28px;
            }

            .showcase {
                display: none;
            }

            .form-panel {
                padding: 28px 20px;
            }
        }
    </style>
</head>
<body>
    <main class="page">
        <section class="shell">
            <aside class="showcase">
                <a href="{{ route('home') }}" class="brand">
                    <span class="brand-mark">A</span>
                    <span>
                        <span class="brand-title">AlfaApps</span>
                        <span class="brand-subtitle">Mobile app + Web dashboard</span>
                    </span>
                </a>

                <div class="hero">
                    <p class="kicker">Personal life manager</p>
                    <h1>Satu data untuk Flutter dan Web.</h1>
                    <p>Login ke versi web untuk mengelola keuangan, target pendapatan, rencana pekerjaan, target kerja, dan jadwal yang juga dipakai oleh aplikasi Flutter.</p>
                </div>

                <div class="preview">
                    <div class="metric-stack">
                        <div class="metric">
                            <small>REST API</small>
                            <strong>Sanctum</strong>
                        </div>
                        <div class="metric">
                            <small>Google OAuth</small>
                            <strong>Ready</strong>
                        </div>
                    </div>
                    <div class="phone-card">
                        <div class="phone-top">
                            <span>
                                <span class="phone-title">Diary</span>
                                <small style="display:block;color:var(--muted);margin-top:3px">Ringkasan hari ini</small>
                            </span>
                            <span class="dot"><i class="fa-solid fa-plus"></i></span>
                        </div>
                        <div class="phone-line"></div>
                        <div class="phone-line short"></div>
                        <div class="phone-grid">
                            <div class="phone-tile">Keuangan</div>
                            <div class="phone-tile">Target</div>
                            <div class="phone-tile">Rencana</div>
                            <div class="phone-tile">Jadwal</div>
                        </div>
                    </div>
                </div>
            </aside>

            <section class="form-panel">
                <div class="form-wrap">
                    <a href="{{ route('home') }}" class="back-link">
                        <i class="fa-solid fa-arrow-left"></i>
                        Kembali ke beranda
                    </a>

                    <h2 class="form-title">Masuk ke AlfaApps</h2>
                    <p class="form-subtitle">Gunakan akun yang sama untuk dashboard web dan aplikasi Flutter.</p>

                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    <a href="{{ route('login.google') }}" class="google-button">
                        <svg width="20" height="20" viewBox="0 0 48 48" aria-hidden="true">
                            <path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303C33.654 32.657 29.223 36 24 36c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 12.955 4 4 12.955 4 24s8.955 20 20 20 20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z"/>
                            <path fill="#FF3D00" d="m6.306 14.691 6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 16.318 4 9.656 8.337 6.306 14.691z"/>
                            <path fill="#4CAF50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238C29.211 35.091 26.715 36 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44z"/>
                            <path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002 6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917z"/>
                        </svg>
                        Login dengan Google
                    </a>

                    <div class="divider">atau pakai email</div>

                    <form method="POST" action="{{ route('login.store') }}">
                        @csrf
                        <div class="field">
                            <label for="email">Email</label>
                            <div class="input-wrap">
                                <i class="fa-solid fa-envelope"></i>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus placeholder="nama@email.com">
                            </div>
                        </div>

                        <div class="field">
                            <label for="password">Password</label>
                            <div class="input-wrap">
                                <i class="fa-solid fa-lock"></i>
                                <input id="password" name="password" type="password" required placeholder="Masukkan password">
                            </div>
                        </div>

                        <div class="form-options">
                            <label class="check-label">
                                <input type="checkbox" name="remember" value="1">
                                Ingat saya
                            </label>
                        </div>

                        <button type="submit" class="submit-button">
                            Masuk Dashboard
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </form>

                    <p class="login-note">Untuk Google login, redirect URI: <strong>http://127.0.0.1:8000/auth/google/callback</strong></p>
                </div>
            </section>
        </section>
    </main>
</body>
</html>
