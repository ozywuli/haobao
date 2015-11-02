(function( root, $, undefined ) {
"use strict";

$(function () {
// DOM ready, take it away
var $menuToggle = $('.menu-toggle');
var $menu = $('.menu');

$menuToggle.on('click', function(e) {
  e.preventDefault();
  $menu.toggleClass('sidebar--revealed');

});


$('body').on('click', function(e) {
  if ( 
    $menu.hasClass('sidebar--revealed') &&
    !$menuToggle.is(e.target) && 
    !$menuToggle.find('*').is(e.target) && 
    !$menu.is(e.target) && 
    !$menu.find('*').is(e.target) 
  ) {
    $menu.removeClass('sidebar--revealed');
  }

  

})

});

} ( this, jQuery ));