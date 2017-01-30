console.log("Hello, this is custom.js!");
(function ($) {
  $(document).ready(function () {

    setTimeout(function () {
      $('.h5p-control.h5p-playbackRate').css('background', 'green');

    }, 5000)
  })

})(H5P.jQuery);
