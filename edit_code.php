<?php
session_start();

// Prevent page caching after logout
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Redirect if not logged in as admin
// if (!isset($_SESSION['user']) || $_SESSION['user_type'] !== 'admin') {
//     header("Location: index.php");
//     exit();
// }

$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');
if (!$conn) {
    die("Connection failed");
}

// Update content after form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $old_image = $_POST['old_image']; // hidden field with current image name

    // Handle new image upload
    if ($_FILES['new_image']['name'] != '') {
        $image_name = time() . '_' . $_FILES['new_image']['name'];
        $image_tmp = $_FILES['new_image']['tmp_name'];
        move_uploaded_file($image_tmp, "uploads/" . $image_name);

        // Delete old image
        if (file_exists("uploads/" . $old_image)) {
            unlink("uploads/" . $old_image);
        }
    } else {
        $image_name = $old_image; // No new image uploaded
    }

    $query = "UPDATE content 
              SET name='$name', description='$description', price='$price', picture='$image_name' 
              WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Content updated successfully!'); window.location.href='admin_dash.php';</script>";
    } else {
        echo "Error updating content: " . mysqli_error($conn);
    }
    exit();
}

// Fetch content for editing
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "SELECT * FROM content WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    // If no ID was posted, redirect to dashboard
    header("Location: admin_dash.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Content</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #111;
            color: white;
        }
        .form-control, .btn {
            border-radius: 10px;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            background-color: #222;
            padding: 30px;
            border-radius: 15px;
        }
        img.preview {
            width: 100%;
            max-height: 250px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">✏️ Edit Content</h2>

    <form method="post" action="edit_code.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <input type="hidden" name="old_image" value="<?php echo $data['picture']; ?>">

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4" required><?php echo $data['description']; ?></textarea>
        </div>

        <div class="mb-3">
            <label>Price (₹)</label>
            <input type="number" name="price" class="form-control" value="<?php echo $data['price']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>
            <img src="uploads/<?php echo $data['picture']; ?>" class="preview" alt="Current Image">
        </div>

        <div class="mb-3">
            <label>Upload New Image (optional)</label>
            <input type="file" name="new_image" class="form-control">
        </div>

        <button type="submit" name="update" class="btn btn-success w-100">Update Content</button>
        <a href="admin_dash.php" class="btn btn-secondary w-100 mt-2">Back</a>
    </form>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
