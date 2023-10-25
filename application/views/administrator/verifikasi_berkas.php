<!-- side content -->
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4 mb-3">
			<h1 class="mt-4">Verfikasi Data</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active">Nama Pelamar</li>
			</ol>
			<?php foreach ($detail as $data) : ?>
				<form method="POST" action="<?= base_url('unitkerja/updatestatus') ?>">
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									DATA PELAMAR
								</div>
								<div class="card-body">
									<div class="row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">Nama Pelamar</label>
											<input type="hidden" name="id_permohonan" value="<?= $data['id_permohonan']; ?>">
											<input type="text" name="nama_pelamar" class="form-control" value="<?= $data['nama_pelamar'] ?>" readonly>
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">NIM</label>
											<input type="nim" class="form-control" value="<?= $data['nim']; ?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label for="inputAddress">Program Studi</label>
										<input type="text" name="prodi" class="form-control" value="<?= $data['prodi']; ?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputAddress2">Fakultas</label>
										<input type="text" name="fakultas" class="form-control" value="<?= $data['fakultas']; ?>" readonly>
									</div>
									<div class="form-group ">
										<label for="inputCity">Nomor Telepon / WhatsApp</label>
										<input type="text" name="no_telepon" class="form-control" value="<?= $data['no_telpon'] ?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputState">Unit Kerja</label>
										<input type="text" name="nama_unit" class="form-control" value="<?= $data['nama_unit']; ?>" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									DATA PERMOHONAN
								</div>
								<div class="card-body">
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label for="inputEmail4">No Surat Permohonan</label>
												<input type="text" class="form-control" name="no_surat_permohonan" value="<?= $data['no_surat_permohonan']; ?>" readonly>
											</div>
											<div class="col-md-6">
												<label for="inputEmail4">Tanggal Permohonan</label>
											<input type="text" class="form-control" name="tanggal_permohonan" value="<?= indo_date($data['tanggal_permohonan']); ?>" readonly>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="form-group col-md-6">
												<label>Dokumen CV</label>
												<input type="text" name="nama_file_cv" class="form-control" value="<?= $data['nama_file_cv']; ?>">
											</div>
											<div class="form-group col-md-6">
												<label for="inputPassword4">Dokumen KHS</label>
												<input type="text" name="nama_file_khs" class="form-control" id="inputEmail4" value="<?= $data['nama_file_khs']; ?>">
											</div>
										</div>
										<div class="form-group">
											<div class="form-group">
												<label for="inputEmail4">Surat Permohonan</label>
												<input type="text" name="nama_file_surat_permohonan" class="form-control" value="<?= $data['nama_file_surat_permohonan']; ?>"">
											</div>
										</div>
										<div class=" form-group">
												<label for="exampleFormControlSelect1">Status Penerimaan</label>
												<select class="form-control" name="status" id="exampleFormControlSelect1">
													<option value="Disetujui">Disetujui</option>
													<option value="Ditolak">Ditolak</option>
												</select>
											</div>
											<div class="form-group mt-3">
												<div class="input-group">
													<label for="input" class="mx-2">Keterangan</label>
													<textarea class="form-control" aria-label="With textarea" name="ket" placeholder="Keterangan"></textarea>
												</div>
											</div>
											<div class="form-group mt-4 text-end justify-content-center">
												<button type="submit" class="btn btn-primary col-md-4">Verifikasi Data</button>
											</div>
										</div>
									</div>
								</div>
							</div>
				</form>
			<?php endforeach; ?>
		</div>
	</main>
