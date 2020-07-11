(function($, elementor) {

  'use strict';

  var widgetAnimatedHeading = function($scope, $) {

    var $heading = $scope.find('.bdt-heading > *'),
    $animatedHeading = $heading.find('.bdt-animated-heading'),
    $settings = $animatedHeading.data('settings');

    if (!$heading.length) {
      return;
    }

    if ($settings.layout === 'animated') {
      $($animatedHeading).Morphext($settings);
    } else if ($settings.layout === 'typed') {
      var animateSelector = $($animatedHeading).attr('id');
      var typed = new Typed('#' + animateSelector, $settings);
    }else if($settings.layout === 'split_text'){

      var $quote = $($heading);

      var timeline = gsap.timeline(), 
      my_split_text = new SplitText($quote, {type:"chars, words, lines"});

      var stringType = '';
      

      if ( 'lines' == $settings.animation_on ) {
        stringType = my_split_text.lines;
      } else if ( 'chars' == $settings.animation_on ) {
        stringType = my_split_text.chars;
      } else {
        stringType = my_split_text.words;
      }
      gsap.set($quote, {
                perspective: $settings.anim_perspective //400
              });


      elementorFrontend.waypoint( $heading, function() {

        function allDone(){
          timeline.clear().time(0);
         my_split_text.revert();
       }

       timeline.staggerFrom(stringType, 0.5, {
                    opacity: 0, //0
                    scale: $settings.anim_scale, //0
                    y: $settings.anim_rotation_y, //80
                    rotationX: $settings.anim_rotation_x, //180
                    transformOrigin: $settings.anim_transform_origin, //0% 50% -50  
                    // ease:Back.easeOut, //back
                  }, $settings.anim_duration);


     }, {

            // offset: 'bottom-in-view',
            offset: '75%',
            triggerOnce :  true//($settings.anim_repeat) == 'false' ? false : true 
          } );

    } 

    $($heading).animate({
      easing: 'slow',
      opacity: 1
    }, 500); 


  };


  jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/bdt-animated-heading.default', widgetAnimatedHeading);
  });

}(jQuery, window.elementorFrontend));