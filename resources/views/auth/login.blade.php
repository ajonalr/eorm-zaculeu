<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('theme/login.css')}}">
</head>

<body>

    <div id="back">
        <canvas id="canvas" class="canvas-back"></canvas>
        <div class="backRight">
        </div>
        <div class="backLeft">
        </div>
    </div>

    <div id="slideBox">
        <div class="topLayer">
            <div class="left">
                <div class="content">
                    <h2>Sign Up</h2>
                    <form id="form-signup" method="post" onsubmit="return false;">

                    </form>
                </div>
            </div>
            <div class="right">
                <div class="content">
                    <h2>Login</h2>
                    <form id="form-login" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-element form-stack">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" name="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-element form-stack">
                            <label for="password-signup" class="form-label">Password</label>
                            <input id="password-signup" type="password" name="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-element form-checkbox">


                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('OLVIDASTE TU CONTRASEÑA?') }}
                            </a>

                        </div>
                        <div class="form-element form-submit">

                            <button id="goLeft" class="signup off" type="submit">Log In</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('plugins/bootstrap/jquery.min.js')}}"></script>
    <script src="{{asset('theme/login.js')}}"></script>

</body>

</html>