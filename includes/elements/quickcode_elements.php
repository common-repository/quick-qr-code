<?php
 use \Elementor\Controls_Manager;
 use \Elementor\Group_Control_Background;
 use \Elementor\Widget_Base;  


   class quickcode_Elements_Widget extends Widget_Base {
   
       public function get_name() {
           return 'quickcodecode_elemnts';
       }
   
       public function get_title() {
           return esc_html__( 'Quick QR', 'quick_qr' );
       }
      public function get_script_depends() {
         return ['quickqr_elemnts'];
       } 
   
       public function get_icon() {
           return 'eicon-table-of-contents';
       }
   
       public function get_categories() {
           return [ 'quick_qr-category' ];
       }

       protected function register_controls() {
   
               $this->start_controls_section(
               'content_section',
               [
               'label' => esc_html__( 'Quick QR Elements', 'quick_qr' ),
               'tab' => Controls_Manager::TAB_CONTENT,
               ]
               );
              $this->add_control(
               'quickcode_elmnts',
               [
                   'label' => esc_html__( 'Quick QR Elements', 'quick_qr' ),
                   'description'=> esc_html__( 'Choose QR Elements form this dropdown', 'quick_qr' ),
                   'type' => Controls_Manager::SELECT,
                   'default' => 'current_url',
                   'options' => [
                    'current_url'=>  esc_html__( 'Current Url', 'quick_qr' ),
                    'custom_link'=>  esc_html__( 'Custom Link (Pro)', 'quick_qr' ),
                    'whatsapp'=>  esc_html__( 'WhatsApp (Pro)', 'quick_qr' ),
                    'gmaps'=>  esc_html__( 'Google Map (Pro)', 'quick_qr' ),
                    'email'=>  esc_html__( 'Email (Pro)', 'quick_qr' ),
                    'tele_phone'=>  esc_html__( 'Phone Number (Pro)', 'quick_qr' ),
                    'wifi'=>  esc_html__( 'Wifi Access (Pro)', 'quick_qr' ),
                    'contactinfo'=>  esc_html__( 'Contact info(Vcard)(Pro)', 'quick_qr' ),

                   ],
               ]
           );  
    
              $this->add_control(
                  'quickcode_contact_name',
                  [
                      'label' => esc_html__( 'Name:', 'quick_qr' ),
                      'type' => Controls_Manager::TEXT,
                      'condition' =>[
                          'quickcode_elmnts' => 'contactinfo',
                      ],
                  ]
              );

              $this->add_control(
                  'quickcode_contact_company',
                  [
                      'label' => esc_html__( 'Company:', 'quick_qr' ),
                      'type' => Controls_Manager::TEXT,
                      'condition' =>[
                          'quickcode_elmnts' => 'contactinfo',
                      ],
                  ]
              );

              $this->add_control(
                  'quickcode_contact_title',
                  [
                      'label' => esc_html__( 'Sub Title:', 'quick_qr' ),
                      'type' => Controls_Manager::TEXT,
                      'condition' =>[
                          'quickcode_elmnts' => 'contactinfo',
                      ],
                  ]
              );

              $this->add_control(
                  'quickcode_mobile',
                  [
                      'label' => esc_html__( 'Mobile Number:', 'quick_qr' ),
                      'type' => Controls_Manager::TEXT,
                      'condition' =>[
                          'quickcode_elmnts' => 'contactinfo',
                      ],
                  ]
              );

              $this->add_control(
                  'quickcode_Phone',
                  [
                      'label' => esc_html__( 'Phone Number:', 'quick_qr' ),
                      'type' => Controls_Manager::TEXT,
                      'condition' =>[
                          'quickcode_elmnts' => 'contactinfo',
                      ],
                  ]
              );
              $this->add_control(
                  'quickcode_email',
                  [
                      'label' => esc_html__( 'Email:', 'quick_qr' ),
                      'type' => Controls_Manager::TEXT,
                      'condition' =>[
                          'quickcode_elmnts' => 'contactinfo',
                      ],
                  ]
              );

              $this->add_control(
                  'quickcode_contact_website',
                  [
                      'label' => esc_html__( 'Website:', 'quick_qr' ),
                      'type' => Controls_Manager::TEXT,
                      'condition' =>[
                          'quickcode_elmnts' => 'contactinfo',
                      ],
                  ]
              );
              $this->add_control(
                  'quickcode_contact_address',
                  [
                      'label' => esc_html__( 'Address:', 'quick_qr' ),
                      'type' => Controls_Manager::TEXTAREA,
                      'quick-panelrows' => 2,
                      'condition' =>[
                          'quickcode_elmnts' => 'contactinfo',
                      ],
                  ]
              );
              $this->add_control(
                  'quickcode_contact_note',
                  [
                      'label' => esc_html__( 'Note:', 'quick_qr' ),
                      'type' => Controls_Manager::TEXTAREA,
                      'quick-panelrows' => 2,
                      'condition' =>[
                          'quickcode_elmnts' => 'contactinfo',
                      ],
                  ]
              );

           $this->add_control(
            'tele_phone_number',
            [
              'label' => esc_html__( 'Phone Number', 'quick_qr' ),
              'type' => Controls_Manager::TEXT,
              'default' => esc_html__( '+15623526019', 'quick_qr' ),
              'placeholder' => esc_html__( 'Type Phone Number here', 'quick_qr' ),
              'condition' =>[
                'quickcode_elmnts' => 'tele_phone'
              ]
            ]
           );    
           $this->add_control(
            'whatsapp_number',
            [
              'label' => esc_html__( 'WhatsApp Number', 'quick_qr' ),
              'type' => Controls_Manager::TEXT,
              'default' => esc_html__( '+15623526019', 'quick_qr' ),
              'placeholder' => esc_html__( 'Type WhatsApp Number here', 'quick_qr' ),
              'condition' =>[
                'quickcode_elmnts' => 'whatsapp'
              ]
            ]
           );   
           $this->add_control(
            'email_address',
            [
              'label' => esc_html__( 'Email', 'quick_qr' ),
              'type' => Controls_Manager::TEXT,
              'default' => esc_html__( 'sharabindu.bakshi@gmail.com', 'quick_qr' ),
              'placeholder' => esc_html__( 'Type Email here', 'quick_qr' ),
              'condition' =>[
                'quickcode_elmnts' => 'email'
              ]
            ]
           );

           $this->add_control(
            'wifi_name',
            [
              'label' => esc_html__( 'Wifi Name', 'quick_qr' ),
              'type' => Controls_Manager::TEXT,
              'default' => esc_html__( 'Uwifi', 'quick_qr' ),
              'placeholder' => esc_html__( 'Type Wifi name here', 'quick_qr' ),
              'condition' =>[
                'quickcode_elmnts' => 'wifi'
              ]
            ]
           );
           $this->add_control(
            'wifi_type',
            [
              'label' => esc_html__( 'Wifi Type', 'quick_qr' ),
              'type' => Controls_Manager::TEXT,
              'default' => esc_html__( 'WPA', 'quick_qr' ),
              'placeholder' => esc_html__( 'Type Wifi Type here', 'quick_qr' ),
              'condition' =>[
                'quickcode_elmnts' => 'wifi'
              ]
            ]
           );
           $this->add_control(
            'wifi_password',
            [
              'label' => esc_html__( 'Wifi Password', 'quick_qr' ),
              'type' => Controls_Manager::TEXT,
              'default' => esc_html__( 'WPA', 'quick_qr' ),
              'placeholder' => esc_html__( 'Type Wifi Password here', 'quick_qr' ),
              'condition' =>[
                'quickcode_elmnts' => 'wifi'
              ]
            ]
           );
           $this->add_control(
            'g_latitude',
            [
              'label' => esc_html__( 'latitude', 'quick_qr' ),
              'type' => Controls_Manager::TEXT,
              'default' => esc_html__( '24.2015042', 'quick_qr' ),
              'placeholder' => esc_html__( 'Type latitude here', 'quick_qr' ),
              'condition' =>[
                'quickcode_elmnts' => 'gmaps'
              ]
            ]
           );
           $this->add_control(
            'g_longitude',
            [
              'label' => esc_html__( 'longitude', 'quick_qr' ),
              'type' => Controls_Manager::TEXT,
              'default' => esc_html__( '88.9968031', 'quick_qr' ),
              'placeholder' => esc_html__( 'Type longitude here', 'quick_qr' ),
              'condition' =>[
                'quickcode_elmnts' => 'gmaps'
              ]
            ]
           );
           $this->add_control(
            'g_query',
            [
              'label' => esc_html__( 'Query', 'quick_qr' ),
              'type' => Controls_Manager::TEXT,
              'default' => esc_html__( 'Sharabindu Bakshi', 'quick_qr' ),
              'placeholder' => esc_html__( 'Type Query here', 'quick_qr' ),
              'condition' =>[
                'quickcode_elmnts' => 'gmaps'
              ]
            ]
           );
           $this->add_control(
            'custom_link_generator',
            [
              'label' => esc_html__( 'Custom Link', 'quick_qr' ),
              'type' => Controls_Manager::TEXT,
              'default' => esc_html__( 'https://quickqr.sharabindu.com/', 'quick_qr' ),
              'placeholder' => esc_html__( 'Type Custom Link here', 'quick_qr' ),
              'condition' =>[
                'quickcode_elmnts' => 'custom_link'
              ]
            ]
           );


           $this->add_control(
               'qr_width',
               [
                   'label' => esc_html__( 'QR Width', 'quick_qr' ),
                   'description'=> esc_html__( 'input a Square Value(width X height)', 'quick_qr' ),
                   'type' => Controls_Manager::TEXT,
                   'default' => esc_html__( '300', 'quick_qr' ),
                   'placeholder' => esc_html__( 'Type QR Width here', 'quick_qr' ),

               ]
           );

           
           $this->add_control(
            'quick_qr_margin',
            [
              'label' => __( 'Margin', 'quick_qr' ),
              'description'=> esc_html__( 'Enter a numeric value, e.g: 10', 'quick_qr' ),

              'type' => Controls_Manager::NUMBER,
              'min' => 5,
              'max' => 50,
              'step' => 5,
              'default' => 0,

            ]
           );
            $this->add_control(
             'qrc_text_align',
             [
               'label' => __( 'QR Alignment', 'qrc' ),
               'type' => Controls_Manager::CHOOSE,
               'options' => [
                 'left' => [
                   'title' => __( 'Left', 'qrc' ),
                   'icon' => 'eicon-text-align-left',
                 ],
                 'center' => [
                   'title' => __( 'Center', 'qrc' ),
                   'icon' => 'eicon-text-align-center',
                 ],
                 'right' => [
                   'title' => __( 'Right', 'qrc' ),
                   'icon' => 'eicon-text-align-right',
                 ],
               ],
               'default' => 'center',
               'toggle' => true,
               'selectors' => [
                 '{{WRAPPER}} .quickqr_elementr_wrapeer' => 'text-align: {{VALUE}};',
               ],
             ]
            );
          $this->add_control(
            'dot_options',
            [
              'label' => __( 'Dots Options(PRO)', 'plugin-name' ),
              'type' => \Elementor\Controls_Manager::HEADING,
              'separator' => 'before',
            ]
          );


           $this->add_control(
            'quick_dot_style',
            [
              'label' => __( 'Dots Style:', 'quick_qr' ),
              'type' => Controls_Manager::SELECT,
              'default' => 'rounded',
              'options' => [
                  'square' => __( 'Square', 'quick_qr' ),
                  'dots' => __( 'Dots (Pro)', 'quick_qr' ),
                  'rounded' => __( 'Rounded (Pro)', 'quick_qr' ),
                  'extra-rounded' => __( 'Extra Rounded (Pro)', 'quick_qr' ),
                  'classy' => __( 'Classy (Pro)', 'quick_qr' ),
                  'classy-rounded' => __( 'Classy Rounded', 'quick_qr' ),
              ],


            ]
           );
          $this->add_control(
            'quick_dot_sing_colr',
            [
              'label' => __( 'Color type (Pro)', 'plugin-domain' ),
              'type' => \Elementor\Controls_Manager::CHOOSE,
              'options' => [
                'single-color' => [
                  'title' => __( 'Color', 'plugin-domain' ),
                  'icon' => ' eicon-circle',
                ],
                'gradient' => [
                  'title' => __( 'Gradient', 'plugin-domain' ),
                  'icon' => 'eicon-adjust',
                ],
              ],
              'default' => 'single-color',
              'toggle' => false,
            ]
          );
           $this->add_control(
               'dot_sing_color',
               [
                   'label' => esc_html__( 'QR Dot Color (Pro)', 'quick_qr' ),
                   'type' => Controls_Manager::COLOR,
                   'default' => '#1C0457',

                'condition' =>[

                    'quick_dot_sing_colr' => 'single-color',
                            ]

               ]
           );

           $this->add_control(
               'fny_dot_gra_1_clr',
               [
                   'label' => esc_html__( 'Color (Pro)', 'quick_qr' ),
                   'type' => Controls_Manager::COLOR,
                   'default' => '#1C0457',

                'condition' =>[

                    'quick_dot_sing_colr' => 'gradient',
                            ]

               ]
           );
           $this->add_control(
               'fny_dot_gra_2_clr',
               [
                   'label' => esc_html__( 'Second Color (Pro)', 'quick_qr' ),
                   'type' => Controls_Manager::COLOR,
                   'default' => '#C60093',

                'condition' =>[

                    'quick_dot_sing_colr' => 'gradient',
                            ]

               ]
           );
           $this->add_control(
            'dots_grad_type_liner',
            [
              'label' => __( 'Type:', 'quick_qr' ),
              'type' => Controls_Manager::SELECT,
              'default' => 'linear',
              'options' => [
                  'linear' => __( 'Linear', 'quick_qr' ),
                  'radial' => __( 'Radial', 'quick_qr' ),

              ],

                'condition' =>[

                    'quick_dot_sing_colr' => 'gradient',
                            ]

            ]
           );
          $this->add_control(
            'fny_dot_gra_rota',
            [
              'label' => __( 'Roatation', 'plugin-domain' ),
              'type' => \Elementor\Controls_Manager::NUMBER,
              'min' => 0,
              'max' => 360,
              'step' => 1,
              'default' => 0,

                'condition' =>[

                    'quick_dot_sing_colr' => 'gradient',
                            ]
            ]
          );

           $this->add_control(
            'quick_dot_correction_level',
            [
              'label' => __( 'Error Correction Level (Pro):', 'quick_qr' ),
              'type' => Controls_Manager::SELECT,
              'default' => 'L',
              'options' => [
                  'L' => __( 'L', 'quick_qr' ),
                  'M' => __( 'M', 'quick_qr' ),
                  'Q' => __( 'Q', 'quick_qr' ),
                  'H' => __( 'H', 'quick_qr' ),
              ],


            ]
           );

          $this->add_control(
            'csq_options',
            [
              'label' => __( 'Corners Eye Irish Options (Pro)', 'plugin-name' ),
              'type' => \Elementor\Controls_Manager::HEADING,
              'separator' => 'before',
            ]
          );


           $this->add_control(
            'quick_corner_square',
            [
              'label' => __( 'Eye Irish Style:', 'quick_qr' ),
              'type' => Controls_Manager::SELECT,
              'default' => 'square',
              'options' => [
                  'square' => __( 'Square', 'quick_qr' ),
                  '' => __( 'Classy', 'quick_qr' ),
                  'circle' => __( 'Circle', 'quick_qr' ),
                  'extrarounded' => __( 'Classy rounded', 'quick_qr' ),

              ],


            ]
           );

            $this->add_control(
              'quick_corder_checked',
              [
              'label' => __( 'Color type', 'plugin-domain' ),
              'type' => \Elementor\Controls_Manager::CHOOSE,
              'options' => [
                'single-color' => [
                  'title' => __( 'Color', 'plugin-domain' ),
                  'icon' => ' eicon-circle',
                ],
                'gradient' => [
                  'title' => __( 'Gradient', 'plugin-domain' ),
                  'icon' => 'eicon-adjust',
                ],
              ],
              'default' => 'single-color',
              'toggle' => false,
            ]

            );

           $this->add_control(
               'corner_sq_single_color',
               [
                   'label' => esc_html__( 'QR Dot Color', 'quick_qr' ),
                   'type' => Controls_Manager::COLOR,
                   'default' => '#1C0457',

                'condition' =>[

                    'quick_corder_checked' => 'single-color',
                            ]

               ]
           );
    

           $this->add_control(
               'quick_corder_sq_grd_1_color',
               [
                   'label' => esc_html__( 'Color', 'quick_qr' ),
                   'type' => Controls_Manager::COLOR,
                   'default' => '#1C0457',

                'condition' =>[

                    'quick_corder_checked' => 'gradient',
                            ]

               ]
           );
           $this->add_control(
               'quick_corder_sq_grd_2_color',
               [
                   'label' => esc_html__( 'Second Color', 'quick_qr' ),
                   'type' => Controls_Manager::COLOR,
                   'default' => '#06BA00',

                'condition' =>[

                    'quick_corder_checked' => 'gradient',
                            ]

               ]
           );
           $this->add_control(
            'quick_conr_sq_grd_type',
            [
              'label' => __( 'Type:', 'quick_qr' ),
              'type' => Controls_Manager::SELECT,
              'default' => 'linear',
              'options' => [
                  'linear' => __( 'Linear', 'quick_qr' ),
                  'radial' => __( 'Radial', 'quick_qr' ),

              ],

                'condition' =>[

                    'quick_corder_checked' => 'gradient',
                            ]

            ]
           );
          $this->add_control(
            'quick_corder_roatte',
            [
              'label' => __( 'Roatation', 'plugin-domain' ),
              'type' => \Elementor\Controls_Manager::NUMBER,
              'min' => 0,
              'max' => 360,
              'step' => 1,
              'default' => 0,

                'condition' =>[

                    'quick_corder_checked' => 'gradient',
                            ]
            ]
          );


          $this->add_control(
            'cdt_options',
            [
              'label' => __( 'Corners Eye Pupil Options(Pro)', 'plugin-name' ),
              'type' => \Elementor\Controls_Manager::HEADING,
              'separator' => 'before',
            ]
          );


           $this->add_control(
            'quick_corner_dot',
            [
              'label' => __( 'Eye Pupil Style:', 'quick_qr' ),
              'type' => Controls_Manager::SELECT,
              'default' => 'square',
              'options' => [
                  'square' => __( 'Square', 'quick_qr' ),
                  '' => __( 'Classy', 'quick_qr' ),
                  'circle' => __( 'Circle', 'quick_qr' ),

              ],


            ]
           );

            $this->add_control(
              'quick_corder_dot_cl_type',
              [
              'label' => __( 'Color type', 'plugin-domain' ),
              'type' => \Elementor\Controls_Manager::CHOOSE,
              'options' => [
                'single-color' => [
                  'title' => __( 'Color', 'plugin-domain' ),
                  'icon' => ' eicon-circle',
                ],
                'gradient' => [
                  'title' => __( 'Gradient', 'plugin-domain' ),
                  'icon' => 'eicon-adjust',
                ],
              ],
              'default' => 'single-color',
              'toggle' => false,
            ]
            );

           $this->add_control(
               'quick_corder_dot_color',
               [
                   'label' => esc_html__( 'QR Dot Color', 'quick_qr' ),
                   'type' => Controls_Manager::COLOR,
                   'default' => '#1C0457',

                'condition' =>[

                    'quick_corder_dot_cl_type' => 'single-color',
                            ]

               ]
           );
           $this->add_control(
               'quick_corder_dot_grd_Color1',
               [
                   'label' => esc_html__( 'Color', 'quick_qr' ),
                   'type' => Controls_Manager::COLOR,
                   'default' => '#1C0457',

                'condition' =>[

                    'quick_corder_dot_cl_type' => 'gradient',
                            ]

               ]
           );
           $this->add_control(
               'quick_corder_dot_grd_Color2',
               [
                   'label' => esc_html__( 'Second Color', 'quick_qr' ),
                   'type' => Controls_Manager::COLOR,
                   'default' => '#1C0457',

                'condition' =>[

                    'quick_corder_dot_cl_type' => 'gradient',
                            ]

               ]
           );
           $this->add_control(
            'corder_dot_grd_linear',
            [
              'label' => __( 'Type:', 'quick_qr' ),
              'type' => Controls_Manager::SELECT,
              'default' => 'linear',
              'options' => [
                  'linear' => __( 'Linear', 'quick_qr' ),
                  'radial' => __( 'Radial', 'quick_qr' ),

              ],

                'condition' =>[

                    'quick_corder_dot_cl_type' => 'gradient',
                            ]

            ]
           );
          $this->add_control(
            'quick_corder_dot_rotation',
            [
              'label' => __( 'Roatation', 'plugin-domain' ),
              'type' => \Elementor\Controls_Manager::NUMBER,
              'min' => 0,
              'max' => 360,
              'step' => 1,
              'default' => 0,

                'condition' =>[

                    'quick_corder_dot_cl_type' => 'gradient',
                            ]
            ]
          );


           $this->end_controls_section(); 

           
           $this->start_controls_section(
           'logo_section',
           [
           'label' => esc_html__( 'Image Options (PRO)', 'quick_qr' ),
           'tab' => Controls_Manager::TAB_CONTENT,
           ]
           );


           $this->add_control(
            'enable_logo',
            [
              'label' => esc_html__( 'Enable Logo?', 'quick_qr' ),
              'type' => \Elementor\Controls_Manager::SWITCHER,
              'label_on' => esc_html__( 'Show', 'your-plugin' ),
              'label_off' => esc_html__( 'Hide', 'your-plugin' ),
              'return_value' => 'yes',
              'default' => 'no',

            ]
           );

           $this->add_control(
            'quick_qr_logo',
            [
              'label' => esc_html__( 'Logo Image', 'quick_qr' ),
              'type' => Controls_Manager::MEDIA,
              'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),


              ],

              'condition' =>[

                  'enable_logo' => 'yes',
                          ]

            ]
           );
          $this->add_control(
            'quick_qr_logosize',
            [
              'label' => __( 'Image Size', 'plugin-domain' ),
              'type' => \Elementor\Controls_Manager::NUMBER,
              'min' => 0,
              'max' => 1,
              'step' => 0.1,
              'default' => 0.4,
            ]
          );
          $this->add_control(
            'quick_qr_logomargin',
            [
              'label' => __( 'Margin', 'plugin-domain' ),
              'type' => \Elementor\Controls_Manager::NUMBER,
              'min' => 0,
              'max' => 100,
              'step' => 5,
              'default' => 0,
            ]
          );
          $this->add_control(
          'hide_bg_docts',
          [
          'label' => __( 'Hide Background Dots', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => __( 'Show', 'your-plugin' ),
          'label_off' => __( 'Hide', 'your-plugin' ),
          'return_value' => 'yes',
          'default' => 'yes',
          ]
          );

           
        $this->end_controls_section(); 

        $this->start_controls_section(
           'btns_section',
           [
           'label' => esc_html__( 'Download Button (PRO)', 'quick_qr' ),
           'tab' => Controls_Manager::TAB_CONTENT,
           ]
           );
          $this->add_control(
             'enable_downbtn',
             [
               'label' => esc_html__( 'Enable Download Button?', 'qrc' ),
               'type' => \Elementor\Controls_Manager::SWITCHER,
               'label_on' => esc_html__( 'Show', 'your-plugin' ),
               'label_off' => esc_html__( 'Hide', 'your-plugin' ),
               'return_value' => 'yes',
               'default' => 'no',
             ]
            );

            $this->add_control(
             'btn_text',
             [
               'label' => esc_html__( 'Button Label', 'qrc' ),
               'type' => Controls_Manager::TEXT,
               'default' => esc_html__( 'Download QR', 'qrc' ),
               'placeholder' => esc_html__( 'Type Button Label here', 'qrc' ),

               'condition' =>[
                 'enable_downbtn' => 'yes'
               ]
             ]
            );

         
            $this->add_responsive_control(
             'btn_padding',
             [
               'label' => __( 'Button Padding', 'qrc' ),
               'type' => Controls_Manager::SLIDER,
               'size_units' => [ 'px'],
               'range' => [
                 'px' => [
                   'min' => 0,
                   'max' => 30,
                   'step' => 1,
                 ],
               ],
               'default' => [
                 'unit' => 'px',
                 'size' => 10,
               ],
               'selectors' => [
                 '{{WRAPPER}} .quickqr_btn_canvas' => 'padding: {{SIZE}}{{UNIT}} 0;',
               ],
               'condition' =>[
                 'enable_downbtn' => 'yes'
               ]
             ]
            );
            $this->add_responsive_control(
             'btn_margin',
             [
               'label' => __( 'Button margin from top', 'qrc' ),
               'type' => Controls_Manager::SLIDER,
               'size_units' => [ 'px'],
               'range' => [
                 'px' => [
                   'min' => 10,
                   'max' => 100,
                   'step' => 10,
                 ],
               ],
               'default' => [
                 'unit' => 'px',
                 'size' => 20,
               ],
               'selectors' => [
                 '{{WRAPPER}} .quickqr_btn_canvas' => 'margin: {{SIZE}}{{UNIT}} 0;',
               ],
               'condition' =>[
                 'enable_downbtn' => 'yes'
               ]
             ]
            );      

         $this->add_control(
              'btn_bg_color',
              [
                  'label' => esc_html__( 'Download Button Background', 'qrc' ),
                  'type' => Controls_Manager::COLOR,
                  'default' => '#9404ad',
                  'selectors' => [
                    '{{WRAPPER}} .quickqr_btn_canvas' => 'background:{{UNIT}};',
                  ],
                  'condition' =>[
                    'enable_downbtn' => 'yes'
                  ]
              ]
          );

          $this->add_control(
              'btn_color',
              [
                  'label' => esc_html__( 'Download Button Color', 'qrc' ),
                  'type' => Controls_Manager::COLOR,
                  'default' => '#fff',
                  'selectors' => [
                    '{{WRAPPER}} .quickqr_btn_canvas' => 'color:{{UNIT}};',
                  ],
                  'condition' =>[
                    'enable_downbtn' => 'yes'
                  ]
              ]
          );


        $this->end_controls_section(); 


       }
   
       /**
        * Render oEmbed widget output on the frontend.
        *
        * Written in PHP and used to generate the final HTML.
        *
        * @since 1.0.2
        * @access protected
        */
       protected function render() {
   
           $settings = $this->get_settings_for_display();
     
          $random_id = rand(10, 100000);


  
        global $wp;
          $mater_qr_content = home_url(add_query_arg(array() , $wp->request));
          $current_title  = get_the_title();
$qrc_size = isset($settings['qr_width']) ? $settings['qr_width'] : 300;
$qrc_margin = isset($settings['quick_qr_margin']) ? $settings['quick_qr_margin'] : '';

          $this->add_render_attribute(
              'quickcode_attributes',
              [
                  'class'             => 'quickqr_canvas',
                  'id'                => 'quickqrelem-'.esc_attr($random_id ),
                  'data-qrwidth'      => $qrc_size,
                  'data-margin'      => $qrc_margin,
                  'data-contents' => $mater_qr_content,
              ]
          );



          $this->add_render_attribute(
              'quickcode_btn',
              [
                  'class'                 => 'btn_canvas',
                  'id'                    => 'downloadbuton-'.esc_attr($random_id ),
                  'download' => $current_title . '.png',

              ]
          );  
?>
          <div class="quickqr_elementr_wrapeer">
          <div <?php echo $this->get_render_attribute_string('quickcode_attributes');?>></div>
          </div>


<?php  
          


}



}