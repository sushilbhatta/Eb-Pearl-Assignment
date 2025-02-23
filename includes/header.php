<?php
// includes/header.php
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logoipsum</title>
    <!-- <link rel="shortcut icon" href="./images/favicon.png"> -->
    <link rel="stylesheet" href="static/css/shared.css">
    <link rel="stylesheet" href="static/css/main.css">
    <script src="static/js/toggle-nav.js" defer></script>
    <script src="static/js/hero-slider.js" defer></script>
    <script src="static/js/task-manager.js" defer></script>
    <script src="static/js/contact-form.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- backdrop -->
    <div class="backdrop"></div>
    <div class="background"></div>

    <!-- desktop nav view -->
    <header class="main-header">
        <div class="nav-icon">
            <i class="fa-solid fa-2x fa-bars toggle-button open-icon"></i>
            <i class="fa-solid fa-2x fa-xmark toggle-button close-icon" style="display: none;"></i>
        </div>

        <div class="main-header__logo">
            <a href="index.html" class="main-header__brand">
                <img src="images/logo.png" alt="Logoipsum">
            </a>
        </div>

        <nav class="main-nav ">
            <ul class="main-nav__items">
                <li class="main-nav__item">
                    <a href="#">Products</a>
                </li>
                <li class="main-nav__item">
                    <a href="#">Solutions</a>
                </li>
                <li class="main-nav__item">
                    <a href="#">Help Center</a>
                </li>
                <li class="main-nav__item">
                    <a href="#">Get Started</a>
                </li>
            </ul>

        </nav>
        <nav class="main-nav">
            <ul class="main-nav__items">
                <li class="main-nav__item--cta__link">
                    <a href="#">Login</a>
                </li>
                <li class="main-nav__item--cta__primary">
                    <a href="#">Request a demo</a>
                </li>
            </ul>
        </nav>
    </header>
    <!-- mobile nav -->
    <nav class="mobile-nav">
        <div class="mobile-nav__header">
            <div class="main-header__logo">
                <a href="index.html" class="main-header__brand">
                    <img src="images/logo.png" alt="Logoipsum">
                </a>
            </div>

            <ul class="mobile-nav__items">
                <li class="mobile-nav__item">
                    <a href="#">Products</a>
                </li>
                <li class="mobile-nav__item">
                    <a href="#">Solutions</a>
                </li>
                <li class="mobile-nav__item ">
                    <a href="#">Help Center</a>
                </li>
                <li class="mobile-nav__item">
                    <a href="#">Get Started</a>
                </li>
                <li class="mobile-nav__item mobile-nav__item--cta__link">
                    <a href="#">Login</a>
                </li>
                <li class="mobile-nav__item main-nav__item--cta__primary">
                    <a href="#">Request a demo</a>
                </li>
            </ul>
        </div>
    </nav>