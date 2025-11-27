<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin_login.php"); // Redirect to login page if not logged in
    exit();
}

// Database configuration
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password is empty
$dbname = "dealer_db"; // Name of the database created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$sql = "SELECT * FROM dealers";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dealer Data</title>
    
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Style the link as a button */
        a {
            display: block;
            width: 100px;
            margin: 20px auto;
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #0056b3;
        }

        /* Mobile-responsive styles */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            table {
                border: none;
                margin-top: 0;
            }

            th, td {
                padding: 8px;
            }

            h2 {
                font-size: 1.5em;
            }

            table, th, td {
                display: block;
                width: 100%;
            }

            th {
                background-color: #007bff;
                color: white;
                position: relative;
            }

            td {
                border-bottom: 1px solid #ddd;
                display: block;
                width: 100%;
                text-align: right;
                position: relative;
                padding-left: 50%;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                top: 10px;
                font-weight: bold;
            }

            tr:last-child td {
                border-bottom: none;
            }

            a {
                width: 80%;
                margin: 0 auto;
            }
        }
    </style>
</head>
<body>

    <h2>Dealer Data</h2>

    <?php
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
            </tr>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td data-label='ID'>{$row['id']}</td>
                    <td data-label='Username'>{$row['username']}</td>
                    <td data-label='Email'>{$row['email']}</td>
                    <td data-label='Phone Number'>{$row['contact']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No data found</td></tr>";
    }
    echo "</table>";
    ?>

    <a href="logout.php">Logout</a>

</body>
</html>

<?php
$conn->close();
?>
