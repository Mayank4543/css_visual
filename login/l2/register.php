<?php
include 'connect.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="card">
        <h2>Register </h2>
        <hr>

        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordRepeat = $_POST['cpassword'];
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $errors = array();
            if (empty($name) or empty($email) or empty($password) or empty($passwordRepeat)) {
                array_push($errors, 'All fields are required');
            }
            if (strlen($password) < 8) {
                $passw = 'password must be ateleast 8 charachter long ';
                array_push($errors, $passw);

            }
            if ($passwordRepeat !== $password) {
                array_push($errors, 'password must be same ');
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, 'email must be valid ');
            }
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class= 'alert alert-danger'>$error</div>";
                }

            } else {
                $sql = "INSERT INTO register( `name`, `email`, `password`) VALUES (?,?,?)";
                $result = mysqli_stmt_init($conn);
                $prreaperr = mysqli_stmt_prepare($result, $sql);
                if ($prreaperr) {
                    mysqli_stmt_bind_param($result, 'sss', $name, $email, $password_hash);
                    mysqli_stmt_execute($result);
                    if (mysqli_stmt_execute($result)) {
                        echo '<script>
                        alert("you are login");
                    
                        </script>';
                    }

                }


            }

        }


        ?>
        <form id="loginForm" action="register.php" method="post">
            <div class="inputField">
                <label for="username"><i class="fa-solid fa-user"></i></label>
                <input type="text" name="username" id="username" placeholder="username">
            </div>
            <div class="inputField">
                <label for="username"><i class="fa-solid fa-message"></i></label>
                <input type="email" name="email" id="username" placeholder="email">
            </div>
            <p id="nameerrors" class="errorsMessage"></p>
            <div class="inputField">
                <label for="password"><i class="fa-solid fa-lock"></i></label>
                <input type="password" name="password" id="password" placeholder="password">
            </div>
            <div class="inputField">
                <label for="password"><i class="fa-solid fa-lock"></i></label>
                <input type="passsword" name="cpassword" id="password" placeholder="confirm password">
            </div>

            <p id="passwordError" class="errorsMessage"></p>
            <button type="submit" name="submit">
                <h3>Register</h3>
                <i class="fa-solid fa-arrow-right arrow-sign"></i>
            </button>
            <a href="./index.php" style="margin-top: 12px;">Login Now</a>
        </form>
    </div>


    <script>
        document.getElementById("passwordError").textContent = "Password must be at least 8 characters long";
    </script>

</body>

</html>