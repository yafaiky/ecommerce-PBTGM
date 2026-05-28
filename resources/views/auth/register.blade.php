<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | LUXE & CO.</title>
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

        .btn-submit { width: 100%; padding: 1rem; background-color: var(--brand-green); color: var(--white); border: none; font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; cursor: pointer; transition: background-color 0.3s; margin-bottom: 1.5rem; margin-top: 1rem; }
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
            <h1 class="auth-title">Create Account</h1>
            <p class="auth-subtitle">Join Luxe & Co. to experience personalized shopping</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Full Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-input">
                    @error('name')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="form-input">
                    @error('email')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" class="form-input">
                    @error('password')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-input">
                    @error('password_confirmation')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-submit">Register</button>

                <div class="auth-links">
                    Already registered? <a href="{{ route('login') }}">Sign in</a>
                </div>
            </form>
        </div>
    </div>

    <footer class="footer">
        © 2024 Luxe & Co. All rights reserved.
    </footer>

</body>
</html>
