<!doctype html>

<head>
  <?php require $_SERVER["DOCUMENT_ROOT"] . "/partials/head.php"; ?>
</head>

<body>

<section class="bg-white">
  <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
    <aside
      class="relative block h-16 lg:order-last lg:col-span-5 lg:h-full xl:col-span-6"
    >
      <img
        alt="Pattern"
        src="https://images.unsplash.com/photo-1605106702734-205df224ecce?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
        class="absolute inset-0 h-full w-full object-cover"
      />
    </aside>

    <main
      aria-label="Main"
      class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6"
    >
      <div class="max-w-xl lg:max-w-3xl">
        <a class="block text-blue-600" href="/">
          <span class="sr-only">Home</span>
          <img src="../../img/logo.png" class="h-24 w-auto" alt="logo">
        </a>

        <h1
          class="mt-6 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl"
        >
          Welcome to Intellectual Horizon
        </h1>

        <p class="mt-4 leading-relaxed text-gray-500">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi nam
          dolorum aliquam, quibusdam aperiam voluptatum.
        </p>

        <form action="#" method="POST" class="mt-8 grid grid-cols-6 gap-6">
          <div class="col-span-6 sm:col-span-3">
            <label
              for="FirstName"
              class="block text-sm font-medium text-gray-700"
            >
              First Name
            </label>

            <input
              type="text"
              id="FirstName"
              name="first_name"
              class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
            />
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label
              for="LastName"
              class="block text-sm font-medium text-gray-700"
            >
              Last Name
            </label>

            <input
              type="text"
              id="LastName"
              name="last_name"
              class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
            />
          </div>

          <div class="col-span-6">
            <label for="UserName" class="block text-sm font-medium text-gray-700">
              UserName
            </label>

            <input
              type="text"
              id="UserName"
              name="username"
              class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
            />
          </div>

          <div class="col-span-6">
            <label for="Email" class="block text-sm font-medium text-gray-700">
              Email
            </label>

            <input
              type="email"
              id="Email"
              name="email"
              class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
            />
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label
              for="Password"
              class="block text-sm font-medium text-gray-700"
            >
              Password
            </label>

            <input
              type="password"
              id="Password"
              name="password"
              class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
            />
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label
              for="PasswordConfirmation"
              class="block text-sm font-medium text-gray-700"
            >
              Password Confirmation
            </label>

            <input
              type="password"
              id="PasswordConfirmation"
              name="password_confirmation"
              class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
            />
          </div>

          <div class="col-span-6">
            <label for="MarketingAccept" class="flex gap-4">
              <input
                type="checkbox"
                id="MarketingAccept"
                name="marketing_accept"
                class="h-5 w-5 rounded-md border-gray-200 bg-white shadow-sm"
              />

              <div class="col-span-6">
                <p class="text-sm text-gray-500">
                  By creating an account, you agree to our
                  <a href="#" class="text-gray-700 underline">
                    terms and conditions
                  </a>
                  and
                  <a href="#" class="text-gray-700 underline">privacy policy</a>.
                </p>
              </div>
            </label>
          </div>

          

          <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
            <button
              id="submit"
              type="submit"
              class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500"
            >
              Create an account
            </button>

            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
              Already have an account?
              <a href="../login/login.php" class="text-gray-700 underline">Log in</a>.
            </p>
          </div>
        </form>
        <?php 
            if(!empty($_POST)){   
    
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
            
                $emailExistsQuery = "SELECT * FROM `usersname` WHERE `email` = '$email'";
                $emailExistsResult = mysqli_query($conn, $emailExistsQuery);
                if (mysqli_num_rows($emailExistsResult) > 0) {
                    echo "Email already exists.";
                } else {    
            $sql = "INSERT INTO `usersname` (`id`, `FirstName`, `LastName`, `username`, `email`, `password`) VALUES (NULL, '" . $first_name . "', '" . $last_name . "', '" . $username . "', '" . $email . "', '" . $password . "');";
            
            
            
            if (mysqli_query($conn, $sql)) {
                echo '<script>window.location.href = "/page/login/login.php";</script>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            }
            }
        ?>

      </div>
    </main>
  </div>
</section>

<script src="./checker.js"></script>
<?php require $_SERVER["DOCUMENT_ROOT"] . "/partials/scripts.php"; ?>
</body>

</html>
