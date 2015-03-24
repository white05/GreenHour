window.addEventListener('DOMContentLoaded', function() {
    jQuery("html").queryLoader2({
    	backgroundColor: '#fff',
    	barColor: '#151515',
    	completeAnimation: 'fade',
    	percentage: true,
    	barHeight: 2,
    	onLoadComplete: function () {
    		jQuery('#my-qLoverlay').fadeOut();
    	}
    });
});