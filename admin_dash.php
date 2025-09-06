<?php
session_start();

// Prevent page from being cached after logout
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Check if user is logged in
if (!isset($_SESSION['user']) || !isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Verify user type is admin
$email = $_SESSION['email'];
$query = "SELECT user_type FROM sign_up WHERE email = '$email' LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!$row || $row['user_type'] !== 'admin') {
    header("Location: index.php");
    exit();
}

// Get total content count
$count_query = "SELECT COUNT(*) AS total FROM content";
$count_result = mysqli_query($conn, $count_query);
$row = mysqli_fetch_assoc($count_result);
$total_content = $row['total'];

// Get all content
$content_query = "SELECT * FROM content ORDER BY id DESC";
$content_result = mysqli_query($conn, $content_query);
?>


<!DOCTYPE html>
<html>
<head>
  <title>Streamify Admin</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    /* body {
      background-color: black;
      color: white;
    } */
    /* .navbar {
      background-color: black;
      border:1px solid gray;
      padding: 15px;
    } */
    .card {
      background-color: black;
      border: 1px solid #880000;
      border-radius: 12px;
      color: white;
    }
    .card img {
      height: 200px;
      object-fit: cover;
      border-radius: 10px;
    }
    /* .btn-danger {
      background-color: #cc0000;
      border: none;
    } */
    /* .btn-danger:hover {
      background-color: #990000;
    } */
    /* .btn-success {
      background-color: #e50914;
      border: none;
    } */
    /* .btn-success:hover {
      background-color: #bf0810;
    } */
  </style>
</head>
<body>

<!-- Navbar -->
<header>
        <a href="#" class="logo">Streamify</a>
        <nav>
            <a href="index.php">Home</a>
            <a href="upload.php">Upload</a>
            <a href="message.php">Message</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a> </nav>
</header>


<!-- Content Section -->
<div class="container py-4">
  <h2 class="text-center mb-4">Welcome Admin 👑</h2>

  <div class="text-center mb-4">
    <h4>Total Content: <span class="text-warning"><?php echo $total_content; ?></span></h4>
  </div>

  <div class="row">
    <?php while ($row = mysqli_fetch_assoc($content_result)) { ?>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="uploads/<?php echo $row['picture']; ?>" class="card-img-top" alt="Image">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['name']; ?></h5>
            <p class="card-text"><?php echo $row['description']; ?></p>
            <p><strong>Price:</strong> ₹<?php echo $row['price']; ?></p>
            <form method="post" action="edit_code.php">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <button type="submit" class="btn btn-warning w-100">Edit</button>
            </form>
            <form method="post" action="delete_content.php">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <button type="submit" class="btn btn-danger w-100 mt-2">🗑️ Delete</button>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
