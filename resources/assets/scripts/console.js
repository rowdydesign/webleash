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
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Dashboard
    'page_console_dashboard': {
      init: function() {
      },
      finalize: function() {
      }
    },
    // Has sidebar menu
    'has_sidebar_menu': {
      init: function() {
        $('#sidebar-menu').multilevelpushmenu({
            containersToPush: [ $('#main') ],
            collapsed: true,
            durationSlideOut: 300,
            durationSlideDown: 0,
            menuWidth: '220px'
        });
      },
      finalize: function() {
      }
    },
    // Has grid
    'has_grid': {
      init: function() {

        // Gridstack
        $(function() {
            /**
             * Get widgets
             */
            var getWidgets = function() {
                return $(grid).find('.widget');
            };

            /**
             * Get widget data
             */
            var getWidgetData = function($widget) {
                $widget = $($widget);

                var type = $widget.data('widget-type');

                var el = $widget.closest('.grid-stack-item');
                var node = el.data('_gridstack_node');

                var data = {
                    'type': type,
                    'uuid': $widget.data('widget-uuid'),
                    'meta': {}
                };

                data.meta['gs-x'] = node.x;
                data.meta['gs-y'] = node.y;
                data.meta['gs-width'] = node.width;
                data.meta['gs-height'] = node.height;

                switch (type) {
                    default:
                    case 'notepad':
                        $widget.find('[data-widget-meta="true"]').each(function() {
                            var key = $(this).data('widget-meta-key');
                            var value = null;

                            switch ($(this).data('widget-meta-value')) {
                                case 'innerHTML':
                                    value = $(this).html().replace(/\r?\n|\r/g, '');
                                    break;
                            }

                            data.meta[key] = value;
                        });
                        break;
                }

                return data;
            };

            /**
             * Save grid
             */
            var saveGrid = function(e, items) {
               var widgets = [];
               var method = getWidgetsUpdateMethod();

                if (method.toLowerCase() === 'put' || method.toLowerCase() === 'delete') {
                    method = 'POST';
                }

                getWidgets().each(function() {
                    var data = getWidgetData($(this));
                    widgets[widgets.length] = data;
                });

                clearTimeout(saveTimer);
                saveTimer = setTimeout(function() {
                    $.ajax({
                        method: method,
                        url: getWidgetsUpdateUrl(),
                        data: { '_method': getWidgetsUpdateMethod(), widgets: JSON.stringify(widgets) },
                        dataType: 'json'
                    });
                }, 250);
            };

            var storeWidget = function($widget) {
                var data = getWidgetData($widget);
                var method = getWidgetsStoreMethod();

                if (method.toLowerCase() === 'put' || method.toLowerCase() === 'delete') {
                    method = 'POST';
                }

                $.ajax({
                    method: method,
                    url: getWidgetsStoreUrl(),
                    data: { '_method': getWidgetsStoreMethod(), widget: JSON.stringify(data) },
                    dataType: 'json',
                })
                .done(function(response) {
                    var data = response.data;

                    $widget.data('widget-uuid', data.widget.uuid);
                });
            };

            var deleteWidget = function($widget) {
                $widget = $($widget);

                var el = $widget.closest('.grid-stack-item');
                var data = getWidgetData($widget);
                var method = getWidgetsDestroyMethod();

                var uuid = data.uuid;

                grid.data('gridstack').remove_widget(el);

                if (method.toLowerCase() === 'put' || method.toLowerCase() === 'delete') {
                    method = 'POST';
                }

                $.ajax({
                    method: method,
                    url: getWidgetsDestroyUrl() + '/' + uuid,
                    data: { '_method': getWidgetsDestroyMethod() },
                    dataType: 'json',
                });
            };

            /**
             * Initialize widget
             */
            var initializeWidget = function($widget) {
                $widget.on('change', function() {
                    grid.trigger('change');
                });

                $widget.find('.content-editable').each(function() {
                    var element = $(this);

                    var options = {
                        element: element[0],
                        mode: Medium.partialMode,
                        pasteEventHandler: function(e) {
                            $widget.trigger('change');
                        },
                    };

                    if (element.is('h2')) {
                        options.tags = {
                            'paragraph': ''
                        };
                    }

                    var medium = new Medium(options);

                    element.on('mousedown', function(event) {
                        event.stopPropagation();
                    });

                    element.on('keyup input change', function(e) {
                        $widget.trigger('change');
                    });
                });
            };

            /**
             * Get Widgets Update URL
             */
            var getWidgetsUpdateUrl = function() {
                return $(form).attr('action');
            };

            /**
             * Get Widgets Update Method
             */
            var getWidgetsUpdateMethod = function() {
                var $form = $(form);
                var method = $form.attr('method');

                if ($form.find('input[name="_method"]').length) {
                    method = $form.find('input[name="_method"]').val();
                }

                return method;
            }

            /**
             * Get Widgets Store URL
             */
            var getWidgetsStoreUrl = function() {
                return $('#source-widgets form').attr('action');
            };

            /**
             * Get Widgets Store Method
             */
            var getWidgetsStoreMethod = function() {
                var $form = $('#source-widgets form');
                var method = $form.attr('method');

                if ($form.find('input[name="_method"]').length) {
                    method = $form.find('input[name="_method"]').val();
                }

                return method;
            }

            /**
             * Get Widgets Destroy URL
             */
            var getWidgetsDestroyUrl = function() {
                return $('#delete-widgets-form').attr('action');
            };

            /**
             * Get Widgets Destroy Method
             */
            var getWidgetsDestroyMethod = function() {
                var $form = $('#delete-widgets-form');
                var method = $form.attr('method');

                if ($form.find('input[name="_method"]').length) {
                    method = $form.find('input[name="_method"]').val();
                }

                return method;
            }

            /**
             * Options
             */
            var options = {
            };

            var grid = $('#grid').gridstack({options});
            var form = $(grid).closest('form');

            var saveTimer = null;

            /**
             * Grid events
             */
            grid.on('change', function(e, items) {
                saveGrid(e, items);
            });

            /**
             * Initialize widgets
             */
            $('#grid .widget').each(function(){
                var $widget = $(this);

                initializeWidget($widget);
            });

            $('.add-widget-button').on('click', function(event) {
                event.preventDefault();

                var widgetType = $(this).data('widget-type');
                var el = null;

                switch (widgetType) {
                    case 'notepad':
                        el = $('#source-widgets').find('.grid-stack-item-notepad').clone();
                        grid.data('gridstack').add_widget(el, 0, 0, 3, 2, true);

                        $widget = $(el).find('.widget');
                        break;
                }

                $widget.data('widget-type', widgetType);
                storeWidget($widget);
                initializeWidget($widget);
            });

            $('.delete-widgets-button').on('click', function(event) {
                event.preventDefault();

                if (!$('body').hasClass('deleting-widgets')) {
                    $('body').addClass('deleting-widgets');

                    $('#grid .grid-stack-item').on('click', function(event) {
                        event.stopPropagation();

                        var $widget = $(this).find('.widget');

                        deleteWidget($widget);
                    });
                } else {
                    $('body').removeClass('deleting-widgets');
                }
            });
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
