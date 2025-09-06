<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user']) || !isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user type from database using session email
$email = $_SESSION['email'];
$query = "SELECT user_type FROM sign_up WHERE email = '$email' LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Redirect if not admin
if (!$row || $row['user_type'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Movie - Admin Panel</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <style>
    body {
      background-color: #121212;
      color: #fff;
      /* padding: 20px; */
    }
    .container {
      max-width: 600px;
      background-color: #1e1e1e;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 10px red;
    }
    .btn-primary {
      background-color: #e50914;
      border: none;
    }
    .btn-primary:hover {
      background-color: #bf0810;
    }
  </style>
</head>
<body>

<header>
        <a href="#" class="logo">Streamify</a>
        <nav>
            <a href="index.php">Home</a>
            <a href="admin_dash.php">Dashboard</a>
            <a href="logout.php">Logout</a> </nav>
</header>

<!-- Upload Form -->
<div class="container mt-5">
  <h2 class="text-center mb-4">Upload New Content 🎬</h2>
  
  <form action="upload_code.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="name" class="form-label">Movie/Series Name</label>
      <input type="text" class="form-control" id="name" name="name" required />
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>

    <div class="mb-3">
      <label for="price" class="form-label">Price (₹)</label>
      <input type="number" class="form-control" id="price" name="price" min="0" step="0.01" required />
    </div>

    <div class="mb-3">
      <label for="picture" class="form-label">Upload Poster</label>
      <input type="file" class="form-control" id="picture" name="picture" accept="image/*" required />
    </div>
    <div class="mb-3">
      <label for="picture" class="form-label">Upload Movie</label>
      <input type="file" class="form-control" id="picture" name="video" accept="image/*" />
    </div>

    <button type="submit" name="submit" class="btn btn-primary w-100">Upload</button>
  </form>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
