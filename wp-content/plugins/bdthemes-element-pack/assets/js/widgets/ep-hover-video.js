(function($, elementor) {
    'use strict';
    // instaVideo
    var widgetInstaVideo = function($scope, $) {
        var $instaVideo = $scope.find('.bdt-hover-video');
        if (!$instaVideo.length) {
            return;
        }
        // var $settings = $instaVideo.data('settings');

        // console.log($settings.proVisibility);

        var video = $($instaVideo).find('.bdt-hover-wrapper-list  video');
        // console.log(video);
        var videoProgress;
        setInterval(function () {
            videoProgress = $('.bdt-hover-progress.active');
        }, 100);

        $(video).on('mouseenter', function (e) {
            $(this).trigger('play');
            var video = $('.bdt-hover-video > .bdt-hover-wrapper-list  video');
        });
        $(video).on('mouseout', function (e) {
            $(this).trigger('pause');
        });

        $(video).on('timeupdate', function () {
            var videoBarList = $(video).parent().find('video.active').attr('id');
            var ct = document.getElementById(videoBarList).currentTime;
            var dur = document.getElementById(videoBarList).duration;
            
            var videoProgressPos = ct / dur;
            $('.bdt-hover-bar-list').find("[data-id=" + videoBarList + "]").width(videoProgressPos * 100 + "%");
            if (video.ended) {
            }
        });

        $('.bdt-hover-btn').on('mouseenter', function () {
            var videoId = $(this).attr('data-id');
            $('#' + videoId).siblings().css("display", 'none').removeClass('active');
            $('#' + videoId).css("display", 'block').addClass('active');
            $('.bdt-hover-bar-list .bdt-hover-progress').removeClass('active');
            $('.bdt-hover-bar-list').find("[data-id=" + videoId + "]").addClass('active');

            $('.bdt-hover-btn-wrapper').find("[data-id=" + videoId + "]")
            .siblings().removeClass('active');//.addClass('active');
            $('.bdt-hover-btn-wrapper').find("[data-id=" + videoId + "]")
            .addClass('active');
//        console.log(videoId);
});

        
    };

    var widgetInstaVideoAccordion = function($scope, $) {
        var $hoverVideoAccordion = $scope.find('.bdt-hover-video');
        if (!$hoverVideoAccordion.length) {
            return;
        }

        var video = $($hoverVideoAccordion).find('.bdt-hover-wrapper-list  video');

        var videoProgress;
        setInterval(function () {
            videoProgress = $('.bdt-hover-progress.active');
        }, 100);

        $(video).on('timeupdate', function () {
            var videoBarList = $(video).parent().find('video.active').attr('id');
            var ct = document.getElementById(videoBarList).currentTime;
            var dur = document.getElementById(videoBarList).duration;
            var videoProgressPos = ct / dur;
            $('.bdt-hover-bar-list').find("[data-id=" + videoBarList + "]").width(videoProgressPos * 100 + "%");
            if (video.ended) {
            }
        });

        $('.bdt-hover-mask-list .bdt-hover-mask').on('mouseenter', function () {
            var videoId = $(this).attr('data-id');
            $('#' + videoId).siblings().css("display", 'none').removeClass('active');
            $('#' + videoId).css("display", 'block').addClass('active');
            $('#'+videoId).siblings().trigger('pause'); // play item on active
            $('#'+videoId).trigger('play'); // play item on active
            $('.bdt-hover-bar-list .bdt-hover-progress').removeClass('active');
            $('.bdt-hover-bar-list').find("[data-id=" + videoId + "]").addClass('active');
            
            $('.bdt-hover-mask-list').find("[data-id=" + videoId + "]")
            .siblings().removeClass('active');
            $('.bdt-hover-mask-list').find("[data-id=" + videoId + "]")
            .addClass('active');
    });
        $('.bdt-hover-mask-list').on('mouseout', function (e) {
            $(this).siblings('.bdt-hover-wrapper-list .hover-video-list').find('video').trigger('pause');
        });



    };

    jQuery(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/bdt-hover-video.default', widgetInstaVideo);
        elementorFrontend.hooks.addAction('frontend/element_ready/bdt-hover-video.accordion', widgetInstaVideoAccordion);
    });
}(jQuery, window.elementorFrontend));