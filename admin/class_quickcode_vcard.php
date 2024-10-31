<?php
/**
 * The file that defines the bulk qrc_download admin area
 *
 * -facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com/plugins/quick-qr/
 * @since      3.2.2
 *
 * @package    quick-qr_pro
 * @subpackage quick-qr_pro/admin
 */

class quickQR_vCard{

    public function __construct()
    {

    add_action('admin_init', array($this ,'quickqr_vcard_generator_page'));



}


public function quickqr_vcard_generator_page()
{
    register_setting("quickqr_vcard_generator", "quickqr_vcard_generator", array($this ,'qr_log_option_page_sanitize'));
        

        add_settings_section("quickqr_vacrd_admin__section", " ",array($this , "quickqrsettting_log_sec_func"), 'quick_vacrd_admin_sec');

        add_settings_field("qr_checkbox_vcrad", esc_html__("Select Post type for Enable vCard Metabox (PRO)", "quick-qr") ,array($this , "qr_checkbox"), 'quick_vacrd_admin_sec', "quickqr_vacrd_admin__section",['class' => 'quick_qr_bgs2']);


        add_settings_field("qrc_metavcard_display", esc_html__("Display After The Content(Automatically) (PRO)", "quick-qr") ,array($this , "qrc_metavcard_display"), 'quick_vacrd_admin_sec', "quickqr_vacrd_admin__section",['class' => 'quick_qr_bgs2']);



}
    public function quickqrsettting_log_sec_func()
    {

        echo '<div class="QuickRautodisplay"><p><b>'.esc_html("Since this is a premium feature, you can see how it works by post type, click and save the post type and go to posts and see the vcard meta box options", "quick-qr").'</b></p></div>';
    }

function qr_checkbox()
{
 echo '<div class="QuickRautodisplayMetas" style="text-align:left">'.esc_html("These vCard QR codes are generated and displayed based on the post type", "quick-qr").'</div>';

    $excluded_posttypes = array('attachment','revision','nav_menu_item','custom_css','customize_changeset','oembed_cache','user_request','wp_block','scheduled-action','product_variation','shop_order','shop_order_refund','shop_coupon','elementor_library','e-landing-page','wp_template');

    $types = get_post_types();
    $post_types = array_diff($types, $excluded_posttypes);

    foreach ($post_types as $post_type)
    {
        $post_type_title = get_post_type_object($post_type);

        $options = get_option('quickqr_vcard_generator');

        $checked = isset($options[$post_type]) ? 'checked' : '';

        printf('<p><input type="checkbox" id="%s" class="quickcode-apple-switch" value="%s" name="quickqr_vcard_generator[%s]" %s>
            <label for ="%s" id="qr-label-wrap"><strong>' . $post_type_title->labels->name . '</strong></label></p></br>', $post_type, $post_type, $post_type, $checked, $post_type);

    }


        printf ('<div><em>Clicking on this Switcher button will show the vcard metadata in that post type <a href="https://quickqr.sharabindu.com/docs/vcard-metabox/" style="color:#9bc100;text-decoration:underline">View Docs</a></<em></div>');
}
function qrc_metavcard_display()
{


        printf('<p><input type="checkbox" class="quickcode-apple-switch" value="quick_vcard_displaymenta"></p><div style="margin-top:10px"><em>Clicking this switcher button will automatically display the QR Code after the content in the frontend</<em></div>');

    }

/**
 * This function is a callback function of  add seeting field
 */

/**
 * admin form field validation
 */

public function qr_log_option_page_sanitize($input)
{
    $sanitary_values = array();


    $post_types = get_post_types();

    foreach ($post_types as $post_type)
    {

        if (isset($input[$post_type]))
        {
            $sanitary_values[$post_type] = $input[$post_type];
        }
    }

    return $sanitary_values;
}

}
if(class_exists('quickQR_vCard')){

    new quickQR_vCard();
}