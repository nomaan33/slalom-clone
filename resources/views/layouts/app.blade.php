<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="text-2xl font-bold">
                <a href="/">MyBlog</a>
            </div>
            <!-- Menu -->
            <nav>
                <ul class="flex space-x-8">
                    <li><a href="/" class="hover:underline">Home</a></li>
                    <li><a href="/insights" class="hover:underline">Insights</a></li>
                    <li><a href="/category" class="hover:underline">Category</a></li>
                    <li><a href="/jobs" class="hover:underline">Jobs</a></li>
                    <li><a href="/contact" class="hover:underline">Contact</a></li>
                </ul>
            </nav>
            <!-- Right-side Menu -->
            <div class="flex space-x-4">
                <a href="/lets-talk" class="hover:underline">Let's Talk</a>
                <a href="/search" class="hover:underline">Search</a>
            </div>
        </div>
    </header>

    <div class="container mx-auto mt-10">
        @yield('content')
    </div>

    <footer class="bg-gray-900 text-white py-6 mt-10">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 MyBlog. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
