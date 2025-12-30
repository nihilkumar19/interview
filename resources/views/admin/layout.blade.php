<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet">
</head>

<body class="bg-gray-100">

<!-- NAVBAR -->
<nav class="bg-black text-white px-6 py-3 flex justify-between">
    
    <h2 class="text-xl font-bold">Admin Panel</h2>

    <ul class="flex gap-4 items-center">

        <!-- 🔥 FIXED ROUTE -->
        <li>
            <a href="{{ route('admin.items.index') }}"
               class="hover:text-gray-300">
               Items
            </a>
        </li>

        @auth('admin')
        <li>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="bg-red-600 px-3 py-1 rounded hover:bg-red-700">
                    Logout
                </button>
            </form>
        </li>
        @endauth

    </ul>
</nav>

<!-- PAGE CONTENT -->
<div class="p-6">
    @yield('content')
</div>

</body>
</html>
