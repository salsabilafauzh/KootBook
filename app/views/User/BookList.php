<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

    <div class="mainbar">
        <form>
            <input type="image" src="../assets/images/Kootbook.png">
        </form>
        <p>List Buku</p>
        <img src="../../public/assets/images/Profile.png" alt="Image">
    </div>
    <div class="search_container">
        <div class="wrap">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Cari buku...">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="bl_Container">
        <div class="cover_buku">
            <img src="../../public/assets/images/Cover-Buku.png">
            <input type="button" value="Tinjauan Layanan Keuangan Digital Perbankan">
        </div>
        <div class="cover_buku">
            <img src="../../public/assets/images/Cover-Buku.png">
            <input type="button" value="Cara mengasuh anak menjadi istri">
        </div>
        <div class="cover_buku">
            <img src="../../public/assets/images/Cover-Buku.png">
            <input type="button" value="Cara mengasuh anak menjadi istri">
        </div>
        <div class="cover_buku">
            <img src="../../public/assets/images/Cover-Buku.png">
            <input type="button" value="Cara mengasuh anak menjadi istri">
        </div>
        <div class="cover_buku">
            <img src="../../public/assets/images/Cover-Buku.png">
            <input type="button" value="Cara mengasuh anak menjadi istri">
        </div>
        <div class="cover_buku">
            <img src="../../public/assets/images/Cover-Buku.png">
            <input type="button" value="Cara mengasuh anak menjadi istri">
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
            } else {
            $('#back-to-top').fadeOut();
            }
        });
        
        $('#back-to-top').click(function () {
            $('body,html').animate({
            scrollTop: 0
            }, 400);
            return false;
        });
        });
</script>
