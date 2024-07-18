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
