<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'My App')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- CDN Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- CDN Flowbite -->
    <link href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased flex flex-col min-h-screen">

    <nav class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Brand/Logo -->
                    <a href="#" class="text-lg font-semibold text-white">MyApp</a>
                </div>

                <!-- Navbar Links (hidden on small screens) -->
                <div class="hidden md:flex space-x-4 items-center">
                    <a href="{{ url('/dashboard') }}" class="hover:bg-gray-700 px-3 py-2 rounded-md">Home</a>

                    @if (Auth::user()->is_admin)
                        <a href="{{ url('/dashboard/user') }}" class="hover:bg-gray-700 px-3 py-2 rounded-md">Data Pengguna</a>
                        <a href="{{ url('/dashboard/registration') }}" class="hover:bg-gray-700 px-3 py-2 rounded-md">Data Pendaftaran</a>
                    @endif
                </div>

                <!-- Sign In button (hidden on small screens) -->
                <div class="hidden md:flex items-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full justify-between text-left bg-red-500 px-4 py-2 rounded-md text-white hover:bg-red-700">Logout</button>
                    </form>
                </div>

                <!-- Mobile menu button -->
                <div class="flex md:hidden items-center">
                    <button id="menuButton" class="text-gray-200 hover:text-white focus:outline-none focus:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (hidden by default) -->
        <div id="mobileMenu" class="md:hidden">
            <a href="{{ url('/dashboard') }}" class="block px-4 py-2 text-sm hover:bg-gray-700">Home</a>
            @if (Auth::user()->is_admin)
                <a href="{{ url('/dashboard/user') }}" class="block px-4 py-2 text-sm hover:bg-gray-700">Data Pengguna</a>
                <a href="{{ url('/dashboard/registration') }}" class="block px-4 py-2 text-sm hover:bg-gray-700">Data Pendaftaran</a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full justify-between text-left bg-red-500 px-4 py-2 rounded-md text-white hover:bg-red-700">Logout</button>
            </form>
        </div>
    </nav>

    <main class="container mx-auto mt-5 flex-grow">
        @if (session('success'))
            <div class="mb-4 rounded bg-green-500 p-4 text-white">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 rounded bg-red-500 p-4 text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 p-4 text-white">
        <div class="container mx-auto text-center">
            <p>&copy; PSB Online. All rights reserved.</p>
        </div>
    </footer>

    <!-- Flowbite JS -->
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.js"></script>

    <!-- Custom Scripts -->
    <script>
        $(document).ready(function() {
            // Alert for invalid fields
            @if ($errors->any())
                alert("Please fix the errors in the form.");
            @endif
        });
    </script>

    <script>
        // Toggle mobile menu
        document.getElementById('menuButton').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>

</html>
