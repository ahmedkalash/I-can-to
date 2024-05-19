@extends('customer.layouts.app')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- links -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-W3f+o8E26Ff/x2B5G1h4O+E5gu2gnpTCRjWmgxOdYGtX3xFhhLz25PqgW0D8Jv/wgtCZ/fKTNa5rJcBvJd0eRQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/forget password.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/normalize.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/all.min.css">
    <title>Forget Password</title>
@endsection

@section('content')

    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Nav bar -->
        <nav class="nav">
            <div class="nav-logo">
                <!-- logo -->
                <p>I Can Too</p>
            </div>
            <!-- navigation bar -->
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="{{route('customer.index')}}" class="link">Home</a></li>
                    <li><a href="" class="link">Contact</a></li>
                    <li><a href="{{route('customer.showLoginPage')}}" class="link active">Register</a></li>
                    <li><a href="#" class="link">About</a></li>
                </ul>
            </div>
        </nav>

        <!-- Main content container -->
        <div class="content-wrapper">
            <div class="container">
                <form action="{{route('customer.passwordReset')}}" method="post">
                    @csrf
                    <h2>Forget Password</h2>
                    <div class="input-text">
                        <input type="password" name="password" required>
                        <label>Enter Your password</label>
                    </div>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-text">
                        <input type="password" name="password_confirmation" required>
                        <label>Confirm Your password</label>
                    </div>
                    @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit">Change Password</button>
                    <div class="register">
                        <p>Don't have an account? <a href="{{route('customer.showLoginPage')}}">Register</a></p>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-content">
                <div class="social-icons">
                    <i class='bx bxl-facebook'></i>
                    <i class='bx bxl-twitter'></i>
                    <i class='bx bxl-instagram-alt'></i>
                    <i class='bx bxl-linkedin'></i>
                </div>
            </div>
        </footer>
    </div>

@endsection
