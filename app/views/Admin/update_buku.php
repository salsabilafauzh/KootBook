<div class="container-content-admin">
    <div class="search-bar-admin">


        <form action="<?= BASEURL ?>/Admin/cariBuku" method="post">
            <input type="text" placeholder="Search ID buku" name="ID_Buku">
            <div class="search-icon">
                <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="kotak" id="container-data">
        <?php
        $totalRows = count($data['book']);
        $limit = 2;
        if (isset($data['page'])) {
            $currentPage = (int) $data['page'];
        } else {
            $currentPage = 1;
        }

        $totalPages = ceil($totalRows / $limit);
        $startIndex = ($currentPage - 1) * $limit;
        $endIndex = $startIndex + $limit - 1;

        if ($totalRows != 0) {
            for ($i = $startIndex; $i <= $endIndex && $i < $totalRows; $i++) {
                $book = $data['book'][$i];
        ?>
                <div class="kotak">
                    <div class="bulet-kiri">
                        <p>ID Buku <?= $book['ID_Buku'] ?></p>
                    </div>
                    <div class="cover-base">
                    <div class="cover">
                        <img src='../../../public/assets/images/imgCover/<?= $book['ID_Buku'] ?>.jpg'>
                    </div>
                        <div class="stok">Stok: <?= $book['Stock'] ?></div>
                    </div>
                    <div class="tabel">
                        <table border="1">
                            <tr>
                                <td class="tabel-kiri">JUDUL</td>
                                <td><?= $book['Judul'] ?></td>
                            </tr>
                            <tr>
                                <td class="tabel-kiri">PENULIS</td>
                                <td><?= $book['Penulis'] ?></td>
                            </tr>
                            <tr>
                                <td class="tabel-kiri">PENERBIT</td>
                                <td><?= $book['Penerbit'] ?></td>
                            </tr>
                            <tr>
                                <td class="tabel-kiri">TAHUN TERBIT</td>
                                <td><?= $book['Tahun_Terbit'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="update-delete">
                        <a href="<?= BASEURL ?>/Admin/updateBukuDetail/<?= $book['ID_Buku'] ?>">
                            <button class="update" type="submit">Update</button>
                        </a>
                        <a href="<?= BASEURL ?>/Admin/deleteBuku/<?= $book['ID_Buku'] ?>">
                    <button class=" delete">Delete</button>
                        </a>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>

    <div class="bawah">
        <div class="tambahbuku">
            <a href="<?= BASEURL ?>/Admin/tambahBuku"><button>Tambah Buku</button></a>
        </div>
        <div class="bawah-kanan">
            <?php
            // Previous page link
            if ($currentPage > 1) {
                echo "<a href='" . BASEURL . "/Admin/updateBuku/" . ($currentPage - 1) . "'><div class='bulet'><</div></a>";
            }

            echo "<div class='halaman'>" . $currentPage . "</div>";

            // Next page link
            if ($currentPage < $totalPages) {
                echo "<a href='" . BASEURL . "/Admin/updateBuku/" . ($currentPage + 1) . "'><div class='bulet'>></div></a>";
            }
            ?>
        </div>
    </div>
</div>