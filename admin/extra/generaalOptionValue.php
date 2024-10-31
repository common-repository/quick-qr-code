<?php

    global $wp;
    $current_id_link = home_url(add_query_arg(array() , $wp->request));

    $current_id = get_the_ID();
    $current_title = get_the_title(get_the_id());
    $qrc_meta_display = get_post_meta($current_id, 'quickcode_meta', true);

    $qrc_qr_image = '';

    $options = get_option('quickcode_settings');
            $optionsTyh = get_option('quickcode_link_generator');

        if (!empty($optionsTyh))
        {
            $singlular_exclude = is_singular($optionsTyh);
        }
        else
        {
            $singlular_exclude = '';
        }



        include QUICK_QR_LITE_PATH . '/admin/extra/optiondata.php';

 
