<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Center | LUXE & CO.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
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
        .nav-links a.active { border-bottom: 2px solid var(--brand-green); padding-bottom: 4px; }
        
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
        .welcome-text { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 600; color: var(--brand-green); margin-bottom: 0.5rem; }
        .welcome-sub { font-size: 0.85rem; color: var(--text-muted); }
        
        /* BUTTONS */
        .btn-primary { background: var(--brand-green); color: var(--white); padding: 0.5rem 1rem; font-size: 0.85rem; border: none; cursor: pointer; transition: background 0.3s; }
        .btn-primary:hover { background: var(--brand-green-hover); }

        /* FOOTER LITE */
        .footer-lite { max-width: 1200px; margin: 4rem auto 2rem; border-top: 1px solid var(--border-color); padding-top: 2rem; display: flex; justify-content: space-between; align-items: center; font-size: 0.65rem; color: var(--text-light); text-transform: uppercase; letter-spacing: 1px; }
        
        @media (max-width: 768px) {
            .account-container { grid-template-columns: 1fr; gap: 2rem; }
            .account-sidebar { display: none; }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="brand">LUXE & CO. (SELLER)</a>
            <div class="nav-links">
                <a href="{{ route('home') }}">Storefront</a>
                <a href="{{ route('seller.dashboard') }}" class="{{ request()->routeIs('seller.dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('seller.products.index') }}" class="{{ request()->routeIs('seller.products.*') ? 'active' : '' }}">Products</a>
                <a href="{{ route('seller.orders.index') }}" class="{{ request()->routeIs('seller.orders.*') ? 'active' : '' }}">Orders</a>
            </div>
        </div>
    </nav>

    <div class="account-container">
        <aside class="account-sidebar">
            <h2 class="sidebar-title">Seller Center</h2>
            <ul class="sidebar-menu">
                <li><a href="{{ route('seller.dashboard') }}" class="{{ request()->routeIs('seller.dashboard') ? 'active' : '' }}">Dashboard</a></li>
                <li><a href="{{ route('seller.products.index') }}" class="{{ request()->routeIs('seller.products.*') ? 'active' : '' }}">Manage Products</a></li>
                <li><a href="{{ route('seller.orders.index') }}" class="{{ request()->routeIs('seller.orders.*') ? 'active' : '' }}">Manage Orders</a></li>
                <li><a href="{{ route('profile.edit') }}">Profile & Security</a></li>
            </ul>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Sign Out</button>
            </form>
        </aside>

        <main class="account-main">
            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                  {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>

    <footer class="footer-lite">
        <div>LUXE & CO. SELLER PORTAL</div>
        <div>© {{ date('Y') }} Luxe & Co.</div>
    </footer>
</body>
</html>
