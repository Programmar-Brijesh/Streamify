<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>My Account - Streamify</title>
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/style.css"/>

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

    .account-section {
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
      background-color: #1a1a1a;
      border-top: 1px solid #333;
    }
  </style>
</head>

<body>

<!-- Header + Navbar -->
<header class="text-center">
  <nav class="navbar navbar-expand-lg px-4">
    <a class="navbar-brand" href="#" style="color:#ff3c3c; text-shadow: 0 0 5px #ff3c3c;">Streamify</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon bg-light"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="movies.php">Movies</a></li>
        <li class="nav-item"><a class="nav-link" href="series.php">Series</a></li>
        <li class="nav-item"><a class="nav-link" href="mylist.php">My List</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Account</a></li>
      </ul>
    </div>
  </nav>
</header>

<!-- My Account Section -->
<section class="account-section">
  <h2 class="text-center mb-4" style="color: #ff3c3c;">My Account</h2>
  
  <form>
    <div class="mb-3">
      <label for="fullName" class="form-label">Full Name</label>
      <input type="text" class="form-control" id="fullName" placeholder="John Doe" value="John Doe">
    </div>

    <div class="mb-3">
      <label for="emailAddress" class="form-label">Email Address</label>
      <input type="email" class="form-control" id="emailAddress" placeholder="you@example.com" value="john@example.com">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Change Password</label>
      <input type="password" class="form-control" id="password" placeholder="••••••••">
    </div>

    <div class="mb-3">
      <label for="plan" class="form-label">Subscription Plan</label>
      <select class="form-control" id="plan">
        <option>Basic</option>
        <option selected>Premium</option>
        <option>Family</option>
      </select>
    </div>

    <button type="submit" class="btn btn-red w-100">Update Account</button>
  </form>
</section>

<!-- Footer -->
<footer>
  <p>&copy; 2025 Streamify. All rights reserved.</p>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
