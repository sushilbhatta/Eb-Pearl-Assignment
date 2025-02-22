<?php
// index.php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/models/PaymentFeature.php';
require_once __DIR__ . '/models/Task.php';
require_once __DIR__ . '/templates/payment-card.php';

// Initialize models and data
$paymentFeature = new PaymentFeature();
$features = $paymentFeature->getAllFeatures();
$taskModel = new Task();
$tasks = $taskModel->getAllTasks();
?>

<!-- backdrop -->
<div class="backdrop"></div>
<div class="background"></div>

<!-- desktop nav view -->
<header class="main-header">
    <div class="nav-icon">
        <i class="fa-solid fa-2x fa-bars toggle-button"></i>
    </div>

    <div class="main-header__logo">
        <a href="index.html" class="main-header__brand">
            <img src="images/logo.png" alt="Logoipsum">
        </a>
    </div>

    <nav class="main-nav | fs-500 fw-semi-bold ">
        <ul class="main-nav__items">
            <li class="main-nav__item">
                <a href="packages/index.html">Products</a>
            </li>
            <li class="main-nav__item">
                <a href="customers/index.html">Solutions</a>
            </li>
            <li class="main-nav__item">
                <a href="start-hosting/index.html">Help Center</a>
            </li>
            <li class="main-nav__item">
                <a href="start-hosting/index.html">Get Started</a>
            </li>
        </ul>

    </nav>
    <nav class="main-nav | fs-400">
        <ul class="main-nav__items">
            <li class="main-nav__item--cta__link">
                <a href="login/index.html">Login</a>
            </li>
            <li class="main-nav__item--cta__primary">
                <a href="signup/index.html">Request a demo</a>
            </li>
        </ul>
    </nav>
</header>
<!-- mobile nav -->
<nav class="mobile-nav">
    <div class="mobile-nav__header">
        <div class="main-header__logo">
            <a href="index.html" class="main-header__brand">
                <img src="/public/images/logo.png" alt="Logoipsum">
            </a>
        </div>

        <ul class="mobile-nav__items">
            <li class="mobile-nav__item">
                <a href="packages/index.html">Products</a>
            </li>
            <li class="mobile-nav__item">
                <a href="packages/index.html">Solutions</a>
            </li>
            <li class="mobile-nav__item ">
                <a href="packages/index.html">Help Center</a>
            </li>
            <li class="mobile-nav__item">
                <a href="packages/index.html">Get Started</a>
            </li>
            <li class="mobile-nav__item mobile-nav__item--cta__link">
                <a href="login/index.html">Login</a>
            </li>
            <li class="mobile-nav__item main-nav__item--cta__primary">
                <a href="signup/index.html">Request a demo</a>
            </li>
        </ul>
    </div>
</nav>
<main>
    <!-- hero section  view-->
    <section id="hero">
        <div class="hero-content">
            <h1 class="hero__heading">Get instant cash flow with invoice factoring</h1>
            <p class="hero__text">Why wait? Get same day funding and a faster way to access cash flow.</p>
            <a href="signup/index.html" class="btn btn--primary">Get Started</a>
            <div class="hero-content__circles">
                <span class="highlighted"></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="hero-img__container">
            <img src="/static/images/hero.png" alt="hero image" class="hero__image">
        </div>
    </section>
    <!-- payment methods section -->
    <section id="payment">
        <header class="payment-heading">
            <h2>Outsource payment collection</h2>
            <p>Faster and flexible access to cash flow from one or all your invoices.</p>
        </header>
        <article class="payment-features">
            <?php foreach ($features as $feature): ?>
            <?php renderPaymentCard($feature); ?>
            <?php endforeach; ?>
        </article>
    </section>
    <!-- task manager section -->
    <?php require_once __DIR__ . '/templates/task-manager.php'; ?>

    <!-- contact section -->
    <?php require_once __DIR__ . '/templates/contact-form.php'; ?>
</main>
<footer class="footer">
    <div class="footer-container">
        <div class="footer-main">
            <article class="footer-content">
                <p>Curabitur consequat, purus a scelerisque sagittis, nulla metus tincidunt elit, vel venenatis nulla
                    libero nec nulla. Suspendisse potenti. Aenean a justo vel sapien pellentesque tincidunt. Sed luctus,
                    elit ac interdum convallis, ligula libero egestas orci, at auctor felis ligula nec odio.</p>
                <div class="social-links">
                    <a href="#" aria-label="LinkedIn">
                        <img class="social-icon" src="./images/linkedin.svg" alt="LinkedIn icon">
                    </a>
                    <a href="#" aria-label="Email">
                        <img class="social-icon" src="./images/email.svg" alt="Email icon">
                    </a>
                </div>
            </article>


            <section class="footer-nav__container">

                <nav class="footer-nav">
                    <h3>Products</h3>
                    <ul>
                        <li><a href="#">Payments</a></li>
                        <li><a href="#">Invoice Factoring</a></li>
                        <li><a href="#">Invoice finance</a></li>
                        <li><a href="#">Supplier finance</a></li>
                        <li><a href="#">Customer finance</a></li>
                    </ul>
                </nav>

                <nav class="footer-nav">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </nav>

                <nav class="footer-nav">
                    <h3>Resources</h3>
                    <ul>
                        <li><a href="#">Frequently asked questions</a></li>
                        <li><a href="#">Knowledge base</a></li>
                        <li><a href="#">API documentation</a></li>
                    </ul>
                </nav>
        </div>

        <div class="footer-bottom">
            <div class="footer-bottom__links">
                <a href="#">Privacy policy</a>
                <a href="#">Contact us</a>
            </div>
            <div class="footer-bottom__info">
                <a href="#">Site map</a>
                <a href="#">@ebpearls</a>
            </div>
        </div>
        </section>
    </div>
</footer>

<?php
require_once __DIR__ . '/includes/footer.php';