<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account | LUXE & CO.</title>
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
        .nav-links a.active { border-bottom: 2px solid var(--brand-green); padding-bottom: 4px; }
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
        .welcome-text { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 600; color: var(--brand-green); margin-bottom: 0.5rem; }
        .welcome-sub { font-size: 0.85rem; color: var(--text-muted); }

        /* STATS (Minimalist) */
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-bottom: 3rem; }
        .stat-card { border: 1px solid var(--border-color); padding: 1.5rem; text-align: center; }
        .stat-value { font-size: 2rem; font-family: 'Playfair Display', serif; color: var(--brand-green); margin-bottom: 0.5rem; }
        .stat-label { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); }

        /* RECENT ORDERS */
        .content-block { margin-bottom: 3rem; }
        .block-title { font-size: 1.1rem; font-weight: 600; color: var(--text-main); margin-bottom: 1.5rem; border-bottom: 1px solid var(--border-color); padding-bottom: 0.8rem; display: flex; justify-content: space-between; align-items: baseline; }
        .view-all { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); text-decoration: underline; }

        .order-row { display: flex; justify-content: space-between; align-items: center; padding: 1rem 0; border-bottom: 1px solid var(--border-color); }
        .order-row:last-child { border-bottom: none; }
        .order-info { flex: 1; }
        .order-num { font-size: 0.85rem; font-weight: 600; font-family: monospace; }
        .order-date { font-size: 0.75rem; color: var(--text-muted); margin-top: 0.2rem; }
        .order-status { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 600; }
        .order-total { font-size: 0.9rem; font-weight: 600; color: var(--brand-green); text-align: right; }

        /* FOOTER LITE */
        .footer-lite { max-width: 1200px; margin: 4rem auto 2rem; border-top: 1px solid var(--border-color); padding-top: 2rem; display: flex; justify-content: space-between; align-items: center; font-size: 0.65rem; color: var(--text-light); text-transform: uppercase; letter-spacing: 1px; }
        .footer-links { display: flex; gap: 1.5rem; }
        .footer-links a:hover { color: var(--text-main); }

        @media (max-width: 768px) {
            .account-container { grid-template-columns: 1fr; gap: 2rem; }
            .account-sidebar { display: none; } /* Could add a mobile menu dropdown */
            .stats-grid { grid-template-columns: 1fr; gap: 1rem; }
            .footer-lite { flex-direction: column; gap: 1rem; text-align: center; }
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
                <a href="{{ route('user.dashboard') }}" class="active">Account</a>
            </div>
            <div class="nav-icons">
                <a href="{{ route('products.index') }}"><i class="fas fa-search"></i></a>
                <a href="{{ route('user.dashboard') }}"><i class="far fa-user"></i></a>
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
            <a href="{{ route('home') }}">Home</a> > <span style="font-weight:600; color:var(--text-main)">My Account</span>
        </div>

        <!-- SIDEBAR -->
        <aside class="account-sidebar">
            <h2 class="sidebar-title">My Account</h2>
            <ul class="sidebar-menu">
                <li><a href="{{ route('user.dashboard') }}" class="active">Dashboard</a></li>
                <li><a href="{{ route('user.orders') }}">Order History</a></li>
                <li><a href="{{ route('profile.edit') }}">Profile & Security</a></li>
                <li><a href="#">Address Book</a></li>
            </ul>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Sign Out</button>
            </form>
        </aside>

        <!-- MAIN -->
        <main class="account-main">
            <div class="section-header">
                <h1 class="welcome-text">Welcome, {{ explode(' ', $user->name)[0] }}</h1>
                <p class="welcome-sub">Manage your personal information, security, and orders.</p>
            </div>

            <!-- STATS -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">{{ $totalOrders }}</div>
                    <div class="stat-label">Total Orders</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ $cartCount }}</div>
                    <div class="stat-label">Cart Items</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value" style="font-size:1.5rem; line-height:2rem; padding-top:0.2rem; padding-bottom:0.2rem;">{{ str_replace('Rp ', 'Rp', number_format($totalSpent, 0, ',', '.')) }}</div>
                    <div class="stat-label">Total Spent</div>
                </div>
            </div>

            <!-- RECENT ORDERS -->
            <div class="content-block">
                <div class="block-title">
                    Recent Orders
                    <a href="{{ route('user.orders') }}" class="view-all">View All</a>
                </div>
                
                @if($recentOrders->isEmpty())
                    <div style="padding: 3rem 0; text-align: center; color: var(--text-muted); font-size: 0.85rem;">
                        You have not placed any orders yet. <br><br>
                        <a href="{{ route('products.index') }}" style="color:var(--brand-green); text-decoration:underline;">Discover our collection</a>
                    </div>
                @else
                    <div>
                        @foreach($recentOrders as $order)
                        <div class="order-row">
                            <div class="order-info">
                                <div class="order-num">#{{ $order->order_number }}</div>
                                <div class="order-date">{{ $order->created_at->format('F d, Y') }}</div>
                            </div>
                            <div style="flex:1; text-align:center;">
                                <span class="order-status" style="color: {{ $order->status == 'delivered' ? 'var(--brand-green)' : 'var(--text-muted)' }}">{{ ucfirst($order->status) }}</span>
                            </div>
                            <div class="order-total">
                                {{ str_replace('Rp ', 'Rp', $order->formatted_total) }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- ACCOUNT INFO -->
            <div class="content-block">
                <div class="block-title">
                    Account Details
                    <a href="{{ route('profile.edit') }}" class="view-all">Edit</a>
                </div>
                <div style="font-size: 0.85rem; color: var(--text-main); line-height: 1.8;">
                    <strong>Name:</strong> {{ $user->name }}<br>
                    <strong>Email:</strong> {{ $user->email }}<br>
                    <strong>Member Since:</strong> {{ $user->created_at->format('F Y') }}
                </div>
            </div>
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