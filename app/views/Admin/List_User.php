<div class="container-content-admin">
   <div class="table-list-user">
      <div class="search-userID">
        
         <p>DAFTAR USER</p>
         <form action="<?= BASEURL ?>/Admin/cariUser" method="post">
        <p>SEARCH ID:</p><input type="text" placeholder="User Id" name="userID"> 
         <input type="submit" class="search-userID-icon" id="button-searchID" value="Cari">
        </form>
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
         <?php

                $totalRows = count($data['user']);
                $limit = 6; 
                if (isset($data['page'])) {
                    $currentPage = $data;
                }else{
                    $currentPage = 1;
                }

                $totalPages = ceil($totalRows / $limit); 
                $startIndex = ($currentPage - 1) * $limit;
                $endIndex = $startIndex + $limit - 1; 
    
                for ($i = $startIndex; $i <= $endIndex && $i < $totalRows; $i++) {
                    $user = $data['user'][$i];
                    echo "<tr>";
                    echo "<td>" . $user['ID_User'] . "</td>";
                    echo "<td>" . $user['Username'] . "</td>";
                    echo "<td>" . $user['Email'] . "</td>";
                    echo "<td>";
                    // echo "<button id='button-aksi-edit'>EDIT</button>";
                    echo "<button id='button-aksi-hapus'>HAPUS</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                
           
            ?>
                </table>
            <?php

            if($data['status'] == 0){
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
            } 
            ?>
   </div>
</div>