<!--This page identifies user if he saved password-->
<!--It can be seen only after saving password from page "generate.php"-->

<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
    exit();
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
    <form method="POST" class="ms-auto me-auto mt-3" style="width: 500px">
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <p class="lead text-body-secondary">Your password has been successfully saved.<p class="text-success"><?php echo $_SESSION["username"]; ?></p>

                    <div class="container">
                        <div class="mb-3">
                            <a href="generate.php" class="btn btn-success">Generate new password</a>
                        </div>
                    </div>

                    <div class="container">
                        <div class="mb-3">
                            <a href="saved_passwords.php" class="btn btn-primary">Review saved passwords</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>
</html>
