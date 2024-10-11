<!DOCTYPE html>
<html>
<head>
    <title>Already Logged In</title>
</head>
<body>
    <h1>You are already logged in</h1>
    <p>Do you want to log out?</p>
      {{-- Check the user's usertype and redirect accordingly --}}
      @if (Auth::user()->usertype === 'admin')
            <a href="{{ route('admin.index') }}" class="btn btn-primary">Go to Admin Dashboard</a>
        @elseif (Auth::user()->usertype === 'student')
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Go to Student Dashboard</a>
        @else
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
        @endif
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>