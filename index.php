<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Streamify - OTT Streaming</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Header with logo and navigation -->
    <header>
        <a href="#" class="logo">Streamify</a>
       <form onsubmit="return false" class="search-bar-advanced">
  <select id="category">
    <option value="">All</option>
    <option value="movies">Movies</option>
    <option value="series">Series</option>
    <option value="actors">Actors</option>
  </select>
  <input type="text" id="searchInput" placeholder="Search for shows, movies, actors..." />
  <button>🔍</button>
</form>

        <nav>
            <a href="index.php">Home</a>
            <a href="movies.php">Movies</a>
            <a href="series.php">Series</a>
            <!-- <a href="admin_dash.php">Admin</a> -->
            <a href="#" onclick="showModal()" return false;>Login</a>
            <!-- <button onclick="showModal()">Login</button> -->

        </nav>
    </header>
    <!-- Banner section -->
    <section class="banner" style="background-image: url('images/bg1.jpg');">
        <div class="banner-content">
            <h1 class="banner-title">Unlimited Movies, TV Shows, and More.</h1>
            <p class="banner-subtitle">Watch anywhere. Cancel anytime. Stream new releases and trending series now!</p>
            <button class="banner-btn">Start Watching</button>
        </div>
    </section>

    <!-- modal start  -->
    <!-- Modal Component -->
    <div class="modal-overlay" id="authModal">
        <div class="modal-box">
            <button type="button" style="width: 35px;" class="modal-close-btn" onclick="hideModal()">×</button>
            <h2 id="form-title">Login</h2>

            <form method="post" action="logincode.php" id="loginForm">
    <select name="user_type" required style="width: 100%; padding: 10px; background-color:black; color:grey; margin-bottom: 10px; border: 1px solid red; border-radius: 4px;">
        <option value="" disabled selected>Select User Type</option>
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>

    <input type="text" name="username" placeholder="Username" required style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 4px;" />
    
    <input type="password" name="password" placeholder="Password" required style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 4px;" />
    
    <button type="submit" style="width: 100%; padding: 10px; background-color: #e50914; color: white; border: none; border-radius: 4px;">Login</button>
</form>



            <form id="registerForm" action="signup_code.php" method="post" style="display: none">
                <input type="text" name="username" placeholder="Username" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit">Register</button>
            </form>

            <div class="modal-toggle-link" id="toggleText">
                Don’t have an account? <a href="#" onclick="toggleForm()">Register here</a>
            </div>
        </div>
    </div>

    <!-- Add this script once per page -->
    <script>
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        const formTitle = document.getElementById('form-title');
        const toggleText = document.getElementById('toggleText');
        const authModal = document.getElementById('authModal');
        const formBox = document.getElementById('form-box');

        function toggleForm() {
            const isLogin = loginForm.style.display !== 'none';
            loginForm.style.display = isLogin ? 'none' : 'block';
            registerForm.style.display = isLogin ? 'block' : 'none';
            formTitle.textContent = isLogin ? 'Register' : 'Login';
            toggleText.innerHTML = isLogin
                ? 'Already have an account? <a href=\"#\" onclick=\"toggleForm()\">Login here</a>'
                : 'Don\'t have an account? <a href=\"#\" onclick=\"toggleForm()\">Register here</a>';
        }

        function showModal() {
            authModal.style.display = 'flex';
        }

        function hideModal() {
            authModal.style.display = 'none';
        }

        // Prevent modal close on outside click
        authModal.addEventListener('click', function (event) {
            if (event.target === authModal) {
                // Don't close modal on outside click
                event.stopPropagation();
            }
        });

    </script>



    <!-- modal end  -->

    <!-- Featured movies -->
   <?php
$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');
if (!$conn) {
    die("Connection failed");
}

// Get total content
$count_query = "SELECT COUNT(*) AS total FROM content";
$count_result = mysqli_query($conn, $count_query);
$row = mysqli_fetch_assoc($count_result);
$total_content = $row['total'];

// Get all content
$content_query = "SELECT * FROM content ORDER BY id DESC";
$content_result = mysqli_query($conn, $content_query);
?>


<!-- Content Section -->
<div class="container py-4">
  <!-- <h2 class="text-center mb-4">Welcome Admin 👑</h2> -->

  <!-- <div class="text-center mb-4">
    <h4>Total Content: <span class="text-warning"></span></h4>
  </div> -->

  <div class="row" id="results">
    <?php while ($row = mysqli_fetch_assoc($content_result)) { ?>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="uploads/<?php echo $row['picture']; ?>" class="card-img-top" alt="Image">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['name']; ?></h5>
            <p class="card-text"><?php echo $row['description']; ?></p>
            <p><strong>Price:</strong> ₹<?php echo $row['price']; ?></p>
            <form method="post" action="watch.php">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <button type="submit" class="btn btn-danger w-100">Watch</button>
            </form> 
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>



    <!-- Footer -->
    <footer class="custom-footer bg-dark text-white pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h4 class="fw-bold">Streamify</h4>
                    <p class="text-white-50 small">
                        Unlimited movies, TV shows, and more. <br />Watch anywhere. Cancel anytime.
                    </p>
                </div>

                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase mb-3">Browse</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="movies.php">Movies</a></li>
                        <li><a href="series.php">Series</a></li>
                        <li><a href="#" onclick="showModal()">Login</a></li>
                    </ul>
                </div>

                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase mb-3">Help</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                        <li><a href="#">Account</a></li>
                    </ul>
                </div>

                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase mb-3">Legal</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="documents/Streamify_Terms_Privacy.pdf" target="_blank">Privacy</a></li>
                        <li><a href="documents/Streamify_Terms_Privacy.pdf" target="_blank">Terms</a></li>
                    </ul>
                </div>

                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase mb-3">Follow Us</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="https://www.facebook.com/share/1636QBCjHH/" target="_blank"><i
                                    class="bi bi-facebook"></i>Facebook</a></li>
                        <li><a href="https://www.linkedin.com/in/brijesh-verma-2038bb294/" target="_blank"><i
                                    class="bi bi-linkedin"></i>Linkedin</a></li>
                        <li><a href="https://www.instagram.com/programmer_brijesh/" target="_blank"><i
                                    class="bi bi-instagram"></i>Instagram</a></li>
                    </ul>
                </div>
            </div>

            <hr class="border-secondary mt-4" />
            <div class="text-center small text-white-50">
                &copy; 2025 Streamify. All rights reserved.
            </div>
        </div>
    </footer>

        <script>
  const searchInput = document.getElementById("searchInput");
  const categorySelect = document.getElementById("category");
  const resultsDiv = document.getElementById("results");

  function performLiveSearch() {
    const query = searchInput.value.trim();
    const category = categorySelect.value;

    fetch(`live_search.php?query=${encodeURIComponent(query)}&category=${encodeURIComponent(category)}`)
      .then(response => response.text())
      .then(data => {
        resultsDiv.innerHTML = data;
      })
      .catch(error => {
        resultsDiv.innerHTML = '<div class="col-12 text-danger">Error loading results.</div>';
        console.error("Live search error:", error);
      });
  }

  searchInput.addEventListener("keyup", performLiveSearch);
  categorySelect.addEventListener("change", performLiveSearch);


  window.addEventListener("pageshow", function (event) {
        if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
            // If the page was restored from the back/forward cache, reload it
            window.location.reload();
        }
    });

</script>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>