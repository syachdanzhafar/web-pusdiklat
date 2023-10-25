<section class="signup">
	<div class="container">
		<div class="signup-content">
			<div class="signup-form">
				<h2 class="form-title">Sign Up Pegawai</h2>

				<?php if ($this->session->flashdata('msg')) : ?>
					<div class="alert alert-<?= $this->session->flashdata('msg')['type']; ?>" role="alert">
						<?= $this->session->flashdata('msg')['text']; ?>
					</div>

				<?php unset($_SESSION['msg']);
				endif; ?>

				<form method="POST" action="" class="register-form" id="register-form">
					<div class="form-group">
						<label for="nama"><i class="zmdi zmdi-account material-icons-name"></i></label>
						<input type="text" name="nama" id="nama" placeholder="Nama" value="<?= set_value('nama'); ?>" />
						<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="email"><i class="zmdi zmdi-email"></i></label>
						<input type="text" name="email" id="email" placeholder="Email" value="<?= set_value('email'); ?>" />
						<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="password1"><i class="zmdi zmdi-lock"></i></label>
						<input type="password" name="password1" id="password1" placeholder="Password" />
						<?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="password2"><i class="zmdi zmdi-lock"></i></label>
						<input type="password" name="password2" id="password2" placeholder="Ulangi Password" />
						<?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="universitas"><i class="zmdi zmdi-balance"></i></label>
						<input type="text" name="universitas" id="universitas" placeholder="Instansi" value="<?= set_value('universitas'); ?>" />
						<?= form_error('universitas', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="fakultas"><i class="zmdi zmdi-graduation-cap"></i></label>
						<input type="text" name="fakultas" id="fakultas" placeholder="Unit" value="<?= set_value('fakultas'); ?>" />
						<?= form_error('fakultas', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group form-button">
						<input type="submit" name="submit" id="submit" class="form-submit" value="Register" />
					</div>
				</form>
			</div>
			<div class="signup-image">
				<figure><img src="<?= base_url('assets/'); ?>img/signup-image2.jpg" alt="sing up image"></figure>
				<a href="<?= base_url('auth/index'); ?>" class="signup-image-link">Sudah punya akun</a>
			</div>
		</div>
	</div>
</section>
