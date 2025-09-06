<?php
$conn = mysqli_connect('sql100.infinityfree.com', 'if0_39611773', 'E23220735500021', 'if0_39611773_online_ott');
if (!$conn) {
  die("Connection failed");
}

$query = $_GET['query'] ?? '';
$category = $_GET['category'] ?? '';

$sql = "SELECT * FROM content WHERE (name LIKE ? OR description LIKE ?)";
$params = ["%$query%", "%$query%"];

if ($category === 'movies') {
  $sql .= " AND category = 'movie'";
} elseif ($category === 'series') {
  $sql .= " AND category = 'series'";
}

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", ...$params);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
  echo "<div class='col-md-4'>
          <div class='card mb-4'>
            <img src='uploads/{$row['picture']}' class='card-img-top' alt='Image'>
            <div class='card-body'>
              <h5 class='card-title'>{$row['name']}</h5>
              <p class='card-text'>{$row['description']}</p>
              <p><strong>Price:</strong> ₹{$row['price']}</p>
              <form method='post' action='watch.php'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <button type='submit' class='btn btn-danger w-100'>Watch</button>
              </form>
            </div>
          </div>
        </div>";
}

mysqli_close($conn);
