<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us - Streamify</title>
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

        .navbar {
            background-color: #1a1a1a;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: 0 2px 8px rgba(255, 60, 60, 0.2);
        }

        .navbar a {
            color: #fff !important;
        }

        .navbar a:hover {
            color: #ff3c3c !important;
        }

        .navbar-toggler {
            border: 1px solid #ff3c3c;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23ff3c3c' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 60, 60, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .navbar,
        footer {
            background-color: #1a1a1a;
        }

        .navbar a,
        footer {
            color: #fff !important;
        }

        .navbar a:hover {
            color: #ff3c3c !important;
        }

        .contact-section {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #1a1a1a;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.3);
        }

        .form-control {
            background-color: #111;
            border: 1px solid #ff3c3c;
            color: #fff;
        }

        .form-control:focus {
            box-shadow: 0 0 10px #ff3c3c;
            border-color: #ff3c3c;
        }

        .btn-red {
            background-color: #ff3c3c;
            color: #fff;
            border: none;
        }

        .btn-red:hover {
            background-color: #e60000;
        }

        footer {
            text-align: center;
            padding: 15px;
            margin-top: 50px;
            border-top: 1px solid #333;
        }

        #bg-transparent {
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

<body style="background-image: url('images/techybg.jpg'); background-repeat:repeat; background-size: contain;">

    <header>
        <a href="#" class="logo">Streamify</a>
        <nav>
            <a href="index.php">Home</a>
            <a href="movies.php">Movies</a>

        </nav>
    </header>



    <!-- Contact Form Section -->
    <section class="contact-section" id="bg-transparent">
        <h2 class="text-center mb-4" style="color: #ff3c3c;">Contact Us</h2>
        <form action="contactuscode.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Your Message</label>
                <textarea class="form-control" id="message" name="message" rows="5"
                    placeholder="Write your message here..."></textarea>
            </div>
            <button type="submit" class="btn btn-red w-100">Send Message</button>
        </form>
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

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>