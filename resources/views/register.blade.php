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
        <div class="login">
            <form method="post" action="/signup" style="display: flex; flex-direction: column; gap:5px; width: 50%; margin: auto;">
                @csrf
                <div style="display: flex; gap: 3px; flex-direction: column; width: 100%;">
                    <label>Full Name</label>
                    <input type="text" name="name"  placeholder="Enter Full name" value="{{old('name')}}" autocomplete="on">
                    @error('name')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div style="display: flex; gap: 3px; flex-direction: column; width: 100%;">
                    <label>Email address</label>
                    <input type="text" name="email"  placeholder="Enter Email address" value="{{old('email')}}" autocomplete="on">
                    @error('email')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div style="display: flex; gap: 3px; flex-direction: column; width: 100%;">
                    <label>Telephone</label>
                    <input type="tel" name="telephone"  placeholder="Enter telephone number" value="{{old('email')}}" autocomplete="on">
                    @error('telephone')
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
                <div style="display: flex; gap: 3px; flex-direction: column; width: 100%;">
                    <label>Confirm Password</label>
                    <input type="password" name="confirmPassword" id="pwd" placeholder="confirm password" value="{{ old('confirmPassword') }}">
                    @error('confirmPassword')
                    <p>{{$message}}</p>
                    @enderror
                </div>

                <button type="submit">Sign Up</button>
            </form>
        </div>
        <hr />

        <div style="text-align: center">
            <a href="/login">Have an account? Login</a>
        </div>

    </div>
</div>
</body>

</html>