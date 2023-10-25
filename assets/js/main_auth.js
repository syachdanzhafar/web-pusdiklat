!(function ($) {
    "use strict";

    //Sweet Alert 2
  $(window).on('load', function (event) {
    let flashdata = $('#flashdata');
    if (flashdata.length > 0) {
      let title = flashdata.data('title');
      let text = flashdata.data('text');
      let icon = flashdata.data('icon');

      Swal.fire({
        title,
        text,
        icon
      });
    }
  });
})(jQuery);