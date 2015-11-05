(function( root, $, undefined ) {
"use strict";

$(function () {

// DOM ready, take it away
var $menuToggle = $('.menu-toggle');
var $menu = $('.menu');

var $storiesToggle = $('.stories-toggle');
var $stories = $('.stories');


toggleReveal($menuToggle, $menu);
toggleReveal($storiesToggle, $stories);


function toggleReveal(toggle, target) {
  var hiddenTarget = true;
  var targetRevealed = target.attr('class').split(' ')[1] + '--revealed';

  toggle.on('click', function(e) {
    e.preventDefault();
    target.toggleClass(targetRevealed);
    hiddenTarget = false;
  });

  target.on('click', function(e) {
    hiddenTarget = false;
  });

  $('html').on('click', function() {
    if (hiddenTarget) {
      target.removeClass(targetRevealed);
    }
    hiddenTarget = true;
  })

} // end toggleReveal



}); // end document ready

} ( this, jQuery ));