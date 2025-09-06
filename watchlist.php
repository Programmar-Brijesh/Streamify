<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
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
<nav class="navbar navbar-expand-lg navbar-dark px-4 mb-4">
  <a class="navbar-brand fw-bold" href="#">🎬 Streamify</a>
  <div class="ms-auto">
    <span class="me-3">👤 <?php echo $_SESSION['username']; ?></span>
    <a href="userdash.php" style="text-decoration:none; color:white; margin: left 5px;">Dashboard</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>
</nav>

<div class="container">
  <h2 class="mb-4 text-center">
  Your Watchlist 📺 
  <span class="badge bg-danger">
    <?php echo mysqli_num_rows($result); ?>
  </span>
</h2>


  <div class="row">
    <?php if (mysqli_num_rows($result) > 0): ?>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <img src="uploads/<?php echo $row['picture']; ?>" class="card-img-top" alt="Poster" style="height: 300px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?php echo $row['name']; ?></h5>
              <p class="card-text"><?php echo $row['description']; ?></p>
              <p class="text-warning mt-auto">Price: ₹<?php echo $row['price']; ?></p>
              <a href="remove_from_watchlist.php?content_id=<?php echo $row['id']; ?>" class="btn btn-danger w-100 mt-2">Remove</a>
              <form class="mt-3" method="post" action="user_watch.php">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <button type="submit" class="btn btn-danger w-100">Watch</button>
            </form>

            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p class="text-center">No items in your watchlist yet.</p>
    <?php endif; ?>
  </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
