<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collections | LUXE & CO.</title>
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
        .nav-links { display: flex; gap: 2.5rem; align-items: center; }
        .nav-links a { font-size: 0.8rem; font-weight: 500; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); transition: color 0.3s; }
        .nav-links a:hover, .nav-links a.active { color: var(--brand-green); }
        .nav-links a.active { border-bottom: 2px solid var(--brand-green); padding-bottom: 4px; }
        .nav-icons { display: flex; gap: 1.5rem; align-items: center; color: var(--brand-green); font-size: 1.1rem; }
        .nav-icons a { transition: opacity 0.3s; position: relative; }
        .nav-icons a:hover { opacity: 0.7; }
        .cart-count { position: absolute; top: -6px; right: -8px; background: var(--brand-green); color: var(--white); font-size: 0.6rem; font-weight: 600; width: 16px; height: 16px; border-radius: 50%; display: flex; align-items: center; justify-content: center; }

        /* CATALOG LAYOUT */
        .catalog-container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 2rem;
            display: grid;
            grid-template-columns: 240px 1fr;
            gap: 4rem;
        }
        
        /* BREADCRUMB */
        .breadcrumb {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-light);
            margin-bottom: 2rem;
            grid-column: 1 / -1;
        }
        .breadcrumb a:hover { color: var(--brand-green); }

        /* SIDEBAR FILTERS */
        .sidebar {
            position: sticky;
            top: 100px;
            align-self: start;
        }
        .filter-section { margin-bottom: 2.5rem; }
        .filter-title {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1rem;
            color: var(--text-main);
        }
        
        /* Checkbox filter */
        .filter-option {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.7rem;
            font-size: 0.8rem;
            color: var(--text-muted);
            cursor: pointer;
        }
        .filter-option input { accent-color: var(--brand-green); }

        /* Size filter */
        .size-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.5rem;
        }
        .size-box {
            border: 1px solid var(--border-color);
            padding: 0.5rem 0;
            text-align: center;
            font-size: 0.75rem;
            color: var(--text-muted);
            cursor: pointer;
            transition: all 0.2s;
        }
        .size-box:hover, .size-box.active {
            border-color: var(--brand-green);
            background-color: var(--brand-green);
            color: var(--white);
        }

        /* Color filter */
        .color-options { display: flex; gap: 0.5rem; }
        .color-dot {
            width: 16px; height: 16px;
            border-radius: 50%;
            cursor: pointer;
            border: 1px solid rgba(0,0,0,0.1);
        }

        /* Brand filter */
        .brand-select {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid var(--border-color);
            font-size: 0.8rem;
            outline: none;
            color: var(--text-muted);
            font-family: 'Inter', sans-serif;
            background-color: var(--white);
        }

        /* MAIN CONTENT */
        .catalog-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 2.5rem;
        }
        .catalog-title h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 600;
            color: var(--brand-green);
            margin-bottom: 0.5rem;
        }
        .catalog-title p {
            font-size: 0.8rem;
            color: var(--text-muted);
        }
        .sort-control {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
        }
        .sort-select {
            border: none;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            outline: none;
            cursor: pointer;
            background: transparent;
        }

        /* PRODUCT GRID */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2.5rem 1.5rem;
        }
        .product-card { text-align: left; }
        .product-img {
            background-color: #f5f5f5;
            aspect-ratio: 3/4;
            margin-bottom: 1rem;
            overflow: hidden;
            display: flex; align-items: center; justify-content: center;
        }
        .product-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
        .product-card:hover .product-img img { transform: scale(1.05); }
        
        .product-brand {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-light);
            margin-bottom: 0.2rem;
        }
        .product-name {
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--text-main);
        }
        .product-price {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--brand-green);
        }

        /* PAGINATION */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 4rem;
        }
        .page-link {
            width: 32px; height: 32px;
            display: flex; align-items: center; justify-content: center;
            border: 1px solid var(--border-color);
            font-size: 0.8rem;
            color: var(--text-muted);
            transition: all 0.2s;
        }
        .page-link:hover, .page-link.active {
            border-color: var(--brand-green);
            background-color: var(--brand-green);
            color: var(--white);
        }

        /* FOOTER */
        .footer {
            background-color: var(--bg-color);
            padding: 4rem 2rem 2rem;
            border-top: 1px solid var(--border-color);
            margin-top: 4rem;
        }
        .footer-grid {
            max-width: 1440px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 2fr;
            gap: 3rem;
            margin-bottom: 4rem;
        }
        .footer-brand { font-size: 1.2rem; font-weight: 800; color: var(--brand-green); margin-bottom: 1rem; }
        .footer-desc { font-size: 0.75rem; color: var(--text-muted); line-height: 1.6; margin-bottom: 1.5rem; max-width: 250px; }
        .social-icons { display: flex; gap: 1rem; color: var(--text-muted); font-size: 0.9rem; }
        .footer-col h4 { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; margin-bottom: 1.5rem; }
        .footer-col ul { list-style: none; }
        .footer-col ul li { margin-bottom: 0.8rem; }
        .footer-col ul a { font-size: 0.75rem; color: var(--text-muted); transition: color 0.2s; }
        .footer-col ul a:hover { color: var(--brand-green); }
        
        .footer-nl-form { display: flex; gap: 0; margin-top: 1rem; }
        .footer-nl-input { flex: 1; padding: 0.6rem; border: 1px solid var(--border-color); font-size: 0.75rem; outline: none; }
        .footer-nl-btn { padding: 0.6rem 1rem; background: var(--brand-green); color: var(--white); border: none; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; cursor: pointer; }

        .footer-bottom {
            max-width: 1440px;
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

        @media (max-width: 1024px) {
            .catalog-container { grid-template-columns: 200px 1fr; gap: 2rem; }
            .product-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 768px) {
            .nav-links { display: none; }
            .catalog-container { grid-template-columns: 1fr; }
            .sidebar { display: none; } /* Could add a toggle button for mobile */
            .footer-grid { grid-template-columns: 1fr; gap: 2rem; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="brand">LUXE & CO.</a>
            <div class="nav-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('products.index') }}" class="active">Collections</a>
                <a href="{{ route('products.index', ['category' => 'pakaian-pria']) }}">Men</a>
                <a href="{{ route('products.index', ['category' => 'pakaian-wanita']) }}">Women</a>
            </div>
            <div class="nav-icons">
                <a href="{{ route('products.index') }}"><i class="fas fa-search"></i></a>
                @auth
                    <a href="{{ route('dashboard') }}"><i class="far fa-user"></i></a>
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

    <div class="catalog-container">
        <!-- BREADCRUMB -->
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> > <a href="{{ route('products.index') }}">Collections</a> > 
            <span style="color:var(--text-main); font-weight:600;">
                @if(request('category'))
                    {{ $categories->firstWhere('slug', request('category'))?->name ?? 'Seasonal Curations' }}
                @else
                    Seasonal Curations
                @endif
            </span>
        </div>

        <!-- SIDEBAR FILTERS -->
        <aside class="sidebar">
            <form id="filter-form" action="{{ route('products.index') }}" method="GET">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if(request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                @endif
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                
                <div class="filter-section">
                    <div class="filter-title">Filters</div>
                </div>

                <div class="filter-section">
                    <div class="filter-title">Price Range</div>
                    @php $selectedPrices = (array) request('price', []); @endphp
                    <label class="filter-option"><input type="checkbox" name="price[]" value="under_500k" onchange="this.form.submit()" {{ in_array('under_500k', $selectedPrices) ? 'checked' : '' }}> Under Rp 500.000</label>
                    <label class="filter-option"><input type="checkbox" name="price[]" value="500k_1m" onchange="this.form.submit()" {{ in_array('500k_1m', $selectedPrices) ? 'checked' : '' }}> Rp 500k - Rp 1M</label>
                    <label class="filter-option"><input type="checkbox" name="price[]" value="1m_2m" onchange="this.form.submit()" {{ in_array('1m_2m', $selectedPrices) ? 'checked' : '' }}> Rp 1M - Rp 2M</label>
                    <label class="filter-option"><input type="checkbox" name="price[]" value="over_2m" onchange="this.form.submit()" {{ in_array('over_2m', $selectedPrices) ? 'checked' : '' }}> Rp 2M+</label>
                </div>

                <!-- Size, Color, Brand are visually disabled as they are not yet supported in the database schema -->
                <div style="opacity: 0.5; pointer-events: none;" title="Fitur ini belum didukung">
                    <div class="filter-section">
                        <div class="filter-title">Size</div>
                        <div class="size-grid">
                            <div class="size-box">XS</div>
                            <div class="size-box">S</div>
                            <div class="size-box">M</div>
                            <div class="size-box">L</div>
                            <div class="size-box">XL</div>
                            <div class="size-box">XXL</div>
                        </div>
                    </div>

                    <div class="filter-section">
                        <div class="filter-title">Color</div>
                        <div class="color-options">
                            <div class="color-dot" style="background:#033b2a"></div>
                            <div class="color-dot" style="background:#111111"></div>
                            <div class="color-dot" style="background:#ffffff"></div>
                            <div class="color-dot" style="background:#8b4513"></div>
                        </div>
                    </div>

                    <div class="filter-section">
                        <div class="filter-title">Brand</div>
                        <select class="brand-select" disabled>
                            <option>All Brands</option>
                            <option>Luxe Heritage</option>
                            <option>Artisan Studio</option>
                        </select>
                    </div>
                </div>
                
                <a href="{{ route('products.index', ['category' => request('category')]) }}" style="font-size:0.75rem; text-decoration:underline; color:var(--text-muted);">Reset Filters</a>
            </form>
        </aside>

        <!-- MAIN CONTENT -->
        <main>
            <div class="catalog-header">
                <div class="catalog-title">
                    <h1>
                        @if(request('search'))
                            Search: "{{ request('search') }}"
                        @elseif(request('category'))
                            {{ $categories->firstWhere('slug', request('category'))?->name ?? 'Seasonal Curations' }}
                        @else
                            Seasonal Curations
                        @endif
                    </h1>
                    <p>Showing {{ $products->total() }} refined pieces for the modern collector</p>
                </div>
                <div class="sort-control">
                    SORT BY: 
                    <form method="GET" action="{{ route('products.index') }}" style="display:inline">
                        @if(request('category'))<input type="hidden" name="category" value="{{ request('category') }}">@endif
                        @if(request('search'))<input type="hidden" name="search" value="{{ request('search') }}">@endif
                        @foreach((array) request('price', []) as $priceVal)
                            <input type="hidden" name="price[]" value="{{ $priceVal }}">
                        @endforeach
                        <select name="sort" class="sort-select" onchange="this.form.submit()">
                            <option value="newest" {{ request('sort')=='newest' ? 'selected' : '' }}>Newest Arrivals</option>
                            <option value="price_asc" {{ request('sort')=='price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_desc" {{ request('sort')=='price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                        </select>
                    </form>
                </div>
            </div>

            @if($products->isEmpty())
                <div style="padding: 4rem 0; text-align: center; color: var(--text-muted);">
                    No products found matching your criteria.
                </div>
            @else
                <div class="product-grid">
                    @php
                        $placeholderImages = [
                            'pakaian-pria' => 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?auto=format&fit=crop&w=500&q=80',
                            'pakaian-wanita' => 'https://images.unsplash.com/photo-1515347619152-1405fc941618?auto=format&fit=crop&w=500&q=80',
                            'aksesoris' => 'https://images.unsplash.com/photo-1611652022419-a9419f74343d?auto=format&fit=crop&w=500&q=80',
                            'sepatu-sandal' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?auto=format&fit=crop&w=500&q=80',
                            'tas' => 'https://images.unsplash.com/photo-1584916201218-f4242ceb4809?auto=format&fit=crop&w=500&q=80',
                            'elektronik' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=500&q=80'
                        ];
                    @endphp
                    @foreach($products as $product)
                    <a href="{{ route('products.show', $product->slug) }}" class="product-card">
                        <div class="product-img">
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                            @else
                                @php $img = $placeholderImages[$product->category->slug ?? ''] ?? 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=500&q=80'; @endphp
                                <img src="{{ $img }}" alt="{{ $product->name }}">
                            @endif
                        </div>
                        <div class="product-brand">{{ strtoupper($product->category->name) }}</div>
                        <div class="product-name">{{ $product->name }}</div>
                        <div class="product-price">{{ str_replace('Rp ', 'Rp', $product->formatted_price) }}</div>
                    </a>
                    @endforeach
                </div>

                <!-- PAGINATION -->
                @if($products->hasPages())
                <div class="pagination">
                    @if($products->onFirstPage())
                        <div class="page-link" style="opacity:0.5"><i class="fas fa-chevron-left"></i></div>
                    @else
                        <a href="{{ $products->previousPageUrl() }}" class="page-link"><i class="fas fa-chevron-left"></i></a>
                    @endif

                    @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <a href="{{ $url }}" class="page-link {{ $page == $products->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                    @endforeach

                    @if($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="page-link"><i class="fas fa-chevron-right"></i></a>
                    @else
                        <div class="page-link" style="opacity:0.5"><i class="fas fa-chevron-right"></i></div>
                    @endif
                </div>
                @endif
            @endif
        </main>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-grid">
            <div class="footer-brand-col">
                <div class="footer-brand">LUXE & CO.</div>
                <p class="footer-desc">Crafting modern elegance through sustainable craftsmanship and timeless design principles.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Client Services</h4>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Shipping & Returns</a></li>
                    <li><a href="#">Store Locator</a></li>
                    <li><a href="#">Size Guide</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>The Company</h4>
                <ul>
                    <li><a href="#">Sustainability Report</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Newsletter</h4>
                <p style="font-size:0.75rem; color:var(--text-muted); margin-bottom:1rem;">Subscribe for exclusive updates on new collections and insider events.</p>
                <form class="footer-nl-form" onsubmit="event.preventDefault();">
                    <input type="email" class="footer-nl-input" placeholder="Email Address">
                    <button class="footer-nl-btn">Join</button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <div>© 2024 Luxe & Co. Crafted for the discerning collector.</div>
            <div>Global Shipping Available</div>
        </div>
    </footer>

</body>
</html>
