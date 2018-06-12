// JavaScript Goes Here //

// Async Load Google Fonts

WebFontConfig = {
    google: { families: [ 'IBM+Plex+Serif:400,700', 'Lato:300,400,700' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = '//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();


// Place all Jquery dependencies here.  Won't run until Jquery is loaded //

(function() {
  var nTimer = setInterval(function() {
    if (window.jQuery) {

      // Begin Jquery code //

      // Script for Dropdown Menu
      (function($) { // Begin jQuery
        $(function() { // DOM ready
          // If a link has a dropdown, add sub menu toggle.
          $('nav .nav-main li a:not(:only-child)').click(function(e) {
            $(this).siblings('.nav-dropdown').toggle();
            // Close one dropdown when selecting another
            $('.nav-dropdown').not($(this).siblings()).hide();
            e.stopPropagation();
          });
          // Clicking away from dropdown will remove the dropdown class
          $('html').click(function() {
            $('.nav-dropdown').hide();
          });
          // Toggle open and close nav styles on click
          $('#nav-toggle').click(function() {
            $('nav .nav-main').slideToggle();
          });
          // Hamburger to X toggle
          $('#nav-toggle').on('click', function() {
            this.classList.toggle('active');
          });
        }); // end DOM ready
      })(jQuery); // end jQuery
      // End Script for Dropdown Menu

      // Card Accordion //

      $(document).ready(function(){
          $('.card-container').click(function(){
            $(this).toggleClass('active');
            $('.card-container').not($(this)).removeClass('active');
          });
      });

      $(".banner-h1").html(function(){
        var text= $(this).text().trim().split(" ");
        var first = text.shift();
        return (text.length > 0 ? "<span class='first'>"+ first + "</span> " : first) + text.join(" ");
      });

      $("main h2").html(function(){
        var text= $(this).text().trim().split(" ");
        var first = text.shift();
        return (text.length > 0 ? "<span class='first'>"+ first + "</span> " : first) + text.join(" ");
      });

      // End Jquery code //

      clearInterval(nTimer);
    }
  }, 100);
})();
