<?php
// templates/contact-form.php
?>
<section id="contact-section">
    <header class="contact-section__header">
        <h1 class="task-manager__title">Contact us</h1>
        <p class="task-manager__subtitle">Speak with our team to see how we can help your business.</p>
    </header>
    <form class="contact-form" id="contact-form" onsubmit="submitContactForm(event)">
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Your name" required>
            <span class="error-message" id="name-error"></span>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <span class="error-message" id="email-error"></span>
        </div>
        <div class="form-group">
            <textarea class="form-control" id="message" name="message" placeholder="Your message" required></textarea>
            <span class="error-message" id="message-error"></span>
        </div>
        <!-- Honeypot field (hidden from users, traps bots) -->
        <div class="form-group honeypot" style="display: none;">
            <input type="text" id="website" name="website" placeholder="Leave this blank">
        </div>
        <button type="submit" class="submit-btn">Submit</button>
    </form>
    <div id="contact-success" class="success-message" style="display: none;"></div>
</section>