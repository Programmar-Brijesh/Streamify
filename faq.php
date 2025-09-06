<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FAQ - Streamify</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #0d0d0d;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .faq-container {
            max-width: 900px;
            margin: 50px auto;
            background-color: #1a1a1a;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.3);
        }

        .accordion-button {
            background-color: #1a1a1a;
            color: #ff3c3c;
            font-weight: bold;
            border: none;
        }

        .accordion-button:focus {
            box-shadow: 0 0 10px #ff3c3c;
        }

        .accordion-button:not(.collapsed) {
            background-color: #1a1a1a;
            color: #fff;
        }

        .accordion-body {
            background-color: #111;
            color: #ccc;
        }

        h2 {
            color: #ff3c3c;
            text-shadow: 0 0 5px #ff3c3c;
        }

        #bg-transparent {
            background-image: url('images/techybg.jpg');
            background-repeat: repeat;
            background-size: contain;
            background-color: rgba(255, 255, 255, 0);
            box-shadow:
                0 0 5px rgba(255, 60, 60, 0.5),
                0 0 10px rgba(255, 60, 60, 0.5),
                0 0 15px rgba(255, 60, 60, 0.5),
                0 0 20px rgba(255, 0, 0, 0.5),
                0 0 30px rgba(255, 0, 0, 0.3);
        }
    </style>
</head>

<body>

    <header class="text-center py-4">
        <a href="#" class="logo">Streamify</a>

        <nav>
            <a href="index.php">Home</a>
            <a href="movies.php">Movies</a>
        </nav>
    </header>

    <h2 style="margin-top: 40px; margin-left: 200px;">Frequently Asked Questions</h2>
    <div class="faq-container" id="bg-transparent">
        <div class="accordion" id="faqAccordion">

            <div class="accordion-item">
                <h2 class="accordion-header" id="q1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#a1">
                        What is Streamify?
                    </button>
                </h2>
                <div id="a1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Streamify is a digital streaming platform for movies and web series with a stylish tech
                        interface.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="q2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#a2">
                        How do I register or login?
                    </button>
                </h2>
                <div id="a2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Click the "Login" button on any page to open a modal where you can log in or register.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="q3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#a3">
                        Is Streamify free to use?
                    </button>
                </h2>
                <div id="a3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, Streamify is completely free. No subscriptions required.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="q4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#a4">
                        Can I create a personal watchlist?
                    </button>
                </h2>
                <div id="a4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, just click “Add to Favourite” on any card and it will be stored locally for you in your
                        browser.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="q5">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#a5">
                        How can I contact support?
                    </button>
                </h2>
                <div id="a5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Visit our contact page or email us at support@streamify.com.
                    </div>
                </div>
            </div>

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

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>