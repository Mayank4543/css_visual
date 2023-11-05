<?php
include 'connect.php';


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="card">
        <h2>Login Page</h2>
        <?php
        if (isset($_POST['submit'])) {
            $password = $_POST['password'];
            $email = $_POST['email'];
            $sql = "select * from register where email='$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    header("location:register.php");
                    echo 'you are lo';
                }
            }



        } ?>
        <hr>
        <form id="loginForm" action="index.php" method="post">
            <div class="inputField">
                <label for="username"><i class="fa-solid fa-user"></i></label>
                <input type="email" name="email" id="username" placeholder="username">
            </div>
            <p id="nameError" class="errorMessage"></p>
            <div class="inputField">
                <label for="password"><i class="fa-solid fa-lock"></i></label>
                <input type="password" name="password" id="password" placeholder="password">
            </div>
            <p id="passwordError" class="errorMessage"></p>
            <button type="submit" name="submit">
                <h3>Login</h3>
                <i class="fa-solid fa-arrow-right arrow-sign"></i>
            </button>
            <a href="./register.php">Register Now</a>
        </form>
    </div>
    <!-- <script>
        let nameError = document.getElementById("nameError");
        let passwordError = document.getElementById("passwordError");

        function handlesubmit(e) {
            e.preventDefault();
            let username = document.getElementById("username");
            let password = document.getElementById("password");

            if (username.value.length <= 0) {
                nameError.innerHTML = "Please enter a username"
                return
            } else {
                nameError.innerHTML = ""
            }
            if (password.value.length <= 0) {
                passwordError.innerHTML = "Please enter a password"
                return
            } else {
                passwordError.innerHTML = ""
            }

            console.log(username.value, password.value)
        }
        let login = document.getElementById("loginForm")
        login.addEventListener('submit', handlesubmit)
    </script> -->
</body>

</html>