<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center">
    <div class="w-full max-w-6xl bg-white p-8 rounded-lg shadow-md mt-10">
        <h2 class="text-3xl font-bold mb-6 text-center">Products</h2>
        <div class="text-right mb-6">
            <a href="?controller=cart&action=view" class="text-blue-500 hover:underline">View Cart</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-2"><?php echo $row['name']; ?></h3>
                    <img src="<?php echo $row['image'];?>" alt="<?php echo $row['name'];?>" >
                    <p class="text-gray-700 mb-2"><?php echo $row['description']; ?></p>
                    <p class="text-lg font-semibold text-blue-600 mb-4">$<?php echo number_format($row['price'], 2); ?></p>
                    <div class="flex justify-between items-center">
                        <a href="?controller=product&action=show&id=<?php echo $row['id']; ?>" class="text-blue-500 hover:underline">View Details</a>
                        <form method="POST" action="?controller=cart&action=add">
                            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add to Cart</button>
                        </form>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
