<!--This page is used to Log in user to his account-->

<?php
    require_once "../resources/_config.php";
    global $conn;
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if ($row && password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;
            header("Location: profile.php");
            exit();
        } else {
            echo "Invalid username or password.";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" src="../css/style.css">
    <?php include '../resources/header.php'; ?>
</head>
<body>
    <main class="form-signin mt-5 py-4 w-25 m-auto">
        <form method="POST" action="login.php">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                <!-- Display login form if the user is not logged in -->
                <div class="form-floating">
                    <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Username" required>
                    <label for="floatingInput">Username</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="btn btn-success w-100 py-2" type="submit" name="login">Log in</button><br><br>

                <p class="text-center">Don't have an account?   <a href="../index.php">Register</a></p>
        </form>
    </main>
</body>
</html>
