<div class="container-content-admin">
  <div class="contain">
    <form method="post" action="<?= BASEURL ?>/Admin/insertBook" class="container" enctype="multipart/form-data" id="myForm">
      <div class="kiri">
        <div class="cover">
        <input type="file" name="image" accept="image/*">
        </div>

        <div class="stok">
          <h2>STOK</h2>
        </div>

        <div class="isi">
          <button type="button" class="tambah">+</button>
          <input type="text" name="Stock" id="input-stok" value="0">
          <button type="button" class="kurang">-</button>
        </div>
      </div>

      <div class="kanan">
        <table border="1" class="detail">
          <tr>
            <td id="Judul">JUDUL</td>
            <td><input type="text" name="Judul"></td>
          </tr>
          <tr>
            <td id="Penulis">PENULIS</td>
            <td><input type="text" name="Penulis"></td>
          </tr>
          <tr>
            <td id="Penerbit">PENERBIT</td>
            <td><input type="text" name="Penerbit"></td>
          </tr>
          <tr>
            <td id="Tahun_Terbit">TAHUN TERBIT</td>
            <td><input type="text" name="Tahun_Terbit"></td>
          </tr>

        </table>

        <table border="1" class="deskripsi" cellpadding="20">
          <tr>
            <td id="desk">DESKRIPSI SINGKAT</td>
          </tr>
          <tr>
            <td id="isi_desk">
              <textarea id="isi_desk_input" rows="5" name="Sinopsis"> </textarea>
            </td>
          </tr>
        </table>
        <input type="submit" class="tombol" value="TAMBAH BUKU">
      </div>
  </div>
</div>
</div>



<script>
  var stokInput = document.getElementById("input-stok");
  var tambahButton = document.querySelector(".tambah");
  var kurangButton = document.querySelector(".kurang");

  tambahButton.addEventListener("click", function() {
    var stok = parseInt(stokInput.value);
    stok++;
    stokInput.value = stok;
  });

  kurangButton.addEventListener("click", function() {
    var stok = parseInt(stokInput.value);
    if (stok > 0) {
      stok--;
      stokInput.value = stok;
    }
  });
</script>