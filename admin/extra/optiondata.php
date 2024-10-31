<?php

 $options = get_option('quickcode_settings');

        $current_title = get_the_title(get_the_id());
        $current_id_link = get_the_permalink(get_the_id());

$qrc_size = isset($options['quick-qr-size']) ? $options['quick-qr-size'] : 300;
$qrc_margin = isset($options['quick_qr_margin']) ? $options['quick_qr_margin'] : 0;
$quick_dot_style = isset($options['quick_dot_style']) ? $options['quick_dot_style'] : 'rounded';


$quick_corner_square = isset($options['quick_corner_square']) ? $options['quick_corner_square'] : 'dot';

//Corners Dot 

$quick_corner_dot = isset($options['quick_corner_dot']) ? $options['quick_corner_dot'] : '';


