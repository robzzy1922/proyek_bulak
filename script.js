document.addEventListener("DOMContentLoaded", function () {
  // Sticky header on scroll
  window.addEventListener("scroll", function () {
    var header = document.querySelector("header");
    if (window.scrollY > 50) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  });
});

// Show loader on form submit
document.getElementById("feedbackForm").addEventListener("submit", function () {
  document.getElementById("loader").style.display = "block";
});

// Hide loader after page load
window.addEventListener("load", function () {
  document.getElementById("loader").style.display = "none";
});
