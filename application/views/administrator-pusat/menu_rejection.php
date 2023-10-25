		<!-- side content -->
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid px-4">
					<h1 class="mt-4">Menu Penolakan</h1>
					<p>Daftar pelamar yang ditolak</p>
					<form class="d-none d-md-inline-block form-inline ms-auto me-4 me-md-3 my-2 my-md-0" action="<?= base_url('pusat/rejection') ?>" method='get'>
						<div class="row d-flex">
							<div class="col-md-6 mr-auto p-2">
								<div class="input-group ">
									<input class="form-control" name="pelamar" type="text" placeholder="Cari Nama Pelamar" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
									<button class="btn btn-success " id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
								</div>
							</div>
							<div class="col-md-4 mr-auto p-2">
								<div class="input-group">
									<input type="month" name="tanggal_permohonan" class="form-control">
									<div class="input-group-append px-2">
										<button class="btn btn-secondary" type="submit">Lihat Data</button>
									</div>
								</div>
							</div>
							<div class="col-md-2 mr-auto p-2">
								<button class="btn btn-md btn-primary"><i class="fas fa-print"></i>&nbsp; Export to Excel</button>
							</div>
					</form>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Tanggal Pengajuan</th>
										<th scope="col">Nama Lengkap</th>
										<th scope="col">Instansi</th>
										<th scope="col">Unit Kerja</th>
										<th scope="col">Kelengkapan Berkas</th>
										<th scope="col">Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($reject as $dataApprovement) :
									?>
										<tr>
											<td><?= ++$start; ?></td>
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
											<td><?= $dataApprovement['ket']; ?></td>
										</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
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