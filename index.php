<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>StepUp Store</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- Navbar -->

    <nav>

        <h2>StepUp Store</h2>

        <div>

            <a href="index.php">Home</a>
            <a href="products.php">All Products</a>
            <a href="account.php">Account</a>

            <?php if (isset($_SESSION["email"])): ?>
                <a href="logout.php">Logout</a>
            <?php endif; ?>

        </div>

    </nav>


    <!-- Home -->

    <header>

        <div class="hero-content">

            <p class="small-title">
                STEP INTO STYLE
            </p>

            <h1>
                Find Your Perfect
                <span>Shoes</span>
            </h1>

            <p class="hero-text">
                Discover stylish and comfortable shoes
                made for every step.
            </p>

            <a href="products.php" class="shop-btn">
                Shop Now →
            </a>

        </div>

    </header>


    <!-- Welcome -->

    <section class="welcome">

        <h2>
            Welcome to StepUp Store
        </h2>

        <p>
            Explore our collection of stylish shoes and
            find the perfect pair for you.
        </p>

    </section>

</body>

</html>
