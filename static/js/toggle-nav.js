var backdrop = document.querySelector(".backdrop");
var mobileNav = document.querySelector(".mobile-nav");
var openIcon = document.querySelector(".open-icon");
var closeIcon = document.querySelector(".close-icon");
var modal = document.querySelector(".modal");

// Open mobile nav and show the close icon
openIcon.addEventListener("click", function () {
  mobileNav.classList.add("open");
  backdrop.classList.add("open");

  // Add smooth transition by toggling the classes
  openIcon.classList.add("hidden");
  openIcon.classList.remove("visible");
  closeIcon.classList.add("visible");
  closeIcon.classList.remove("hidden");
});

// Close mobile nav when clicking the backdrop
backdrop.addEventListener("click", function () {
  mobileNav.classList.remove("open");
  backdrop.classList.remove("open");

  // Add smooth transition by toggling the classes
  openIcon.classList.add("visible");
  openIcon.classList.remove("hidden");
  closeIcon.classList.add("hidden");
  closeIcon.classList.remove("visible");

  closeModal(); // Close the modal when backdrop is clicked
});

// Close the modal when X icon is clicked
closeIcon.addEventListener("click", function () {
  mobileNav.classList.remove("open");
  backdrop.classList.remove("open");

  // Add smooth transition by toggling the classes
  openIcon.classList.add("visible");
  openIcon.classList.remove("hidden");
  closeIcon.classList.add("hidden");
  closeIcon.classList.remove("visible");

  closeModal(); // Close the modal when the X icon is clicked
});

// Function to close the modal
function closeModal() {
  if (modal) {
    modal.classList.remove("open");
  }
  backdrop.classList.remove("open");
}

// If there's a cancel button in the modal, close the modal
var modalNoButton = document.querySelector(".modal__action--negative");
if (modalNoButton) {
  modalNoButton.addEventListener("click", closeModal);
}
