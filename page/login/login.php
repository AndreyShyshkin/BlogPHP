<!doctype html>

<head>
  <?php require $_SERVER["DOCUMENT_ROOT"] . "/partials/head.php";
            if(!empty($_POST)){   
            
                $sql = "SELECT * FROM usersname WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."'";

                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_assoc($result);
            
                if ($user) {
                  if (isset($_POST['remember_accept'])) {
                      setcookie('user_id', $user['id'], time() + (86400 * 30), "/");
                      header('Location: /page/blog/blog.php');
                  } else {
                      $_SESSION['user_id'] = $user['id'];
                      header('Location: /page/blog/blog.php');
                  }
              } else {
                  echo "Wrong email or password";
                  $_SESSION['user_id'] = null;
                  setcookie('user_id', '', 0, '/');
              }
              }
        ?>
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

          <div class="col-span-6">
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

          <div class="col-span-6">
            <label for="remember" class="flex gap-4">
              <input
                type="checkbox"
                id="remember"
                name="remember_accept"
                value="1"
                class="h-5 w-5 rounded-md border-gray-200 bg-white shadow-sm"
              />

              <div class="col-span-6">
                <p class="text-sm text-gray-500">
                  Remember me
                </p>
              </div>
            </label>
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
              type="submit"
              id="submit"
              class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500"
            >
              Log In
            </button>

            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                Don't have an account yet?
              <a href="../singin/singin.php" class="text-gray-700 underline">Sing In</a>.
            </p>
          </div>
        </form>

        
      </div>
    </main>
  </div>
</section>

<script src="./checker.js"></script>
<?php require $_SERVER["DOCUMENT_ROOT"] . "/partials/scripts.php"; ?>
</body>

</html>
