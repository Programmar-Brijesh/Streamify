<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Streamfiy - Series</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <!-- Header -->
    <header>
        <a href="#" class="logo">Streamify</a>

        <form action="#" method="" class="search-bar-advanced">
            <select name="category">
                <option value="">All</option>
                <option value="movies">Movies</option>
                <option value="series">Series</option>
                <option value="actors">Actors</option>
            </select>
            <input type="text" name="query" placeholder="Search for shows, movies, actors..." />
            <button>🔍</button>
        </form>

        <nav>
            <a href="index.php">Home</a>
            <a href="movies.php">Movies</a>
            <a href="series.php">Series</a>
            <a href="#" onclick="showModal()">Login</a>
        </nav>
    </header>


    <!-- Banner -->
    <section class="banner"
        style="background-image: url('images/strangerbg.jpg'); background-size: cover; background-position: center;">
        <div class="banner-content">
            <h1 class="banner-title">Stranger Things</h1>
            <p class="banner-subtitle">In 1980s Indiana, kids uncover a girl with powers and a dark secret while
                searching for their missing friend.</p>
            <button class="banner-btn">Watch Now</button>
        </div>
    </section>

    <!-- Featured Movies -->
    <section class="featured-section">
        <h2 class="featured-title">Trending Now</h2>
        <div class="featured-grid mt-3">

            <!-- Movie Card -->
            <div class="movie-card">
                <img src="images/sandman.jpg" class="movie-poster" alt="Movie 1" />
                <div class="overlay">
                    <button class="play-btn"><i class="fa-solid fa-play" style="color: #ffffff;"></i></button>
                </div>
                <div class="movie-title">The SandMan</div>
            </div>

            <div class="movie-card">
                <img src="images/startrek.jpg" class="movie-poster" alt="Movie 2" />
                <div class="overlay">
                    <button class="play-btn"><i class="fa-solid fa-play" style="color: #ffffff;"></i></button>
                </div>
                <div class="movie-title">Star Trek: Strange New World</div>
            </div>

            <div class="movie-card">
                <img src="images/lastofus.jpg" class="movie-poster" alt="Movie 3" />
                <div class="overlay">
                    <button class="play-btn"><i class="fa-solid fa-play" style="color: #ffffff;"></i></button>
                </div>
                <div class="movie-title">The Last Of Us</div>
            </div>

            <div class="movie-card">
                <img src="images/foundation.jpg" class="movie-poster" alt="Movie 4" />
                <div class="overlay">
                    <button class="play-btn"><i class="fa-solid fa-play" style="color: #ffffff;"></i></button>
                </div>
                <div class="movie-title">Foundation</div>
            </div>

        </div>
        <div class="featured-grid mt-3">

            <!-- Movie Card -->
            <div class="movie-card">
                <img src="images/the instute.jpg" class="movie-poster" alt="Movie 1" />
                <div class="overlay">
                    <button class="play-btn"><i class="fa-solid fa-play" style="color: #ffffff;"></i></button>
                </div>
                <div class="movie-title">The Institute</div>
            </div>

            <div class="movie-card">
                <img src="images/sline.jpg" class="movie-poster" alt="Movie 2" />
                <div class="overlay">
                    <button class="play-btn"><i class="fa-solid fa-play" style="color: #ffffff;"></i></button>
                </div>
                <div class="movie-title">S Line</div>
            </div>

            <div class="movie-card">
                <img src="images/andor.jpg" class="movie-poster" alt="Movie 3" />
                <div class="overlay">
                    <button class="play-btn"><i class="fa-solid fa-play" style="color: #ffffff;"></i></button>
                </div>
                <div class="movie-title">Andor</div>
            </div>

            <div class="movie-card">
                <img src="images/severence.jpg" class="movie-poster" alt="Movie 4" />
                <div class="overlay">
                    <button class="play-btn"><i class="fa-solid fa-play" style="color: #ffffff;"></i></button>
                </div>
                <div class="movie-title">Severence</div>
            </div>

        </div>
        <div class="featured-grid mt-3">

            <!-- Movie Card -->
            <div class="movie-card">
                <img src="images/rickyandmorty.jpg" class="movie-poster" alt="Movie 1" />
                <div class="overlay">
                    <button class="play-btn"><i class="fa-solid fa-play" style="color: #ffffff;"></i></button>
                </div>
                <div class="movie-title">Ricky And Morty</div>
            </div>

            <div class="movie-card">
                <img src="images/residentalien.jpg" class="movie-poster" alt="Movie 2" />
                <div class="overlay">
                    <button class="play-btn"><i class="fa-solid fa-play" style="color: #ffffff;"></i></button>
                </div>
                <div class="movie-title">Resident Alien</div>
            </div>

            <div class="movie-card">
                <img src="images/murderbot.jpg" class="movie-poster" alt="Movie 3" />
                <div class="overlay">
                    <button class="play-btn"><i class="fa-solid fa-play" style="color: #ffffff;"></i></button>
                </div>
                <div class="movie-title">The MurderBot</div>
            </div>

            <div class="movie-card">
                <img src="images/the boys.jpg" class="movie-poster" alt="Movie 4" />
                <div class="overlay">
                    <button class="play-btn"><i class="fa-solid fa-play" style="color: #ffffff;"></i></button>
                </div>
                <div class="movie-title">The Boys</div>
            </div>

        </div>
    </section>

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
                                    class="bi bi-facebook me-2"></i>Facebook</a></li>
                        <li><a href="https://www.linkedin.com/in/brijesh-verma-2038bb294/" target="_blank"><i
                                    class="bi bi-linkedin me-2"></i>Linkedin</a></li>
                        <li><a href="https://www.instagram.com/programmer_brijesh/" target="_blank"><i
                                    class="bi bi-instagram me-2"></i>Instagram</a></li>
                    </ul>
                </div>
            </div>

            <hr class="border-secondary mt-4" />
            <div class="text-center small text-white-50">
                &copy; 2025 Streamify. All rights reserved.
            </div>
        </div>
    </footer>
    <!-- modal start  -->
    <!-- Modal Component -->
    <div class="modal-overlay" id="authModal">
        <div class="modal-box">
            <button type="button" style="width: 35px;" class="modal-close-btn" onclick="hideModal()">×</button>
            <h2 id="form-title">Login</h2>

            <form id="loginForm">
                <input type="text" placeholder="Username" required />
                <input type="password" placeholder="Password" required />
                <button type="submit">Login</button>
            </form>

            <form id="registerForm" style="display: none">
                <input type="text" placeholder="Username" required />
                <input type="email" placeholder="Email" required />
                <input type="password" placeholder="Password" required />
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

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>