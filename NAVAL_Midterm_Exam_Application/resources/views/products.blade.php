<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gadget Store</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .product-card { border: 1px solid #ddd; padding: 10px; margin: 10px; display: inline-block; width: 250px; text-align: center; }
        .filter-form { margin-bottom: 20px; }
        .filter-form select { padding: 5px; }
    </style>
</head>
<body>
    <h1>Gadget Store</h1>

    <form method="GET" action="{{ route('products') }}" class="filter-form">
        <label for="category">Select Category:</label>
        <select name="category" id="category" onchange="this.form.submit()">
            <option value="all" {{ $selectedCategory == 'all' ? 'selected' : '' }}>All</option>
            <option value="Smartphone" {{ $selectedCategory == 'Smartphone' ? 'selected' : '' }}>Smartphones</option>
            <option value="Laptop" {{ $selectedCategory == 'Laptop' ? 'selected' : '' }}>Laptops</option>
            <option value="Headphones" {{ $selectedCategory == 'Headphones' ? 'selected' : '' }}>Headphones</option>
            <option value="Smartwatch" {{ $selectedCategory == 'Smartwatch' ? 'selected' : '' }}>Smartwatches</option>
            <option value="Accessories" {{ $selectedCategory == 'Accessories' ? 'selected' : '' }}>Accessories</option>
            <option value="Camera" {{ $selectedCategory == 'Camera' ? 'selected' : '' }}>Cameras</option>
        </select>
    </form>

    <div>
        @forelse($products as $product)
            <div class="product-card">
                <h3>{{ $product['name'] }}</h3>
                <p>Category: {{ $product['category'] }}</p>
                <p>Price: ₱{{ number_format($product['price'], 2) }}</p>
            </div>
        @empty
            <p>No products available in this category.</p>
        @endforelse
    </div>

</body>
</html>
