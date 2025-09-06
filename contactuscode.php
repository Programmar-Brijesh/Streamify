<?php
$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');

if (!$conn) {
    die("Connection failed");
}

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_us (name, email, subject, message)
        VALUES ('$name', '$email', '$subject', '$message')";

if (mysqli_query($conn, $sql)) {
    echo "Message sent successfully!";
    header("location: contactus.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
