(function($, elementor) {

    'use strict';

    var widgetFancyWide = function($scope, $) {


        var $fancyWide = $scope.find('.bdt-fancy-wide'),
            $settings = $fancyWide.data('settings');

        var wideitem = document.querySelectorAll('#' + $settings.wide_id + ' .bdt-fancy-wide-item');

        $(wideitem).click(function() {
            $(this).toggleClass('active');
        });


    };


    jQuery(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/bdt-fancy-wide.default', widgetFancyWide);
    });

}(jQuery, window.elementorFrontend));