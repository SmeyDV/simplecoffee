<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Drinks</title>
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
        <section class="order-section">
            <h2>Place Your Order</h2>
            <form action="order.php" method="post" class="order-form">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="drink">Select Drink:</label>
                <select id="drink" name="drink_id" onchange="updatePrice()">
                    <?php
                    $selected_drink = isset($_GET['drink_id']) ? $_GET['drink_id'] : '';
                    $sql = "SELECT drink_id, name, price FROM Drinks";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $selected = $row["drink_id"] == $selected_drink ? "selected" : "";
                            echo "<option value='" . $row["drink_id"] . "' data-price='" . $row["price"] . "' $selected>" . $row["name"] . " - $" . $row["price"] . "</option>";
                        }
                    }
                    ?>
                </select>

                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1" required onchange="updatePrice()">

                <p id="total-price">Total Price: $0.00</p>

                <button type="submit" class="order-button">Order Now</button>
            </form>
            <a href="drinks.php" class="back-button">Back to Drinks</a>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $user_id = 1; // Assuming a logged-in user
                $drink_id = $_POST['drink_id'];
                $quantity = $_POST['quantity'];

                // Get drink price
                $sql = "SELECT price FROM Drinks WHERE drink_id = $drink_id";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $price = $row['price'];

                // Calculate total price
                $total_price = $price * $quantity;

                // Insert order
                $sql = "INSERT INTO Orders (user_id, total_price) VALUES ($user_id, $total_price)";
                if ($conn->query($sql) === TRUE) {
                    $order_id = $conn->insert_id;
                    // Insert order items
                    $sql = "INSERT INTO OrderItems (order_id, drink_id, quantity, price) VALUES ($order_id, $drink_id, $quantity, $price)";
                    if ($conn->query($sql) === TRUE) {
                        echo "<p class='success-message'>Order placed successfully!</p>";
                    } else {
                        echo "<p class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                    }
                } else {
                    echo "<p class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Coffee Shop. All rights reserved.</p>
    </footer>

    <script>
        function updatePrice() {
            const drinkSelect = document.getElementById('drink');
            const quantityInput = document.getElementById('quantity');
            const priceElement = document.getElementById('total-price');

            const selectedOption = drinkSelect.options[drinkSelect.selectedIndex];
            const pricePerUnit = parseFloat(selectedOption.getAttribute('data-price'));
            const quantity = parseInt(quantityInput.value);

            const totalPrice = pricePerUnit * quantity;
            priceElement.textContent = `Total Price: $${totalPrice.toFixed(2)}`;
        }

        // Initialize price on page load
        document.addEventListener('DOMContentLoaded', updatePrice);
    </script>
</body>
</html>
