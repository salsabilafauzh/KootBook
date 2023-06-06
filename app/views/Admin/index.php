<div class="container-content-admin">
    <h1>SELAMAT DATANG, <?=$data['nama-admin']?></h1>
    <h2>Overview</h2>
    <div class="overview">
        <div class="kotak">
            <img src="../../public/assets/images/user.png" alt="">
            <p>Total Pengguna</p>
            <p><?= $data['total-pengguna'] ?></p>
        </div>
        <div class="kotak">
            <img src="../../public/assets/images/book.png" alt="">
            <p>Total Buku</p>
            <p><?= $data['total-buku'] ?></p>
        </div>
        <div class="kotak">
            <img src="../../public/assets/images/inventory.png" alt="">
            <p>Total Stok Buku</p>
            <p><?= $data['total-stock'] ?></p>
        </div>
    </div>
    <!-- <div class="menu">
        <h2>Menu</h2>
        <div class="menuBox">
            <div class="kotakMenu"><p>USER</p></div>
            <div class="kotakMenu"><p>UPDATE BUKU</p></div>
            <div class="kotakMenu"><p>TAMBAH BUKU</p></div>
        </div>
    </div> -->
</div>