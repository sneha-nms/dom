<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
   
    <form method="POST" action="?controller=user&action=login" class="bg-white p-8 rounded shadow-md w-80">
    <h2 class="text-2xl font-bold mb-6">Login</h2>
        <div class="mb-4">
            <label for="username" class="block text-gray-700">Username:</label>
            <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-700">Password:</label>
            <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Login</button>
    </form>
</body>
</html>
