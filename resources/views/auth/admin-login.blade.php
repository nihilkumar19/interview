<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">

<div class="bg-white p-8 shadow-md rounded w-96">
<h2 class="text-2xl font-bold mb-5 text-center">Admin Login</h2>

@if ($errors->any())
<div class="text-red-500 mb-3">
    {{$errors->first()}}
</div>
@endif

<form action="{{ route('admin.login.submit') }}" method="POST">
@csrf

<input type="email" name="email" placeholder="Email"
class="w-full border p-2 mb-3">

<input type="password" name="password" placeholder="Password"
class="w-full border p-2 mb-3">

<button class="w-full bg-blue-600 text-white p-2 rounded">
Login
</button>

</form>

</div>
</body>
</html>
