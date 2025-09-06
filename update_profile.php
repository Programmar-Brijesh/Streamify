<?php
session_start();

// session_start();

// Block if not logged in
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if username exists (excluding current user)
    $check = mysqli_query($conn, "SELECT id FROM sign_up WHERE username='$new_username' AND id != $user_id");
    if (mysqli_num_rows($check) > 0) {
        $error = "❌ Username already taken.";
    } else {
        if (!empty($password)) {
            $update = "UPDATE sign_up SET username='$new_username', password='$password' WHERE id=$user_id";
        } else {
            $update = "UPDATE sign_up SET username='$new_username' WHERE id=$user_id";
        }

        if (mysqli_query($conn, $update)) {
            $_SESSION['username'] = $new_username;
            $success = "✅ Profile updated successfully!";
        } else {
            $error = "❌ Failed to update profile.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Profile - Streamify</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #121212;
      color: #f1f1f1;
    }
    .card {
      background-color: #1e1e1e;
      border: none;
      box-shadow: 0 0 10px #e50914;
    }
    .btn-primary {
      background-color: #e50914;
      border: none;
    }
    .btn-primary:hover {
      background-color: #bf0810;
    }
    .form-control {
      background-color: #2c2c2c;
      color: #fff;
      border: 1px solid #444;
    }
    .form-control:focus {
      border-color: #e50914;
      box-shadow: none;
    }
    .navbar {
      background-color: #330000;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark px-4">
  <a class="navbar-brand fw-bold" href="#">🎬 Streamify</a>
  <div class="ms-auto">
    <span class="me-3">👤 <?php echo $_SESSION['username']; ?></span>
    <a href="profile.php" class="btn btn-outline-light me-2">Profile</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>
</nav>

<!-- Update Form -->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card p-4">
        <h3 class="text-center mb-3 text-white">✏️ Update Profile</h3>
        <?php if (isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
        <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

        <form method="post">
          <div class="mb-3">
            <label for="username" class="form-label text-white">👨‍💼 Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label text-white">📧 Email (Not Editable)</label>
            <input type="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label text-white">🔒 New Password (optional)</label>
            <input type="text" name="password" id="password" class="form-control" placeholder="Leave blank to keep current password">
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">💾 Save Changes</button>
          </div>
        </form>

        <div class="text-center mt-3">
          <a href="profile.php" class="text-light">← Back to Profile</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

