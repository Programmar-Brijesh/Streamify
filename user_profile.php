<?php
session_start();
// session_start();

// Block if not logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

// Block access for admin
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') {
    header("Location: login.php");
    exit();
}


// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');
if (!$conn) {
    die("Connection failed");
}

$user_id = $_SESSION['user'];
$query = "SELECT * FROM sign_up WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Profile - Streamify</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #121212;
      color: #f1f1f1; /* light gray for better visibility */
    }
    .card {
      background-color: #1e1e1e;
      border: none;
      box-shadow: 0 0 10px #e50914;
      color: #ffffff;
    }
    .card p {
      color: #dddddd; /* softer white for paragraphs */
    }
    .card strong {
      color: #ffffff; /* bright white for labels */
    }
    .btn-primary {
      background-color: #e50914;
      border: none;
    }
    .btn-primary:hover {
      background-color: #bf0810;
    }
    .navbar {
      background-color: #330000;
    }
    .btn-outline-light {
      color: #fff;
      border-color: #fff;
    }
    .btn-outline-light:hover {
      background-color: #fff;
      color: #121212;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark px-4">
  <a class="navbar-brand fw-bold" href="#">🎬 Streamify</a>
  <div class="ms-auto">
    <span class="me-3">👤 <?php echo $_SESSION['username']; ?></span>
    <a href="userdash.php" class="btn btn-outline-light me-2">Dashboard</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>
</nav>

<!-- Profile Card -->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card p-4">
        <h3 class="mb-3 text-center">👤 My Profile</h3>
        <hr style="border-color: #e50914;">
        <p><strong>👨‍💼 Name:</strong> <?php echo $user['username']; ?></p>
        <p><strong>📧 Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>🛡️ User Type:</strong> <?php echo $user['user_type']; ?></p>

        <div class="d-flex justify-content-between mt-4">
          <a href="userdash.php" class="btn btn-outline-light w-50 me-2">🏠 Dashboard</a>
          <a href="update_profile.php" class="btn btn-primary w-50">✏️ Update Info</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
