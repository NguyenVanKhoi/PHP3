<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
@php
    use App\Models\Category;
    $category = Category::query()->get();
@endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('auth/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('auth/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('auth/css/style.css') }}" rel="stylesheet">
    <title>BonneyShop </title>
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark " arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="{{ route('auth.home') }}">BonneyShop</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.home') }}">Home</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('auth.shop') }}">Shop</a></li>
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Category
                                </a>
                                <ul class="dropdown-menu bg-success" aria-labelledby="navbarDarkDropdownMenuLink">
                                    @foreach ($category as $item)
                                        <li><a class="dropdown-item bg-success"
                                                href="{{ route('auth.category', $item->id) }}">{{ $item->category_name }}</a>
                                        </li>
                                    @endforeach
                                    {{-- <li><a class="dropdown-item bg-success" href="#">Another action</a></li>
                                    <li><a class="dropdown-item bg-success" href="#">Something else here</a></li> --}}
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <li><a class="nav-link" href="{{ route('auth.about') }}">About us</a></li>
                    {{-- <li><a class="nav-link" href="services.html">Services</a></li> --}}
                    {{-- <li><a class="nav-link" href="blog.html">Blog</a></li> --}}
                    <li><a class="nav-link" href="{{ route('auth.contact') }}">Contact us</a></li>
                </ul>
                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li>
                        <a class="nav-link" href="{{ route('cart.list') }}">
                            <img src="{{ asset('auth/images/cart.svg') }}">
                        </a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li><a class="nav-link" href=""><img src="{{ asset('auth/images/user.svg') }}"></a></li>
                            <li><a href="{{ route('logout') }}" class="nav-link">Logout</a></li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="nav-link">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>

    </nav>
    <!-- End Header/Navigation -->
