<div class="container">
    <div class="atas">
        <div class="navbar-main">
            <header>
                <div class="navbar">
                    <div class="logo">
                        <a href=""><img src="../../public/assets/images/Kootbook.png" alt=""></a>
                    </div>
                    <ul class="links">
                        <li><a href="">Home</a></li>
                        <li><a href="about">About</a></li>
                        <li><a href="booklistPage">Book List</a></li>
                        <li><a href="contact">History</a></li>
                    </ul>
                    <a href="<?= BASEURL ?>/User/logout" class="action_btn">Logout</a>
                    <div class="toggle_btn">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
                <div class="dropdown_menu">
                    <li><a href="hemo">Home</a></li>
                    <li><a href="about">About</a></li>
                    <li><a href="services">Services</a></li>
                    <li><a href="contact">Contact</a></li>
                    <li><a href="<?= BASEURL ?>/" class="action_btn">LogOut</a></li>
                </div>
            </header>
        </div>
        <!-- <form class="search-box">

            <div class="search-icon">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
            <div class="cancel-icon">
                <i class="fas fa-times"></i>
            </div>
            <input type="text" placeholder="Mau cari buku apa?">
        </form> -->
        <form class="search-box" action="<?= BASEURL ?>/User/booklistPage" method="post">
        <div class="cancel-icon">
            <i class="fas fa-times"></i>
        </div>
        <input type="text" id="searchInput" placeholder="Mau cari buku apa?" name="query">
        <div class="search-icon">
            <button type="submit" id="searchButton" onclick="return validateForm()"><i class="fas fa-search"></i></button>
        </div>
        </form>

        <br><br>
        <div class="search-data"></div>
        <!-- <div class="warta-pustaka">
            <div class="warta-header">

            </div>
        </div> -->
       
        
        <div class="rekomendasi">
            <div class="container-side">
                <button class="scroll-button prev-button">&#10094;</button>
                <div class="items-container">
                <?php
                    foreach ($data['book'] as $row) {
                        echo "<a href='" . BASEURL . "/User/DetailBuku/" . $row['ID_Buku'] . "' class='item'>";
                        echo "<div class='desc'>";
                        echo "<p>" . $row['Judul'] . "</p>";
                        echo "</div>";
                        echo "</a>";
                    }
                    ?>

                </div>
                <button class="scroll-button next-button">&#10095;</button>
            </div>
        </div>
    </div>

    <div class="bawah">
        <footer>
            <div class="footer-items">
                <a href="#"><img src="../../public/assets/images/Kootbook.png" alt="logo-footer"></a>
            </div>
        </footer>
    </div>
</div>

<script type="text/javascript">
    const toggleBtn = document.querySelector('.toggle_btn')
    const toggleBtnIcon = document.querySelector('.toggle_btn i')
    const dropDownMenu = document.querySelector('.dropdown_menu')
    toggleBtn.onclick = function() {
        dropDownMenu.classList.toggle('open');
        const isOpen = dropDownMenu.classlist.contains('open');

    }

    const searchBox = document.querySelector(".search-box");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    var searchInput = document.querySelector("input");
    const searchData = document.querySelector(".search-data");
    searchBtn.onclick = () => {
        searchBox.classList.add("active");
        searchBtn.classList.add("active");
        searchInput.classList.add("active");
        cancelBtn.classList.add("active");
        searchInput.focus();
        if (searchInput.value != "") {
            var values = searchInput.value;
            searchData.classList.remove("active");
        } else {
            searchData.textContent = "";
        }

    }
    cancelBtn.onclick = () => {
        searchBox.classList.remove("active");
        searchBtn.classList.remove("active");
        searchInput.classList.remove("active");
        cancelBtn.classList.remove("active");
        searchData.classList.toggle("active");
        searchData.classList.add('active')
        searchInput.value = "";
    }

    const prevButton = document.querySelector('.prev-button');
    const nextButton = document.querySelector('.next-button');
    const itemsContainer = document.querySelector('.items-container');
    const itemsContainer2 = document.querySelector('.container-side');

    prevButton.addEventListener('click', () => {
        itemsContainer.animate({
            transform: 'translateX(200px)'
        }, {
            duration: 500,
            easing: 'ease-out'
        });

        setTimeout(() => {
            itemsContainer2.scrollBy({
                left: -200,
                behavior: 'smooth'
            });
        }, 500);
    });

    nextButton.addEventListener('click', () => {
        itemsContainer.animate({
            transform: 'translateX(-200px)'
        }, {
            duration: 500,
            easing: 'ease-in-out'
        });

        setTimeout(() => {
            itemsContainer2.scrollBy({
                left: 200,
                behavior: 'smooth'
            });
        }, 500);
    });


    var searchButton = document.getElementById('searchButton');
    var searchInput = document.getElementById('searchInput');
    
   
    function validateForm() {
  
        if (searchInput.value.trim() === '') {
            return false;
        }
        return true;
    }
</script>