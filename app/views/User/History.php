
 <div class="mainbar">
    <a href="<?= BASEURL ?>/User/"><input type="image" src="../../../public/assets/images/Kootbook.png"></a>
    </div>
    <div class="Container1">
        <div class="sidebar_profile">
            <img src="../../../public/assets/images/Profile.png">
            <div class="SP_Isi">
                <p><?=$data['user'][0]['Username']?></p>
            </div>
            <div class="SP_Isi">
                <p><?=$data['user'][0]['Email']?></p>
            </div>
        </div>
        <div class="container2">
            <p>History</p>
            <div class="History">
                <div class="scrollable">
                    <?php
                        $totalRows = count($data['history']);
                        if ($totalRows != 0) {
                            for ($i = $totalRows-1; $i>=0; $i--) {
                            ?>
                                <div class="Isi_History">
                                    <img src="../../../public/assets/images/Cover-Buku.png">
                                    <table border="2px solid black">
                                        <tr>
                                            <th>Judul Buku</th>
                                            <td colspan="3"><?=$data['history'][$i]['Judul']?></td>
                                        </tr>
                                        <tr>
                                            <th>Durasi Pinjam :</th>
                                            <td><?=$data['history'][$i]['Tanggal_Pinjam']?></td>
                                            <th>Exp Date :</th>
                                            <td><?=$data['history'][$i]['Tanggal_Expired']?></td>
                                        </tr>
                                    </table>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

