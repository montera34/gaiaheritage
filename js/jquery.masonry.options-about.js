////jQuery(document).ready(function(){
//jQuery(window).load(function(){
//	jQuery('#mosactext').masonry({
//	itemSelector: '.mosactext',
////	columnWidth: 240,
//	columnWidth: function( containerWidth ) {
//		return containerWidth / 3;
//	},
////	gutterWidth: 10,
//	isAnimated: true,
////	isFitWidth: true,
////	isResizable: true,
//	animationOptions: {
//		duration: 400
//	}
//	});
//});
var container = document.querySelector('#mosactext');
var msnry;
// initialize Masonry after all images have loaded
imagesLoaded( container, function() {
	msnry = new Masonry( container, {
		itemSelector: '.mosactext',
//	columnWidth: 240,
//	columnWidth: function( containerWidth ) {
//		return containerWidth / 3;
//	},
	gutter: 5,
	isFitWidth: true
//	isAnimated: true,
//	isFitWidth: true,
//	isResizable: true,
//	animationOptions: {
//		duration: 400
//	}

	});
});
