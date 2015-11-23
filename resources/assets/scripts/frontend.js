/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Edge = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        $(function(){
            $('.inline-popup-link').magnificPopup({
                type:'inline'
            });

            $('.inline-popup-no-overlay-link').magnificPopup({
                type:'inline',
                mainClass:'mfp-no-overlay'
            });

            $('.form-has-validation').formValidation();
        });
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'page_home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // Public pages
    'page_public': {
      init: function() {
      },
      finalize: function() {
      }
    },
    // Has Section Slides pages
    'has_section_slides': {
      init: function() {
      },
      finalize: function() {
      }
    },
    // Has Signup Form
    'has_signup_form': {
      init: function() {
        $('.signup-form').on('success.form.fv', function(e) {
            e.preventDefault();

            var handleError = function(error, callback) {
                switch (error.type) {
                    case 'errors.session.tokenmistmatch':
                        alert('Your session has expired. Please reload the page.');
                        break;

                    default:
                        alert('We were unable to process your request. Please try again.');
                        break;
                }
            };

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize()
            })
            .done(function(response) {
                if ((typeof response !== 'undefined') && (typeof response.success !== 'undefined')) {
                    if (response.success === true) {
                        console.log(response);
                        window.location = response.redirect_url;
                    } else {
                        handleError(response.error);
                    }
                }
            })
            .fail(function() {
                handleError({ 'type': 'unknown' });
            });

            return false;
        });
      },
      finalize: function() {
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Edge;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
