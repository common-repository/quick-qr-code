<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://sharabindu.com/plugins/quick-qr/
 * @since      1.0.2
 *
 * @package    quick-qr
 * @subpackage quick-qr/admin
 */
class quickqr_lite_Admin
{

    /**
     * The option page variable of this plugin.
     *
     * @since    1.0.2
     * @access   private
     * @var      string
     $qrc_option_page_options     option name.
     */
    private $qrc_option_page_options;

    /**
     * The ID of this plugin.
     *
     * @since    1.0.2
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.2
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.2
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        define('QUICKQR_DEFINES_PAGE', 'quick-qr');
        $this->plugin_name = $plugin_name;
        $this->version = $version;


    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.2
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in quickcode_lite_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The quickcode_lite_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style('wp-color-picker');

        wp_enqueue_style($this->plugin_name, QUICK_QR_LITE_URL . 'admin/css/quick-qr-admin.css', array() , $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.2
     */
    public function enqueue_scripts()
    {

       /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in quickcode_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The quickcode_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

    if ( sanitize_title(isset($_GET['page'])) && strpos((sanitize_title($_GET['page'])), QUICKQR_DEFINES_PAGE) !== false) {
         wp_enqueue_script('jquery-bbq', QUICK_QR_LITE_URL . 'admin/js/jquery.bbq.min.js', array() , $this->version, true);

        wp_enqueue_script('custom-script', QUICK_QR_LITE_URL . 'admin/js/custom.js', array(
            'jquery') ,$this->version, false);


    }
    }

    /**
     * Setting link.
     *
     * @since    1.0.2
     */

    public function plugin_settings_link($links)
    {
        if (is_admin())
        {

            return array_merge(array(
                '<a href="' . admin_url('admin.php?page=quick-qr') . '">' . esc_html__('Settings', 'quick-qr') . '</a>',
            ) , $links);
        }
    }

    /**
     * This function is Add Menu page call back function.
     */

    public function admin_menu_define()
    {

        $icon_url = QUICK_QR_LITE_URL . 'admin/img/admin.png';

        add_menu_page(esc_html__('Quick QR', 'quick-qr') , esc_html__('Quick QR', 'quick-qr') , 'manage_options', 'quick-qr', array(
            $this,
            'qrc_option_func'
        ) , $icon_url);

        add_submenu_page('quick-qr', 'Bulk Print QR Code', 'Bulk Print QR Code', 'manage_options', 'quickcode_print', array(
            $this,
            'quickcode_print'
        ));

    }


 function quickcode_print()
     {

         $this->quickcode_print_options = get_option('quickcode_print_option');

         $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'quickqr_print_setting';
          ?>
              <div class="quick-codewrap">
            <div class="quick-admin_code quick-fee_">
                 <ul class="quick-nav_bar_code">
                    <li>
                <a href="https://quickqr.sharabindu.com/elementor/" target="_blank"><?php echo esc_html__('Live Demo', 'quick-qr') ?></a>
                    </li>
                    <li>
                <a href="https://quickqr.sharabindu.com/quick-qr-dashboard/" target="_blank"><?php echo esc_html__('Settings Page', 'quick-qr') ?></a>
                    </li>
                     <li>
                    <a href="https://quickqr.sharabindu.com/" target="_blank"><?php echo esc_html__('Get Pro', 'quick-qr') ?></a>
                         </li>
                         <li>
                    <a href="https://quickqr.sharabindu.com/docs/introduction/" target="_blank"><?php echo esc_html__('Docs', 'quick-qr') ?></a>
                         </li>

                                <li>
                        <a href="https://sharabindu.com/contact-us/" target="_blank"><?php echo esc_html__('Contact Us', 'quick-qr') ?></a>
                         </li>
                 </ul>
                 <ul  class="quick-navhdaer_cnt_code">
                        <li><img src="<?php echo QUICK_QR_LITE_URL . 'admin/img/logo.png' ?>" alt="logo"></li>
                     <li  class="qrc_fd_cnt"> 
                         <h3><?php echo esc_html__('Quick QR Code Bulk Print (PRO)', 'quick-qr') ?> </h3>
                 <small><?php echo esc_html__('Create a Quick QR code', 'quick-qr') ?></small></li>
                 </ul>
        <?php 
             require_once QUICK_QR_LITE_PATH . 'admin/review.php'; ?>
             </div>
               <div class="tirmoof">
                       <div class="tirmoof_menu">
                          <ul>
                             <li class="selected">
                              <a href="?page=quickcode_print&tab=quickqr_print_setting" class="<?php echo $active_tab == 'quickqr_print_setting' ? 'selected-active' : ''; ?>"><?php echo esc_html__('Print Settings(PRO)', 'quick-qr') ?></a>

                             </li>
                             <li>                      <a href="?page=quickcode_print&tab=qrc_print_page" class=" <?php echo $active_tab == 'qrc_print_page' ? 'selected-active' : ''; ?>"><?php echo esc_html__('Print Page(PRO)', 'quick-qr') ?></a></li>
       
                          </ul>
                       </div>
                       <div class="tirmoof_box">
                                      
                    <div id="tirmoof_djkfh">

                    <?php
              
              if ($active_tab == 'quickqr_print_setting')
              {
              
                echo '<img src="'.QUICK_QR_LITE_URL.'/admin/img/print-setting.png">';

              }
              else
              {
                 echo '<img src="'.QUICK_QR_LITE_URL.'/admin/img/print.png">';
              }
          ?>  
                                
              </div>
            </div>
          </div>
         </div>


         <?php
          }


    /**
     * Qrc Optin page admin form
     */

    public function qrc_option_func()
    {
        $options = get_option('quickcode_settings'); ?>



<div class="quick-codewrap">
             <div class="quick-admin_code quick-fee_">
                 <ul class="quick-nav_bar_code">
                    <li>
                        <a href="https://quickqr.sharabindu.com/" target="_blank"><?php echo esc_html__('Live Demo', 'quick-qr') ?></a>
                    </li>
                    <li>
                <a href="https://quickqr.sharabindu.com/quick-qr-dashboard/" target="_blank"><?php echo esc_html__('Dashboard Demo', 'quick-qr') ?></a>
                    </li>
                     <li>
                        <a href="https://quickqr.sharabindu.com/" target="_blank"><?php echo esc_html__('Get Pro', 'quick-qr') ?></a>
                         </li>
                         <li>
                        <a href="https://quickqr.sharabindu.com/docs/introduction/" target="_blank"><?php echo esc_html__('Docs', 'quick-qr') ?></a>
                         </li>
                             <li>
                        <a href="https://sharabindu.com/plugins/quick-qr//contact-us/" target="_blank"><?php echo esc_html__('Contact Us', 'quick-qr') ?></a>
                         </li>
   
                         <li>
                             <a href="https://sharabindu.com/plugins/quick-qr//plugins" target="_blank"><?php echo esc_html__('More Plugins', 'quick-qr') ?></a>
                         </li>
                 </ul>
                 <ul  class="quick-navhdaer_cnt_code">

                        <li>         <img src="<?php echo QUICK_QR_LITE_URL . 'admin/img/logo.png' ?>" alt="logo"></li>
                     <li  class="qrc_fd_cnt"> 
               
                         <h3><?php echo esc_html__('Quick QR Code', 'quick-qr') ?> </h3>
                 <small><?php echo esc_html__('Create a Quick QR code', 'quick-qr') ?></small></li>
             

                 </ul>
        <?php 
             require_once QUICK_QR_LITE_PATH . 'admin/review.php'; ?>

             </div>

          <div class="quick-navhdaercomposer_box">

                        <ul class="quick-tab_dwn at-tabs-when-possible bbq clearfix at-accordion-or-tabs at-tabs ">
                        <li class="selected">
                         <a><?php echo esc_html__('QR Settings', 'quick-qr') ?></a>

                        <section>
                             
            <main><section class="container qr-description" id="qr-description">
                <ul class="row row--body">
                <li class="fstyle_quick-panelrow_child">
        <form class="dfdf_dhgformdtaa" id="form" action="options.php" method="post">
        <?php 

        settings_fields( 'quickcode_settings' );

        do_settings_sections( 'quickqr_section_setting' ); 

        ?>


       <div class="quick-panel quick-panel--open">

        <h3 class="quick-panelsection_title" style='margin-top:0'><?php echo esc_html('Main Options','quick-qr'); ?></h3>
        <label for="form-width"><?php echo esc_html('QR Size','quick-qr'); ?></label>

        <?php
          $qrc_size = isset($options['quick-qr-size']) ? $options['quick-qr-size'] : 300;
          $placeholder = esc_html('Enter a numeric value, e.g: 300', 'quick-qr');

          printf('<input type="number"  name="quickcode_settings[quick-qr-size]"   node="width" id="form-width" type="number" min="100" max="10000" value="%s">
              <p class="description">%s</p>', $qrc_size, $placeholder);

        ?>

        <label for="form-height"><?php echo esc_html('Margin','quick-qr'); ?></label>

        <?php   

        $qrc_margin = isset($options['quick_qr_margin']) ? $options['quick_qr_margin'] : 0;
        $placeholder = esc_html('Enter a numeric value, e.g: 10', 'quick-qr');

        printf('<input type="number"  name="quickcode_settings[quick_qr_margin]"   node="margin" id="form-margin" type="number" min="0" max="10000"  value="%s">
        <p class="description">%s</p>', $qrc_margin, $placeholder); ?>

          </div>

          <div class="quick-panel quichpro"  href="https://quickqr.sharabindu.com/quick-qr-dashboard/">
        <img src="<?php echo QUICK_QR_LITE_URL.'/admin/img/1-min.png'; ?>" alt="Dot Option">
    </div>
          <div class="quick-panel quichpro"  href="https://quickqr.sharabindu.com/quick-qr-dashboard/">
        <img src="<?php echo QUICK_QR_LITE_URL.'/admin/img/2-min.png'; ?>" alt="Dot Option"></div>

          <div class="quick-panel quichpro"  href="https://quickqr.sharabindu.com/quick-qr-dashboard/">
        <img src="<?php echo QUICK_QR_LITE_URL.'/admin/img/3-min.png'; ?>" alt="Dot Option"></div>

          <div class="quick-panel quichpro"  href="https://quickqr.sharabindu.com/quick-qr-dashboard/">
        <img src="<?php echo QUICK_QR_LITE_URL.'/admin/img/4-min.png'; ?>" alt="Dot Option"></div>

        <div class="ghghuterer">

        <ul class="fcyajaxbtn">
        <li>
        <button type="submit" class="quickfilter_sbt_btn"><?php echo esc_html__('Save Changes','quick-qr') ?><span class="quick_sdhi"></span></button>
        </li><li><span class="quick_djkfhjhj"></span></li></ul>
    </div>

        </form></li>

        <li class="fstyle_quick-panelrow_sder">
                <div style="float: none; clear: both;">
                 <div class="quicjqr_ftcs_cont">
                     <h4 class="quicjqr_ftcs__h"><?php echo esc_html__('Upgrade to QR Premium', 'quick-qr') ?></h4>

                     <ul><li><?php echo esc_html__('Gradient Color QR Code', 'quick-qr') ?></li>
                        <li><?php echo esc_html__('Gradient Color Corenrs Eye Irish', 'quick-qr') ?></li>
                        <li><?php echo esc_html__('Gradient Color Corenrs Eye Pupil ', 'quick-qr') ?></li>
                        <li><?php echo esc_html__('Circle, Classy,Square Style QR Code', 'quick-qr') ?></li>
                        <li><?php echo esc_html__('Solid Color QR', 'quick-qr') ?></li>
                         <li><?php echo esc_html__('Logo/image Upload', 'quick-qr') ?></li>

                         <li><?php echo esc_html__('Custom URL or Text QR', 'quick-qr') ?></li>

                         <li><?php echo esc_html__('Google Loaction QR Code', 'quick-qr') ?></li>
                         <li><?php echo esc_html__('Whatsapp Chat QR', 'quick-qr') ?></li>

                         <li><?php echo esc_html__('Wifi Access QR', 'quick-qr') ?></li>

                         <li><?php echo esc_html__('Shortcode with Attribute Supported', 'quick-qr') ?></li>
                         <li><?php echo esc_html__('Bulk vCard Generator', 'quick-qr') ?></li>
                         <li><?php echo esc_html__('QR Bulk Print based on Post type', 'quick-qr') ?></li>
                         <li><?php echo esc_html__('Unlimited Update ("Plus" & "Infinite")', 'quick-qr') ?></li>
                         <li><?php echo esc_html__('Premium support & Many more', 'quick-qr') ?></li>
              
                     </ul>
                     <a class="qrc_gtnow" href="https://quickqr.sharabindu.com/quick-qr-dashboard/" target="_blank"><?php echo esc_html__('Pro Settings Page', 'quick-qr') ?></a>
                 </div>
                     <div class="quicjqr_ftcs_cont" style="margin-top:40px">
                     <h4 class="quicjqr_ftcs__h"><?php echo esc_html__('Benefits of a QR Code With Logo', 'quick-qr') ?></h4>
                     <img src="<?php echo QUICK_QR_LITE_URL.'/admin/img/quicqr-diagram.png'; ?>" alt="Pro Features" />

                     <ul>
                         <li><?php echo esc_html__('Associate your products with brand', 'quick-qr') ?></li>
                         <li><?php echo esc_html__('Boost Website Traffic', 'quick-qr') ?></li>
                         <li><?php echo esc_html__('Create a Social Proof', 'quick-qr') ?></li>
                         <li><?php echo esc_html__('Draw Customers to Your Brand', 'quick-qr') ?></li>
                         <li><?php echo esc_html__('Advertise Event Management', 'quick-qr') ?></li>
                         <li><?php echo esc_html__('Consumers easily jump to your brand ', 'quick-qr') ?></li>
                     </ul>
                     <a class="qrc_gtnow" href="https://quickqr.sharabindu.com/"><?php echo esc_html__('Get Premium', 'quick-qr') ?></a>
                 </div>
             </div>   


    
</li>


    </ul></section></main>
                         </section>



                        </li>


                        <li><a><?php echo esc_html__('Display Setting', 'quick-qr') ?></a>
                    <section>
<ul>

    <li class="fstyle_quick-panelrow_djf">
          <div class="quick-panel"  href="https://quickqr.sharabindu.com/"><strong>
            <label for="crtpageUrl"><?php echo esc_html('Current Page URL Shortcode','quick-qr')?></label></strong>
       <span id="crtpageUrl" class="Cuurent Page">[quick-qr]</span> <p><em> <?php echo esc_html('Copy the short code and paste it in the desired place of your site and see the QR code','quick-qr')?></em></p>
   </div>
          <div class="quick-panel quichpro"  href="https://quickqr.sharabindu.com/">
        <img src="<?php echo QUICK_QR_LITE_URL.'/admin/img/5-min.PNG'; ?>" alt="Dot Option"></div>
          <div class="quick-panel quichpro"  href="https://quickqr.sharabindu.com/">
        <img src="<?php echo QUICK_QR_LITE_URL.'/admin/img/6-min.PNG'; ?>" alt="Dot Option"></div>
          <div class="quick-panel quichpro"  href="https://quickqr.sharabindu.com/">
        <img src="<?php echo QUICK_QR_LITE_URL.'/admin/img/7-min.PNG'; ?>" alt="Dot Option"></div>
          <div class="quick-panel quichpro"  href="https://quickqr.sharabindu.com/">
        <img src="<?php echo QUICK_QR_LITE_URL.'/admin/img/8-min.PNG'; ?>" alt="Dot Option"></div>
          <div class="quick-panel quichpro"  href="https://quickqr.sharabindu.com/">
        <img src="<?php echo QUICK_QR_LITE_URL.'/admin/img/9-min.PNG'; ?>" alt="Dot Option"></div>
          <div class="quick-panel quichpro"  href="https://quickqr.sharabindu.com/">
        <img src="<?php echo QUICK_QR_LITE_URL.'/admin/img/10-min.PNG'; ?>" alt="Dot Option"></div>

               </li></ul>     </section>
                        </li>
  
         
                        <li><a><?php echo esc_html__('vCard QR', 'quick-qr') ?></a>
                    <section>
                           <form class="dfdf_dhgformdt33" id="form" action="options.php" method="post">
                            <div class="quickQR-display">
<?php 


            settings_fields("quickqr_vcard_generator");
            do_settings_sections('quick_vacrd_admin_sec');

 ?>    
        <ul class="fcyajaxbtn">
        <li>
        <button type="submit" class="quickfilter_sbt_btn"><?php echo esc_html__('Save Changes','quick-qr') ?><span class="quick_sd33"></span></button>
        </li><li><span class="quick_djkfh33"></span></li></ul>
</div>
</form>
                    </section>
                        </li>


                     </ul>

     </div>
    </div>



   <?php

    }

}

