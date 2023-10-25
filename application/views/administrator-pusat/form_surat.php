<!-- side content -->
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4 mb-3">
			<h1 class="mt-4">Form Surat</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active"></li>
			</ol>
			<?php foreach ($detail as $data) : ?>
				<form method="POST" action="<?= base_url('pusat/simpanData') ?>">
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									DATA PELAMAR
								</div>
								<div class="card-body">
									<div class="row">
										<div class="form-group">
											<label for="input">Nama Pelamar</label>
											<input type="hidden" name="id_permohonan" value="<?= $data['id_permohonan']; ?>">
											<input type="text" name="nama_pelamar" class="form-control" value="<?= $data['nama_pelamar'] ?>" readonly>
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">NIM</label>
											<input type="nim" class="form-control" value="<?= $data['nim']; ?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label for="input">Program Studi</label>
										<input type="text" name="prodi" class="form-control" value="<?= $data['prodi']; ?>" readonly>
									</div>
									<div class="form-group">
										<label for="input">Fakultas</label>
										<input type="text" name="fakultas" class="form-control" value="<?= $data['fakultas']; ?>" readonly>
									</div>
									<div class="form-group">
										<label for="input">Universitas</label>
										<input type="text" name="universitas" class="form-control" value="<?= $data['universitas']; ?>" readonly>
									</div>
									<div class="form-group ">
										<label for="input">Nomor Telepon / WhatsApp</label>
										<input type="text" name="no_telepon" class="form-control" value="<?= $data['no_telpon'] ?>" readonly>
									</div>
									<div class="form-group">
										<label for="input">Unit Kerja</label>
										<input type="text" name="nama_unit" class="form-control" value="<?= $data['nama_unit']; ?>" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									DATA SURAT
								</div>
								<div class="card-body">
										<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label for="input">Nomor Surat Permohonan</label>
												<input type="text" class="form-control" name="no_surat_permohonan" value="<?= $data['no_surat_permohonan']; ?>" readonly>
												<input type="hidden" name="id_surat_permohonan" value="<?= $data['id_permohonan']; ?>">
											</div>
											<div class="col-md-6">
												<label for="input">Hal</label>
												<input type="text" class="form-control" name="perihal" placeholder="Perihal">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label for="input">Nomor Surat Balasan</label>
												<input type="text" class="form-control" name="no_surat_balasan">
											</div>
											<div class="col-md-6">
												<label for="input">Jumlah Lampiran</label>
												<input type="text" class="form-control" name="lampiran">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="form-group">
												<label for="input">Kepada</label>
												<input type="text" class="form-control" name="kepada" placeholder="Kepada Yth">	
										</div>
									</div>
									<div class="form-group ">
										<div class="form-group">
											<label for="input" class="mx-2">Keterangan</label>
											<textarea class="form-control" aria-label="With textarea" name="alasan" > Kegiatan magang dilaksanakan dengan tujuan untuk memenuhi persyaratan akademik perkuliahan dan dilaksanakan dengan tetap memperhatikan protokol Kesehatan (Memakai masker & Wajib membawa hasil tes, minimal swab antigen/ genose). </textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label for="input">Tanggal Surat Permohonan</label>
												<input type="text" class="form-control" name="tanggal_permohonan" value="<?=indo_date( $data['tanggal_permohonan']); ?>" readonly>
											</div>
											<div class="col-md-6">
												<?php if($data['status'] == 'Disetujui'): ?>
												<label for="input">Jangka Waktu Magang</label>
												<input type="text" class="form-control" name="jangka_waktu" placeholder="Per Bulan">
												<?php endif; ?>
											</div>
										</div>
									</div>
										<div class="row">
											<div class="form-group">
												<div class=" text-black mb-4">
													<label for="input">Tembusan</label>
													<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tembusan1">
														<option selected></option>
														<option value="Kepala Perpustakan Nasional RI">Kepala Perpustakan Nasional RI</option>
														<option value="Sekretaris Utama Perpustakaan Nasional RI">Sekretaris Utama Perpustakaan Nasional RI</option>
														<option value="Deputi Bidang Pengembangan Bahan Pustaka dan Jasa Informasi">Deputi Bidang Pengembangan Bahan Pustaka dan Jasa Informasi</option>
														<option value="Deputi Bidang Pengembangan Sumber Daya Perpustakaan">Deputi Bidang Pengembangan Sumber Daya Perpustakaan</option>
													</select>
													<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tembusan2">
														<option selected></option>
														<option value="Kepala Perpustakan Nasional RI">Kepala Perpustakan Nasional RI</option>
														<option value="Sekretaris Utama Perpustakaan Nasional RI">Sekretaris Utama Perpustakaan Nasional RI</option>
														<option value="Deputi Bidang Pengembangan Bahan Pustaka dan Jasa Informasi">Deputi Bidang Pengembangan Bahan Pustaka dan Jasa Informasi</option>
														<option value="Deputi Bidang Pengembangan Sumber Daya Perpustakaan">Deputi Bidang Pengembangan Sumber Daya Perpustakaan</option>
													</select>
													<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tembusan3">
														<option selected> </option>
														<option value="Kepala Perpustakan Nasional RI">Kepala Perpustakan Nasional RI</option>
														<option value="Sekretaris Utama Perpustakaan Nasional RI">Sekretaris Utama Perpustakaan Nasional RI</option>
														<option value="Deputi Bidang Pengembangan Bahan Pustaka dan Jasa Informasi">Deputi Bidang Pengembangan Bahan Pustaka dan Jasa Informasi</option>
														<option value="Deputi Bidang Pengembangan Sumber Daya Perpustakaan">Deputi Bidang Pengembangan Sumber Daya Perpustakaan</option>
													</select>
													<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tembusan4">
														<option selected></option>
														<option value="Kepala Perpustakan Nasional RI">Kepala Perpustakan Nasional RI</option>
														<option value="Sekretaris Utama Perpustakaan Nasional RI">Sekretaris Utama Perpustakaan Nasional RI</option>
														<option value="Deputi Bidang Pengembangan Bahan Pustaka dan Jasa Informasi">Deputi Bidang Pengembangan Bahan Pustaka dan Jasa Informasi</option>
														<option value="Deputi Bidang Pengembangan Sumber Daya Perpustakaan">Deputi Bidang Pengembangan Sumber Daya Perpustakaan</option>
													</select>
													<input type="text" name="tembusan5" class="form-control" id="tembusan5" placeholder="Tembusan 5">
												</div>
												<div class="row">
													<div class="form-group col-md-6 ">
														<a class="btn btn-primary col-md-6" type="button" href="<?= base_url('pusat/index') ?>"><i aria-hidden="true"></i>
															Kembali
														</a>
													</div>
													<div class="form-group col-md-6 text-end justify-content-center">
														<button type="submit" class="btn btn-primary col-md-6 inner">Simpan</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				</form>
			<?php endforeach; ?>
		</div>
	</main>
