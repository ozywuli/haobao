(function( root, $, undefined ) {
"use strict";

$(function () {
// DOM ready, take it away
var $menuToggle = $('.menu-toggle');
var $menu = $('.menu');

var $storiesToggle = $('.stories-toggle');
var $stories = $('.stories');

$menuToggle.on('click', function(e) {
  e.preventDefault();
  $menu.toggleClass('menu--revealed');

});

$storiesToggle.on('click', function(e) {
  e.preventDefault();
  $stories.toggleClass('stories--revealed');
})


$('body').on('click', function(e) {
  if ( 
    $menu.hasClass('menu--revealed') &&
    !$menuToggle.is(e.target) && 
    !$menuToggle.find('*').is(e.target) && 
    !$menu.is(e.target) && 
    !$menu.find('*').is(e.target) 
  ) {
    $menu.removeClass('menu--revealed');
  }

  if ( 
    $stories.hasClass('stories--revealed') &&
    !$storiesToggle.is(e.target) && 
    !$storiesToggle.find('*').is(e.target) && 
    !$stories.is(e.target) && 
    !$stories.find('*').is(e.target) 
  ) {
    $stories.removeClass('stories--revealed');
  }



})

});

} ( this, jQuery ));