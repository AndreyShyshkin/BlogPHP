<?php 
    $sql = "SELECT * FROM `usersname`";
    $result = mysqli_query($conn, $sql);
?>
<div class="overflow-x-auto">
  <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
    <thead class="ltr:text-left rtl:text-right">
      <tr>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            ID
        </th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            FirstName
        </th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            LastName
        </th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            UserName
        </th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Email
        </th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Password
        </th>
        <th>
            Role
        </th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            Action
        </th>
        <th class="px-4 py-2"></th>
      </tr>
    </thead>

    <tbody class="divide-y divide-gray-200">
      <?php 
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class=  'whitespace-nowrap px-4 py-2 text-gray-700'>" . $row['id'] . "</td>";
        echo "<td class=  'whitespace-nowrap px-4 py-2 text-gray-700'>" . $row['FirstName'] . "</td>";
        echo "<td class=  'whitespace-nowrap px-4 py-2 text-gray-700'>" . $row['LastName'] . "</td>";
        echo "<td class=  'whitespace-nowrap px-4 py-2 text-gray-700'>" . $row['username'] . "</td>";
        echo "<td class=  'whitespace-nowrap px-4 py-2 text-gray-700'>" . $row['email'] . "</td>";
        echo "<td class=  'whitespace-nowrap px-4 py-2 text-gray-700'>" . $row['password'] . "</td>";
        echo "<td class=  'whitespace-nowrap px-4 py-2 text-gray-700'>" . $row['role'] . "</td>";
        echo "<td class=  'whitespace-nowrap px-4 py-2'> <button class='inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700'><a href='../admin/scripts/editUsers/editUser.php?id=" . $row['id'] . "'>Edit</a></button> <button class='dellBtn inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700' data-id='" . $row['id'] . "'>Delete</button> </td>";
        echo "</tr>";
    }
    ?>

    </tbody>
  </table>
</div>