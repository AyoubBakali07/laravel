<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Laravel App</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Favicon, other styles, etc. -->
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">
        <!-- Navbar -->
        <nav class="bg-white w-full shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <a href="#" class="text-2xl font-bold text-gray-800">Your Laravel App</a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex space-x-4">
                        <a href="/" class="text-gray-700 hover:bg-gray-100 hover:text-blue-500 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="/contact" class="text-gray-700 hover:bg-gray-100 hover:text-blue-500 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <form method="POST" action="{{ route('contact.store') }}" class="bg-white p-8 rounded shadow-md w-full max-w-lg">
        @csrf
        <h2 class="text-2xl font-bold mb-6 text-center">Contact Us</h2>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Nom :</label>
            <input type="text" name="name" id="name" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Votre nom">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email :</label>
            <input type="email" name="email" id="email" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Votre email">
        </div>

        <div class="mb-4">
            <label for="messages" class="block text-gray-700 font-semibold mb-2">Message :</label>
            <textarea name="messages" id="messages" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Votre message" rows="5"></textarea>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition">Envoyer</button>
    </form>

</body>
</html>
