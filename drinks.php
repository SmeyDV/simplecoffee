<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Drinks</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <div class="logo">Brew Co.</div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="drinks.php">Menu</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section>
            <h1 style="font-size: 2.5em; color: #6F4E37; border-bottom: 2px solid #6F4E37; padding-bottom: 10px; margin-bottom: 20px; text-align: center;">Menu</h1>



            <div class="drinks-container">
                <?php
                $sql = "SELECT drink_id, name, description, price, image_url FROM Drinks";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='drink-box'>";
                        echo "<img src='" . $row["image_url"] . "' alt='" . $row["name"] . "' class='drink-image'>";
                        echo "<h3>" . $row["name"] . " - $" . $row["price"] . "</h3>";
                        echo "<p>" . $row["description"] . "</p>";
                        echo "<a href='order.php?drink_id=" . $row["drink_id"] . "' class='order-button'>Order</a>";
                        echo "</div>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Coffee Shop. All rights reserved.</p>
    </footer>
</body>

</html>