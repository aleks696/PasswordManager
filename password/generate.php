<!--This page is used to give user possibility to generate random password-->

<?php
    include "../resources/_config.php";
    global $conn;
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_SESSION["username"];
        $pass = $_POST["generatedPassword"];

        $sql = "INSERT INTO `passwords` (`username`, `password`) VALUES ('$username', '$pass')";
        $result = mysqli_query($conn, $sql);

        if ($result){
            $_SESSION["username"] = $username;
            header("Location: generated.php");
            echo "Password saved successfully.";
        }else{
            echo "Error".mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" src="../css/style.css">
    <?php include '../resources/header.php'; ?>
</head>
<body>
    <div class="container w-50 m-auto!important text-center">
        <div class="row row-cols-1 row-cols-lg align-items-stretch g-4 py-5">
            <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column ">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <form action="generate.php" method="post">
                            <h1 class="h3 mb-3 fw-normal ">Choose number of characters for password <p class="text-success"><?php echo $_SESSION["username"]; ?> </p></h1>
                            <input class="m-auto" type="number" id="passwordLength" min="2" max="25" value="1"><br><br>
                            <label for="includeSpecialChars">
                                <input class="form-check-input" type="checkbox" id="includeSpecialChars"> Include special characters like "!@#$%^&*()_-+=<>?"
                            </label><br><br>
                            <button class="btn btn-primary btn-lg px-4 gap-3" type="button" id="generateBtn">Generate Password</button><br><br>
                            <p id="password"></p>
                            <input type="hidden" name="generatedPassword" id="generatedPassword">

                            <button class="btn btn-primary btn-lg px-4 gap-3" type="submit" id="saveBtn">Save Password</button><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../JS/script.js"></script>
</body>
</html>
