<nav class="navbar bg-base-200 shadow-lg">
    <div class="flex-1">
        <a href="{{ route('products.index') }}" class="btn btn-ghost text-xl">Product Manager</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal gap-2 px-1">
            <li><a href="{{ route('products.index') }}" class="text-xl">Products</a></li>
            <li><a href="{{ route('products.create') }}" class="btn btn-primary btn-md text-xl">Add Product</a></li>
        </ul>
    </div>
</nav>
