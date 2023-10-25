<!-- Sign in  Form -->
<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="<?= base_url('assets/'); ?>img/signin-image.jpg" alt="sign up image"></figure>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Login</h2>
                <form method="POST" action="" class="register-form" id="login-form">
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="email" id="email" placeholder="Email" value="<?= set_value('email'); ?>" />
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Password" />
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group form-button">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Log in" />
                    </div>
                </form>
                <div class="social-login">
                    <a href="<?= base_url('auth/register'); ?>" class="signup-image-link">Buat akun baru</a>
                </div>
            </div>
        </div>
    </div>
</section>

</div>
