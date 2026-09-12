`php
<?php

session_start();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* Profile */

    if (isset($_POST["profile"])) {

        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $facebook = $_POST["facebook"];
        $twitter = $_POST["twitter"];
        $instagram = $_POST["instagram"];

        if (empty($username)) {
            $errors[] = "Username is required";
        }

        if (empty($password)) {
            $errors[] = "Password is required";
        }

        if (empty($email)) {
            $errors[] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please enter a valid email";
        }

        if (empty($phone)) {
            $errors[] = "Phone number is required";
        } elseif (!preg_match("/^[0-9]{11}$/", $phone)) {
            $errors[] = "Phone number must contain 11 digits";
        }

        if (empty($facebook)) {
            $errors[] = "Facebook account URL is required";
        } elseif (!filter_var($facebook, FILTER_VALIDATE_URL)) {
            $errors[] = "Please enter a valid Facebook URL";
        }

        if (empty($twitter)) {
            $errors[] = "Twitter account URL is required";
        } elseif (!filter_var($twitter, FILTER_VALIDATE_URL)) {
            $errors[] = "Please enter a valid Twitter URL";
        }

        if (empty($instagram)) {
            $errors[] = "Instagram account URL is required";
        } elseif (!filter_var($instagram, FILTER_VALIDATE_URL)) {
            $errors[] = "Please enter a valid Instagram URL";
        }

        if (empty($errors)) {

            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["email"] = $email;
            $_SESSION["phone"] = $phone;
            $_SESSION["facebook"] = $facebook;
            $_SESSION["twitter"] = $twitter;
            $_SESSION["instagram"] = $instagram;

            header("Location: index.php");
            exit;
        }
    }

    /* Login */

    else {

        $email = $_POST["email"];
        $password = $_POST["password"];

        if (empty($email)) {
            $errors[] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please enter a valid email";
        }

        if (empty($password)) {
            $errors[] = "Password is required";
        }

        if (empty($errors)) {

            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;

            header("Location: products.php");
            exit;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Account - StepUp Store</title>

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


    <!-- Account -->

    <div class="account-section">

        <div class="account-box">

            <h1>My Account</h1>

            <p class="account-subtitle">
                Manage your StepUp Store account
            </p>


            <!-- Errors -->

            <?php if (!empty($errors)): ?>

                <div class="errors">

                    <?php foreach ($errors as $error): ?>

                        <p>
                            <?php echo $error; ?>
                        </p>

                    <?php endforeach; ?>

                </div>

            <?php endif; ?>


            <!-- Login -->

            <?php if (!isset($_SESSION["email"])): ?>

                <h2>Login</h2>
                <form method="POST">

                    <label>Email</label>

                    <input
                        type="text"
                        name="email"
                        placeholder="Enter your email"
                    >

                    <label>Password</label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                    >

                    <button type="submit">
                        Login
                    </button>

                </form>


            <!-- Profile -->

            <?php else: ?>

                <h2>My Profile</h2>

                <form method="POST">

                    <input
                        type="hidden"
                        name="profile"
                        value="1"
                    >

                    <label>Username</label>

                    <input
                        type="text"
                        name="username"
                        placeholder="Enter your username"
                    >


                    <label>Password</label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                    >


                    <label>Email</label>

                    <input
                        type="text"
                        name="email"
                        placeholder="Enter your email"
                    >


                    <label>Phone Number</label>

                    <input
                        type="text"
                        name="phone"
                        placeholder="Enter 11 digit phone number"
                    >


                    <label>Facebook URL</label>

                    <input
                        type="text"
                        name="facebook"
                        placeholder="https://facebook.com/..."
                    >


                    <label>Twitter URL</label>

                    <input
                        type="text"
                        name="twitter"
                        placeholder="https://twitter.com/..."
                    >


                    <label>Instagram URL</label>

                    <input
                        type="text"
                        name="instagram"
                        placeholder="https://instagram.com/..."
                    >


                    <button type="submit">
                        Save Profile
                    </button>

                </form>

            <?php endif; ?>

        </div>

    </div>

</body>

</html>
`