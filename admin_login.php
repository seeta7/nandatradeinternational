<?php
session_start();

// Check if the admin is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: view_dealers.php"); // Redirect to the dealer view page if already logged in
    exit();
}

// Hardcoded admin credentials (plain text password for simplicity)
$admin_username = "admin";
$admin_password = "admin123"; // Simple password

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Check if the entered credentials match
    if ($username === $admin_username && $password === $admin_password) {
        // Start the session and set logged in flag
        $_SESSION['loggedin'] = true;
        header("Location: view_dealers.php"); // Redirect to dealer data page after login
        exit();
    } else {
        $error_message = "Invalid credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Admin Login</title>
    <header id="header">
        <div class="navbar">
            <div class="logo">
                <span>
                    <h1> </h1>
                </span>
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="map.html" class="contact-button">CONTACT</a></li>
                </ul>
                <!-- Hamburger Icon for Mobile -->
                <div class="hamburger" onclick="toggleMenu()">
                    &#9776;
                </div>
            </nav>
        </div>
    </header>
</head>
<style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f3f4f6;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-container {
            background: #fff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-container h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #555;
            display: block;
            margin-bottom: 6px;
            text-align: left;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error-message {
            margin-top: 10px;
            color: red;
            font-size: 14px;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 30px;
            }

            .login-container h2 {
                font-size: 20px;
            }
        }
    </style>
<body>
<div class="login-container">
    <h2>Admin Login</h2>
    <form action="admin_login.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <?php
    if (isset($error_message)) {
        echo "<p style='color:red;'>$error_message</p>";
    }
    ?>
</body>
</html>
