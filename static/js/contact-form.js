// static/js/contact-form.js
async function submitContactForm(event) {
  event.preventDefault();

  // Reset error messages
  document
    .querySelectorAll(".error-message")
    .forEach((span) => (span.textContent = ""));
  document.getElementById("contact-success").style.display = "none";

  // Get form values
  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const message = document.getElementById("message").value.trim();

  // Frontend validation
  let isValid = true;
  if (!name) {
    document.getElementById("name-error").textContent = "Name is required";
    isValid = false;
  } else if (name.length > 100) {
    document.getElementById("name-error").textContent =
      "Name must be 100 characters or less";
    isValid = false;
  }

  if (!email) {
    document.getElementById("email-error").textContent = "Email is required";
    isValid = false;
  } else if (!/\S+@\S+\.\S+/.test(email)) {
    document.getElementById("email-error").textContent = "Invalid email format";
    isValid = false;
  } else if (email.length > 100) {
    document.getElementById("email-error").textContent =
      "Email must be 100 characters or less";
    isValid = false;
  }

  if (!message) {
    document.getElementById("message-error").textContent =
      "Message is required";
    isValid = false;
  }

  if (!isValid) return;

  // Submit form via AJAX
  try {
    const response = await fetch("controllers/contact-ajax.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(
        email
      )}&message=${encodeURIComponent(message)}&website=${encodeURIComponent(
        document.getElementById("website").value
      )}`,
    });
    const data = await response.json();
    console.log("Parsed data:", data);

    if (data.success) {
      document.getElementById("contact-success").textContent = data.message;
      document.getElementById("contact-success").style.display = "block";
      document.getElementById("contact-form").reset();
    } else {
      alert(data.message || "Failed to submit form");
    }
  } catch (error) {
    console.error("Fetch error:", error);
    alert("Error submitting form: " + error.message);
  }
}
