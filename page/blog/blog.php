<!doctype html>

<head>
  <?php require $_SERVER["DOCUMENT_ROOT"] . "/partials/head.php"; 
  if (!isset($_SESSION['user_id']) && !isset($_COOKIE['user_id'])) {
    header("Location: /");
    exit;
  }
  ?>
</head>

<body>

<div role="alert" class="rounded border-s-4 border-red-500 bg-red-50 p-5 hidden" id="alert">
  <div class="flex items-center gap-2 text-red-800">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="h-5 w-5"
    >
      <path
        fill-rule="evenodd"
        d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
        clip-rule="evenodd"
      />
    </svg>

    <strong class="block font-medium p-3"> Are you sure you want to get out? </strong>
  </div>

  <div class="mt-10 flex flex-col gap-4 sm:mt-0 sm:flex-row sm:items-center">
        <button
          class="block rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring"
          type="button"
          id="logoutNo"
        >
          NO
        </button>
        <button
          class="block rounded-lg bg-rose-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-rose-700 focus:outline-none focus:ring"
          type="button"
          id="logoutYes"
        >
          YES
        </button>
    </div>
</div>

<?php require "./partials/header.php" ?>

<div class="bg-white py-12 sm:py-24">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:mx-0">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Article</h2>
    </div>
    <?php 
      $sql = "SELECT * FROM `posts`";
      $result = mysqli_query($conn, $sql);
    ?>
    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
  <?php 
  while ($row = $result->fetch_assoc()) {
    echo "<article class='overflow-hidden rounded-lg shadow transition hover:shadow-lg'>";
    if ($row['image'] == "") {
      echo "";
    } else {
      echo "<img src='/uploads/" . $row['image'] . "' class='h-56 w-full object-cover'/>";
    }
    echo "<div class='bg-white p-4 sm:p-6'>";
    echo "<time datetime='2022-10-10' class='block text-xs text-gray-500'>" . $row['created'] . "</time>";
    echo "<h3 class='mt-0.5 text-lg text-gray-900'>" . $row['namepost'] . "</h3>";
    echo "<p class='mt-2 line-clamp-3 text-sm/relaxed text-gray-500'>" . $row['text'] . "</p>";
    echo "</div>";
    echo "</article>";
  }
  
  ?>
    </div>
  </div>
</div>


<script src="./logout.js"></script>
<?php require $_SERVER["DOCUMENT_ROOT"] . "/partials/scripts.php"; ?>
</body>

</html>
