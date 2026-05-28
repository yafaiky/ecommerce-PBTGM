<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} | LUXE & CO.</title>
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
        .nav-icons { display: flex; gap: 1.5rem; align-items: center; color: var(--brand-green); font-size: 1.1rem; }
        .nav-icons a { transition: opacity 0.3s; position: relative; }
        .nav-icons a:hover { opacity: 0.7; }
        .cart-count { position: absolute; top: -6px; right: -8px; background: var(--brand-green); color: var(--white); font-size: 0.6rem; font-weight: 600; width: 16px; height: 16px; border-radius: 50%; display: flex; align-items: center; justify-content: center; }

        /* PRODUCT DETAIL LAYOUT */
        .product-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
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

        /* IMAGES */
        .product-images { display: flex; flex-direction: column; gap: 1rem; }
        .main-img {
            width: 100%;
            aspect-ratio: 3/4;
            background-color: #f5f5f5;
            display: flex; align-items: center; justify-content: center;
            overflow: hidden;
        }
        .main-img img { width: 100%; height: 100%; object-fit: cover; }
        .thumb-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        .thumb-img {
            width: 100%;
            aspect-ratio: 1;
            background-color: #f5f5f5;
            display: flex; align-items: center; justify-content: center;
            overflow: hidden;
        }
        .thumb-img img { width: 100%; height: 100%; object-fit: cover; opacity: 0.8; }

        /* INFO */
        .product-info { padding-top: 1rem; }
        .brand-tag {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--brand-green);
            background: rgba(3,59,42,0.05);
            padding: 0.3rem 0.6rem;
            display: inline-block;
            margin-bottom: 1rem;
        }
        .title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 0.5rem;
            line-height: 1.1;
        }
        .reviews { display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem; font-size: 0.75rem; color: var(--text-muted); }
        .stars { color: var(--brand-green); }
        .price {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--brand-green);
            margin-bottom: 2rem;
        }

        /* OPTIONS */
        .option-group { margin-bottom: 1.5rem; }
        .option-label {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .color-options { display: flex; gap: 0.5rem; }
        .color-dot {
            width: 24px; height: 24px;
            border-radius: 50%;
            cursor: pointer;
            border: 1px solid rgba(0,0,0,0.1);
            position: relative;
        }
        .color-dot.active::after {
            content: '';
            position: absolute;
            top: -4px; left: -4px; right: -4px; bottom: -4px;
            border: 1px solid var(--text-main);
            border-radius: 50%;
        }

        .size-header { display: flex; justify-content: space-between; align-items: baseline; }
        .size-guide { font-size: 0.75rem; color: var(--text-muted); text-decoration: underline; cursor: pointer; }
        .size-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 0.5rem; }
        .size-box {
            border: 1px solid var(--border-color);
            padding: 0.6rem 0;
            text-align: center;
            font-size: 0.8rem;
            color: var(--text-main);
            cursor: pointer;
            transition: all 0.2s;
        }
        .size-box:hover, .size-box.active {
            border-color: var(--brand-green);
            background-color: var(--brand-green);
            color: var(--white);
        }

        /* ACTIONS */
        .add-to-cart-wrapper {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            margin-top: 2rem;
        }
        .qty-controls {
            display: flex;
            border: 1px solid var(--border-color);
            height: 48px;
            width: 120px;
        }
        .qty-btn {
            width: 40px;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            color: var(--text-muted);
            background: transparent;
            border: none;
            font-size: 1rem;
        }
        .qty-input {
            width: 40px;
            text-align: center;
            border: none;
            outline: none;
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            background: transparent;
        }
        .btn-add {
            flex: 1;
            background-color: var(--brand-green);
            color: var(--white);
            border: none;
            font-family: 'Inter', sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex; align-items: center; justify-content: center; gap: 0.5rem;
        }
        .btn-add:hover { background-color: var(--brand-green-hover); }

        /* ACCORDION */
        .accordion {
            border-top: 1px solid var(--border-color);
        }
        .accordion-item { border-bottom: 1px solid var(--border-color); }
        .accordion-header {
            padding: 1.2rem 0;
            display: flex; justify-content: space-between; align-items: center;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .accordion-content {
            padding-bottom: 1.2rem;
            font-size: 0.85rem;
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* FEATURES */
        .features-grid {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 2rem;
            padding-top: 4rem;
            border-top: 1px solid var(--border-color);
        }
        .feature-item { text-align: left; }
        .feature-item i { color: var(--brand-green); font-size: 1.2rem; margin-bottom: 1rem; }
        .feature-title { font-size: 0.85rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--brand-green); }
        .feature-desc { font-size: 0.75rem; color: var(--text-muted); line-height: 1.6; }

        /* COMPLETE THE LOOK */
        .related-section {
            grid-column: 1 / -1;
            margin-top: 4rem;
            padding-top: 4rem;
            border-top: 1px solid var(--border-color);
        }
        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 0.5rem;
        }
        .section-subtitle {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
            display: flex; justify-content: space-between;
        }
        .related-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }
        .related-card { text-align: left; }
        .related-img { background-color: #f5f5f5; aspect-ratio: 1; margin-bottom: 1rem; display: flex; align-items: center; justify-content: center; overflow: hidden; }
        .related-img img { width: 100%; height: 100%; object-fit: cover; }
        .related-name { font-size: 0.8rem; font-weight: 600; margin-bottom: 0.2rem; }
        .related-price { font-size: 0.8rem; color: var(--brand-green); font-weight: 600; }

        /* FOOTER */
        .footer { background-color: var(--bg-color); padding: 4rem 2rem 2rem; border-top: 1px solid var(--border-color); margin-top: 4rem; }
        .footer-grid { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 2fr 1fr 1fr 2fr; gap: 3rem; margin-bottom: 4rem; }
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
        .footer-bottom { max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding-top: 1.5rem; border-top: 1px solid var(--border-color); font-size: 0.65rem; color: var(--text-light); text-transform: uppercase; letter-spacing: 1px; }

        @media (max-width: 900px) {
            .product-container { grid-template-columns: 1fr; gap: 2rem; }
            .features-grid { grid-template-columns: 1fr; gap: 1.5rem; }
            .related-grid { grid-template-columns: repeat(2, 1fr); }
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

    <div class="product-container">
        <!-- BREADCRUMB -->
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> > <a href="{{ route('products.index') }}">Collections</a> > 
            <a href="{{ route('products.index', ['category'=>$product->category->slug]) }}">{{ $product->category->name }}</a> > 
            <span style="color:var(--text-main); font-weight:600;">{{ Str::limit($product->name, 40) }}</span>
        </div>

        <!-- PRODUCT IMAGES -->
        <div class="product-images">
            @php
                $placeholderImages = [
                    'pakaian-pria' => 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?auto=format&fit=crop&w=800&q=80',
                    'pakaian-wanita' => 'https://images.unsplash.com/photo-1515347619152-1405fc941618?auto=format&fit=crop&w=800&q=80',
                    'aksesoris' => 'https://images.unsplash.com/photo-1611652022419-a9419f74343d?auto=format&fit=crop&w=800&q=80',
                    'sepatu-sandal' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?auto=format&fit=crop&w=800&q=80',
                    'tas' => 'https://images.unsplash.com/photo-1584916201218-f4242ceb4809?auto=format&fit=crop&w=800&q=80',
                    'elektronik' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=80'
                ];
                $img = $product->image ? asset('storage/'.$product->image) : ($placeholderImages[$product->category->slug ?? ''] ?? 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=800&q=80');
            @endphp
            <div class="main-img">
                <img src="{{ $img }}" alt="{{ $product->name }}">
            </div>
            <div class="thumb-grid">
                <div class="thumb-img"><img src="{{ $img }}" style="filter: brightness(0.8) contrast(1.2);"></div>
                <div class="thumb-img"><img src="{{ $img }}" style="transform: scale(1.5) translate(10%, 10%);"></div>
            </div>
        </div>

        <!-- PRODUCT INFO -->
        <div class="product-info">
            <span class="brand-tag">Luxe Heritage</span>
            <h1 class="title">{{ $product->name }}</h1>
            
            <div class="reviews">
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                </div>
                <span>142 Reviews</span>
            </div>

            <div class="price">{{ str_replace('Rp ', 'Rp', $product->formatted_price) }}</div>

            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                @if(!empty($product->colors) && is_array($product->colors))
                <div class="option-group">
                    <span class="option-label">Color</span>
                    <div class="color-options">
                        @foreach($product->colors as $index => $color)
                            <label style="cursor: pointer;">
                                <input type="radio" name="color" value="{{ $color }}" {{ $index === 0 ? 'checked' : '' }} required style="display:none;" onchange="updateSelectedColor(this)">
                                <div class="color-dot {{ $index === 0 ? 'active' : '' }}" style="background:{{ strtolower($color) == 'hitam' ? '#111' : (strtolower($color) == 'putih' ? '#eee' : (strtolower($color) == 'navy' ? '#000080' : strtolower($color))) }}" title="{{ $color }}"></div>
                            </label>
                        @endforeach
                    </div>
                </div>
                @endif

                @if(!empty($product->sizes) && is_array($product->sizes))
                <div class="option-group">
                    <div class="size-header">
                        <span class="option-label">Select Size</span>
                        <span class="size-guide">Size Guide</span>
                    </div>
                    <div class="size-grid">
                        @foreach($product->sizes as $index => $size)
                            <label style="cursor: pointer;">
                                <input type="radio" name="size" value="{{ $size }}" {{ $index === 0 ? 'checked' : '' }} required style="display:none;" onchange="updateSelectedSize(this)">
                                <div class="size-box {{ $index === 0 ? 'active' : '' }}">{{ strtoupper($size) }}</div>
                            </label>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="add-to-cart-wrapper">
                    <div class="qty-controls">
                        <button type="button" class="qty-btn" onclick="let input=document.getElementById('qty'); input.value=Math.max(1, parseInt(input.value)-1);"><i class="fas fa-minus" style="font-size:0.6rem"></i></button>
                        <input type="number" name="quantity" id="qty" class="qty-input" value="1" min="1" max="{{ $product->stock }}">
                        <button type="button" class="qty-btn" onclick="let input=document.getElementById('qty'); input.value=Math.min({{ $product->stock }}, parseInt(input.value)+1);"><i class="fas fa-plus" style="font-size:0.6rem"></i></button>
                    </div>
                    <button type="submit" class="btn-add" {{ $product->stock < 1 ? 'disabled' : '' }}>
                        <i class="fas fa-shopping-bag"></i> 
                        {{ $product->stock < 1 ? 'Out of Stock' : 'Add to Cart' }}
                    </button>
                </div>
            </form>

            <div class="accordion">
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span>Product Details</span>
                        <i class="fas fa-chevron-down" style="font-size:0.7rem"></i>
                    </div>
                    <div class="accordion-content">
                        {{ $product->description ?: 'A masterpiece of modern tailoring. This garment is meticulously crafted from premium materials, ensuring a perfect drape and exceptional comfort. Designed for the discerning individual who appreciates subtle luxury and timeless style.' }}
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span>Shipping & Returns</span>
                        <i class="fas fa-chevron-right" style="font-size:0.7rem; color:var(--text-muted)"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- FEATURES (3 Columns) -->
        <div class="features-grid">
            <div class="feature-item">
                <i class="fas fa-leaf"></i>
                <div class="feature-title">Ethically Sourced</div>
                <div class="feature-desc">Our wool is certified by the Responsible Wool Standard, ensuring the highest welfare for animals and farmers.</div>
            </div>
            <div class="feature-item">
                <i class="fas fa-hourglass-half"></i>
                <div class="feature-title">Limited Run</div>
                <div class="feature-desc">Only 100 pieces of this specific material are ever produced to maintain exclusivity and reduce environmental waste.</div>
            </div>
            <div class="feature-item">
                <i class="fas fa-tools"></i>
                <div class="feature-title">Lifetime Repair</div>
                <div class="feature-desc">We offer complimentary stitching and maintenance for the life of the garment as part of our circular fashion commitment.</div>
            </div>
        </div>

        <!-- COMPLETE THE LOOK -->
        @if($related->isNotEmpty())
        <div class="related-section">
            <h2 class="section-title">Complete the Look</h2>
            <div class="section-subtitle">
                <span>Curated essentials for the modern collector.</span>
                <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" style="text-decoration:underline; font-size:0.75rem; text-transform:uppercase;">View All Accessories</a>
            </div>
            <div class="related-grid">
                @foreach($related->take(3) as $rel)
                <a href="{{ route('products.show', $rel->slug) }}" class="related-card">
                    <div class="related-img">
                        @php $rImg = $rel->image ? asset('storage/'.$rel->image) : ($placeholderImages[$rel->category->slug ?? ''] ?? 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=500&q=80'); @endphp
                        <img src="{{ $rImg }}" alt="{{ $rel->name }}">
                    </div>
                    <div class="related-name">{{ $rel->name }}</div>
                    <div class="related-price">{{ str_replace('Rp ', 'Rp', $rel->formatted_price) }}</div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
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
                </ul>
            </div>
            <div class="footer-col">
                <h4>The Company</h4>
                <ul>
                    <li><a href="#">Sustainability Report</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Newsletter</h4>
                <p style="font-size:0.75rem; color:var(--text-muted); margin-bottom:1rem;">Subscribe for exclusive updates.</p>
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
<script>
function updateSelectedColor(radio) {
    document.querySelectorAll('input[name="color"]').forEach(el => {
        el.nextElementSibling.classList.remove('active');
    });
    radio.nextElementSibling.classList.add('active');
}
function updateSelectedSize(radio) {
    document.querySelectorAll('input[name="size"]').forEach(el => {
        el.nextElementSibling.classList.remove('active');
    });
    radio.nextElementSibling.classList.add('active');
}
</script>
</html>
