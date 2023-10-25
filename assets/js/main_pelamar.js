/**
 * Template Name: Restaurantly - v1.2.1
 * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */
!(function ($) {
	"use strict";

	// Preloader
	$(window).on("load", function () {
		if ($("#preloader").length) {
			$("#preloader")
				.delay(100)
				.fadeOut("slow", function () {
					$(this).remove();
				});
		}
	});

	// Smooth scroll for the navigation menu and links with .scrollto classes
	var scrolltoOffset = $("#header").outerHeight() - 1;
	$(document).on(
		"click",
		".nav-menu a, .mobile-nav a, .scrollto",
		function (e) {
			if (
				location.pathname.replace(/^\//, "") ==
					this.pathname.replace(/^\//, "") &&
				location.hostname == this.hostname
			) {
				var target = $(this.hash);
				if (target.length) {
					e.preventDefault();

					var scrollto = target.offset().top - scrolltoOffset;

					if ($(this).attr("href") == "#header") {
						scrollto = 0;
					}

					$("html, body").animate(
						{
							scrollTop: scrollto,
						},
						1500,
						"easeInOutExpo"
					);

					if ($(this).parents(".nav-menu, .mobile-nav").length) {
						$(".nav-menu .active, .mobile-nav .active").removeClass("active");
						$(this).closest("li").addClass("active");
					}

					if ($("body").hasClass("mobile-nav-active")) {
						$("body").removeClass("mobile-nav-active");
						$(".mobile-nav-overly").fadeOut();
					}
					return false;
				}
			}
		}
	);

	// Activate smooth scroll on page load with hash links in the url
	$(document).ready(function () {
		if (window.location.hash) {
			var initial_nav = window.location.hash;
			if ($(initial_nav).length) {
				var scrollto = $(initial_nav).offset().top - scrolltoOffset;
				$("html, body").animate(
					{
						scrollTop: scrollto,
					},
					1500,
					"easeInOutExpo"
				);
			}
		}
	});

	// Mobile Navigation
	if ($(".nav-menu").length) {
		var $mobile_nav = $(".nav-menu").clone().prop({
			class: "mobile-nav d-lg-none",
		});
		$("body").append($mobile_nav);
		$(".mobile-nav").prepend(
			'<button type="button" class="mobile-nav-close"><i class="icofont-close"></i></button>'
		);
		$("#header").append(
			'<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>'
		);
		$("body").append('<div class="mobile-nav-overly"></div>');

		$(document).on("click", ".mobile-nav-toggle", function (e) {
			$("body").toggleClass("mobile-nav-active");
			$(".mobile-nav-overly").toggle();
		});

		$(document).on("click", ".mobile-nav-close", function (e) {
			$("body").removeClass("mobile-nav-active");
			$(".mobile-nav-overly").fadeOut();
		});

		$(document).on("click", ".mobile-nav .drop-down > a", function (e) {
			e.preventDefault();
			$(this).next().slideToggle(300);
			$(this).parent().toggleClass("active");
		});

		$(document).click(function (e) {
			var container = $(".mobile-nav, .mobile-nav-toggle");
			if (!container.is(e.target) && container.has(e.target).length === 0) {
				if ($("body").hasClass("mobile-nav-active")) {
					$("body").removeClass("mobile-nav-active");
					$(".mobile-nav-toggle i").toggleClass(
						"icofont-navigation-menu icofont-close"
					);
					$(".mobile-nav-overly").fadeOut();
				}
			}
		});
	} else if ($(".mobile-nav, .mobile-nav-toggle").length) {
		$(".mobile-nav, .mobile-nav-toggle").hide();
	}

	// Toggle .header-scrolled class to #header when page is scrolled
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$("#header").addClass("header-scrolled");
			$("#topbar").addClass("topbar-scrolled");
		} else {
			$("#header").removeClass("header-scrolled");
			$("#topbar").removeClass("topbar-scrolled");
		}
	});

	if ($(window).scrollTop() > 100) {
		$("#header").addClass("header-scrolled");
		$("#topbar").addClass("topbar-scrolled");
	}

	// Navigation active state on scroll
	var nav_sections = $("section");
	var main_nav = $(".nav-menu, .mobile-nav");

	$(window).on("scroll", function () {
		var cur_pos = $(this).scrollTop() + 200;

		nav_sections.each(function () {
			var top = $(this).offset().top,
				bottom = top + $(this).outerHeight();

			if (cur_pos >= top && cur_pos <= bottom) {
				if (cur_pos <= bottom) {
					main_nav.find("li").removeClass("active");
				}
				main_nav
					.find('a[href="#' + $(this).attr("id") + '"]')
					.parent("li")
					.addClass("active");
			}
			if (cur_pos < 300) {
				$(".nav-menu ul:first li:first").addClass("active");
			}
		});
	});

	// Back to top button
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$(".back-to-top").fadeIn("slow");
		} else {
			$(".back-to-top").fadeOut("slow");
		}
	});

	$(".back-to-top").click(function () {
		$("html, body").animate(
			{
				scrollTop: 0,
			},
			1500,
			"easeInOutExpo"
		);
		return false;
	});

	// Menu list isotope and filter
	$(window).on("load", function () {
		var menuIsotope = $(".menu-container").isotope({
			itemSelector: ".menu-item",
			layoutMode: "fitRows",
		});

		$("#menu-flters li").on("click", function () {
			$("#menu-flters li").removeClass("filter-active");
			$(this).addClass("filter-active");

			menuIsotope.isotope({
				filter: $(this).data("filter"),
			});
			aos_init();
		});
	});

	// Events carousel (uses the Owl Carousel library)
	$(".events-carousel").owlCarousel({
		autoplay: true,
		dots: true,
		loop: true,
		items: 1,
	});

	// Testimonials carousel (uses the Owl Carousel library)
	$(".testimonials-carousel").owlCarousel({
		autoplay: true,
		dots: true,
		loop: true,
		autoplayTimeout: 6000,
		responsive: {
			0: {
				items: 1,
			},
			768: {
				items: 2,
			},
			900: {
				items: 3,
			},
		},
	});

	// Initiate venobox lightbox
	$(document).ready(function () {
		$(".venobox").venobox();
	});

	// Init AOS
	function aos_init() {
		AOS.init({
			duration: 1000,
			once: true,
		});
	}
	$(window).on("load", function () {
		aos_init();
	});

	$(document).ready(function () {
		//Sweet Alert 2
		let flashdata = $("#flashdata");
		if (flashdata.length > 0) {
			let title = flashdata.data("title");
			let text = flashdata.data("text");
			let icon = flashdata.data("icon");
			Swal.fire({
				title,
				text,
				icon,
			});
		}

		//profile
		for (let i = 1; i <= 5; i++) {
			if (window.location.hash == `#tab-${i}`) {
				$(".profile .nav-link").removeClass("active show");
				$(".profile .tab-pane").removeClass("active show");
				$(`#button-${i}`).addClass("active show");
				$(`#tab-${i}`).addClass("active show");
			}
		}

		//ubah surat
		const statusSurat = $("#suratNormalDisplay p").text();
		if (statusSurat.length === 0) {
			$("#suratUploadDisplay").show();
			$("#batal-surat").hide();
			$("#suratNormalDisplay").hide();
		} else if (statusSurat.length > 0) {
			$("#suratUploadDisplay").hide();
			$("#suratNormalDisplay").show();
		}

		//ubah khs
		const statusKhs = $("#khsNormalDisplay p").text();
		if (statusKhs.length === 0) {
			$("#khsUploadDisplay").show();
			$("#batal-khs").hide();
			$("#khsNormalDisplay").hide();
		} else if (statusKhs.length > 0) {
			$("#khsUploadDisplay").hide();
			$("#khsNormalDisplay").show();
		}

		//ubah cv
		const statusCv = $("#cvNormalDisplay p").text();
		if (statusCv.length === 0) {
			$("#cvUploadDisplay").show();
			$("#batal-cv").hide();
			$("#cvNormalDisplay").hide();
		} else if (statusCv.length > 0) {
			$("#cvUploadDisplay").hide();
			$("#cvNormalDisplay").show();
		}
	});

	//on click logout
	$(".logout").on("click", function (event) {
		event.preventDefault();
		let link = $(this).attr("href");

		Swal.fire({
			title: "Keluar",
			text: "Apakah anda yakin?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, saya ingin keluar",
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = link;
			}
		});
	});

	//button ubah berkas surat permohonan
	$("#ubah-surat").on("click", function (event) {
		$("#suratUploadDisplay").show();
		$("#suratNormalDisplay").hide();
	});

	//button batal ubah berkas surat permohonan
	$("#batal-surat").on("click", function (event) {
		$("#suratUploadDisplay").hide();
		$("#suratNormalDisplay").show();
	});

	//button ubah berkas khs
	$("#ubah-khs").on("click", function (event) {
		$("#khsUploadDisplay").show();
		$("#khsNormalDisplay").hide();
	});

	//button batal ubah berkas khs
	$("#batal-khs").on("click", function (event) {
		$("#khsUploadDisplay").hide();
		$("#khsNormalDisplay").show();
	});

	//button ubah berkas cv
	$("#ubah-cv").on("click", function (event) {
		$("#cvUploadDisplay").show();
		$("#cvNormalDisplay").hide();
	});

	//button batal ubah berkas cv
	$("#batal-cv").on("click", function (event) {
		$("#cvUploadDisplay").hide();
		$("#cvNormalDisplay").show();
	});

	//upload file
	$(".custom-file-input").on("change", function () {
		let filename = $(this).val().split("\\").pop();
		$(this).next(".custom-file-label").addClass("selected").html(filename);
	});

	//confirm hapus-berkas
	$(".hapus-berkas").on("click", function (event) {
		event.preventDefault();
		let link = $(this).attr("href");

		Swal.fire({
			title: "Hapus Berkas",
			text: "Apakah anda yakin?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, saya ingin hapus berkas",
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = link;
			}
		});
	});

	for (let i = 1; i <= 5; i++) {
		$(`#button-${i}`).on("click", function (event) {
			window.location.hash = `#tab-${i}`;
		});
	}

	for (let i = 1; i <= 15; i++) {
		$(`#buttons-${i}`).on("click", function (event) {
			window.location.hash = `#tabs-${i}`;
			$(".kegiatan .tab-pane").removeClass("active show");
			$(`#tabs-${i}`).addClass("active show");
		});
	}
})(jQuery);
