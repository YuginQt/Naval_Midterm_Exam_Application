<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naval Gadget Store</title>
    <style>
        body { 
            font-family: 'Arial', sans-serif; 
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #0f0c29, #302b63, #24243e); /* Dark futuristic gradient */
            color: #fff;
            text-align: center;
        }
        h1 {
            text-shadow: 0 0 10px rgba(0, 183, 255, 0.8);
            margin-top: 20px;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        .filter-form { 
            margin-bottom: 20px;
        }
        .filter-form select { 
            padding: 10px; 
            border-radius: 5px; 
            border: none;
            background: #181818;
            color: #00eaff;
            font-size: 16px;
            outline: none;
            box-shadow: 0 0 10px rgba(0, 183, 255, 0.8);
        }
        .products-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            justify-items: center;
            margin-top: 20px;
        }
        .product-card { 
            border: 1px solid rgba(255, 255, 255, 0.2); 
            background: rgba(0, 0, 0, 0.6);
            padding: 20px; 
            width: 250px; 
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 183, 255, 0.6);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(0, 255, 183, 0.8);
        }
        .product-card h3 {
            margin-bottom: 10px;
            text-shadow: 0 0 5px rgba(0, 183, 255, 0.8);
        }
    </style>
</head>
<body>

    <h1>Welcome to Naval's Gadget Store 🚀</h1>

    <div class="container">
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
                <option value="Tablet" {{ $selectedCategory == 'Tablet' ? 'selected' : '' }}>Tablets</option> <!-- New Tablet Category -->
            </select>
        </form>

        <div class="products-container">
            @php
                $products = [
                    ["name" => "iPhone 16 Pro Max", "category" => "Smartphone", "price" => 89999],
                    ["name" => "Samsung S25 Ultra 5G", "category" => "Smartphone", "price" => 85999],
                    ["name" => "MacBook Pro M3", "category" => "Laptop", "price" => 124999],
                    ["name" => "Dell XPS 17", "category" => "Laptop", "price" => 109999],
                    ["name" => "Sony WH-1000XM5", "category" => "Headphones", "price" => 19999],
                    ["name" => "Apple AirPods Max", "category" => "Headphones", "price" => 29999],
                    ["name" => "Apple Watch Ultra 2", "category" => "Smartwatch", "price" => 49999],
                    ["name" => "Samsung Galaxy Watch 6", "category" => "Smartwatch", "price" => 23999],
                    ["name" => "Xiaomi Pad 6s Pro", "category" => "Tablet", "price" => 28999],  // New Tablet
                    ["name" => "iPad 10th Gen", "category" => "Tablet", "price" => 35999],      // New Tablet
                    ["name" => "Sony Alpha A7 IV", "category" => "Camera", "price" => 99999],
                    ["name" => "Canon EOS R6", "category" => "Camera", "price" => 89999],
                    ["name" => "Logitech MX Master 3", "category" => "Accessories", "price" => 5999],
                    ["name" => "Razer BlackWidow V4", "category" => "Accessories", "price" => 12999],
                ];

                $filteredProducts = ($selectedCategory == 'all') 
                    ? $products 
                    : array_filter($products, fn($product) => $product['category'] == $selectedCategory);
            @endphp

            @forelse($filteredProducts as $product)
                <div class="product-card">
                    <h3>{{ $product['name'] }}</h3>
                    <p>Category: {{ $product['category'] }}</p>
                    <p>Price: ₱{{ number_format($product['price'], 2) }}</p>
                </div>
            @empty
                <p>No products available in this category.</p>
            @endforelse
        </div>
    </div>

</body>
</html>
