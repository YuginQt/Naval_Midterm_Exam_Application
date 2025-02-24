<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products = [
        ['id' => 1, 'name' => 'iPhone 15 Pro', 'category' => 'Smartphone', 'price' => 69999],
        ['id' => 2, 'name' => 'Samsung Galaxy S23 Ultra', 'category' => 'Smartphone', 'price' => 75999],
        ['id' => 3, 'name' => 'MacBook Air M2', 'category' => 'Laptop', 'price' => 99999],
        ['id' => 4, 'name' => 'Dell XPS 13', 'category' => 'Laptop', 'price' => 85000],
        ['id' => 5, 'name' => 'Sony WH-1000XM5', 'category' => 'Headphones', 'price' => 19000],
        ['id' => 6, 'name' => 'Apple Watch Series 9', 'category' => 'Smartwatch', 'price' => 25000],
        ['id' => 7, 'name' => 'Logitech MX Master 3S', 'category' => 'Accessories', 'price' => 7500],
        ['id' => 8, 'name' => 'GoPro Hero 11', 'category' => 'Camera', 'price' => 32000],
    ];

    public function showProducts(Request $request)
    {
        $category = $request->input('category', 'all'); // Default to 'all' if no category is selected

        // Filter products based on the selected category
        $filteredProducts = ($category === 'all') 
            ? $this->products 
            : array_filter($this->products, fn($product) => $product['category'] === $category);

        return view('products', ['products' => $filteredProducts, 'selectedCategory' => $category]);
    }
}
