<?php
include 'connect.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css ">
</head>
<style>

</style>

<body>
    <div class="container">
        <button>
            <a href="user.php">Add user</a>
        </button>


        <table class="content-table">
            <thead>
                <tr>
                    <th>
                        sno
                    </th>
                    <th>name</th>
                    <th>
                        email
                    </th>
                    <th>operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'select * from crudt';
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['Name'];
                        $email = $row['email'];
                        echo '
                <tr>
                <td>' . $id . '</td>
                <td>' . $name . '</td>
                <td>' . $email . '</td>
                <td>
                        <a href="">edit</a>
                    </td>
                    <td>
                        <a href="">delete</a>
                    </td>
            </tr  
                ';

                    }

                }

                ?>


            </tbody>
        </table>
    </div>

</body>

</html>