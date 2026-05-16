<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name', 'AlfaWeb') }}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
    <link rel="stylesheet" href="/assets/icons/fontawesome/css/all.min.css">
    <style>
        :root {
            --primary: #ff3d1f;
            --primary-dark: #d92b12;
            --dark: #171725;
            --muted: #7a7f91;
            --border: #e7e9f2;
            --surface: #ffffff;
            --soft: #f5f7fb;
            --danger: #f1416c;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: var(--dark);
            background:
                radial-gradient(circle at top left, rgba(255, 61, 31, 0.18), transparent 28rem),
                linear-gradient(135deg, #fff7f4 0%, #f4f7ff 48%, #f8fafc 100%);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .login-page {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 32px 18px;
        }

        .login-shell {
            width: min(1120px, 100%);
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            min-height: 660px;
            overflow: hidden;
            border-radius: 34px;
            background: var(--surface);
            box-shadow: 0 28px 80px rgba(21, 31, 55, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.72);
        }

        .brand-panel {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 46px;
            color: #fff;
            background:
                linear-gradient(145deg, rgba(255, 61, 31, 0.96), rgba(209, 43, 18, 0.96)),
                url('/assets/images/pattern/pattern1.png');
            overflow: hidden;
        }

        .brand-panel::before,
        .brand-panel::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.14);
        }

        .brand-panel::before {
            width: 280px;
            height: 280px;
            right: -90px;
            top: -80px;
        }

        .brand-panel::after {
            width: 210px;
            height: 210px;
            left: -70px;
            bottom: -60px;
        }

        .brand-link,
        .hero-copy,
        .feature-grid {
            position: relative;
            z-index: 1;
        }

        .brand-link {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            font-weight: 800;
            font-size: 24px;
        }

        .brand-mark {
            width: 54px;
            height: 54px;
            display: grid;
            place-items: center;
            border-radius: 18px;
            background: #fff;
            color: var(--primary);
            box-shadow: 0 16px 30px rgba(0, 0, 0, 0.14);
        }

        .hero-kicker {
            margin: 0 0 16px;
            font-size: 13px;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            opacity: 0.8;
        }

        .hero-title {
            margin: 0 0 18px;
            max-width: 430px;
            font-size: clamp(34px, 5vw, 54px);
            line-height: 1.02;
            letter-spacing: -0.04em;
        }

        .hero-text {
            max-width: 430px;
            margin: 0;
            color: rgba(255, 255, 255, 0.84);
            font-size: 16px;
            line-height: 1.8;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .feature-card {
            padding: 18px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.16);
            backdrop-filter: blur(10px);
        }

        .feature-card strong {
            display: block;
            margin-bottom: 4px;
            font-size: 24px;
        }

        .feature-card span {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.78);
        }

        .form-panel {
            display: flex;
            align-items: center;
            padding: 44px;
        }

        .form-wrap {
            width: 100%;
            max-width: 440px;
            margin: 0 auto;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 34px;
            color: var(--primary);
            font-size: 14px;
            font-weight: 700;
        }

        .form-title {
            margin: 0 0 10px;
            font-size: 34px;
            letter-spacing: -0.03em;
        }

        .form-subtitle {
            margin: 0 0 28px;
            color: var(--muted);
            line-height: 1.7;
        }

        .alert {
            margin-bottom: 18px;
            padding: 13px 15px;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 700;
        }

        .alert-success {
            color: #13795b;
            background: #dcfce7;
        }

        .alert-danger {
            color: var(--danger);
            background: #fff0f4;
        }

        .google-button,
        .submit-button {
            width: 100%;
            min-height: 52px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            border-radius: 16px;
            font-size: 15px;
            font-weight: 800;
            cursor: pointer;
            transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
        }

        .google-button {
            border: 1px solid var(--border);
            background: #fff;
            color: var(--dark);
            box-shadow: 0 10px 24px rgba(21, 31, 55, 0.06);
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
            font-weight: 700;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .field {
            margin-bottom: 18px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark);
            font-size: 14px;
            font-weight: 800;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;
            left: 17px;
            top: 50%;
            color: #9aa2b6;
            transform: translateY(-50%);
        }

        .input-wrap input {
            width: 100%;
            min-height: 54px;
            padding: 0 16px 0 46px;
            border: 1px solid var(--border);
            border-radius: 16px;
            outline: none;
            background: var(--soft);
            color: var(--dark);
            font-size: 15px;
            transition: border-color 0.18s ease, background 0.18s ease, box-shadow 0.18s ease;
        }

        .input-wrap input:focus {
            border-color: rgba(255, 61, 31, 0.5);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(255, 61, 31, 0.1);
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 6px 0 22px;
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
            box-shadow: 0 16px 34px rgba(255, 61, 31, 0.28);
        }

        .login-note {
            margin-top: 22px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
            text-align: center;
        }

        @media (max-width: 900px) {
            .login-shell {
                grid-template-columns: 1fr;
                min-height: auto;
                border-radius: 26px;
            }

            .brand-panel {
                min-height: 320px;
                padding: 30px;
            }

            .feature-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .form-panel {
                padding: 30px;
            }
        }

        @media (max-width: 560px) {
            .login-page {
                padding: 14px;
            }

            .brand-panel {
                display: none;
            }

            .form-panel {
                padding: 24px 20px;
            }

            .form-title {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
    <main class="login-page">
        <section class="login-shell">
            <aside class="brand-panel">
                <a href="{{ route('home') }}" class="brand-link">
                    <span class="brand-mark">A</span>
                    <span>
                        AlfaWeb
                        <small style="display:block;font-size:13px;font-weight:600;opacity:.8">Finance Dashboard</small>
                    </span>
                </a>

                <div class="hero-copy">
                    <p class="hero-kicker">Web Dashboard</p>
                    <h1 class="hero-title">Pantau keuangan dengan lebih rapi.</h1>
                    <p class="hero-text">Masuk untuk melihat ringkasan pemasukan, pengeluaran, target pendapatan, dan aktivitas terbaru langsung dari browser.</p>
                </div>

                <div class="feature-grid">
                    <div class="feature-card">
                        <strong>API</strong>
                        <span>Sanctum ready</span>
                    </div>
                    <div class="feature-card">
                        <strong>Web</strong>
                        <span>Session login</span>
                    </div>
                    <div class="feature-card">
                        <strong>G</strong>
                        <span>Google auth</span>
                    </div>
                </div>
            </aside>

            <section class="form-panel">
                <div class="form-wrap">
                    <a href="{{ route('home') }}" class="back-link">
                        <i class="fa-solid fa-arrow-left"></i>
                        Kembali ke beranda
                    </a>

                    <h2 class="form-title">Masuk akun</h2>
                    <p class="form-subtitle">Gunakan email dan password, atau masuk cepat memakai akun Google.</p>

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

                    <div class="divider">atau login manual</div>

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

                    <p class="login-note">Pastikan Google Console memakai redirect URI: <strong>http://127.0.0.1:8000/auth/google/callback</strong></p>
                </div>
            </section>
        </section>
    </main>
</body>
</html>
