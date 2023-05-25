<div class="container-signin">
    <form action="<?= BASEURL?>/Home/signUpSession" method="post">
        <div class="signup-text">
            <h1 class="text">Sign Up</h1>
        </div>
        <div class="signup-input">
            <div class="kotak">
                <input type="text" placeholder="Username" name="Username" required>
                <input type="email" placeholder="Email" name="Email" required>
                <input type="password" placeholder="Password" name="Password" required>
                <input type="password" placeholder="Confirm Password" name="ComPassword" required>
                <input type="submit" class="tombol" value="Sign Up">
            </div>
            <div class="kotak">
                <p>Sudah memiliki akun? <a href="<?= BASEURL ?>/">Login disini</a></p> 
            </div> 
        </div>
    </form>
</div>
