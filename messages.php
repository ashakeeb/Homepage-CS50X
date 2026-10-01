<?php

session_start();

if (!isset($_SESSION["admin"]))
{
    header("Location: admin_login.php");
    exit;
}

$servername = "localhost";
$username = "website";
$password = "website123";
$database = "mywebsite";

$conn = new mysqli(
    $servername,
    $username,
    $password,
    $database
);

if ($conn->connect_error)
{
    die("Database connection failed");
}

$sql = "SELECT * FROM messages ORDER BY created_at DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Messages</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h1>Messages</h1>
    <a href="logout.php">Logout</a>

    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>

            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo htmlspecialchars($row["name"]); ?></td>
                <td><?php echo htmlspecialchars($row["email"]); ?></td>
                <td><?php echo htmlspecialchars($row["message"]); ?></td>
                <td><?php echo $row["created_at"]; ?></td>
            </tr>

        <?php } ?>

    </table>

</body>

</html>

<?php
$conn->close();
?>