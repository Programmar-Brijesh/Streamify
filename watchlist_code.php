<?php
$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();
$sesid=$_SESSION['user'];

$content_id = $_REQUEST['id'];

if (!$sesid || !$content_id) {
    echo "Missing user_id or content_id.";
    exit();
}

$query = "INSERT INTO watchlist (user_id, content_id) VALUES ($sesid, $content_id)";
if (mysqli_query($conn, $query)) {
    echo "Added to watchlist!";
    header("location: userdash.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
