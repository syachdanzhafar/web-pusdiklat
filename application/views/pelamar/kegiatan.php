<main id="main">
    <section id="specials" class="profile">
        <div class="container" data-aos="fade-up" style="margin-top: 6%;">
            <div class="section-title">

                <h2 style="color: #000">Status pendaftaran</h2>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class=" col-lg-5" style="min-height: 300px; max-height: 500px; overflow-y: auto; overflow-x: hidden;">

                    <ul class="nav nav-tabs flex-column">
                        <?php if (count($status_pendaftaran) == 0) : ?>
                            <li class="nav-item">
                                <div class="col">
                                    <div class="card-body card" style="height: 500px;">
                                        <p style="line-height: 470px; color: hsl(0, 10%, 80%); overflow-x:visible">Anda belum mendaftar pada unit manapun</p>
                                    </div>
                                </div>
                            </li>
                        <?php else : ?>
                            <?php foreach ($status_pendaftaran as $stat) :
                                switch ($stat['status']):
                                    case 'Menunggu verifikasi': ?>
                                        <li class="nav-item">
                                            <div class="col">
                                                <div class="card-body card" style="height: 160px; margin-bottom:10%">
                                                    <div class=" clearfix mb-3">
                                                        <span class=" badge badge-info">Menunggu Verifikasi</span>
                                                        <span class="float-end price-hp">Magang</span>
                                                    </div>
                                                    <h6 class="card-title"><?= $stat['nama_unit']; ?></h6>
                                                    <div class="text-center my-2" style="margin-right:68%">
                                                        <a id="buttons-<?= $stat['id_unit']; ?>" data-toggle="tab" href="#tabs-<?= $stat['id_unit']; ?>" class="btn btn-primary">Lihat detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php break; ?>
                                    <?php
                                    case 'Ditolak': ?>
                                        <li class="nav-item">
                                            <div class="col">
                                                <div class="card-body card" style=" margin-bottom:10%">
                                                    <div class="clearfix mb-3">
                                                        <span class=" badge badge-danger">Ditolak</span>
                                                        <span class="float-end price-hp">Magang</span>
                                                    </div>
                                                    <h6 class="card-title"><?= $stat['nama_unit']; ?></h6>
                                                    <div class="text-center my-2" style="margin-right:68%">
                                                        <a id="buttons-<?= $stat['id_unit']; ?>" data-toggle="tab" href="#tabs-<?= $stat['id_unit']; ?>" class="btn btn-primary">Lihat detail</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                        <?php break; ?>
                                    <?php
                                    case 'Disetujui': ?>
                                        <li class="nav-item">
                                            <div class="col">
                                                <div class="card-body card" style="height: 150px; margin-bottom:10%">
                                                    <div class="clearfix mb-3">
                                                        <span class=" badge badge-success">Disetujui</span>
                                                        <span class="float-end price-hp">Magang</span>
                                                    </div>
                                                    <h6 class="card-title"><?= $stat['nama_unit']; ?></h6>
                                                    <div class="text-center my-2" style="margin-right:68%">
                                                        <a id="buttons-<?= $stat['id_unit']; ?>" data-toggle="tab" href="#tabs-<?= $stat['id_unit']; ?>" class="btn btn-primary">Lihat detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php break; ?>
                                <?php endswitch; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="col-lg-7 mt-4 mt-lg-0 card-tab">

                    <div class="tab-content kegiatan" style="height: 500px; overflow-y: auto; overflow-x: hidden;">

                        <div class="tab-pane active show">
                            <div class="row justify-content-center">
                                <h4 style="line-height: 490px; color: hsl(0, 10%, 80%)">Halaman ini berisi riwayat lamaran anda.</h4>

                            </div>
                        </div>

                        <?php foreach ($status_pendaftaran as $stat) :
                            switch ($stat['status']):
                                case 'Menunggu verifikasi': ?>
                                    <div class="tab-pane" id="tabs-<?= $stat['id_unit']; ?>">
                                        <div class="row">
                                            <div class=" col-lg-10 details order-2 order-lg-1" style="margin-top: 8%;">

                                                <h3 style="font-size: 20px;">Kamu telah mendaftar pada unit kerja</h3>
                                                <h3 style="font-size: 26px;"><?= $stat['nama_unit']; ?></h3>
                                                <h6 class="font-weight-boldl">Informasi Pendaftaran</h6>

                                                <h6 style="font-size: 13px; color:gray;" class="font-weight-light">Tanggal pendaftaran</h6>
                                                <h6 style="font-size: 14px;" class="font-weight-normal"><?= date('d-m-Y', strtotime(str_replace('-', '/', $stat['tanggal_permohonan']))); ?></h6>
                                                <br>

                                                <h6 class="font-weight-boldl">Detail Unit Kerja</h6>
                                                <h6 style="font-size: 14px;" class="font-weight-normal"><?= $stat['keterangan']; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <?php break; ?>
                                <?php
                                case 'Ditolak': ?>
                                    <div class="tab-pane" id="tabs-<?= $stat['id_unit']; ?>">
                                        <div class="row">
                                            <div class=" col-lg-10 details order-2 order-lg-1" style="margin-top: 8%;">
                                                <h3 style="font-size: 20px;">Kamu di tolak pada unit kerja</h3>
                                                <h3 style="font-size: 26px;"><?= $stat['nama_unit']; ?></h3>

                                                <h6 class="font-weight-boldl">Informasi Pendaftaran</h6>

                                                <h6 style="font-size: 13px; color:gray;" class="font-weight-light">Tanggal pendaftaran</h6>
                                                <h6 style="font-size: 14px;" class="font-weight-normal"><?= date('d-m-Y', strtotime(str_replace('-', '/', $stat['tanggal_permohonan']))); ?></h6>
                                                <br>

                                                <h6 class="font-weight-boldl">Tanggal Penolakan</h6>
                                                <h6 style="font-size: 14px;" class="font-weight-normal"><?= date('d-m-Y', strtotime(str_replace('-', '/', $stat['tanggal_persetujuan']))); ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <?php break; ?>
                                <?php
                                case 'Disetujui': ?>
                                    <div class="tab-pane" id="tabs-<?= $stat['id_unit']; ?>">
                                        <div class="row">
                                            <div class=" col-lg-10 details order-2 order-lg-1" style="margin-top: 8%;">

                                                <h3 style="font-size: 20px;">Kamu telah diterima pada unit kerja</h3>
                                                <h3 style="font-size: 26px;"><?= $stat['nama_unit']; ?></h3>

                                                <h6 class="font-weight-boldl">Informasi Pendaftaran</h6>
                                                <h6 style="font-size: 13px; color:gray;" class="font-weight-light">Tanggal pendaftaran</h6>
                                                <h6 style="font-size: 14px;" class="font-weight-normal"><?= date('d-m-Y', strtotime(str_replace('-', '/', $stat['tanggal_permohonan']))); ?></h6>
                                                <br>

                                                <h6 class="font-weight-boldl">Informasi Kegiatan</h6>
                                                <h6 style="font-size: 13px; color:gray;" class="font-weight-light">Tanggal persetujuan</h6>
                                                <h6 style="font-size: 14px;" class="font-weight-normal"><?= date('d-m-Y', strtotime(str_replace('-', '/', $stat['tanggal_persetujuan']))); ?></h6>
                                                <h6 style="font-size: 13px; color:gray;" class="font-weight-light">Tanggal kegiatan</h6>
                                                <h6 style="font-size: 14px;" class="font-weight-normal">
                                                    <?= date('d-m-Y', strtotime(str_replace('-', '/', $stat['tanggal_persetujuan']) . '+1 days')); ?>
                                                    s/d
                                                    <?= date('d-m-Y', strtotime(str_replace('-', '/', $stat['tanggal_persetujuan']) . '+2 months +1 days')); ?></h6>
                                                <br>

                                            </div>
                                        </div>
                                    </div>
                                    <?php break; ?>
                            <?php endswitch; ?>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>

        </div>
    </section>
</main>