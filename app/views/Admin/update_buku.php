<div class="container-content-admin">
    <div class="search-bar-admin">
    <input type="text" placeholder="Search">
        <div class="search-icon">
            <i class="fas fa-search"></i>
        </div>
    </div>
    <div class="kotak">
        <div class="bulet-kiri"><p>ID Buku XX</p></div>
        <div class="cover-base">
            <div class="cover"></div>
            <div class="stok">Stok:</div>
        </div>
        <div class="tabel">
            <table border="1">
                <tr>
                    <td class= "tabel-kiri">Judul</td>
                    <td>XXX</td>
                </tr>
                <tr>
                    <td class= "tabel-kiri">Penulis</td>
                    <td>XXX</td>
                </tr>
                <tr>
                    <td class= "tabel-kiri">Tahun Terbit</td>
                    <td>XXX</td>
                </tr>
                <tr>
                    <td class= "tabel-kiri">Halaman</td>
                    <td>XXX</td>
                </tr>
                <tr>
                    <td class= "tabel-kiri">Edisi</td>
                    <td>XXX</td>
                </tr>
                <tr>
                    <td class= "tabel-kiri">Bahasa</td>
                    <td>XXX</td>
                </tr>
            </table>
        </div>
        <div class="update-delete">
                <a href="<?= BASEURL?>/Admin/updateBukuDetail"><button class="update">Update</button></a>
                <a href=""><button class="delete">Delete</button></a>
        </div>
    </div>

    <div class="bawah">
        <div class="tambahbuku">
            <a href="<?= BASEURL ?>/Admin/tambahBuku"><button>Tambah Buku</button></a>
        </div>
        <div class="bawah-kanan">
            <div class="bulet"><</div>
            <div class="halaman">XX</div>
            <div class="bulet">></div>
        </div>
    </div>
    </div>