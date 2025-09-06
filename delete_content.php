<?php
$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');
if (!$conn) {
    die("Connection failed");
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Remove image
    $get = mysqli_query($conn, "SELECT picture FROM content WHERE id = $id");
    $row = mysqli_fetch_assoc($get);
    $img = "uploads/" . $row['picture'];
    if (file_exists($img)) {
        unlink($img);
    }

    // Delete from DB
    mysqli_query($conn, "DELETE FROM content WHERE id = $id");
}

header("Location: admin_dash.php");
exit();
