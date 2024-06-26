@extends('customer.layouts.app')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-W3f+o8E26Ff/x2B5G1h4O+E5gu2gnpTCRjWmgxOdYGtX3xFhhLz25PqgW0D8Jv/wgtCZ/fKTNa5rJcBvJd0eRQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/register.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/normalize.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/all.min.css">
    <title>Login</title>
@endsection

@section('content')


    <!-- nav bar align -->
    <div class="wrapper">
    <!-- navigation bar -->
        <nav class="nav">
        <div class="nav-logo">
    <!-- logo -->
            <p>I Can Too</p>
        </div>
    <!-- navigation bar -->
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="{{route('customer.index')}}" class="link">Home</a></li>
                <li><a href="#" class="link">Contact</a></li>
                <li><a href="{{route('customer.authenticate')}}" class="link active">Register</a></li>
                <li><a href="#" class="link">About</a></li>
            </ul>
        </div>
    <!-- sign In & up button -->
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
        </nav>
    <!-- form box -->
        <div class="form-box">
    <!-- login form -->
        <div class="login-container" id="login">
            <div class="top">
                <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                <header>Login</header>
                @error('login_failed')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                @error('too_many_failed_login_attempts')
                <div class="text-danger">
                    {{__("auth.throttle", ["seconds" =>session('lockup_minutes')])}}
                </div>
                @enderror

            </div>

            <form method="post" action="{{route('customer.authenticate')}}">
                @csrf
                    <div class="input-box">
                        <input type="email" class="input-field" placeholder="email" name="email">
                        <i class="bx bx-user"></i>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="password"  name="password">
                        <i class="bx bx-lock-alt"></i>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-box">
                        <button type="submit" class="submit">Sign In</button>

                    </div>
                    <div class="input-box">
                        <a class="btn btn-danger"
                           href="{{route('customer.redirectToProvider','google')}}"
                           role="button"
                           style="font-size: 15px;
                            font-weight: 500;
                            height: 45px;
                            width: 100%;
                            border: none;
                            border-radius: 30px;
                            outline: none;
                            cursor: pointer;
                            transition: .3s ease-in-out;
                            margin-bottom: 10px; "
                        >
                            Sign In with Google
                        </a>
                    </div>
                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="login-check" name="remember_me">
                            <label for="login-check"> Remember Me</label>
                            @error('remember_me')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="two">
                            <label><a href="{{route('customer.showForgetPasswordPage')}}">Forgot password?</a></label>
                        </div>
                        <div class="two">
                            <label><a href="#">Login as Guest?</a></label>
                        </div>
                    </div>
            </form>

        </div>

    <!-- registration form -->
            @error('registration_failed')
            <span class="text-danger">{{ $message }}</span>
            @enderror

    <div class="register-container" id="register">


        <form  method="post" action="{{route('customer.register')}}">
            @csrf
            <div class="top">
                <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                <header>Sign Up</header>
            </div>
            <div class="two-forms">
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Firstname" name="first_name">
                    <i class="bx bx-user"></i>
                    @error('first_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Lastname" name="last_name">
                    <i class="bx bx-user"></i>
                     @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Email" name="email">
                <i class="bx bx-envelope"></i>
                @error('email')
                     <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="Password" name="password">
                <i class="bx bx-lock-alt"></i>
                @error('password')
                        <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
             <div class="input-box">
                <input type="password" class="input-field" placeholder="Password confirmation" name="password_confirmation">
                <i class="bx bx-lock-alt"></i>
                @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-box">
                <button type="submit" class="submit" >  Register</button>
            </div>
            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="login-check" name="remember_me">
                    <label for="register-check"> Remember Me</label>
                    @error('remember_me')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="two">
                    <input class="checkbox_animated check-box" type="checkbox"
                           id="flexCheckDefault" name="agree" REQUIRED>
                    <label><a href="#">Terms & conditions</a></label>
                    @error('agree')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        </form>

    </div>

    </div>
     <!-- Footer -->
     <footer>
        <div class="footer-content">
            <div class="social-icons">
                    <i class='bx bxl-facebook' ></i>
                    <i class='bx bxl-twitter'></i>
                    <i class='bx bxl-instagram-alt'></i>
                    <i class='bx bxl-linkedin'></i>
            </div>
        </div>

    </footer>
    </div>
    <!-- java script code  -->
    <script>
     function myMenuFunction() {
        var i = document.getElementById("navMenu");
        if(i.className === "nav-menu") {
            i.className += " responsive";
        } else {
            i.className = "nav-menu";
        }
       }
    </script>
    <script>
        var a = document.getElementById("loginBtn");
        var b = document.getElementById("registerBtn");
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        function login() {
            localStorage.setItem('prev_form', 'login')
            x.style.left = "4px";
            y.style.right = "-520px";
            a.className += " white-btn";
            b.className = "btn";
            x.style.opacity = 1;
            y.style.opacity = 0;
        }
        function register() {
            localStorage.setItem('prev_form', 'register')
            x.style.left = "-510px";
            y.style.right = "5px";
            a.className = "btn";
            b.className += " white-btn";
            x.style.opacity = 0;
            y.style.opacity = 1;
        }
        console.log('test', localStorage.getItem('prev_form'))
        if(localStorage.getItem('prev_form') === 'register'){
            register()
        }else{
            login()
        }

    </script>
    <script>


    </script>

@endsection

