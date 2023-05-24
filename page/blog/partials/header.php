<header aria-label="Page Header" class="bg-gray-50">
  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
    <div class="sm:flex sm:items-center sm:justify-between">
      <div class="text-center sm:text-left">
        <?php 
        if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != null){
          $sql = "SELECT * FROM usersname WHERE id =" . $_SESSION['user_id'];
        } else {$sql = "SELECT * FROM usersname WHERE id =" . $_COOKIE['user_id'];}

        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);

        ?>
        <div class="sm:flex sm:items-center sm:justify-between">
        <div class="w-20 h-auto"><a href="/page/blog/blog.php"><img src="/img/logo.png" alt="logo"></a></div>
        <div>
        <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
          Welcome Back, <?php echo $user['username'] ?>!
        </h1>

        <p class="mt-1.5 text-sm text-gray-500">
          Let's write a new blog post! 🎉
          
        </p>
        </div>
        </div>
      </div>

      <div class="mt-4 flex flex-col gap-4 sm:mt-0 sm:flex-row sm:items-center">
        <button
          class="block rounded-lg bg-rose-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-rose-700 focus:outline-none focus:ring"
          type="button"
          id="logout"
        >
          LogOut
        </button>
      </div>
    </div>
  </div>
</header>