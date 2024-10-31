(function($){$(document).ready(function(){"use strict";$(".quichpro").click(function(){var cvskdjs=$(this).attr('href');console.log(cvskdjs);window.location=$(this).attr('href')});function save_main_options_ajax(){$('.dfdf_dhgformdtaa').submit(function(){$('.quick_sdhi').addClass("quickLoaderCss");$('.quick_djkfhjhj').hide();var b=$(this).serialize();$.post('options.php',b).error(function(){alert('error')}).success(function(){$(".quick_sdhi").removeClass("quickLoaderCss");$('.quick_djkfhjhj').show();$('.quick_djkfhjhj').html('<span class="dashicons dashicons-saved"></span>')});return!1});$('.dfdf_dhgformdt22').submit(function(){$('.quick_sd22').addClass("quickLoaderCss");$('.quick_djkfhj22').hide();var b=$(this).serialize();$.post('options.php',b).error(function(){alert('error')}).success(function(){$(".quick_sd22").removeClass("quickLoaderCss");$('.quick_djkfhj22').show();$('.quick_djkfhj22').html('<span class="dashicons dashicons-saved"></span>')});return!1});$('.dfdf_dhgformdt33').submit(function(){$('.quick_sd33').addClass("quickLoaderCss");$('.quick_djkfh33').hide();var b=$(this).serialize();$.post('options.php',b).error(function(){alert('error')}).success(function(){$(".quick_sd33").removeClass("quickLoaderCss");$('.quick_djkfh33').show();$('.quick_djkfh33').html('<span class="dashicons dashicons-saved"></span>')});return!1})}
save_main_options_ajax()})})(jQuery)

(function($) {
    $(document).ready(function() {
        $('#qr_print_tzx_ty').on('change', function() {
            $('#qr_print_product_ty').hide();
            if ($(this).val() == 'product_cat') {
                $('#qr_print_product_ty').show();
                $('#qr_print_cat_ty').hide()
            } else {
                $('#qr_print_product_ty').hide();
                $('#qr_print_cat_ty').show()
            }
        });

	
		
    })
})(jQuery);
