<?php
session_start();

$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch session user ID and URL content ID
$sesid = $_SESSION['user'];
$content_id = $_REQUEST['content_id'];

// Check if both are present
if (!$sesid || !$content_id) {
    echo "Missing user_id or content_id.";
    exit();
}

// Run delete query
$query = "DELETE FROM watchlist WHERE user_id = $sesid AND content_id = $content_id";

if (mysqli_query($conn, $query)) {
    header("Location: userdash.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
