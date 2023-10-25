<body class="sb-nav-fixed">
	<!-- navigation menu -->
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary pt-2 pb-2">
		<!-- Navbar Brand-->
		<!-- Nama di anchor ini nantinya berubah sesuai dengan session yang masuk -->
		<a class="navbar-brand ps-3" href="<?= base_url('pusat/index') ?>"><?= $title; ?></a>
		<!-- Sidebar Toggle-->
		<button class="btn btn-link btn-sm btn-primary order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
		<!-- Navbar Search-->

		<!-- Navbar-->
		<a class="btn btn-danger logout ms-auto ms-auto me-4 me-md-3 my-2 my-md-0 " href="<?= base_url('auth/logout') ?>">
			<i class="fas fa-sign-out-alt "></i>
			Logout
		</a>
	</nav>
	<!-- navigation menu -->
