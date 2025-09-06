// Show modal when login is clicked
  function showModal() {
    document.getElementById("authModal").style.display = "flex";
  }

  // Optional: close modal on outside click
  window.addEventListener("click", function (e) {
    const modal = document.getElementById("authModal");
    if (e.target === modal) {
      modal.style.display = "none";
    }
  });
