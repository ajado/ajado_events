$(document).ready(function() {
	$('.slideshow').cycle({
		fx: 'fade',
		timeout: 4000,
		pause: 1,
		pager: '#event-teaser-nav'
	});
});

/*$(function() {
    $('#event-teaser-slideshow').before('<div id="event-teaser-nav" class="event-teaser-nav">').cycle({
        fx:     'fade',
        timeout: 4000,
        pager:  '#event-teaser-nav',
        pause: 1
    });
});*/