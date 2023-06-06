    <div class="navbar-main">
        <header>
            <div class="navbar">
                <div class="logo">
                    <a href="#"><img src="../../public/assets/images/Logo.png" alt=""></a>
                </div>
                <ul class="links">
                    <li><a href="hemo">Home</a></li>
                    <li><a href="about">About</a></li>
                    <li><a href="services">Services</a></li>
                    <li><a href="contact">Contact</a></li>
                </ul>
                <a href="#" class="action_btn">Logout</a>
                <div class="toggle_btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <div class="dropdown_menu ">
                <li><a href="hemo">Home</a></li>
                <li><a href="about">About</a></li>
                <li><a href="services">Services</a></li>
                <li><a href="contact">Contact</a></li>
                <li><a href="#" class="action_btn">LogOut</a></li>
            </div>
        </header>
    </div>
    <div class="search-box">
        
        <div class="search-icon">
            <i class="fas fa-search"></i>
        </div>
        <div class="cancel-icon">
            <i class="fas fa-times"></i>
        </div>
        <input type="text" placeholder="Mau cari buku apa?">
    </div>

    <br><br>
    <div class="search-data"></div>
    <div class="warta-pustaka">
        <div class="warta-header">

        </div>
    </div>
    <div class="rekomendasi">
        <div class="container-side">
            <button class="scroll-button prev-button">&#10094;</button>
            <div class="items-container">
                <div class="item">Item 1</div>
                <div class="item">Item 2</div>
                <div class="item">Item 3</div>
                <div class="item">Item 4</div>
                <div class="item">Item 5</div>
                <div class="item">Item 6</div>
                <div class="item">Item 7</div>
                <div class="item">Item 8</div>
                <div class="item">Item 9</div>
                <div class="item">Item 10</div>
            </div>
            <button class="scroll-button next-button">&#10095;</button>
        </div>
    </div>

    <footer>
    </footer>

    <script type="text/javascript">
        const toggleBtn = document.querySelector('.toggle_btn')
        const toggleBtnIcon = document.querySelector('.toggle_btn i')
        const dropDownMenu = document.querySelector('.dropdown_menu')
        toggleBtn.onclick = function () {
            dropDownMenu.classList.toggle('open');
            const isOpen = dropDownMenu.classlist.contains('open');

        }

        const searchBox = document.querySelector(".search-box");
        const searchBtn = document.querySelector(".search-icon");
        const cancelBtn = document.querySelector(".cancel-icon");
        const searchInput = document.querySelector("input");
        const searchData = document.querySelector(".search-data");
        searchBtn.onclick = () => {
            searchBox.classList.add("active");
            searchBtn.classList.add("active");
            searchInput.classList.add("active");
            cancelBtn.classList.add("active");
            searchInput.focus();
            if(searchInput.value != ""){
            var values = searchInput.value;
            searchData.classList.remove("active");
            }else{
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
        itemsContainer.animate(
            { transform: 'translateX(200px)' },
            { duration: 500, easing: 'ease-out' }
        );

        setTimeout(() => {
            itemsContainer2.scrollBy({
            left: -200,
            behavior: 'smooth'
            });
        }, 500);
        });

        nextButton.addEventListener('click', () => {
        itemsContainer.animate(
            { transform: 'translateX(-200px)' },
            { duration: 500, easing: 'ease-in-out' }
        );

        setTimeout(() => {
            itemsContainer2.scrollBy({
            left: 200,
            behavior: 'smooth'
            });
        }, 500);
        });

    </script>