<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | LUXE & CO.</title>
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

        /* HEADER SECURE */
        .header-secure {
            background-color: var(--white);
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }
        .brand { font-size: 1.25rem; font-weight: 800; color: var(--brand-green); letter-spacing: 1px; text-transform: uppercase; }
        .secure-badge { font-size: 0.75rem; color: var(--text-muted); display: flex; align-items: center; gap: 0.5rem; text-transform: uppercase; letter-spacing: 1px; }

        /* CHECKOUT LAYOUT */
        .checkout-container { max-width: 1000px; margin: 0 auto; padding: 3rem 2rem; display: grid; grid-template-columns: 1fr 340px; gap: 4rem; align-items: start; }
        
        .breadcrumb { font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-light); margin-bottom: 2rem; }
        
        /* FORMS */
        .section-title { font-size: 1.1rem; font-weight: 600; color: var(--brand-green); margin-bottom: 1.5rem; border-bottom: 1px solid var(--border-color); padding-bottom: 0.5rem; }
        
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem; }
        .form-group { display: flex; flex-direction: column; gap: 0.4rem; }
        .form-group.full { grid-column: 1 / -1; }
        .form-label { font-size: 0.75rem; font-weight: 600; color: var(--text-main); text-transform: uppercase; letter-spacing: 0.5px; }
        .form-control { padding: 0.8rem; border: 1px solid var(--border-color); background-color: var(--white); font-family: 'Inter', sans-serif; font-size: 0.85rem; outline: none; transition: border-color 0.2s; }
        .form-control:focus { border-color: var(--brand-green); }
        
        /* SHIPPING METHOD */
        .shipping-options { margin-bottom: 2rem; }
        .shipping-option {
            display: flex; justify-content: space-between; align-items: center;
            padding: 1rem;
            border: 1px solid var(--border-color);
            margin-bottom: 0.5rem;
            cursor: pointer;
            background-color: var(--white);
        }
        .shipping-option.active { border-color: var(--brand-green); background-color: rgba(3,59,42,0.02); }
        .shipping-option-left { display: flex; align-items: center; gap: 1rem; }
        .shipping-option input { accent-color: var(--brand-green); }
        .shipping-name { font-size: 0.85rem; font-weight: 600; }
        .shipping-desc { font-size: 0.75rem; color: var(--text-muted); }
        .shipping-price { font-size: 0.85rem; font-weight: 600; color: var(--brand-green); }

        /* PAYMENT */
        .payment-box { border: 1px solid var(--border-color); background-color: var(--white); padding: 1.5rem; margin-bottom: 2rem; }
        .saved-card { display: flex; align-items: center; gap: 0.5rem; font-size: 0.8rem; color: var(--text-muted); margin-bottom: 1.5rem; }
        .saved-card input { accent-color: var(--brand-green); }
        .card-input-wrapper { position: relative; }
        .card-icon { position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); color: var(--text-light); }

        .btn-complete { width: 100%; padding: 1.2rem; background-color: var(--brand-green); color: var(--white); border: none; font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; cursor: pointer; transition: background-color 0.3s; margin-top: 1rem; }
        .btn-complete:hover { background-color: var(--brand-green-hover); }
        .terms-text { text-align: center; font-size: 0.65rem; color: var(--text-muted); margin-top: 1rem; }

        /* ORDER SUMMARY */
        .summary-box { background-color: var(--surface-color); padding: 2rem; position: sticky; top: 2rem; }
        .summary-title { font-size: 1rem; font-weight: 600; margin-bottom: 1.5rem; }
        
        .summary-items { margin-bottom: 1.5rem; }
        .summary-item { display: flex; gap: 1rem; margin-bottom: 1rem; }
        .summary-item-img { width: 50px; height: 60px; background-color: #e5e7eb; flex-shrink: 0; }
        .summary-item-img img { width: 100%; height: 100%; object-fit: cover; }
        .summary-item-info { flex: 1; font-size: 0.75rem; }
        .summary-item-title { font-weight: 600; margin-bottom: 0.2rem; }
        .summary-item-meta { color: var(--text-muted); margin-bottom: 0.2rem; }
        .summary-item-price { font-weight: 600; color: var(--brand-green); }

        .summary-row { display: flex; justify-content: space-between; font-size: 0.75rem; color: var(--text-muted); margin-bottom: 0.8rem; }
        .summary-row.total { font-size: 0.95rem; font-weight: 700; color: var(--brand-green); border-top: 1px solid var(--border-color); padding-top: 1rem; margin-top: 0.5rem; }
        
        .security-notice { display: flex; align-items: flex-start; gap: 0.8rem; font-size: 0.65rem; color: var(--text-muted); margin-top: 2rem; background: var(--white); padding: 1rem; border: 1px solid var(--border-color); }
        .security-notice i { color: var(--brand-green); font-size: 1rem; }

        /* FOOTER LITE */
        .footer-lite { max-width: 1200px; margin: 4rem auto 2rem; border-top: 1px solid var(--border-color); padding-top: 2rem; display: flex; justify-content: space-between; align-items: center; font-size: 0.65rem; color: var(--text-light); text-transform: uppercase; letter-spacing: 1px; }
        .footer-links { display: flex; gap: 1.5rem; }
        .footer-links a:hover { color: var(--text-main); }

        @media (max-width: 900px) {
            .checkout-container { grid-template-columns: 1fr; gap: 3rem; }
            .footer-lite { flex-direction: column; gap: 1rem; text-align: center; }
        }
    </style>
</head>
<body>

    <header class="header-secure">
        <a href="{{ route('home') }}" class="brand">LUXE & CO.</a>
        <div class="secure-badge">
            <i class="fas fa-lock"></i> Secure Checkout
        </div>
    </header>

    <div class="checkout-container">
        <!-- LEFT: FORMS -->
        <div>
            <div class="breadcrumb">
                Cart > Information > <span style="font-weight:600; color:var(--text-main)">Payment</span>
            </div>

            <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
                @csrf
                
                <h2 class="section-title">Shipping Address</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" value="{{ explode(' ', auth()->user()->name)[0] ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" value="{{ explode(' ', auth()->user()->name)[1] ?? '' }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group full">
                        <label class="form-label">Address</label>
                        <input type="text" name="shipping_address" class="form-control" placeholder="Street Address, P.O. Box" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Postal Code</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>

                <h2 class="section-title" style="margin-top:2rem;">Shipping Method</h2>
                <div class="shipping-options">
                    <label class="shipping-option active">
                        <div class="shipping-option-left">
                            <input type="radio" name="shipping_method" checked>
                            <div>
                                <div class="shipping-name">Standard Delivery</div>
                                <div class="shipping-desc">3-5 Business Days</div>
                            </div>
                        </div>
                        <div class="shipping-price">Free</div>
                    </label>
                    <label class="shipping-option">
                        <div class="shipping-option-left">
                            <input type="radio" name="shipping_method">
                            <div>
                                <div class="shipping-name">Express Delivery</div>
                                <div class="shipping-desc">1-2 Business Days</div>
                            </div>
                        </div>
                        <div class="shipping-price">Rp 50.000</div>
                    </label>
                </div>

                <h2 class="section-title">Payment Information</h2>
                <div class="payment-box">
                    <label class="saved-card">
                        <input type="radio" name="payment_method" value="transfer" checked>
                        <span>Use Bank Transfer / Virtual Account</span>
                    </label>
                    
                    <div class="form-group full" style="margin-bottom:1rem;">
                        <label class="form-label">Card Number</label>
                        <div class="card-input-wrapper">
                            <input type="text" class="form-control" placeholder="0000 0000 0000 0000" style="width:100%">
                            <i class="far fa-credit-card card-icon"></i>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Expiration Date</label>
                            <input type="text" class="form-control" placeholder="MM / YY">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Security Code</label>
                            <input type="text" class="form-control" placeholder="CVV">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-complete">Complete Purchase <i class="fas fa-lock" style="margin-left:0.5rem; font-size:0.75rem;"></i></button>
                <div class="terms-text">By clicking "Complete Purchase", you agree to our Terms of Service.</div>
            </form>
        </div>

        <!-- RIGHT: SUMMARY -->
        <div>
            <div class="summary-box">
                <h3 class="summary-title">Order Summary</h3>
                
                <div class="summary-items">
                    @foreach($cartItems as $item)
                    <div class="summary-item">
                        <div class="summary-item-img">
                            @if($item->product->image)
                                <img src="{{ asset('storage/'.$item->product->image) }}" alt="">
                            @endif
                        </div>
                        <div class="summary-item-info">
                            <div class="summary-item-title">{{ $item->product->name }}</div>
                            <div class="summary-item-meta">Qty: {{ $item->quantity }}</div>
                            <div class="summary-item-price">{{ str_replace('Rp ', 'Rp', number_format($item->product->price * $item->quantity, 0, ',', '.')) }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>{{ str_replace('Rp ', 'Rp', number_format($total, 0, ',', '.')) }}</span>
                </div>
                <div class="summary-row">
                    <span>Shipping</span>
                    <span>Calculated at next step</span>
                </div>
                <div class="summary-row">
                    <span>Estimated Tax</span>
                    <span>$0.00</span>
                </div>
                
                <div class="summary-row total">
                    <span>Total</span>
                    <span>{{ str_replace('Rp ', 'Rp', number_format($total, 0, ',', '.')) }}</span>
                </div>

                <div class="security-notice">
                    <i class="fas fa-shield-alt"></i>
                    <div>
                        <div style="font-weight:600; color:var(--text-main); margin-bottom:0.2rem;">Secure Checkout Process</div>
                        All transactions are encrypted and secured. Your payment information is never stored on our servers.
                    </div>
                </div>
            </div>
        </div>
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
