<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Coffee Website</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/contact.css">
    
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
      <div class="hop">
        <section class="contact-section">
            <h2>Get in Touch</h2>
            <p>
                We'd love to hear from you! Whether you have a question about our coffee, need assistance, or just want to talk about your love for coffee, we're here for you.
            </p>
            <form action="submit_contact.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
                
                <button type="submit">Send Message</button>
            </form>
        </section>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Coffee Website by Reaksmey. All rights reserved.</p>
    </footer>
</body>
</html>
