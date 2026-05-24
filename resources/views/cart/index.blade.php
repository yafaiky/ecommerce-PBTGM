<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | LUXE & CO.</title>
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

        /* CART LAYOUT */
        .cart-container { max-width: 1200px; margin: 0 auto; padding: 2rem; }
        .breadcrumb { font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-light); margin-bottom: 2rem; }
        .breadcrumb a:hover { color: var(--brand-green); }
        .page-title { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 600; color: var(--brand-green); margin-bottom: 2rem; }

        .cart-grid { display: grid; grid-template-columns: 1fr 380px; gap: 4rem; align-items: start; }
        
        /* CART ITEMS */
        .cart-items { border-top: 1px solid var(--border-color); }
        .cart-item { display: flex; gap: 1.5rem; padding: 2rem 0; border-bottom: 1px solid var(--border-color); }
        .item-img { width: 100px; aspect-ratio: 3/4; background-color: #f5f5f5; display: flex; align-items: center; justify-content: center; overflow: hidden; flex-shrink: 0; }
        .item-img img { width: 100%; height: 100%; object-fit: cover; }
        .item-details { flex: 1; display: flex; flex-direction: column; }
        .item-brand { font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); margin-bottom: 0.2rem; }
        .item-title { font-size: 1rem; font-weight: 600; color: var(--text-main); margin-bottom: 0.5rem; }
        .item-meta { font-size: 0.75rem; color: var(--text-muted); margin-bottom: 1.5rem; }
        
        .item-actions { display: flex; justify-content: space-between; align-items: center; margin-top: auto; }
        .qty-control { display: flex; border: 1px solid var(--border-color); height: 36px; width: 100px; }
        .qty-btn { width: 30px; display: flex; align-items: center; justify-content: center; cursor: pointer; background: transparent; border: none; color: var(--text-muted); font-size: 0.8rem; }
        .qty-input { width: 40px; text-align: center; border: none; outline: none; font-family: 'Inter', sans-serif; font-size: 0.8rem; background: transparent; }
        .item-price { font-size: 1.1rem; font-weight: 600; color: var(--brand-green); }

        .btn-remove { background: transparent; border: none; color: var(--text-muted); font-size: 0.75rem; text-decoration: underline; cursor: pointer; margin-left: 1rem; }
        .btn-remove:hover { color: #dc2626; }

        /* ORDER SUMMARY */
        .summary-box { background-color: var(--white); border: 1px solid var(--border-color); padding: 2rem; }
        .summary-title { font-size: 1rem; font-weight: 600; margin-bottom: 1.5rem; }
        .summary-row { display: flex; justify-content: space-between; font-size: 0.8rem; color: var(--text-muted); margin-bottom: 1rem; }
        .summary-row.total { font-size: 1rem; font-weight: 700; color: var(--text-main); border-top: 1px solid var(--border-color); padding-top: 1rem; margin-top: 0.5rem; margin-bottom: 2rem; }
        
        .promo-form { display: flex; gap: 0.5rem; margin-bottom: 2rem; }
        .promo-input { flex: 1; padding: 0.7rem; border: 1px solid var(--border-color); font-size: 0.75rem; outline: none; }
        .promo-btn { padding: 0 1rem; background: var(--text-main); color: var(--white); border: none; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; cursor: pointer; }

        .btn-checkout { width: 100%; padding: 1rem; background-color: var(--brand-green); color: var(--white); border: none; font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; cursor: pointer; transition: background-color 0.3s; display: flex; align-items: center; justify-content: center; gap: 0.5rem; margin-bottom: 1.5rem; }
        .btn-checkout:hover { background-color: var(--brand-green-hover); }

        .accepted-payments { text-align: center; font-size: 0.7rem; color: var(--text-muted); }
        .payment-icons { display: flex; justify-content: center; gap: 0.5rem; margin-top: 0.5rem; font-size: 1.2rem; color: #d1d5db; }

        .assistance-box { background-color: var(--surface-color); padding: 1.5rem; margin-top: 1.5rem; font-size: 0.75rem; color: var(--text-muted); text-align: center; }
        .assistance-box h4 { font-size: 0.85rem; font-weight: 600; color: var(--text-main); margin-bottom: 0.5rem; }
        .assistance-link { display: inline-block; margin-top: 0.5rem; color: var(--text-main); font-weight: 600; text-decoration: underline; }

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

        @media (max-width: 900px) {
            .cart-grid { grid-template-columns: 1fr; gap: 3rem; }
            .footer-grid { grid-template-columns: 1fr; gap: 2rem; }
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
                <a href="{{ route('products.index', ['category' => 'pakaian-pria']) }}">Men</a>
                <a href="{{ route('products.index', ['category' => 'pakaian-wanita']) }}">Women</a>
            </div>
            <div class="nav-icons">
                <a href="{{ route('products.index') }}"><i class="fas fa-search"></i></a>
                @auth
                    <a href="{{ route('user.dashboard') }}"><i class="far fa-user"></i></a>
                    <a href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-bag"></i>
                        @php $cartCount = \App\Models\Cart::where('user_id', auth()->id())->count(); @endphp
                        @if($cartCount > 0)<span class="cart-count">{{ $cartCount }}</span>@endif
                    </a>
                @else
                    <a href="{{ route('login') }}"><i class="far fa-user"></i></a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="cart-container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> > <span style="color:var(--text-main); font-weight:600;">Shopping Cart</span>
        </div>
        
        <h1 class="page-title">Shopping Cart</h1>

        <div class="cart-grid">
            <div class="cart-items">
                @if($cartItems->isEmpty())
                    <div style="padding:4rem 0; text-align:center; color:var(--text-muted);">
                        Your cart is currently empty.<br><br>
                        <a href="{{ route('products.index') }}" style="color:var(--brand-green); text-decoration:underline;">Continue Shopping</a>
                    </div>
                @else
                    @php
                        $placeholderImages = [
                            'pakaian-pria' => 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?auto=format&fit=crop&w=300&q=80',
                            'pakaian-wanita' => 'https://images.unsplash.com/photo-1515347619152-1405fc941618?auto=format&fit=crop&w=300&q=80',
                            'aksesoris' => 'https://images.unsplash.com/photo-1611652022419-a9419f74343d?auto=format&fit=crop&w=300&q=80',
                            'sepatu-sandal' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?auto=format&fit=crop&w=300&q=80',
                            'tas' => 'https://images.unsplash.com/photo-1584916201218-f4242ceb4809?auto=format&fit=crop&w=300&q=80',
                            'elektronik' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=300&q=80'
                        ];
                    @endphp
                    @foreach($cartItems as $item)
                        <div class="cart-item">
                            <a href="{{ route('products.show', $item->product->slug) }}" class="item-img">
                                @php $img = $item->product->image ? asset('storage/'.$item->product->image) : ($placeholderImages[$item->product->category->slug ?? ''] ?? 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=300&q=80'); @endphp
                                <img src="{{ $img }}" alt="{{ $item->product->name }}">
                            </a>
                            <div class="item-details">
                                <div>
                                    <div class="item-brand">{{ $item->product->category->name }}</div>
                                    <a href="{{ route('products.show', $item->product->slug) }}" class="item-title">{{ $item->product->name }}</a>
                                    <div class="item-meta">Color: Standard | Size: M</div>
                                </div>
                                <div class="item-actions">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display:flex; align-items:center;">
                                        @csrf
                                        @method('PATCH')
                                        <div class="qty-control">
                                            <button type="button" class="qty-btn" onclick="let inp=this.nextElementSibling; if(inp.value>1){inp.value--; this.form.submit();}"><i class="fas fa-minus" style="font-size:0.6rem"></i></button>
                                            <input type="number" name="quantity" class="qty-input" value="{{ $item->quantity }}" min="1" readonly>
                                            <button type="button" class="qty-btn" onclick="let inp=this.previousElementSibling; inp.value++; this.form.submit();"><i class="fas fa-plus" style="font-size:0.6rem"></i></button>
                                        </div>
                                    </form>
                                    
                                    <div style="display:flex; align-items:center;">
                                        <div class="item-price">{{ str_replace('Rp ', 'Rp', number_format($item->product->price * $item->quantity, 0, ',', '.')) }}</div>
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-remove">Remove</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div>
                <div class="summary-box">
                    <h3 class="summary-title">Order Summary</h3>
                    
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>{{ str_replace('Rp ', 'Rp', number_format($total, 0, ',', '.')) }}</span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping</span>
                        <span>{{ $total >= 1000000 ? 'Complimentary' : 'Rp50.000' }}</span>
                    </div>
                    <div class="summary-row">
                        <span>Estimated Tax</span>
                        <span>Included</span>
                    </div>
                    
                    <div class="summary-row total">
                        <span>Total</span>
                        <span>{{ str_replace('Rp ', 'Rp', number_format($total >= 1000000 || $total == 0 ? $total : $total + 50000, 0, ',', '.')) }}</span>
                    </div>

                    <form class="promo-form">
                        <input type="text" class="promo-input" placeholder="Gift card or discount code">
                        <button type="button" class="promo-btn">Apply</button>
                    </form>

                    <a href="{{ route('checkout') }}" class="btn-checkout" style="text-decoration:none;">Proceed to Checkout <i class="fas fa-arrow-right" style="font-size:0.7rem"></i></a>
                    
                    <div class="accepted-payments">
                        Accepted Payment Methods
                        <div class="payment-icons">
                            <i class="fab fa-cc-visa"></i>
                            <i class="fab fa-cc-mastercard"></i>
                            <i class="fab fa-cc-amex"></i>
                            <i class="fab fa-cc-paypal"></i>
                        </div>
                    </div>
                </div>

                <div class="assistance-box">
                    <h4>Need Assistance?</h4>
                    <p>Our Client Advisors are available 24/7 to assist you with your order.</p>
                    <a href="#" class="assistance-link">Contact Support</a>
                </div>
            </div>
        </div>
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
