<h2>Admin Login</h2>

@if($errors->any())
<p style="color:red">{{ $errors->first() }}</p>
@endif

<form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf   <!-- 🔥 VERY IMPORTANT -->

    <input type="email" name="email" placeholder="Admin Email" required>
    <br>

    <input type="password" name="password" placeholder="Password" required>
    <br>

    <button type="submit">Login</button>
</form>
