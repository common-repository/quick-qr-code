<?php
/**
 * The file that defines admin area
 *
 * public-facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com/plugins/quick-qr/
 * @since      1.0.2
 *
 * @package    quick_qr
 * @subpackage quick_qr/admin
 */

function quickcode_currentshtcode($random_id,$current_id_link,$qrc_size,$qrc_margin,$quick_dot_style,$quick_corner_square){

    return sprintf('<div id="quickcanvid_'.$random_id.'"></div><script>

           const quickqr_shotcode'.$random_id.' = new QRCodeStyling({
                   width: %s,
                   height: %s,
                   type: "canvas",
                   data: "%s",
                margin: %s, 
               });

            quickqr_shotcode'.$random_id.'.append(document.getElementById("quickcanvid_'.$random_id.'"));
    </script>',$qrc_size,$qrc_size,$current_id_link,$qrc_margin);




}

