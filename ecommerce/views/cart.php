<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold mb-6 text-center">Your Cart</h2>
        <ul>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <li class="border-b border-gray-200 pb-4 mb-4 flex items-center">
                    <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="w-16 h-16 object-cover mr-4 rounded">
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold"><?php echo htmlspecialchars($row['name']); ?></h3>
                        <p class="text-gray-600">Quantity: <?php echo htmlspecialchars($row['quantity']); ?></p>
                        <p class="text-gray-600">Total: $<?php echo number_format($row['price'] * $row['quantity'], 2); ?></p>
                    </div>
                    <form method="POST" action="?controller=cart&action=remove">
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Remove</button>
                    </form>
                </li>
            <?php endwhile; ?>
        </ul>
        <div class="text-center mt-6">
            <a href="?controller=product&action=index" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Continue Shopping</a>
        </div>
    </div>
</body>
</html>
