<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="front/assets/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="front/assets/style.css"/>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="front/assets/bootstrap/js/bootstrap.js"></script>
    <script src="front/assets/script.js"></script>

    <!-- Owl stylesheet -->
    <link rel="stylesheet" href="front/assets/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="front/assets/owl-carousel/owl.theme.css">
    <script src="front/assets/owl-carousel/owl.carousel.js"></script>
    <!-- Owl stylesheet -->

    <!-- Slitslider -->
    <link rel="stylesheet" type="text/css" href="front/assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="front/assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="front/assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="front/assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="front/assets/slitslider/js/jquery.slitslider.js"></script>
    <!-- Slitslider -->
</head>

<body>

@php
    $settings = App\Models\Settings::first();
@endphp

<!-- Header Starts -->
<div class="navbar-wrapper">
    <div class="navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Nav Starts -->
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="/index">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/agents">Agents</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
            <!-- #Nav Ends -->
        </div>
    </div>
</div>
<!-- #Header Starts -->

<div class="container">
    <!-- Header Starts -->
    <div class="header">
        <a href="/index">
            {{-- <img src="{{ $settings->logo ? asset('storage/' . $settings->logo) : 'front/images/logo.png' }}" alt="Realestate"> --}}
        </a>

        <ul class="pull-right">
            <li><a href="/buysalerent">Buy</a></li>
            <li><a href="/buysalerent">Sale</a></li>
            <li><a href="/buysalerent">Rent</a></li>
        </ul>
    </div>
    <!-- #Header Starts -->
</div>
