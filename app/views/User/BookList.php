<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

    <div class="mainbar">
        <form>
            <input type="image" src="../assets/images/Kootbook.png">
        </form>
        <p>List Buku</p>
        <img src="../../public/assets/images/Profile.png" alt="Image">
    </div>
    <div class="search_container" >
        <div class="wrap">
            <form class="search" action="<?= BASEURL ?>/User/cariBuku" method="post">
                <input type="text" class="searchTerm" placeholder="Cari buku..." name="query" >
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </form>
            </div>
        </div>
    </div>
    <div class="bl_Container">
    <?php
    $book = $data['book'];
    $limit = 6;
    $counter = 0;
    foreach ($book as $item) {
        if ($counter >= $limit) {
            echo '</div>';
            echo '<div class="bl_Container">'; 
            $counter = 0; 
        }
    ?>

    <form class="cover_buku" action="<?= BASEURL ?>/User/DetailBuku/<?=$item['ID_Buku']?>" method="post">
        <img src="../../public/assets/images/Cover-Buku.png">
        <input type="submit" value="<?= $item['Judul'] ?>">
    </form>

    <?php
        $counter++;
    }
    ?>

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
