<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $Name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $sql = "insert into crudt (Name,password ,email,mobile)values('$Name','$password','$email','$mobile')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        die('result inserted successfully');
    } else {
        die(mysqli_error($conn));
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="">







    <div class="container">
        <h2>
            User's data
        </h2>

        <form action="
        " method="post">
            <input type="text" name="name" id="">
            <input type="password" name="password" id="">
            <input type="email" name="email" id="">
            <input type="text" name="mobile" id="">
            <button type="submit" name="submit">Submit</button>
        </form>

    </div>
</body>

</html>