<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('products.index') }}" class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Products</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('vouchers.index') }}" class="nav-link {{ Request::is('vouchers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Vouchers</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('product-payments.index') }}" class="nav-link {{ Request::is('productPayments*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Product Payments</p>
    </a>
</li>
