<div class="container-content-admin">
   <div class="table-list-user">
      <div class="search-userID">
         <p>DAFTAR USER</p>
         
         <form><p>SEARCH ID:</p><input type="text"></form>
      </div>
      <!-- <div class="filter-user">
         <button>PILIH SEMUA</button>
         <button>BATAL PILIH SEMUA</button>
      </div> -->
    <table id="table-user">
      <tr>
      <th>USER ID</th>
      <th>USERNAME</th>
      <th>EMAIL</th>
      <th>AKSI</th>
      </tr>
      <!-- <?php
         $counter = 0;

         foreach ($data['user'] as $user) {
            if ($counter >= 6) {
               break; // Exit the loop if 6 data have been displayed
            }

            echo "<tr>";
            echo "<td>" . $user['ID_User'] . "</td>";
            echo "<td>" . $user['Username'] . "</td>";
            echo "<td>" . $user['Email'] . "</td>";
            echo "<td>";
            echo "<button id='button-aksi-edit'>EDIT</button>";
            echo "<button id='button-aksi-hapus'>HAPUS</button>";
            echo "</td>";
            echo "</tr>";

            $counter++;
         }
         ?> -->
         <?php
$totalRows = count($data['user']); // Total number of rows
$limit = 6; // Number of rows to display per page

// Get the current page number from the query parameter
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else { 
    $currentPage = 1; // Default to the first page
}

$totalPages = ceil($totalRows / $limit); // Calculate the total number of pages

$startIndex = ($currentPage - 1) * $limit; // Calculate the starting index for the current page
$endIndex = $startIndex + $limit - 1; // Calculate the ending index for the current page

// Loop through the rows based on the starting and ending index for the current page
for ($i = $startIndex; $i <= $endIndex && $i < $totalRows; $i++) {
    $user = $data['user'][$i];

    echo "<tr>";
    echo "<td>" . $user['ID_User'] . "</td>";
    echo "<td>" . $user['Username'] . "</td>";
    echo "<td>" . $user['Email'] . "</td>";
    echo "<td>";
    echo "<button id='button-aksi-edit'>EDIT</button>";
    echo "<button id='button-aksi-hapus'>HAPUS</button>";
    echo "</td>";
    echo "</tr>";
}
?>



    </table>
   <?php
    // Pagination links
echo "<ul class='pagination'>";

// Previous page link
if ($currentPage > 1) {
    echo "<li><a href='?page=" . ($currentPage - 1) . "'>&laquo; Previous</a></li>";
}

// Page links
for ($i = 1; $i <= $totalPages; $i++) {
    echo "<li";
    if ($i == $currentPage) {
        echo " class='active'";
    }
    echo "><a href='?page=" . $i . "'><button>" . $i . "</button></a></li>";
}

// Next page link
if ($currentPage < $totalPages) {
    echo "<li><a href='?page=" . ($currentPage + 1) . "'><button>Next &raquo;</button></a></li>";
}

echo "</ul>";
?>
   </div>
</div>