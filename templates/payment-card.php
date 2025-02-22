<?php
// templates/payment-card.php
function renderPaymentCard($feature) {
?>
    <article class="payment-features__card">
        <div class="payment-feature__card--layout">
            <header class="card-img"> 
                <img src="<?php echo htmlspecialchars($feature['icon_path']); ?>" 
                     alt="feature-icon"/> 
            </header> 
            <section class="card-info"> 
                <h3><?php echo htmlspecialchars($feature['title']); ?></h3> 
                <p><?php echo htmlspecialchars($feature['description']); ?></p> 
            </section>   
        </div>
    </article>
<?php
}