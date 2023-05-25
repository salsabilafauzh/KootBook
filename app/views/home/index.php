<div class="container-signin" background-image="<?= BASEURL?>/assets/images/<?$data['img']?>">
    <form method="post" action="<?= BASEURL?>/Home/SignIn" name="SignIn">
        <div class="signin-text">
            <h1 class="text">Sign In</h1>
        </div>
        <div class="signin-input">
            <div class="kotak">
                <input type="email" placeholder="Email" name="Email">
                <input type="password" placeholder="Password" name="Password">
                <input type="submit" class="tombol" value="Sign In">
                <p><a href="#">lupa password?</a></p>
            </div>
            <div class="kotak">
                <p>Belum memiliki akun? <a href="<?= BASEURL ?>/Home/SignUp">Buat disini</a></p> 
            </div> 
        </div>
    </form>
</div>


