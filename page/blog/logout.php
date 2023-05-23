

<!doctype html>

<head>
  <?php require $_SERVER["DOCUMENT_ROOT"] . "/partials/head.php"; 
    $_SESSION['user_id'] = null;
    setcookie('user_id', '', 0, '/');
    echo '<script>window.location.href = "/index.php";</script>';
  ?>

  
</head>
<body>
    
</body>
