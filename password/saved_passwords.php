<!--This page informs user about his 'Favourite' passwords-->

<?php
    // Including connection to DB
    include "../resources/_config.php";
    session_start();
    global $conn;

//    This needs to send request to DB if user clicks button to "Delete Password"
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteBtn"])) {
        $passwordToDelete = $_POST["passwordToDelete"];

        $username = $_SESSION["username"];
        $sql = "DELETE FROM passwords WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $passwordToDelete);
        mysqli_stmt_execute($stmt);

        header("Location: saved_passwords.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Profile</title>
    <?php include '../resources/header.php'; ?>
</head>
<body>
    <form class="ms-auto me-auto mt-3" style="width: 600px">
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <form action="saved_passwords.php" method="POST">
                        <h2>Here is your saved passwords, </h2>
                        <p class="lead text-success"> <?php echo $_SESSION["username"]; ?></p>
                         <?php
                             $username = $_SESSION["username"];
                             $sql = "SELECT password FROM passwords WHERE username = ?";
                             $stmt = mysqli_prepare($conn, $sql);
                             mysqli_stmt_bind_param($stmt, "s", $username);
                             mysqli_stmt_execute($stmt);
                             $result = mysqli_stmt_get_result($stmt);

                             // Outputting passwords as list
                             if (mysqli_num_rows($result) > 0) {
                                 echo "<ul>";
                                 while ($row = mysqli_fetch_assoc($result)) {
                                     $passwordToDelete = $row["password"];
                                     // Adding button to delete password if user wishes
                                     echo "<li>" . $row["password"] . "<form action='saved_passwords.php' method='POST'>
                                                                        <input type='hidden' name='passwordToDelete' value='$passwordToDelete'>
                                                                        <button class='btn btn-danger' type='submit' name='deleteBtn'>Delete Password</button>
                                                                        </form></li>";
                                 }
                                 echo "</ul>";
                             } else {
                                 echo "You don't have any saved passwords.";
                             }
                             mysqli_close($conn);
                        ?>
                    </form><br>

                    <div class="container">
                        <div class="mb-3">
                            <a href="generate.php" class="btn btn-success">Generate new password</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </form>
</body>
</html>
