<?php require $_SERVER["DOCUMENT_ROOT"] . "/configs/DB_connect.php";

          if ((isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) || (isset($_COOKIE['user_id']) && $_COOKIE['user_id'] != null)) {
            $sql = "SELECT * FROM usersname WHERE id = " . (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id']);
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                echo '<script>window.location.href = "/";</script>';
                exit;
            }
            $user = mysqli_fetch_array($result);
            if($user['role'] != "admin"){
              echo '<script>window.location.href = "/";</script>';
            }}else {
                echo '<script>window.location.href = "/";</script>';
            }          
          ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>