<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Artisanal Coffee</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6F4E37;
            /* Coffee brown */
            --secondary-color: #F5E6D3;
            /* Light cream */
            --text-color: #33261D;
            /* Dark brown for text */
            --background-color: #FDF7F1;
            /* Very light cream for background */
        }

        body,
        html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--background-color);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            align-items: center;
        }

        header {
            background-color: var(--primary-color);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: var(--secondary-color);
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin-left: 30px;
        }

        nav ul li a {
            text-decoration: none;
            color: var(--secondary-color);
            font-weight: 500;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #fff;
        }

        .hero {
            background-color: var(--secondary-color);
            padding: 120px 0 60px;
            text-align: center;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .hero p {
            font-size: 18px;
            color: var(--text-color);
            max-width: 600px;
            margin: 0 auto 30px;
        }

        .btn {
            display: inline-block;
            background-color: var(--primary-color);
            color: var(--secondary-color);
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #5A3E2A;
            /* Darker brown on hover */
        }

        .featured {
            padding: 20px;
        }

        .featured h2 {
            text-align: center;
            margin-bottom: 40px;
            color: var(--primary-color);
        }

        footer {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            padding: 20px;
            text-align: center;
        }
    </style>
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

    <section class="hero" id="home">
        <div class="container">
            <h1>Discover Khmer Coffee</h1>
            <p>Experience the rich flavors and aromas of our carefully crafted brews.</p>
            <a href="drinks.php" class="btn">Explore Our Menu</a>
        </div>
    </section>

    <section class="featured">
        <div class="container">
            <?php include 'featured.php'; ?>
        </div>
    </section>

    <footer>

        <p>&copy; 2024 Brew Co. All rights reserved.</p>

    </footer>
</body>

</html>