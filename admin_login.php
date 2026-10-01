<?php

session_start();

if (isset($_SESSION["admin"]))
{
    header("Location: messages.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "admin123")
    {
        $_SESSION["admin"] = true;

        header("Location: messages.php");
        exit;
    }
    else
    {
        $error = "Wrong username or password";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
        }

        input {
            display: block;
            margin: 10px auto;
            padding: 10px;
            width: 250px;
        }

        button {
            padding: 10px 30px;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

    <h1>Admin Login</h1>

    <?php if ($error != "") { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST">

        <input
            type="text"
            name="username"
            placeholder="Username"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
        >

        <button type="submit">Login</button>

    </form>

</body>

</html>