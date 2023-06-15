<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg bg-dark text-white">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <h2 class="text-white">PETSHOP</h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (Route::has('login'))
                @auth
                @else
                <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                </li>
                @endif
                @if (Route::has('register'))
                <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                </li>
                @endif
                @endauth
                
        </div>
        </div>
    </nav>
    <div>
        <div id="carouselExampleIndicators" class="carousel slide mb-6" data-bs-ride="carousel" data-bs-theme="light">
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets\vendor\adminlte\dist\img\banner1.png" style="height: 100vh" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="assets\vendor\adminlte\dist\img\banner2.png" style="height: 100vh" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="assets\vendor\adminlte\dist\img\banner3.png" style="height: 100vh" class="d-block w-100">
            </div>
            </div>
            <button class="carousel-control-prev bg-dark" style="width: 70px" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                {{-- <i class="bi bi-arrow-left-circle"></i> --}}
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next bg-dark" style="width: 70px" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>