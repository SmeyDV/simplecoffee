<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Featured Brews</title>
  <link rel="stylesheet" href="css/featured.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<body>
  <section class="featured" id="menu">
    <div class="container">
      <h2>Featured Brews</h2>
      <div class="coffee-grid">
        <?php
        // Query to get three random drinks
        $sql = "SELECT name, description, image_url FROM Drinks ORDER BY RAND() LIMIT 3";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<div class='coffee-item'>";
            echo "<img src='" . $row['image_url'] . "' alt='" . $row['name'] . "'>";
            echo "<h3>" . $row['name'] . "</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "</div>";
          }
        } else {
          echo "<p>No drinks available</p>";
        }
        ?>
      </div>

    </div>
  </section>

</body>

</html>