<?php 
require $_SERVER["DOCUMENT_ROOT"] . "/configs/DB_connect.php";
        if(!empty($_POST)){   
            
            $postName = $_POST['postName'];
            $postMessage = $_POST['postMessage'];
            $image = '';

                function RandomString()
            {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randstring = '';
                for ($i = 0; $i < 10; $i++) {
                $randstring = $characters[rand(0, strlen($characters) - 1)];
                }
                return $randstring;
            }

            if(!empty($_FILES) && !empty($_FILES['fileUpload']['name'])){
              $uploaddir = $_SERVER["DOCUMENT_ROOT"] . "/uploads";
              $ext = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
              $image = RandomString() . time() . "." . $ext;
              $uploadfile = $uploaddir . "/" .  $image;  



              if(move_uploaded_file($_FILES['fileUpload']['tmp_name'], $uploadfile)){
                ?><script>alert("Uploaded Image")</script>  <?php  
              }else {
                ?><script>alert("Error Uploading Image")</script>  <?php  
          }
            }

            if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != null){
              $sql = "SELECT * FROM usersname WHERE id =" . $_SESSION['user_id'];
            } else {$sql = "SELECT * FROM usersname WHERE id =" . $_COOKIE['user_id'];}
    
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);

            $sql = "INSERT INTO `posts` (`id`, `namepost`, `text`, `user_id`, `created`, `image`) VALUES (NULL, '" . $postName . "', '" . $postMessage . "', '" . $user['id'] . "', CURRENT_TIMESTAMP, '" . $image . "');";

        if (mysqli_query($conn, $sql)) {
            ?><script>alert("New record created successfully")</script>  <?php
            echo "<article class='overflow-hidden rounded-lg shadow transition hover:shadow-lg'>";
            if ($image == "") {
            echo "";
            } else {
            echo "<img src='/uploads/" . $image . "' class='h-56 w-full object-cover'/>";
            }
            echo "<div class='bg-white p-4 sm:p-6'>";
            echo "<time datetime='2022-10-10' class='block text-xs text-gray-500'>" . date('Y-m-d H:i:s', strtotime('now')) . "</time>";
            echo "<h3 class='mt-0.5 text-lg text-gray-900'>" . $postName . "</h3>";
            echo "<p class='mt-2 line-clamp-3 text-sm/relaxed text-gray-500'>" . $postMessage . "</p>";
            echo "</div>";
            echo "</article>";
        } else {
            ?><script>alert("ERROR")</script>  <?php
        }
        }
      ?>