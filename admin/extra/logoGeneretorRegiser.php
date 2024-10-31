<?php


    register_setting("quickcode_link_generator", "quickcode_link_generator", array());
    
    add_settings_section("logo_quickqr_section_setting", " ", array() , 'quickqr_logo_admin_sec');

    add_settings_field("crntpageshortcode", esc_html__("Current Page URL Shortcode", "quick-qr") , array(
        $this,
        "crntpageshortcode"
    ) , 'quickqr_logo_admin_sec', "logo_quickqr_section_setting" ,['class' => 'quick_qr_bgs2']);

    add_settings_field("quickqrsetttifi", "", array(
        $this,
        "quickqrsettting_log_sec_func"
    ) , 'quickqr_logo_admin_sec', "logo_quickqr_section_setting" ,['class' => 'quick_qr_bgs']);


    add_settings_field("qr_checkbox", esc_html__("Remove QR From Post type (Pro)", "quick-qr") , array(
        $this,
        "qr_checkbox"
    ) , 'quickqr_logo_admin_sec', "logo_quickqr_section_setting" , ['class' => 'quick_qr_bgs wqiydfr']);

    add_settings_field("quickcode_custom_text", esc_html__("Custom Link/Text (Pro)", "quick-qr") , array(
        $this,
        "quickcode_custom_text"
    ) , 'quickqr_logo_admin_sec', "logo_quickqr_section_setting", ['class' => 'quick_qr_bgs2']);

    add_settings_field("quickcode_whatsapp", esc_html__("QR for WhatsApp (Pro)", "quick-qr") , array(
        $this,
        "quickcode_whatsapp"
    ) , 'quickqr_logo_admin_sec', "logo_quickqr_section_setting" , ['class' => 'quick_qr_bgs1']);

    add_settings_field("qr_code_wifi_text", esc_html__("QR for Wifi (Pro)", "quick-qr") , array(
        $this,
        "qr_code_wifi_text"
    ) , 'quickqr_logo_admin_sec', "logo_quickqr_section_setting", ['class' => 'quick_qr_bgs2']);

    add_settings_field("quickcode_maps_text", esc_html__("QR for Maps (Pro)", "quick-qr") , array(
        $this,
        "quickcode_maps_text"
    ) , 'quickqr_logo_admin_sec', "logo_quickqr_section_setting" , ['class' => 'quick_qr_bgs1']);

    add_settings_field("qrc_download_btn", esc_html__("Download QR Button (Pro)", "quick-qr") , array(
        $this,
        "qrc_download_btn"
    ) , 'quickqr_logo_admin_sec', "logo_quickqr_section_setting", ['class' => 'quick_qr_bgs2']);
