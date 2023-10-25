<!-- side menu -->
<div id="layoutSidenav">
	<div id="layoutSidenav_nav">
		<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
			<div class="sb-sidenav-menu">
				<div class="nav">
					<?php
					if ($this->session->userdata('role_id') == 1 && $this->session->userdata('logged_in') == true) {
					?>
						<!-- menu admin pusat section -->
						<div class="sb-sidenav-menu-heading">Daftar Menu Admin Pusat</div>
						<a class="nav-link" href="<?= base_url('pusat/index') ?>">
							<div class="sb-nav-link-icon "><i class="fa fa-tasks" aria-hidden="true"></i></div>
							Menu Penyuratan
							<?php if ($count > 0) : ?>
								<span class="badge bg-danger text-light mx-3">
									<?= $count; ?>
								</span>
							<?php endif; ?>
						</a>
						<a class="nav-link" href="<?= base_url('pusat/approval') ?>">
							<div class="sb-nav-link-icon">
								<i class="fa fa-check" aria-hidden="true"></i>
							</div>
							Data yang disetujui
						</a>
						<a class="nav-link" href="<?= base_url('pusat/rejection') ?>">
							<div class="sb-nav-link-icon">
								<i class="fas fa-ban"></i>
							</div>
							Data yang ditolak
						</a>
					<?php
					} else {
					?>
						<!-- menu admin unit section -->
						<div class="sb-sidenav-menu-heading">Daftar Menu Admin Unit</div>
						<a class="nav-link menu-link" href="<?= base_url('unitkerja/index') ?>">
							<div class="sb-nav-link-icon "><i class="fa fa-tasks" aria-hidden="true"></i></div>
							Verifikasi
							<?php if ($count > 0) : ?>
								<span class="badge bg-danger text-light mx-3">
									<?= $count; ?>
								</span>
							<?php endif; ?>
						</a>
						<a class="nav-link menu-link" href="<?= base_url('unitkerja/approval'); ?>">
							<div class="sb-nav-link-icon">
								<i class="fa fa-check" aria-hidden="true"></i>
							</div>
							Data yang disetujui
						</a>
						<a class="nav-link menu-link" href="<?= base_url('unitkerja/rejection'); ?>">
							<div class="sb-nav-link-icon">
								<i class="fas fa-ban"></i>
							</div>
							Data yang ditolak
						</a>
					<?php
					}
					?>
				</div>

			</div>

		</nav>
	</div>
	<!-- side menu -->
