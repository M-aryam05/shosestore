<?php

session_start();

$products = [

    "Nike Air Max" => [
        "price" => 2500,
        "image" => "images/nike.jpg",
        "description" => "Comfortable Nike shoes for everyday use"
    ],

    "Adidas Superstar" => [
        "price" => 2200,
        "image" => "images/adidas.avif",
        "description" => "Classic Adidas shoes"
    ],

    "Puma Runner" => [
        "price" => 1800,
        "image" => "images/puma.jpg",
        "description" => "Lightweight Puma running shoes"
    ],

    "New Balance 574" => [
        "price" => 3000,
        "image" => "images/newbalance.webp",
        "description" => "Comfortable New Balance shoes"
    ],

    "Converse All Star" => [
        "price" => 2000,
        "image" => "images/convers.avif",
        "description" => "Classic Converse sneakers"
    ],

    "Reebok Classic" => [
        "price" => 1900,
        "image" => "images/reebok.jfif",
        "description" => "Simple Reebok casual shoes"
    ]

];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All Products - StepUp Store</title>

    <!-- Bootstrap -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <!-- Our CSS -->
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


    <!-- Products Section -->

    <div class="container products-section">

        <h1 class="products-title">
            Our Products
        </h1>

        <p class="products-subtitle">
            Discover our latest collection of stylish shoes
        </p>


        <div class="row">

            <?php foreach ($products as $product => $values): ?>

                <div class="col-md-4 mb-4">

                    <div class="card product-card">

                        <img
                            src="<?php echo $values["image"]; ?>"
                            class="card-img-top"
                            alt="<?php echo $product; ?>"
                        >

                        <div class="card-body">

                            <h5 class="card-title">
                                <?php echo $product; ?>
                            </h5>

                            <p class="card-text">
                                <?php echo $values["description"]; ?>
                            </p>

                            <p class="product-price">
                                <?php echo $values["price"]; ?> EGP
                            </p>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</body>

</html>
