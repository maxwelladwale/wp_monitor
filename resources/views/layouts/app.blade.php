<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'My Laravel App')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
        <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navigation Bar -->
    <nav class="bg-blue-600 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-white text-xl font-bold">Home</a>
            <div class="space-x-4">
                <a href="{{ route('clients.index') }}" class="text-white hover:text-gray-300">Clients</a>
                <a href="{{ route('clients.create') }}" class="text-white hover:text-gray-300">Add Client</a>

                @auth
                    <a href="" class="text-white hover:text-gray-300"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="" class="text-white hover:text-gray-300">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-6">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center py-4 mt-6">
        <p>&copy; {{ date('Y') }} My Laravel App. All rights reserved.</p>
    </footer>

</body>
</html>
