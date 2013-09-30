//jQuery(document).ready(function(){
jQuery(window).load(function(){
	jQuery('#mosactext').masonry({
	itemSelector: '.mosactext',
//	columnWidth: 240,
	columnWidth: function( containerWidth ) {
		return containerWidth / 4;
	},
//	gutterWidth: 10,
	isAnimated: true,
//	isFitWidth: true,
//	isResizable: true,
	animationOptions: {
		duration: 400
	}
	});
});
