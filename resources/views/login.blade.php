<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Champions</title>
</head>

<body>

<div class="body">
    <div class="contents">
        @if(session('user'))
            <p style="text-align: center; color: green">{{ session('user') }}</p>
        @endif

        <div class="login">
            <form method="post" action="/signin" style="display: flex; flex-direction: column; gap:5px; width: 50%; margin: auto;">
                @csrf
                <div style="display: flex; gap: 3px; flex-direction: column; width: 100%;">
                    <label>Email address</label>
                    <input type="text" name="email"  placeholder="Enter Email address" value="{{old('email')}}" autocomplete="on">
                    @error('email')
                    <p>{{$message}}</p>
                    @enderror
                </div>

                <div style="display: flex; gap: 3px; flex-direction: column; width: 100%;">
                    <label>Password</label>
                    <input type="password" name="password" id="pwd" placeholder="Password" value="{{ old('password') }}">
                    @error('password')
                    <p>{{$message}}</p>
                    @enderror
                </div>

                <button type="submit">Log In</button>
            </form>
        </div>
        <hr />

        <div style="text-align: center">
            <a href="/register">Have no account? Register</a>
        </div>

    </div>
</div>
</body>

</html>