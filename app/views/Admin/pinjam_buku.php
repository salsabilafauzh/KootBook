<div class="container-content-admin">
    <div class="search-bar-admin">
        <form action="<?= BASEURL ?>/Admin/cariBuku" method="post">
            <input type="text" placeholder="Search ID buku" name="ID_Buku">
            <div class="search-icon">
                <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
            </div>
        </form>

        <div class="persegiPanjang">
            <div class="coverBox">
                <div class="cover"></div>
                <div class="stok">
                    <table border="1">
                        <tr class="baris1">
                            <td class="judul">STOK</td>
                            <td class="isi">XXX</td>
                        </tr>
                        <tr class="baris2">
                            <td class="judul">ID BUKU</td>
                            <td class="isi">XXX</td>
                        </tr>
                        <tr class="baris3">
                            <td class="judul">JUDUL</td>
                            <td class="isi">XXX</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="arrow">
                <img src="../../public/assets/images/Arrow.png" alt="">
            </div>
            <div class="profile">
                <div class="kolom">
                    <div class="row1">
                        <img src="../../public/assets/images/Profile.png" alt="">
                        <table border="1">
                            <tr>
                                <td class="hijauTua">ID USER</td>
                                <td class="hijauMuda">XXXX</td>
                            </tr>
                            <tr>
                                <td class="hijauTua">Email</td>
                                <td class="hijauMuda">Salsabilafauziah12@gmail.com</td>
                            </tr>
                        </table>
                    </div>
                    <div class="row2">
                        <textarea name="" id="" cols="15" rows="5" placeholder="Alasan Peminjaman" disabled></textarea>
                        <table border="1">
                            <tr>
                                <td class="hijauTua">Dipinjam</td>
                                <td class="hijauMuda">XX/XX/XXXX</td>
                            </tr>
                            <tr>
                                <td class="hijauTua">Status</td>
                                <td class="hijauMuda">Aktif</td>
                            </tr>
                        </table>
                        <!-- <table border="1">
                        <tr class="tableBawah" id="hijauTua">
                            <td>Dipinjam</td>
                        </tr>
                        <tr class="tableBawah">
                            <td>XX/XX/XXXX</td>
                        </tr>
                        <tr class="tableBawah" id="hijauTua">
                            <td>Dikembalikan</td>
                        </tr>
                        <tr class="tableBawah">
                            <td>XX/XX/XXXX</td>
                        </tr>
                        <tr class="tableBawah">
                            <td>Dalam X hari</td>
                        </tr> -->
                        </table>
                    </div>
                </div>
            </div>
            <div class="doneReject">
                <div class="done">
                    <h3>DONE</h3>
                </div>
                <!-- <div class="reject"><h3>REJECT</h3></div> -->
            </div>
        </div>

        <!-- <div class="bawah">
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
        </div> -->