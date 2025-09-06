<?php
// session_start();/

// Connect to DB
$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$user_type = $_POST['user_type'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if email already exists
$check = "SELECT * FROM sign_up WHERE email = '$email'";
$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) > 0) {
    echo "Email already exists!";
} else {
    // Insert user
    $insert = "INSERT INTO sign_up (username, email, password, user_type) VALUES ('$username', '$email', '$password','user')";
    if (mysqli_query($conn, $insert)) {
        // Save session
        $_SESSION['username'] = $username;
        $_SESSION['user'] = mysqli_insert_id($conn); // Save user ID
        header("Location: index.php"); // Redirect to dashboard
        exit();
    } else {
        echo "Something went wrong. Try again.";
    }
}
?>
