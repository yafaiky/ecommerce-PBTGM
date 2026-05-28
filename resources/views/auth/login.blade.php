<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in | LUXE & CO.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --brand-green: #033b2a;
            --brand-green-hover: #022a1e;
            --bg-color: #fbfcfc;
            --text-main: #111111;
            --text-muted: #666666;
            --border-color: #eaeaea;
            --white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-color); color: var(--text-main); line-height: 1.5; -webkit-font-smoothing: antialiased; display: flex; flex-direction: column; min-height: 100vh; }
        a { text-decoration: none; color: inherit; }

        /* NAVBAR (Minimal) */
        .navbar { background-color: var(--white); border-bottom: 1px solid var(--border-color); padding: 1.5rem; text-align: center; }
        .brand { font-size: 1.25rem; font-weight: 800; color: var(--brand-green); letter-spacing: 1px; text-transform: uppercase; }

        /* AUTH CONTAINER */
        .auth-wrapper { flex: 1; display: flex; align-items: center; justify-content: center; padding: 4rem 2rem; }
        .auth-card { background: var(--white); border: 1px solid var(--border-color); padding: 3rem; width: 100%; max-width: 450px; }
        
        .auth-title { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 600; text-align: center; color: var(--brand-green); margin-bottom: 0.5rem; }
        .auth-subtitle { text-align: center; font-size: 0.85rem; color: var(--text-muted); margin-bottom: 2.5rem; }

        .form-group { margin-bottom: 1.5rem; }
        .form-label { display: block; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.5rem; }
        .form-input { width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); font-family: 'Inter', sans-serif; font-size: 0.85rem; outline: none; transition: border-color 0.3s; }
        .form-input:focus { border-color: var(--brand-green); }
        .form-error { color: #dc2626; font-size: 0.75rem; margin-top: 0.3rem; }

        .checkbox-group { display: flex; align-items: center; gap: 0.5rem; margin-bottom: 2rem; }
        .checkbox-group input { cursor: pointer; }
        .checkbox-group label { font-size: 0.85rem; color: var(--text-muted); cursor: pointer; }

        .btn-submit { width: 100%; padding: 1rem; background-color: var(--brand-green); color: var(--white); border: none; font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; cursor: pointer; transition: background-color 0.3s; margin-bottom: 1.5rem; }
        .btn-submit:hover { background-color: var(--brand-green-hover); }

        .auth-links { text-align: center; font-size: 0.85rem; color: var(--text-muted); }
        .auth-links a { text-decoration: underline; transition: color 0.3s; }
        .auth-links a:hover { color: var(--brand-green); }

        /* FOOTER (Minimal) */
        .footer { text-align: center; padding: 2rem; border-top: 1px solid var(--border-color); font-size: 0.7rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ route('home') }}" class="brand">LUXE & CO.</a>
    </nav>

    <div class="auth-wrapper">
        <div class="auth-card">
            <h1 class="auth-title">Welcome Back</h1>
            <p class="auth-subtitle">Sign in to your Luxe & Co. account</p>

            <!-- Session Status -->
            @if (session('status'))
                <div style="color: var(--brand-green); font-size: 0.85rem; margin-bottom: 1rem; text-align: center;">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="form-input">
                    @error('email')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <div style="display: flex; justify-content: space-between; align-items: baseline;">
                        <label for="password" class="form-label">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="font-size: 0.75rem; color: var(--text-muted); text-decoration: underline;">Forgot password?</a>
                        @endif
                    </div>
                    <input id="password" type="password" name="password" required autocomplete="current-password" class="form-input">
                    @error('password')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="checkbox-group">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Remember me</label>
                </div>

                <button type="submit" class="btn-submit">Sign In</button>

                <div class="auth-links">
                    Don't have an account? <a href="{{ route('register') }}">Create one</a>
                </div>
            </form>
        </div>
    </div>

    <footer class="footer">
        © 2024 Luxe & Co. All rights reserved.
    </footer>

</body>
</html>
