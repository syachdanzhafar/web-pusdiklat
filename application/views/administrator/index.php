		<!-- side content -->
		<div id="layoutSidenav_content" class="content-menu">
			<main>
				<div class="container-fluid px-4">
					<h1 class="mt-4">
						Verifikasi Data
					</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active"></li>
					</ol>
					<form class="d-none d-md-inline-block form-inline ms-auto me-4 me-md-3 my-2 my-md-0" action="<?= base_url('unitkerja/index') ?>" method='get'>
						<div class="input-group ">
							<input class="form-control" name="pelamar" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
							<button class="btn btn-success " id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
						</div>
					</form>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active"></li>
					</ol>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active">Tabel Verfikasi Data</li>
					</ol>
					<!-- Data Table -->
					<div class="row">
						<div class="col-md-12">
							<?php
							if ($count == 0) { ?>
								<div class="alert alert-light text-center" role="alert">
									Data kosong mas mba, ngga bisa diapa2in
								</div>
							<?php } else { ?>
								<table class="table table-hover">
									<thead>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Tanggal Pengajuan</th>
											<th scope="col">Nama Lengkap</th>
											<th scope="col">Instansi</th>
											<th scope="col">Kelengkapan Berkas</th>
											<th scope="col">Status</th>
											<th scope="col" class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody id="dataVerifikasi">
										<?php
										$no = 1;
										foreach ($verifikasi as $data_verifikasi) : ?>
											<tr>
												<td><?= ++$start; ?></td>
												<td><?= indo_date($data_verifikasi['tanggal_permohonan']); ?></td>
												<td><?= $data_verifikasi['nama_pelamar']; ?></td>
												<td><?= $data_verifikasi['nama_unit']; ?></td>
												<td>
													<?= $data_verifikasi['nama_file_surat_permohonan']; ?>
													<br>
													<?= $data_verifikasi['nama_file_khs']; ?>
													<br>
													<?= $data_verifikasi['nama_file_cv']; ?>
												</td>
												<td>
													<span class="badge bg-warning text-dark mx-3">
														<?= $data_verifikasi['status']; ?>
													</span>

												</td>
												<td colspan='2' class="text-center">
													<a class="btn btn-sm  btn-danger btn-verifikasi" type="button" href="<?= base_url('unitkerja/verifikasiberkas/' . $data_verifikasi['id_permohonan']); ?>"><i class=" fa fa-edit" aria-hidden="true"></i>
														Rincian Pelamar
													</a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							<?php } ?>
						</div>
					</div>
					<!-- pagination section -->
					<?= $this->pagination->create_links(''); ?>

					<!-- <div class="row">
						<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
										<span class="sr-only">Previous</span>
									</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
										<span class="sr-only">Next</span>
									</a>
								</li>
							</ul>
						</nav>
					</div> -->
				</div>
			</main>