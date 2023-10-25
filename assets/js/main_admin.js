!(function ($) {
	"use strict";

	$(document).ready(function () {
		if ($(".outer").data("diperiksa") == true) {
			//hidden button
		}
	});

	$(".outer").on("click", function (event) {
		$(".outer").addClass("clicked");
	});

	$(".inner").on("click", function (event) {
		$(".outer clicked").data("diperiksa", true);
		$(".outer clicked").removeClass("clicked");
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

	// show and hide form-upload surat balasan
	
})(jQuery);
