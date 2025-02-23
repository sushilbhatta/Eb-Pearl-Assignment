<?php
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


<main>
    <!-- hero section  view-->
    <?php require_once __DIR__ . '/templates/hero-section.php'; ?>
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


<?php
require_once __DIR__ . '/includes/footer.php';