<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History | LUXE & CO.</title>
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
        .nav-links a:hover { color: var(--brand-green); }
        .nav-icons { display: flex; gap: 1.5rem; align-items: center; color: var(--brand-green); font-size: 1.1rem; }
        .nav-icons a { transition: opacity 0.3s; position: relative; }
        .nav-icons a:hover { opacity: 0.7; }
        .cart-count { position: absolute; top: -6px; right: -8px; background: var(--brand-green); color: var(--white); font-size: 0.6rem; font-weight: 600; width: 16px; height: 16px; border-radius: 50%; display: flex; align-items: center; justify-content: center; }

        /* PAGE LAYOUT */
        .page-container { max-width: 1000px; margin: 0 auto; padding: 3rem 2rem; }
        .breadcrumb { font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-light); margin-bottom: 2rem; }
        .breadcrumb a:hover { color: var(--brand-green); }
        
        .page-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; }
        .page-title { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 600; color: var(--brand-green); }
        .page-subtitle { font-size: 0.85rem; color: var(--text-muted); margin-top: 0.5rem; }

        /* ORDER CARDS */
        .order-card { background-color: var(--white); border: 1px solid var(--border-color); margin-bottom: 1.5rem; }
        .order-header { padding: 1.5rem; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center; background-color: var(--surface-color); }
        .order-info { display: flex; gap: 2rem; }
        .info-block { display: flex; flex-direction: column; gap: 0.2rem; }
        .info-label { font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); }
        .info-value { font-size: 0.85rem; font-weight: 600; color: var(--text-main); }
        
        .order-actions { display: flex; gap: 1rem; align-items: center; }
        .status-badge { padding: 0.4rem 0.8rem; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; border: 1px solid; }
        .status-pending { color: #d97706; border-color: #fcd34d; background: #fffbeb; }
        .status-processing { color: #2563eb; border-color: #bfdbfe; background: #eff6ff; }
        .status-shipped { color: #7c3aed; border-color: #ddd6fe; background: #f5f3ff; }
        .status-delivered { color: var(--brand-green); border-color: #a7f3d0; background: #ecfdf5; }
        .status-cancelled { color: #dc2626; border-color: #fecaca; background: #fef2f2; }

        .order-body { padding: 1.5rem; }
        .order-item { display: flex; gap: 1.5rem; margin-bottom: 1.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid var(--border-color); }
        .order-item:last-child { margin-bottom: 0; padding-bottom: 0; border-bottom: none; }
        
        .item-img { width: 80px; aspect-ratio: 3/4; background-color: #f5f5f5; display: flex; align-items: center; justify-content: center; overflow: hidden; flex-shrink: 0; }
        .item-img img { width: 100%; height: 100%; object-fit: cover; }
        .item-details { flex: 1; display: flex; flex-direction: column; }
        .item-brand { font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); margin-bottom: 0.2rem; }
        .item-title { font-size: 0.95rem; font-weight: 600; color: var(--text-main); margin-bottom: 0.3rem; }
        .item-meta { font-size: 0.75rem; color: var(--text-muted); margin-bottom: auto; }
        .item-price { font-size: 0.9rem; font-weight: 600; color: var(--brand-green); }

        .btn-outline { padding: 0.5rem 1rem; border: 1px solid var(--text-main); background: transparent; color: var(--text-main); font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; cursor: pointer; transition: all 0.2s; }
        .btn-outline:hover { background: var(--text-main); color: var(--white); }

        /* EMPTY STATE */
        .empty-state { text-align: center; padding: 5rem 2rem; border: 1px solid var(--border-color); background: var(--white); }
        .empty-state i { font-size: 2.5rem; color: var(--border-color); margin-bottom: 1.5rem; }
        .empty-state h3 { font-family: 'Playfair Display', serif; font-size: 1.5rem; margin-bottom: 0.5rem; }
        .empty-state p { font-size: 0.85rem; color: var(--text-muted); margin-bottom: 2rem; }
        .btn-solid { padding: 0.8rem 2rem; background: var(--brand-green); color: var(--white); font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; display: inline-block; }
        .btn-solid:hover { background: var(--brand-green-hover); }

        /* FOOTER */
        .footer { background-color: var(--bg-color); padding: 4rem 2rem 2rem; border-top: 1px solid var(--border-color); margin-top: 4rem; }
        .footer-grid { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 2fr 1fr 1fr 2fr; gap: 3rem; margin-bottom: 4rem; }
        .footer-brand { font-size: 1.2rem; font-weight: 800; color: var(--brand-green); margin-bottom: 1rem; }
        .footer-desc { font-size: 0.75rem; color: var(--text-muted); line-height: 1.6; margin-bottom: 1.5rem; max-width: 250px; }
        .footer-col h4 { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; margin-bottom: 1.5rem; }
        .footer-col ul { list-style: none; }
        .footer-col ul li { margin-bottom: 0.8rem; }
        .footer-col ul a { font-size: 0.75rem; color: var(--text-muted); transition: color 0.2s; }
        .footer-col ul a:hover { color: var(--brand-green); }
        .footer-bottom { max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding-top: 1.5rem; border-top: 1px solid var(--border-color); font-size: 0.65rem; color: var(--text-light); text-transform: uppercase; letter-spacing: 1px; }

        @media (max-width: 768px) {
            .order-header { flex-direction: column; align-items: flex-start; gap: 1.5rem; }
            .info-block { margin-bottom: 0.5rem; }
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

    <div class="page-container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> > <a href="{{ route('user.dashboard') }}">Account</a> > <span style="font-weight:600; color:var(--text-main)">Order History</span>
        </div>

        <div class="page-header">
            <div>
                <h1 class="page-title">Order History</h1>
                <p class="page-subtitle">View and manage your recent purchases.</p>
            </div>
            <a href="{{ route('user.dashboard') }}" style="font-size:0.75rem; text-decoration:underline; color:var(--text-muted);">Back to Account</a>
        </div>

        @if($orders->isEmpty())
            <div class="empty-state">
                <i class="fas fa-box-open"></i>
                <h3>No Orders Yet</h3>
                <p>Discover our latest collection and make your first purchase.</p>
                <a href="{{ route('products.index') }}" class="btn-solid">Start Shopping</a>
            </div>
        @else
            @foreach($orders as $order)
                <div class="order-card">
                    <div class="order-header">
                        <div class="order-info">
                            <div class="info-block">
                                <span class="info-label">Order Placed</span>
                                <span class="info-value">{{ $order->created_at->format('F d, Y') }}</span>
                            </div>
                            <div class="info-block">
                                <span class="info-label">Total Amount</span>
                                <span class="info-value">{{ str_replace('Rp ', 'Rp', $order->formatted_total) }}</span>
                            </div>
                            <div class="info-block">
                                <span class="info-label">Order Number</span>
                                <span class="info-value" style="font-family: monospace;">#{{ $order->order_number }}</span>
                            </div>
                        </div>
                        <div class="order-actions">
                            <span class="status-badge status-{{ strtolower($order->status) }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="order-body">
                        @foreach($order->items->take(3) as $item)
                        <div class="order-item">
                            <div class="item-img">
                                @if($item->product && $item->product->image)
                                    <img src="{{ asset('storage/'.$item->product->image) }}" alt="">
                                @endif
                            </div>
                            <div class="item-details">
                                <div class="item-brand">{{ $item->product->category->name ?? 'LUXE & CO.' }}</div>
                                <div class="item-title">{{ $item->product->name ?? 'Product Unavailable' }}</div>
                                <div class="item-meta">Color: Standard | Size: M <br> Qty: {{ $item->quantity }}</div>
                                <div class="item-price">{{ str_replace('Rp ', 'Rp', number_format($item->price, 0, ',', '.')) }} each</div>
                            </div>
                            <div>
                                <a href="{{ route('products.index') }}" class="btn-outline">Buy Again</a>
                            </div>
                        </div>
                        @endforeach
                        @if($order->items->count() > 3)
                        <div style="padding-top:1rem; font-size:0.75rem; color:var(--text-muted); text-align:center;">
                            + {{ $order->items->count() - 3 }} more items
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
            
            @if($orders->hasPages())
                <div style="margin-top: 3rem;">
                    {{ $orders->links('pagination::bootstrap-4') }} <!-- Using generic, but ideally custom links if needed -->
                </div>
            @endif
        @endif
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-grid">
            <div class="footer-brand-col">
                <div class="footer-brand">LUXE & CO.</div>
                <p class="footer-desc">Crafting modern elegance through sustainable craftsmanship and timeless design principles.</p>
            </div>
            <div class="footer-col">
                <h4>Client Services</h4>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Shipping & Returns</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>The Company</h4>
                <ul>
                    <li><a href="#">Sustainability Report</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Newsletter</h4>
                <p style="font-size:0.75rem; color:var(--text-muted); margin-bottom:1rem;">Subscribe for exclusive updates.</p>
                <div style="display:flex; border:1px solid var(--border-color);">
                    <input type="email" style="flex:1; border:none; padding:0.6rem; font-size:0.75rem; outline:none;" placeholder="Email Address">
                    <button style="padding:0 1rem; background:var(--brand-green); color:white; border:none; font-size:0.7rem; font-weight:600; text-transform:uppercase; cursor:pointer;">Join</button>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div>© 2024 Luxe & Co. Crafted for the discerning collector.</div>
            <div>Global Shipping Available</div>
        </div>
    </footer>

</body>
</html>
