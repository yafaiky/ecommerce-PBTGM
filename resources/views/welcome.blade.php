<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXE & CO. | Refined Living</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --brand-green: #033b2a;
            --brand-green-hover: #022a1e;
            --bg-color: #fcfcfc;
            --text-main: #111111;
            --text-muted: #666666;
            --text-light: #999999;
            --border-color: #eaeaea;
            --white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: var(--bg-color); 
            color: var(--text-main); 
            line-height: 1.5; 
            -webkit-font-smoothing: antialiased;
        }
        a { text-decoration: none; color: inherit; }
        img { max-width: 100%; display: block; }
        
        h1, h2, h3, h4, h5, h6 { font-family: 'Inter', sans-serif; }
        .serif { font-family: 'Playfair Display', serif; }

        /* NAVBAR */
        .navbar {
            background-color: var(--white);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .nav-container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 2rem;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .brand {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--brand-green);
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .nav-links {
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }
        .nav-links a {
            font-size: 0.8rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            transition: color 0.3s;
        }
        .nav-links a:hover, .nav-links a.active {
            color: var(--brand-green);
        }
        .nav-links a.active {
            border-bottom: 2px solid var(--brand-green);
            padding-bottom: 4px;
        }
        .nav-icons {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            color: var(--brand-green);
            font-size: 1.1rem;
        }
        .nav-icons a { transition: opacity 0.3s; position: relative; }
        .nav-icons a:hover { opacity: 0.7; }
        .cart-count {
            position: absolute;
            top: -6px; right: -8px;
            background: var(--brand-green);
            color: var(--white);
            font-size: 0.6rem;
            font-weight: 600;
            width: 16px; height: 16px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
        }

        /* HERO */
        .hero {
            position: relative;
            height: 80vh;
            background: url('https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?auto=format&fit=crop&q=80&w=2070') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.3);
        }
        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: var(--white);
            max-width: 600px;
            padding: 2rem;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }
        .hero-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 1rem;
        }
        .hero-title {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            font-family: 'Playfair Display', serif;
        }
        .hero-desc {
            font-size: 0.9rem;
            font-weight: 300;
            margin-bottom: 2rem;
            line-height: 1.6;
            opacity: 0.9;
        }
        .hero-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }
        .btn {
            padding: 0.8rem 2rem;
            font-size: 0.8rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            border: 1px solid transparent;
        }
        .btn-solid {
            background-color: var(--brand-green);
            color: var(--white);
        }
        .btn-solid:hover { background-color: var(--brand-green-hover); }
        .btn-outline {
            background-color: transparent;
            color: var(--white);
            border-color: var(--white);
        }
        .btn-outline:hover { background-color: var(--white); color: var(--text-main); }

        /* CATEGORIES */
        .categories-section {
            max-width: 1200px;
            margin: 4rem auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }
        .category-card {
            position: relative;
            height: 500px;
            overflow: hidden;
            background: #eee;
            display: block;
        }
        .category-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }
        .category-card:hover img {
            transform: scale(1.05);
        }
        .category-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.6) 0%, transparent 40%);
        }
        .category-info {
            position: absolute;
            bottom: 2rem;
            left: 2rem;
            z-index: 2;
            color: var(--white);
        }
        .category-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        .category-link {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.8;
            border-bottom: 1px solid rgba(255,255,255,0.5);
            padding-bottom: 2px;
        }

        /* TRENDING NOW */
        .trending-section {
            max-width: 1200px;
            margin: 6rem auto;
            padding: 0 2rem;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 2.5rem;
        }
        .section-subtitle {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
        }
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--brand-green);
        }
        .view-all {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 2px;
        }
        .view-all:hover { color: var(--brand-green); border-color: var(--brand-green); }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }
        .product-card {
            text-align: left;
        }
        .product-img {
            background-color: #f5f5f5;
            aspect-ratio: 3/4;
            margin-bottom: 1rem;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .product-card:hover .product-img img { transform: scale(1.05); }
        .product-cat {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-light);
            margin-bottom: 0.25rem;
        }
        .product-name {
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--text-main);
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .product-price {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--brand-green);
        }

        /* NEWSLETTER */
        .newsletter {
            background-color: var(--brand-green);
            color: var(--white);
            padding: 4rem 2rem;
            text-align: center;
        }
        .nl-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nl-text { text-align: left; }
        .nl-title {
            font-size: 1.5rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        .nl-desc {
            font-size: 0.8rem;
            opacity: 0.8;
        }
        .nl-form {
            display: flex;
            gap: 0;
            width: 400px;
        }
        .nl-input {
            flex: 1;
            padding: 0.8rem 1rem;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: var(--white);
            font-size: 0.8rem;
            outline: none;
        }
        .nl-input::placeholder { color: rgba(255,255,255,0.5); }
        .nl-btn {
            padding: 0.8rem 1.5rem;
            background: var(--white);
            color: var(--brand-green);
            border: none;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
        }

        /* FOOTER */
        .footer {
            background-color: var(--bg-color);
            padding: 4rem 2rem 2rem;
            border-top: 1px solid var(--border-color);
        }
        .footer-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 4rem;
        }
        .footer-brand {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--brand-green);
            margin-bottom: 1rem;
        }
        .footer-desc {
            font-size: 0.75rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            max-width: 250px;
        }
        .social-icons {
            display: flex;
            gap: 1rem;
            color: var(--text-muted);
            font-size: 0.9rem;
        }
        .footer-col h4 {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        .footer-col ul { list-style: none; }
        .footer-col ul li { margin-bottom: 0.8rem; }
        .footer-col ul a {
            font-size: 0.75rem;
            color: var(--text-muted);
            transition: color 0.2s;
        }
        .footer-col ul a:hover { color: var(--brand-green); }
        
        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-color);
            font-size: 0.65rem;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            .hero-title { font-size: 2rem; }
            .categories-section { grid-template-columns: 1fr; }
            .product-grid { grid-template-columns: repeat(2, 1fr); }
            .nl-container { flex-direction: column; gap: 1.5rem; text-align: center; }
            .nl-text { text-align: center; }
            .nl-form { width: 100%; }
            .footer-grid { grid-template-columns: 1fr; gap: 2rem; }
            .footer-bottom { flex-direction: column; gap: 1rem; text-align: center; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="brand">LUXE & CO.</a>
            <div class="nav-links">
                <a href="{{ route('home') }}" class="active">Home</a>
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

    <!-- HERO -->
    <header class="hero">
        <div class="hero-content">
            <div class="hero-label">Seasonal Clearance</div>
            <h1 class="hero-title">The Art of Refined Living</h1>
            <p class="hero-desc">Discover our curated selection of timeless essentials, now available with exclusive seasonal pricing for the discerning collector.</p>
            <div class="hero-actions">
                <a href="{{ route('products.index') }}" class="btn btn-solid">Shop Now</a>
                <a href="{{ route('products.index') }}" class="btn btn-outline">View Collection</a>
            </div>
        </div>
    </header>

    <!-- CATEGORIES -->
    <section class="categories-section">
        <a href="{{ route('products.index', ['category' => 'pakaian-pria']) }}" class="category-card">
            <img src="https://images.unsplash.com/photo-1617137968427-85924c800a22?auto=format&fit=crop&q=80&w=800" alt="Men">
            <div class="category-info">
                <div class="category-title">Men</div>
                <div class="category-link">Discover</div>
            </div>
        </a>
        <a href="{{ route('products.index', ['category' => 'pakaian-wanita']) }}" class="category-card">
            <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?auto=format&fit=crop&q=80&w=800" alt="Women">
            <div class="category-info">
                <div class="category-title">Women</div>
                <div class="category-link">Discover</div>
            </div>
        </a>
        <a href="{{ route('products.index', ['category' => 'aksesoris']) }}" class="category-card">
            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&q=80&w=800" alt="Accessories">
            <div class="category-info">
                <div class="category-title">Accessories</div>
                <div class="category-link">Discover</div>
            </div>
        </a>
    </section>

    <!-- TRENDING NOW -->
    <section class="trending-section">
        <div class="section-header">
            <div>
                <div class="section-subtitle">Curated Selection</div>
                <h2 class="section-title">Trending Now</h2>
            </div>
            <a href="{{ route('products.index') }}" class="view-all">View All Products</a>
        </div>
        
        <div class="product-grid">
            @foreach($featured as $product)
            <a href="{{ route('products.show', $product->slug) }}" class="product-card">
                <div class="product-img">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    @else
                        @php
                            $placeholderImages = [
                                'pakaian-pria' => 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?auto=format&fit=crop&w=500&q=80',
                                'pakaian-wanita' => 'https://images.unsplash.com/photo-1515347619152-1405fc941618?auto=format&fit=crop&w=500&q=80',
                                'aksesoris' => 'https://images.unsplash.com/photo-1611652022419-a9419f74343d?auto=format&fit=crop&w=500&q=80',
                                'sepatu-sandal' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?auto=format&fit=crop&w=500&q=80',
                                'tas' => 'https://images.unsplash.com/photo-1584916201218-f4242ceb4809?auto=format&fit=crop&w=500&q=80',
                                'elektronik' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=500&q=80'
                            ];
                            $img = $placeholderImages[$product->category->slug ?? ''] ?? 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=500&q=80';
                        @endphp
                        <img src="{{ $img }}" alt="{{ $product->name }}">
                    @endif
                </div>
                <div class="product-cat">{{ $product->category->name }}</div>
                <div class="product-name">{{ $product->name }}</div>
                <div class="product-price">{{ $product->formatted_price }}</div>
            </a>
            @endforeach
        </div>
    </section>

    <!-- NEWSLETTER -->
    <section class="newsletter">
        <div class="nl-container">
            <div class="nl-text">
                <h2 class="nl-title">Join the Inner Circle</h2>
                <p class="nl-desc">Subscribe for early access to new collections and exclusive event invitations.</p>
            </div>
            <form class="nl-form" onsubmit="event.preventDefault(); alert('Subscribed!');">
                <input type="email" class="nl-input" placeholder="Enter your email" required>
                <button type="submit" class="nl-btn">Join Now</button>
            </form>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-grid">
            <div class="footer-brand-col">
                <div class="footer-brand">LUXE & CO.</div>
                <p class="footer-desc">Crafting modern elegance through sustainable craftsmanship and timeless design principles.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Collections</h4>
                <ul>
                    <li><a href="#">New Arrivals</a></li>
                    <li><a href="#">Bestsellers</a></li>
                    <li><a href="#">Men's Apparel</a></li>
                    <li><a href="#">Women's Apparel</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Support</h4>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Shipping & Returns</a></li>
                    <li><a href="#">Store Locator</a></li>
                    <li><a href="#">Sustainability Report</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Legal</h4>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
                <div style="margin-top: 2rem; font-size: 0.65rem; color: var(--text-light); text-transform: uppercase; letter-spacing: 1px;">
                    © 2024 Luxe & Co. Crafted for the discerning collector.
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div></div>
            <div>Global Shipping Available</div>
        </div>
    </footer>

</body>
</html>
