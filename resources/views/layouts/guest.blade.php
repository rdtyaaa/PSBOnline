<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PSB Online')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.5.3/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 p-10">
    <div class="container mx-auto bg-white rounded-lg my-auto max-w-lg p-5">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.5.3/dist/flowbite.min.js"></script>
    @stack('js')
</body>
</html>
