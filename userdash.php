<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

// Block access for admin
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_SESSION['user']; // Logged in user ID

// Fetch content from watchlist
$query = "
    SELECT content.*
    FROM watchlist
    JOIN content ON watchlist.content_id = content.id
    WHERE watchlist.user_id = $user_id
    ORDER BY watchlist.id DESC
";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Watchlist - Streamify</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #121212;
      color: #fff;
    }
    .navbar {
      background-color: #330000;
    }
    .card {
      background-color: #1e1e1e;
      color: #fff;
      box-shadow: 0 0 10px #e50914;
    }
    .btn-danger {
      background-color: #e50914;
      border: none;
    }
    .btn-danger:hover {
      background-color: #bf0810;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark px-4 mb-4 shadow" style="background-color: #1a1a1a;">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-danger" href="#">🎬 Streamify</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
      <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
        <li class="nav-item me-3">
          <span class="text-white">👤 <?php echo $_SESSION['username']; ?></span>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="user_profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="watchlist.php">Watchlist</a>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="btn btn-danger ms-3">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


 <?php
$conn = mysqli_connect('localhost', 'root', '', 'online_ott');
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

  <div class="row">
    <?php while ($row = mysqli_fetch_assoc($content_result)) { ?>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="uploads/<?php echo $row['picture']; ?>" class="card-img-top" alt="Image">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['name']; ?></h5>
            <p class="card-text"><?php echo $row['description']; ?></p>
            <p><strong>Price:</strong> ₹<?php echo $row['price']; ?></p>
             <a href="watchlist_code.php?id=<?php echo $row['id']?>"> <button type="submit" class="btn btn-danger w-100">Add To Watchlist</button></a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
