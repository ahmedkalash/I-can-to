<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- links -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/home.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/normalize.css">
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/all.min.css">
    <title>Home</title>
</head>
<body>
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
            <li><a href="home.html" class="link active">Home</a></li>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropbtn">Favorate</a>
              <i class='bx bxs-down-arrow'></i>
              <div class="dropdown-content">

              
                <!-- make favourites dynamic -->
                @foreach ($fav as $fav_item)
                    <a href="{{$fav_item->id}}">{{$fav_item->text}}</a>                
                @endforeach
              </div>
            </li>
            <li><a href="#" class="link">Contact</a></li>
            @guest
                 <li><a href="{{route('customer.showLoginPage')}}" class="link">Login</a></li>
            @endguest
            @auth
                 <li>
                     <form method="post" action="{{route('customer.logout')}}">
                         @csrf
                         <button type="submit"  class="btn btn-link link" style="background-color: transparent; border-color: transparent;">logout</button>
                     </form>
                 </li>
            @endauth

            <li><a href="#" class="link">About</a></li>
        </ul>
    </div>
<!-- sign In & up button -->

<div class="nav-menu-btn">
    <i class="bx bx-menu" onclick="myMenuFunction()"></i>
</div>
</nav>
<!-- translation section = -->
<main>
    <section>
        <h2>Welcome to Sign Language Translation</h2>
        <p>Translate sign language gestures to text with our advanced translation system.</p>
        <div class="input-container">
            <label for="gestureInputLeft">Record sign language gesture:</label>
            <textarea id="gestureInputLeft" class="gesture-input" placeholder="Type here..."></textarea>
            <textarea id="gestureInputRight" class="gesture-input" placeholder="Type here..."></textarea>
        </div>
        <!-- button container -->
        <div class="button-container">
            <button id="translateButton">Translate</button>
            <button id="history">History</button>
            <button id="favorite">Favorate</button>
        </div>
    </section>
</main>
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
    </div>
</footer>
</div>
<!-- java script -->
    <script src="js/script.js"></script>
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
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }
    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }
    </script>
</body>
</html>
