<div class="container-content-admin">
    <div class="search-bar-admin">
        <form action="<?= BASEURL ?>/Admin/cariPinjam/" method="post">
            <input type="text" placeholder="Search.." name="query">
            <div class="search-icon">
                <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>

    <div class="container-data">
        <?php
        $totalRows = count($data['history']);
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
                $pinjam = $data['history'][$i];
                $history = $data['history-data'][$i];
        ?>
                <div class="persegiPanjang">
                    <div class="coverBox">
                        <div class="cover" style="background-image: url('../../../public/assets/images/imgCover/<?= $pinjam['ID_Buku'] ?>.jpg');"></div>
                        <div class="stok">
                            <table border="1">
                                <tr class="baris1">
                                    <td class="judul">STOK</td>
                                    <td class="isi"><?= $pinjam['Stock'] ?></td>
                                </tr>
                                <tr class="baris2">
                                    <td class="judul">ID BUKU</td>
                                    <td class="isi"><?= $pinjam['ID_Buku'] ?></td>
                                </tr>
                                <tr class="baris3">
                                    <td class="judul">JUDUL</td>
                                    <td class="isi"><?= $pinjam['Judul'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="arrow">
                        <img src="../../../public/assets/images/Arrow.png" alt="">
                    </div>
                    <div class="profile">
                        <div class="kolom">
                            <div class="row1">
                                <img src="../../../public/assets/images/Profile.png" alt="">
                                <table border="1">
                                    <tr>
                                        <td class="hijauTua">ID USER</td>
                                        <td class="hijauMuda"><?= $pinjam['ID_User'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="hijauTua">Email</td>
                                        <td class="hijauMuda"><?= $pinjam['Email'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row2">
                                <textarea name="" id="" cols="15" rows="5" placeholder="Alasan Peminjaman" disabled><?= $history['Alasan'] ?></textarea>
                                <table border="1">
                                    <tr>
                                        <td class="hijauTua">Dipinjam</td>
                                        <td class="hijauMuda"><?= $history['Tanggal_Pinjam'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="hijauTua">Expired</td>
                                        <td class="hijauMuda"><?= $history['Tanggal_Expired'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="button-container" style="display: flex; flex-direction:column;">
                    <form method="post" action="<?= BASEURL ?>/Admin/donePinjam/<?=$history['ID_History']?>" class="doneReject">
                        <div class="done">
                            <button type="submit">DONE</button>
                        </div>
                    </form>
                   <form method="post" action="<?= BASEURL ?>/Admin/hapus/<?=$history['ID_User']?>">
                        <div class="reject">
                            <button type="submit">REJECT</button>
                        </div>
                    </form>
                    </div>
            </div>
        <?php
            }
        }
        ?>
    </div>

    <div class="bawah">
        <?php
        if($data['status'] == 0){
        if ($currentPage > 1) {
            echo "<a href='" . BASEURL . "/Admin/cekPeminjam/" . ($currentPage - 1) . "'><div class='bulet'><</div></a>";
        }

        echo "<div class='halaman'>" . $currentPage . "</div>";

        // Next page link
        if ($currentPage < $totalPages) {
            echo "<a href='" . BASEURL . "/Admin/cekPeminjam/" . ($currentPage + 1) . "'><div class='bulet'>></div></a>";
        }
        }
        ?>
    
       
    </div>