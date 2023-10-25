  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1 style="font-size: 2.5em;">Selamat datang di portal <span>Magang@Perpusnas</span></h1>
          <!-- <h2>Silahkan klik tombol dibawah untuk daftar magang</h2> -->

          <div class="btns">
            <a href="#specials" class="btn-menu animated fadeInUp scrollto">Daftar magang</a>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title-sec">
          <h2>Alur pendaftaran</h2>
          <p>Alur pendaftaran peserta magang</p>
        </div>

        <img src="../assets/img/alur magang.png" class="img-fluid" alt="Responsive image">

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials" style="overflow: visible;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tempat magang</h2>
          <p>Daftar unit kerja</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3" style="height: 450px; overflow-x: hidden; overflow-y: auto;">
            <ul class="nav nav-tabs flex-column">

              <?php foreach ($unit_kerja as $unit) : ?>
                <li class="nav-item">
                  <a class="nav-link <?= ($unit['id'] == 1) ? "active" : ""; ?> show" data-toggle="tab" href="#tab-<?= $unit['id']; ?>"><?= $unit['nama_unit']; ?></a>
                </li>
              <?php endforeach; ?>

            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">

              <?php foreach ($unit_kerja as $unit) : ?>
                <div class="tab-pane <?= ($unit['id'] == 1) ? "active" : ""; ?> show" id="tab-<?= $unit['id']; ?>">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3><?= $unit['nama_unit']; ?></h3>
                      <p class="font-italic"><?= $unit['keterangan']; ?></p>
                    </div>
                    <div class="col-lg-4 text-lg-left order-1 order-lg-2">
                      <!-- <h5>Kuota yang tersedia</h5>
                      <p>10 orang.</p> -->

                      <?php if ($dataLengkap == FALSE) : ?>
                        <div style="font-size: 0.73em;" class="alert alert-danger alert-dismissible fade show">
                          <strong>Peringatan </strong>Data anda belum lengkap.
                        </div>
                        <a class="btn rounded-pill btn-info btn-umum mb-2" role="button" href="<?= base_url('pelamar/profile'); ?>">Lengkapi data</a>
                        <a class="btn rounded-pill btn-secondary btn-umum " role="button" href="#">Daftar</a>
                      <?php elseif (in_array($unit['id'], $unitTerdaftar)) : ?>
                        <div style="font-size: 0.73em;" class="alert alert-danger alert-dismissible fade show">
                          <strong>Peringatan </strong>Anda sudah melamar pada unit kerja ini.
                        </div>
                        <a class="btn rounded-pill btn-secondary btn-umum disabled" role="button" href="#">Daftar</a>
                      <?php else : ?>
                        <a class="btn rounded-pill btn-umum btn-primary" href="<?= base_url('pelamar/daftar/') . $unit['id']; ?>">Daftar</a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Specials Section -->
    <section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
      <div class="container">
        <div class="section-title-sec">
          <p>Pertanyaan Umum </p>
        </div>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
              <h3 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">
                  Apa itu Pusdiklat?
                </a>
              </h3>
            </div>
            <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
              <div class="panel-body px-3 mb-4" style="color: #000">
                <p>Pusdiklat Perpusnas adalah lembaga yang fokus pada pendidikan dan pelatihan di bidang perpustakaan, yang terkait dengan kebijakan dan pengelolaan perpustakaan di tingkat nasional di Indonesia.</p>

              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading1">
              <h3 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                  Bagaimana cara daftar magang?
                </a>
              </h3>
            </div>
            <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
              <div class="panel-body px-3 mb-4">
                <p><img src="../assets/img/alur magang.png" class="img-fluid" alt="Responsive image">
                </p>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading2">
              <h3 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                  Bagaimana cara buat akun di website ini?
                </a>
              </h3>
            </div>
            <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
              <div class="panel-body px-3 mb-4">
                <h6>
                  1. Klik Buat akun baru pada halaman login
                  <br>
                  2. Isi data diri seperti Nama, Email, Universitas dll
                  <br>
                  3. Langkah selanjutnya klik Register
                </h6>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading3">
              <h3 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
                  Berkas apa saja yang diperlukan untuk daftar magang?
                </a>
              </h3>
            </div>
            <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
              <div class="panel-body px-3 mb-4">
                <h6>
                  1. Surat Permohonan Magang
                  <br>
                  2. Kartu Hasil Studi / KHS
                  <br>
                  3. Curriculum Vitae / CV
                </h6>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </main><!-- End #main -->