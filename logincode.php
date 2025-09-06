<?php
session_start();
$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['username'];  // Using 'username' field as email input
$password = $_POST['password'];
$user_type = $_POST['user_type'];  // User type selected from form

// Prevent SQL Injection
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);
$user_type = mysqli_real_escape_string($conn, $user_type);

// Check credentials
$query = "SELECT * FROM sign_up WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    // Redirect only if user_type matches the actual intention
    if ($user_type === 'admin' && $row['user_type'] === 'admin') {
        $_SESSION['user'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        header("Location: admin_dash.php");
        exit();
    } elseif ($user_type === 'user' && $row['user_type'] === 'user') {
        $_SESSION['user'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        header("Location: userdash.php");
        exit();
    } else {
        echo "<script>alert('User type mismatch.'); window.location.href='index.php';</script>";
        exit();
    }

} else {
    echo "<script>alert('Invalid email or password'); window.location.href='index.php';</script>";
}
?>
