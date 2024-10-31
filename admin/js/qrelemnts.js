;(function($){

    "use strict";

	function QUICKQRDSPLAY(){
    var quick_qr = function ($scope) {
        var $carousel = $scope.find(".quickqr_canvas");
        var qckdynamic = $carousel.attr('id');
		
		console.log(qckdynamic);
		console.log($carousel.data("qrwidth"));
		console.log($carousel.data("margin"));
		console.log($carousel.data("contents"));
           const quickqrquickcodePost = new QRCodeStyling({
                   width: $carousel.data("qrwidth"),
                   height: $carousel.data("qrwidth"),
                   type: "canvas",
                   data: $carousel.data("contents"),
                   margin: $carousel.data("margin"),
               
               });

           quickqrquickcodePost.append(document.getElementById(qckdynamic));
           
    };

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/quickcodecode_elemnts.default', quick_qr);
    });

	}QUICKQRDSPLAY();

    

})(jQuery);
