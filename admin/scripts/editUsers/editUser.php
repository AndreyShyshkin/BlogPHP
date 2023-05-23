<!DOCTYPE html>
<html lang="en">
<head>
    <?php require "../../partials/head.php"; ?>
</head>
<body>
<?php require "../../partials/header.php"; ?>
<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
  <div class="mx-auto max-w-lg text-center">
    <h1 class="text-2xl font-bold sm:text-3xl">Edit Users</h1>
  </div>

<?php 
  $sql = "SELECT * FROM `usersname` WHERE id =" . $_GET['id'];
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
?>
  <form  action="#" method="POST" class="mx-auto mb-0 mt-8 max-w-md space-y-4">
        <div>
            <label for="name" class="sr-only">FirstName</label>

            <div class="relative">
                <input
                name="FirstName"
                type="text"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                placeholder="FirstName"
                value="<?php echo $row["FirstName"] ?>"
                />
            </div>
        </div>
        <div>
            <label for="name" class="sr-only">LastName</label>

            <div class="relative">
                <input
                name="LastName"
                type="text"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                placeholder="LastName"
                value="<?php echo $row["LastName"] ?>"
                />
            </div>
        </div>
        <div>
            <label for="name" class="sr-only">UserName</label>

            <div class="relative">
                <input
                name="UserName"
                type="text"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                placeholder="UserName"
                value="<?php echo $row["username"] ?>"
                />
            </div>
        </div>
        <div>
      <label for="email" class="sr-only">Email</label>

      <div class="relative">
        <input
          name="email"
          type="email"
          class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
          placeholder="Enter email"
          value="<?php echo $row["email"] ?>"
        />

        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4 text-gray-400"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
            />
          </svg>
        </span>
      </div>
    </div>

    <div>
      <label for="password" class="sr-only">Password</label>

      <div class="relative">
        <input
          name="password"
          type="password"
          class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
          placeholder="Enter password"
          value="<?php echo $row["password"] ?>"
        />

        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4 text-gray-400"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
            />
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
            />
          </svg>
        </span>
      </div>
    </div>
    <div>
            <label for="name" class="sr-only">Role</label>

            <div class="relative">
                <input
                name="role"
                type="text"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                placeholder="Role"
                value="<?php echo $row["role"] ?>"
                />
            </div>
        </div>

    <div class="flex items-center justify-between">
      <button
        type="submit"
        class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white"
      >
        EDIT
      </button>
    </div>
  </form>
</div>

</body>
</html>

<?php 
if(!empty($_POST)){   
    
    $firstname = $_POST['FirstName'];
    $lastname = $_POST['LastName'];
    $username = $_POST['UserName'];
    $emailUser = $_POST['email'];
    $passwordUser = $_POST['password'];
    $role = $_POST['role'];

    $sql = "UPDATE `usersname` SET `FirstName` = '" . $firstname . "', `LastName` = '" . $lastname . "', `username` = '" . $username . "', `email` = '" . $emailUser . "', `password` = '" . $passwordUser . "', `role` = '" . $role . "' WHERE `usersname`.`id` = '" . $_GET['id'] . "';"; 
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    echo '<script>window.location.href = "/admin/index.php";</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
?>