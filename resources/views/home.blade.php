<!DOCTYPE html>
<html>
<head>
    <title>Admin System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-10 rounded shadow-md text-center">
        <h1 class="text-2xl font-bold mb-5">Welcome to Admin Management System</h1>

        <a href="{{ route('login') }}" 
           class="bg-blue-600 text-white px-6 py-2 rounded mr-3">
            Login
        </a>

        <a href="{{ route('register') }}" 
           class="bg-green-600 text-white px-6 py-2 rounded">
            New User? Register
        </a>
    </div>

</body>
</html>
