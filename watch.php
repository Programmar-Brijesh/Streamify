<?php
$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');
if (!$conn) {
    die("Connection failed");
}

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$query = "SELECT * FROM content WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Content not found.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $data['name']; ?> - Watch Now</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #111;
            color: white;
        }
        .container {
            margin-top: 30px;
        }
        .video-box {
            background-color: #000;
            padding: 10px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
            max-height: 500px;
            overflow: hidden;
        }
        video {
            width: 100%;
            height: 100%;
            max-height: 480px;
            border-radius: 10px;
            object-fit: cover;
        }
        .poster {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .details {
            margin-top: 30px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mb-4 text-center"><?php echo $data['name']; ?></h2>

    <div class="video-box mb-4">
        <!-- Dummy Video Player -->
        <video controls poster="uploads/<?php echo $data['picture']; ?>">
            <source src="uploads/<?php echo $data['video'];  ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="details text-center">
        <p><strong>Description:</strong> <?php echo $data['description']; ?></p>
        <p><strong>Price:</strong> ₹<?php echo $data['price']; ?></p>
        <a href="index.php" class="btn btn-outline-light mt-3">⬅ Back</a>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
