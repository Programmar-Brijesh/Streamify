<?php
// Connect to database
$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Get uploaded image
    $picture = $_FILES['picture']['name'];
    $picture_tmp = $_FILES['picture']['tmp_name'];

    // Get uploaded video
    $video = $_FILES['video']['name'];
    $video_tmp = $_FILES['video']['tmp_name'];

    $upload_folder = "uploads/";

    // Create uploads folder if not exists
    if (!is_dir($upload_folder)) {
        mkdir($upload_folder, 0777, true);
    }

    $picture_path = $upload_folder . basename($picture);
    $video_path = $upload_folder . basename($video);

    // Move both files
    if (move_uploaded_file($picture_tmp, $picture_path) && move_uploaded_file($video_tmp, $video_path)) {
        // Insert into DB
        $query = "INSERT INTO content (name, picture, description, price, video) 
          VALUES ('$name', '$picture', '$description', '$price', '$video')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Content uploaded successfully!'); window.location.href='admin_dash.php';</script>";
        } else {
            echo "Error saving to database: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image or video.";
    }
}
?>
