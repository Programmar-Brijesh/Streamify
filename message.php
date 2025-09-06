<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user']) || !isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// Connect to DB
$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');
if (!$conn) {
    die("Connection failed");
}

// Check if the user is an admin
$email = $_SESSION['email'];
$check_admin = "SELECT user_type FROM sign_up WHERE email = '$email' LIMIT 1";
$admin_result = mysqli_query($conn, $check_admin);
$row = mysqli_fetch_assoc($admin_result);

if (!$row || $row['user_type'] !== 'admin') {
    header("Location: index.php");
    exit();
}

// Handle delete
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM contact_us WHERE id = $delete_id");
    header("Location: message.php");
    exit();
}

// Fetch messages
$sql = "SELECT * FROM contact_us ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - View Messages</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f6fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
        .container {
            margin-top: 50px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.25rem;
        }
        .btn-delete {
            color: white;
            background-color: #dc3545;
            border: none;
            padding: 4px 10px;
            border-radius: 4px;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card shadow">
        <div class="card-header text-center">
            📥 Contact Form Messages
        </div>
        <div class="card-body">
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td class="text-center"><?php echo $row['id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td><?php echo htmlspecialchars($row['subject']); ?></td>
                                    <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                                    <td class="text-center">
                                        <a href="message.php?delete=<?php echo $row['id']; ?>" 
                                           onclick="return confirm('Are you sure you want to delete this message?')"
                                           class="btn-delete">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else {
                echo "<p class='text-center'>No messages found.</p>";
            } ?>
        </div>
    </div>
</div>

</body>
</html>
