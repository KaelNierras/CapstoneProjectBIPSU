<!DOCTYPE html>
<html>
<head>
    <title>Page Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-6xl text-red-500">404</h1>
        <h2 class="text-4xl text-gray-700">Page not found</h2>
        <p class="text-gray-500">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
        <a href="{{ url('/') }}" class="text-blue-500 hover:text-blue-700 underline mt-4 inline-block">Go to Homepage</a>
    </div>
</body>
</html>