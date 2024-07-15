<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($product['name']); ?></h2>
        <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="w-full h-48 object-cover mb-4 rounded">
        <p class="text-gray-700 mb-4"><?php echo htmlspecialchars($product['description']); ?></p>
        <p class="text-2xl font-semibold text-blue-600 mb-6">$<?php echo number_format($product['price'], 2); ?></p>
        <form method="POST" action="?controller=cart&action=add" class="mb-6">
            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Add to Cart</button>
        </form>
        <a href="?controller=product&action=index" class="block text-center text-blue-500 hover:underline">Back to Products</a>
    </div>
</body>
</html>
