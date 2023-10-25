		<!-- side content -->
		<div id="layoutSidenav_content" class="content-menu">
			<main>
				<div class="container-fluid px-4">
					<h1 class="mt-4">Menu Persetujuan</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active"></li>
					</ol>
					<form class="d-none d-md-inline-block form-inline ms-auto me-4 me-md-3 my-2 my-md-0" action="<?= base_url('unitkerja/rejection') ?>" method='get'>
						<div class="input-group ">
							<input class="form-control" name="pelamar" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
							<button class="btn btn-success " id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
						</div>
					</form>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active"></li>
					</ol>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active">Data yang tidak disetujui</li>
					</ol>
					<div class="row">
						<div class="col-md-12">
							<?php
							if ($countRejection == 0) { ?>
								<div class="alert alert-light text-center" role="alert">
									Data kosong, belum ada yang disetujui
								</div>
							<?php } else { ?>
								<table class="table table-hover">
									<thead>
										<tr>
											<th scope="col">No</th>
											<th scope="col" class="text-center">Tanggal Pengajuan</th>
											<th scope="col">Nama Lengkap</th>
											<th scope="col">Instansi</th>
											<th scope="col">Kelengkapan Berkas</th>
											<th scope="col">Status</th>
											<th scope="col" class="text-center">Tanggal Persetujuan</th>
											<th>
												Keterangan
											</th>

										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($reject as $dataApprovement) :
										?>
											<tr>
												<td><?= ++$start ?></td>
												<td><?= indo_date($dataApprovement['tanggal_permohonan']); ?></td>
												<td><?= $dataApprovement['nama_pelamar']; ?></td>
												<td><?= $dataApprovement['nama_unit']; ?></td>
												<td>
													<?= $dataApprovement['nama_file_surat_permohonan']; ?>
													<br>
													<?= $dataApprovement['nama_file_khs']; ?>
													<br>
													<?= $dataApprovement['nama_file_cv']; ?>
												</td>
												<td>
													<span class="badge bg-danger text-black">
														<?= $dataApprovement['status']; ?>
													</span>
												</td>

												<td><?= indo_date($dataApprovement['tanggal_persetujuan']); ?></td>
												<td><?= $dataApprovement['ket']; ?></td>
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