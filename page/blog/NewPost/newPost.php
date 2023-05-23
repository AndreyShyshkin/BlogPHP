<!DOCTYPE html>
<html lang="en">
<head>
  <?php require $_SERVER["DOCUMENT_ROOT"] . "/partials/head.php"; 
  if (!isset($_SESSION['user_id']) && !isset($_COOKIE['user_id'])) {
    header("Location: /");
    exit;
  }
  ?>
</head>
<body>
<?php require "../partials/header.php" ?>
<section class="bg-gray-100 h-full">
  <div class="mx-auto max-w-screen-xl px-4 py-36 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
      <div class="lg:col-span-2 lg:py-12">

        <div class="mt-8">
          <p class="text-2xl font-bold text-pink-600">
            CREATE NEW POST
        </p>
        </div>
      </div>

      <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
        <form enctype="multipart/form-data" action="#" method="POST" class="space-y-4">
          <div>
            <label class="sr-only" for="name">Name Post</label>
            <input
              class="w-full rounded-lg border-gray-200 p-3 text-sm"
              placeholder="Name"
              type="text"
              id="name"
              name="postName"
            />
          </div>

          <div>
            <label class="sr-only" for="message">Message</label>

            <textarea
              class="w-full rounded-lg border-gray-200 p-3 text-sm"
              placeholder="Message"
              rows="8"
              id="message"
              name="postMessage"
            ></textarea>
          </div>


          <div class="mb-3">
  <label
    for="formFile"
    class="mb-2 inline-block text-neutral-700"
    >Default file input example</label
  >
  <input
    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none"
    type="file"
    id="formFile" 
    name="fileUpload"
    />
    
</div>



          <div class="mt-4">
            <button
              type="submit"
              class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto"
            >
              Send
            </button>
          </div>
        </form>
        <?php 
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
              var_dump($_FILES);
              $uploaddir = $_SERVER["DOCUMENT_ROOT"] . "/uploads";
              $ext = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
              $image = RandomString() . time() . "." . $ext;
              $uploadfile = $uploaddir . "/" .  $image;


              if(move_uploaded_file($_FILES['fileUpload']['tmp_name'], $uploadfile)){
                echo "Uploaded Image    ";
              }else {
                echo "Error Uploading Image     ";
          }
            }

            if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != null){
              $sql = "SELECT * FROM usersname WHERE id =" . $_SESSION['user_id'];
            } else {$sql = "SELECT * FROM usersname WHERE id =" . $_COOKIE['user_id'];}
    
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);

            $sql = "INSERT INTO `posts` (`id`, `namepost`, `text`, `user_id`, `created`, `image`) VALUES (NULL, '" . $postName . "', '" . $postMessage . "', '" . $user['id'] . "', CURRENT_TIMESTAMP, '" . $image . "');";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        }
?>
      </div>
    </div>
  </div>
</section>

<?php require $_SERVER["DOCUMENT_ROOT"] . "/partials/scripts.php"; ?>
</body>

</html>