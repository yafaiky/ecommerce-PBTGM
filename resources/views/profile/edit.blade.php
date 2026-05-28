<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile & Security | LUXE & CO.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --brand-green: #033b2a;
            --brand-green-hover: #022a1e;
            --bg-color: #fbfcfc;
            --surface-color: #f4f6f8;
            --text-main: #111111;
            --text-muted: #666666;
            --text-light: #999999;
            --border-color: #eaeaea;
            --white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-color); color: var(--text-main); line-height: 1.5; -webkit-font-smoothing: antialiased; }
        a { text-decoration: none; color: inherit; }
        img { max-width: 100%; display: block; }

        /* NAVBAR */
        .navbar { background-color: var(--white); border-bottom: 1px solid var(--border-color); position: sticky; top: 0; z-index: 100; }
        .nav-container { max-width: 1440px; margin: 0 auto; padding: 0 2rem; height: 80px; display: flex; align-items: center; justify-content: space-between; }
        .brand { font-size: 1.25rem; font-weight: 800; color: var(--brand-green); letter-spacing: 1px; text-transform: uppercase; }
        .nav-links { display: flex; gap: 2.5rem; align-items: center; }
        .nav-links a { font-size: 0.8rem; font-weight: 500; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); transition: color 0.3s; }
        .nav-links a:hover, .nav-links a.active { color: var(--brand-green); }
        .nav-icons { display: flex; gap: 1.5rem; align-items: center; color: var(--brand-green); font-size: 1.1rem; }
        .nav-icons a { transition: opacity 0.3s; position: relative; }
        .nav-icons a:hover { opacity: 0.7; }
        .cart-count { position: absolute; top: -6px; right: -8px; background: var(--brand-green); color: var(--white); font-size: 0.6rem; font-weight: 600; width: 16px; height: 16px; border-radius: 50%; display: flex; align-items: center; justify-content: center; }

        /* ACCOUNT LAYOUT */
        .account-container { max-width: 1200px; margin: 0 auto; padding: 3rem 2rem; display: grid; grid-template-columns: 240px 1fr; gap: 4rem; align-items: start; }
        .breadcrumb { font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-light); margin-bottom: 2rem; grid-column: 1 / -1; }
        .breadcrumb a:hover { color: var(--brand-green); }

        /* SIDEBAR NAV */
        .account-sidebar { position: sticky; top: 120px; }
        .sidebar-title { font-family: 'Playfair Display', serif; font-size: 1.5rem; font-weight: 600; color: var(--text-main); margin-bottom: 2rem; }
        .sidebar-menu { list-style: none; }
        .sidebar-menu li { margin-bottom: 1rem; }
        .sidebar-menu a { font-size: 0.85rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; display: block; transition: color 0.2s; }
        .sidebar-menu a:hover, .sidebar-menu a.active { color: var(--brand-green); font-weight: 600; }
        .btn-logout { margin-top: 3rem; background: transparent; border: 1px solid var(--border-color); padding: 0.8rem; width: 100%; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; cursor: pointer; transition: all 0.2s; }
        .btn-logout:hover { border-color: var(--text-main); color: var(--text-main); }

        /* MAIN CONTENT */
        .account-main { padding-top: 0.5rem; }
        .section-header { margin-bottom: 2.5rem; }
        .page-title { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 600; color: var(--brand-green); margin-bottom: 0.5rem; }
        .page-subtitle { font-size: 0.85rem; color: var(--text-muted); }

        /* FORMS */
        .form-section { background-color: var(--white); border: 1px solid var(--border-color); padding: 2rem; margin-bottom: 2rem; }
        .form-section-title { font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem; }
        .form-section-desc { font-size: 0.8rem; color: var(--text-muted); margin-bottom: 2rem; }

        .form-group { margin-bottom: 1.5rem; }
        .form-label { display: block; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.5rem; }
        .form-input { width: 100%; max-width: 400px; padding: 0.8rem; border: 1px solid var(--border-color); font-family: 'Inter', sans-serif; font-size: 0.85rem; outline: none; transition: border-color 0.3s; }
        .form-input:focus { border-color: var(--brand-green); }
        .form-error { color: #dc2626; font-size: 0.75rem; margin-top: 0.3rem; }

        .btn-submit { padding: 0.8rem 2rem; background-color: var(--brand-green); color: var(--white); border: none; font-family: 'Inter', sans-serif; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; cursor: pointer; transition: background-color 0.3s; display: inline-flex; align-items: center; gap: 0.5rem; }
        .btn-submit:hover { background-color: var(--brand-green-hover); }
        
        .btn-danger { background-color: #dc2626; }
        .btn-danger:hover { background-color: #b91c1c; }

        .status-message { font-size: 0.8rem; color: var(--brand-green); margin-left: 1rem; font-weight: 500; }

        /* FOOTER LITE */
        .footer-lite { max-width: 1200px; margin: 4rem auto 2rem; border-top: 1px solid var(--border-color); padding-top: 2rem; display: flex; justify-content: space-between; align-items: center; font-size: 0.65rem; color: var(--text-light); text-transform: uppercase; letter-spacing: 1px; }
        .footer-links { display: flex; gap: 1.5rem; }
        .footer-links a:hover { color: var(--text-main); }

        @media (max-width: 768px) {
            .account-container { grid-template-columns: 1fr; gap: 2rem; }
            .account-sidebar { display: none; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="brand">LUXE & CO.</a>
            <div class="nav-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('products.index') }}">Collections</a>
                <a href="{{ route('dashboard') }}" class="active">Account</a>
            </div>
            <div class="nav-icons">
                <a href="{{ route('products.index') }}"><i class="fas fa-search"></i></a>
                <a href="{{ route('dashboard') }}"><i class="far fa-user"></i></a>
                <a href="{{ route('cart.index') }}">
                    <i class="fas fa-shopping-bag"></i>
                    @php $cartCount = \App\Models\Cart::where('user_id', auth()->id())->count(); @endphp
                    @if($cartCount > 0)<span class="cart-count">{{ $cartCount }}</span>@endif
                </a>
            </div>
        </div>
    </nav>

    <div class="account-container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> > <a href="{{ route('dashboard') }}">Account</a> > <span style="font-weight:600; color:var(--text-main)">Profile & Security</span>
        </div>

        <!-- SIDEBAR -->
        <aside class="account-sidebar">
            <h2 class="sidebar-title">My Account</h2>
            <ul class="sidebar-menu">
                @if(auth()->user()->role === 'seller')
                    <li><a href="{{ route('seller.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('seller.products.index') }}">Manage Products</a></li>
                    <li><a href="{{ route('seller.orders.index') }}">Manage Orders</a></li>
                @else
                    <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('user.orders') }}">Order History</a></li>
                @endif
                <li><a href="{{ route('profile.edit') }}" class="active">Profile & Security</a></li>
            </ul>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Sign Out</button>
            </form>
        </aside>

        <!-- MAIN -->
        <main class="account-main">
            <div class="section-header">
                <h1 class="page-title">Profile & Security</h1>
                <p class="page-subtitle">Manage your personal information and account security.</p>
            </div>

            <!-- UPDATE PROFILE INFO -->
            <section class="form-section">
                <h2 class="form-section-title">Profile Information</h2>
                <p class="form-section-desc">Update your account's profile information and email address.</p>

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" name="name" type="text" class="form-input" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                        @error('name')<div class="form-error">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email" class="form-input" value="{{ old('email', $user->email) }}" required autocomplete="username">
                        @error('email')<div class="form-error">{{ $message }}</div>@enderror
                    </div>

                    <div style="display:flex; align-items:center;">
                        <button type="submit" class="btn-submit">Save Changes</button>
                        @if (session('status') === 'profile-updated')
                            <span class="status-message">Saved.</span>
                        @endif
                    </div>
                </form>
            </section>

            <!-- UPDATE PASSWORD -->
            <section class="form-section">
                <h2 class="form-section-title">Update Password</h2>
                <p class="form-section-desc">Ensure your account is using a long, random password to stay secure.</p>

                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="update_password_current_password" class="form-label">Current Password</label>
                        <input id="update_password_current_password" name="current_password" type="password" class="form-input" autocomplete="current-password">
                        @if($errors->updatePassword->has('current_password'))
                            <div class="form-error">{{ $errors->updatePassword->first('current_password') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="update_password_password" class="form-label">New Password</label>
                        <input id="update_password_password" name="password" type="password" class="form-input" autocomplete="new-password">
                        @if($errors->updatePassword->has('password'))
                            <div class="form-error">{{ $errors->updatePassword->first('password') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
                        <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-input" autocomplete="new-password">
                        @if($errors->updatePassword->has('password_confirmation'))
                            <div class="form-error">{{ $errors->updatePassword->first('password_confirmation') }}</div>
                        @endif
                    </div>

                    <div style="display:flex; align-items:center;">
                        <button type="submit" class="btn-submit">Update Password</button>
                        @if (session('status') === 'password-updated')
                            <span class="status-message">Saved.</span>
                        @endif
                    </div>
                </form>
            </section>

            <!-- DELETE ACCOUNT -->
            <section class="form-section">
                <h2 class="form-section-title" style="color: #dc2626;">Delete Account</h2>
                <p class="form-section-desc">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>

                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="form-group">
                        <label for="password_delete" class="form-label">Password</label>
                        <input id="password_delete" name="password" type="password" class="form-input" placeholder="Enter password to confirm">
                        @if($errors->userDeletion->has('password'))
                            <div class="form-error">{{ $errors->userDeletion->first('password') }}</div>
                        @endif
                    </div>

                    <button type="submit" class="btn-submit btn-danger">Delete Account</button>
                </form>
            </section>

        </main>
    </div>

    <footer class="footer-lite">
        <div>LUXE & CO.</div>
        <div class="footer-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Shipping & Returns</a>
            <a href="#">Contact Us</a>
        </div>
        <div>© 2024 Luxe & Co. Crafted for the discerning collector.</div>
    </footer>

</body>
</html>
