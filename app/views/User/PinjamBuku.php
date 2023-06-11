    <div class="mainbar">
        <a href="<?= BASEURL ?>/User/"><input type="image" src="../../assets/images/Kootbook.png"></a>
        <a href="<?= BASEURL ?>/User/historyPage/<?= $_SESSION['User']['ID_User']?>"><img src="../../assets/images/Profile.png" alt="Image"></a>
    </div>
    <div class="Container1">
        <div class="Container1_a">
            <div class="Cover_Buku">
                <img src="../../../public/assets/images/imgCover/<?= $data['book'][0]['ID_Buku'] ?>.jpg" alt="Cover Buku">
            </div>
            <?php
            if($data['book'][0]['Stock']>0){
                $stokStatus = "Available";
                $color = "background-color:green;";
            }else{
                $stokStatus = "Out Of Stock";
                $color = "background-color:red;";
            }
            ?>
            <div class="Detail_Buku1">
                <div class="DB1_Isi">
                    <p><?=$data['book'][0]['Judul']?></p>
                </div>
                <div class="DB1_Isi">
                    <p><?=$data['book'][0]['Penulis']?></p>
                </div>
                <div class="DB1_Isi">
                    <p><?=$data['book'][0]['Tahun_Terbit']?></p>
                </div>
                <div class="DB1_Isi"style="<?=$color?>">
                    <p><?=$stokStatus?></p>
                </div>
            </div>
        </div>
        
        <div class="Pinjam_Buku">
            <p>Peminjaman Buku</p>
            <form action="<?= BASEURL ?>/User/pinjamBukuTrigger/<?=$data['book'][0]['ID_Buku'] ?>" method="post">
                <table>
                    <tr>
                        <th>ALASAN</th>
                    </tr>
                    <tr>
                        <td><textarea id="alasan" placeholder="Tolong berikan alasan Anda ingin meminjam buku ini" name="Alasan"></textarea></td>
                    </tr>
                </table>
                <div class="Select_Hari">
                    <button type="button" value="" onclick="updateReturnDate(5)">5 Hari</button>
                    <button type="button" value="" onclick="updateReturnDate(7)">7 Hari</button>
                    <button type="button" value="" onclick="updateReturnDate(12)">12 Hari</button>
                </div>
                <div class="Tggl">
                    <table border="1px">
                        <tr>
                            <td>Tggl. Saat Ini</td>
                            <td style="background-color: #BCEAD5;"  ><input type="text" value="" id="currentDate" name="Tanggal_Pinjam" readonly></td>
                            <td>Tggl. Dikembalikan</td>
                            <td style="background-color: #BCEAD5;" ><input type="text" value="00-00-0000" id="returnDate" name="Tanggal_Expired" readonly></td>
                        </tr>
                    </table>
                </div>
                <div class="Submit">
                    <a href="<?= BASEURL ?>/User/"><div class="Submit_Button2">
                        <input type="button" id="Cancel" value="BATALKAN">
                    </div></a>
                    <?php
                    if ($stokStatus == 'Available') {
                        echo "<div class='Submit_Button1'>";
                        echo "<input type='submit' id='Pinjam' value='PINJAM BUKU'>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
    <script>
        var currentDate = new Date();
        var formattedDate = currentDate.toLocaleDateString().split('/').join('-');
        document.getElementById('currentDate').value = formattedDate;
        function calculateDate(selectedDays) {
            var currentDate = new Date();
            var returnDate = new Date(currentDate.getTime() + selectedDays * 24 * 60 * 60 * 1000);
            return returnDate;
        }

        function updateReturnDate(selectedDays) {
            var calculatedDate = calculateDate(selectedDays);
            document.getElementById('returnDate').value = calculatedDate.toLocaleDateString().split('/').join('-');
            var buttons = document.querySelectorAll('.Select_Hari button');
                buttons.forEach(function(button) {
                    button.classList.remove('clicked');
                });
                event.target.classList.add('clicked');
        }



</script>
