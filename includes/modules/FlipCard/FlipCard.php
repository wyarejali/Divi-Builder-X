<?php

class DIBX_Flip_Card extends DIBX_Module_Core {

    protected $module_credits = array(
        'module_uri' => DIBX_DIVI_BUILDER_X_WEBSITE . 'modules/flip-card/',
        'author'     => DIBX_DIVI_BUILDER_X_AUTHOR,
        'author_uri' => DIBX_DIVI_BUILDER_X_WEBSITE
    );

    public function init() {
        $this->name             = esc_html__( 'Flip Card', 'dibx-divi-builder-x' );
        $this->icon_path        = $this->dibx_module_icon('flip-card');
        $this->slug             = 'dibx_flip_card';
        $this->vb_support       = 'on';
        $this->folder_name      = 'Divi Builder X';
        $this->main_css_element = '%%order_class%%';

        $this->settings_modal_toggles = array(
            'general'                       => array(
                'toggles'                   => array(
                    'content'               => array(
                        'title'             => esc_html__( 'Content', 'dibx-divi-builder-x' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'front_side'    => array(
                                'name'      => esc_html__( 'Front Side', 'dibx-divi-builder-x' ),
                            ),
                            'back_side'     => array(
                                'name'      => esc_html__( 'Back Side', 'dibx-divi-builder-x' ),
                            ),
                        )
                    ),
                    'settings'              => esc_html__( 'Settings', 'dibx-divi-builder-x' ),
                    'front_bg'              => esc_html__( 'Background Front Side', 'dibx-divi-builder-x' ),
                    'back_bg'               => esc_html__( 'Background Back Side', 'dibx-divi-builder-x' ),
                ),
            ),

            'advanced'                      => array(
                'toggles'                   => array(
                    'alignment'             => array(
                        'title'             => esc_html__( 'Alignment', 'dibx-divi-builder-x' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'front'         => array(
                                'name'      => esc_html__( 'Front', 'dibx-divi-builder-x' ),
                            ),
                            'back'          => array(
                                'name'      => esc_html__( 'Back', 'dibx-divi-builder-x' ),
                            ),
                        )
                    ),

                    'image_icon'            => array(
                        'title'             => esc_html__( 'Image & Icon', 'dibx-divi-builder-x' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'front'         => array(
                                'name'      => esc_html__( 'Front', 'dibx-divi-builder-x' ),
                            ),
                            'back'          => array(
                                'name'      => esc_html__( 'Back', 'dibx-divi-builder-x' ),
                            ),
                        )
                    ),

                    'custom_spacing'        => array(
                        'title'             => esc_html__( 'Custom Spacing', 'dibx-divi-builder-x' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'wrapper'     => array(
                                'name'      => esc_html__( 'Wrapper', 'dibx-divi-builder-x' ),
                            ),
                            'front'         => array(
                                'name'      => esc_html__( 'Front', 'dibx-divi-builder-x' ),
                            ),
                            'back'          => array(
                                'name'      => esc_html__( 'Back', 'dibx-divi-builder-x' ),
                            ),
                        )
                    ),

                    'front_text'            => array(
                        'title'             => esc_html__( 'Front Texts', 'dibx-divi-builder-x' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'title'         => array(
                                'name'      => esc_html__( 'Title', 'dibx-divi-builder-x' ),
                            ),
                            'subtitle'      => array(
                                'name'      => esc_html__( 'Subtitle', 'dibx-divi-builder-x' ),
                            ),
                            'description'   => array(
                                'name'      => esc_html__( 'Description', 'dibx-divi-builder-x' ),
                            ),
                        ),
                    ),

                    'back_text'             => array(
                        'title'             => esc_html__( 'Back Texts', 'dibx-divi-builder-x' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'title'         => array(
                                'name'      => esc_html__( 'Title', 'dibx-divi-builder-x' ),
                            ),
                            'subtitle'      => array(
                                'name'      => esc_html__( 'Subtitle', 'dibx-divi-builder-x' ),
                            ),
                            'description'   => array(
                                'name'      => esc_html__( 'Description', 'dibx-divi-builder-x' ),
                            ),
                        ),
                    ),

                    'border'                => esc_html__( 'Border', 'dibx-divi-builder-x' ),
                ),
            ),
        );

        $this->custom_css_fields = array(
			'front_content_wrapper' => array(
				'label'    => esc_html__('Front Content Wrapper', 'dibx-divi-builder-x'),
				'selector' => '%%order_class%% .dibx_flip_card-front .dibx_flip_card_content-wrapper',
            ),
			'front_icon' => array(
				'label'    => esc_html__('Front Icon', 'dibx-divi-builder-x'),
				'selector' => '%%order_class%% .dibx_flip_card-front-icon i.dibx_icon',
            ),
			'front_title' => array(
				'label'    => esc_html__('Front Title', 'dibx-divi-builder-x'),
				'selector' => '%%order_class%% .dibx_flip_card-front-title',
            ),
			'front_subtitle' => array(
				'label'    => esc_html__('Front Sub Title', 'dibx-divi-builder-x'),
				'selector' => '%%order_class%% .dibx_flip_card-front-subtitle',
            ),
			'front_description' => array(
				'label'    => esc_html__('Front Description', 'dibx-divi-builder-x'),
				'selector' => '%%order_class%% .dibx_flip_card-front-description',
            ),
			
            
			'back_content_wrapper' => array(
				'label'    => esc_html__('Back Content Wrapper', 'dibx-divi-builder-x'),
				'selector' => '%%order_class%% .dibx_flip_card-back .dibx_flip_card_content-wrapper',
            ),
			'back_icon' => array(
				'label'    => esc_html__('Back Icon', 'dibx-divi-builder-x'),
				'selector' => '%%order_class%% .dibx_flip_card-back-icon i.dibx_icon',
            ),
			'back_title' => array(
				'label'    => esc_html__('Back Title', 'dibx-divi-builder-x'),
				'selector' => '%%order_class%% .dibx_flip_card-back-title',
            ),
			'back_subtitle' => array(
				'label'    => esc_html__('Back Sub Title', 'dibx-divi-builder-x'),
				'selector' => '%%order_class%% .dibx_flip_card-back-subtitle',
            ),
			'back_description' => array(
				'label'    => esc_html__('Back Description', 'dibx-divi-builder-x'),
				'selector' => '%%order_class%% .dibx_flip_card-back-description',
            ),
			

        );
    }

    public function get_fields() {

        // Front content
        $front_content = array(
            'front_media_type'         => array(
                'label'                => esc_html__( 'Media Type', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Select front side media type.', 'dibx-divi-builder-x' ),
                'type'                 => 'select',
                'tab_slug'             => 'general',
                'toggle_slug'          => 'content',
                'sub_toggle'           => 'front_side',
                'default'              => 'icon',
                'options'              => array(
                    'none'             => esc_html__( 'None', 'dibx-divi-builder-x' ),
                    'icon'             => esc_html__( 'Icon', 'dibx-divi-builder-x' ),
                    'image'            => esc_html__( 'Image', 'dibx-divi-builder-x' ),
                ),
            ),

            'front_icon'               => array(
                'label'                => esc_html__( 'Select Icon', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Select front side icon.', 'dibx-divi-builder-x' ),
                'type'                 => 'select_icon',
                'toggle_slug'          => 'content',
                'sub_toggle'           => 'front_side',
                'tab_slug'             => 'general',
                'show_if'              => array(
                    'front_media_type' => 'icon',
                ),
            ),

            'front_img'                => array(
                'label'                => esc_html__( 'Upload Image', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Upload an image or type in the URL of the image you would like to display for the front side.', 'dibx-divi-builder-x' ),
                'type'                 => 'upload',
                'upload_button_text'   => esc_attr__('Upload an image', 'dibx-divi-builder-x' ),
                'choose_text'          => esc_attr__('Choose an Image', 'dibx-divi-builder-x' ),
                'update_text'          => esc_attr__('Set As Image', 'dibx-divi-builder-x' ),
                'toggle_slug'          => 'content',
                'sub_toggle'           => 'front_side',
                'show_if'              => array(
                    'front_media_type' => 'image',
                ),
            ),

            'front_img_alt'            => array(
                'label'                => esc_html__( 'Image Alt Text', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Define the front side image alt text for your flip box.', 'dibx-divi-builder-x' ),
                'type'                 => 'text',
                'toggle_slug'          => 'content',
                'sub_toggle'           => 'front_side',
                'show_if'              => array(
                    'front_media_type' => 'image',
                ),
            ),

            'front_title'              => array(
                'label'                => esc_html__( 'Front Title', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Define the front side title for your flip box.', 'dibx-divi-builder-x' ),
                'type'                 => 'text',
                'toggle_slug'          => 'content',
                'sub_toggle'           => 'front_side',
                'dynamic_content'      => 'text',
            ),

            'front_subtitle'           => array(
                'label'                => esc_html__( 'Front Sub Title', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Define the front side sub-title for your flip box.', 'dibx-divi-builder-x' ),
                'type'                 => 'text',
                'toggle_slug'          => 'content',
                'sub_toggle'           => 'front_side',
                'dynamic_content'      => 'text',
            ),

            'front_description'        => array(
                'label'                => esc_html__( 'Front Description', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Define the front side description text for your flip box.', 'dibx-divi-builder-x' ),
                'type'                 => 'tiny_mce',
                'toggle_slug'          => 'content',
                'sub_toggle'           => 'front_side',
                'dynamic_content'      => 'text',
            ),
        );

        // Front icon design
        $front_icon_design = array(
            'front_icon_bg'            => array(
                'label'                => esc_html__( 'Icon Background', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Here you can change your front side icon background color.', 'dibx-divi-builder-x' ),
                'type'                 => 'color-alpha',
                'default'              => '',
                'custom_color'         => true,
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'image_icon',
                'sub_toggle'           => 'front',
                'show_if'              => array(
                    'front_media_type' => 'icon',
                ),
                'mobile_options'       => true,
            ),

            'front_icon_color'         => array(
                'label'                => esc_html__( 'Icon Color', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Here you can change your front side icon color.', 'dibx-divi-builder-x' ),
                'type'                 => 'color-alpha',
                'default'              => '#ffffff',
                'custom_color'         => true,
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'image_icon',
                'sub_toggle'           => 'front',
                'show_if'              => array(
                    'front_media_type' => 'icon',
                ),
                'mobile_options'       => true,
            ),

            'front_icon_size'          => array(
                'label'                => esc_html__( 'Icon Size', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Here you can change your front side icon size.', 'dibx-divi-builder-x' ),
                'type'                 => 'range',
                'default_unit'         => 'px',
                'default'              => '30px',
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'image_icon',
                'sub_toggle'           => 'front',
                'mobile_options'       => true,
                'range_settings'       => array(
                    'min'              => 0,
                    'step'             => 1,
                    'max'              => 1000,
                ),
                'show_if'              => array(
                    'front_media_type' => 'icon',
                ),
            ),
        );

        // Front side background color/image/gradient
        $front_background = $this->dibx_custom_background_fields('front', 'Front', 'general', 'front_bg', array('color', 'gradient', 'image' ), array(), '#00d4ff' );

        // =============== End front side ==============
       
        // Back content
        $back_content = array(
            'back_media_type'         => array(
                'label'               => esc_html__( 'Media Type', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Select back side media type.', 'dibx-divi-builder-x' ),
                'type'                => 'select',
                'toggle_slug'         => 'content',
                'sub_toggle'          => 'back_side',
                'default'             => 'icon',
                'options'             => array(
                    'none'            => esc_html__( 'None', 'dibx-divi-builder-x' ),
                    'icon'            => esc_html__( 'Icon', 'dibx-divi-builder-x' ),
                    'image'           => esc_html__( 'Image', 'dibx-divi-builder-x' ),
                ),
            ),

            'back_icon'               => array(
                'label'               => esc_html__( 'Select Icon', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Select back side icon.', 'dibx-divi-builder-x' ),
                'type'                => 'select_icon',
                'toggle_slug'         => 'content',
                'sub_toggle'          => 'back_side',
                'tab_slug'            => 'general',
                'show_if'             => array(
                    'back_media_type' => 'icon',
                ),
            ),
            
            'back_img'                => array(
                'label'               => esc_html__( 'Upload Image', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Upload an image or type in the URL of the image you would like to display for the back side.', 'dibx-divi-builder-x' ),
                'type'                => 'upload',
                'upload_button_text'  => esc_attr__('Upload an image', 'dibx-divi-builder-x' ),
                'choose_text'         => esc_attr__('Choose an Image', 'dibx-divi-builder-x' ),
                'update_text'         => esc_attr__('Set As Image', 'dibx-divi-builder-x' ),
                'toggle_slug'         => 'content',
                'sub_toggle'          => 'back_side',
                'show_if'             => array(
                    'back_media_type' => 'image',
                ),
            ),

            'back_img_alt'            => array(
                'label'               => esc_html__( 'Image Alt Text', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Define the back side image alt text for your flip box.', 'dibx-divi-builder-x' ),
                'type'                => 'text',
                'toggle_slug'         => 'content',
                'sub_toggle'          => 'back_side',
                'show_if'             => array(
                    'back_media_type' => 'image',
                ),
            ),

            'back_title'              => array(
                'label'               => esc_html__( 'Back Title', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Define the back side title for your flip box.', 'dibx-divi-builder-x' ),
                'type'                => 'text',
                'toggle_slug'         => 'content',
                'sub_toggle'          => 'back_side',
                'dynamic_content'     => 'text',
            ),

            'back_subtitle'           => array(
                'label'               => esc_html__( 'Back Sub Title', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Define the back side sub-title for your flip box.', 'dibx-divi-builder-x' ),
                'type'                => 'text',
                'toggle_slug'         => 'content',
                'sub_toggle'          => 'back_side',
                'dynamic_content'     => 'text',
            ),

            'back_description'        => array(
                'label'               => esc_html__( 'Back Description', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Define the back side description text for your flip box.', 'dibx-divi-builder-x' ),
                'type'                => 'tiny_mce',
                'toggle_slug'         => 'content',
                'sub_toggle'          => 'back_side',
                'dynamic_content'     => 'text',
            ),

            'use_button'              => array(
                'label'               => esc_html__( 'Use Button', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Here you can choose whether button should be used.', 'dibx-divi-builder-x' ),
                'type'                => 'yes_no_button',
                'option_category'     => 'configuration',
                'options'             => array(
                    'on'              => esc_html__( 'Yes', 'dibx-divi-builder-x' ),
                    'off'             => esc_html__( 'No', 'dibx-divi-builder-x' ),
                ),
                'default'             => 'off',
                'toggle_slug'         => 'content',
                'sub_toggle'          => 'back_side',
            ),

            'button_text'             => array(
                'label'               => esc_html__( 'Button Text', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Here you can define the button text.', 'dibx-divi-builder-x' ),
                'type'                => 'text',
                'default'             => '',
                'toggle_slug'         => 'content',
                'sub_toggle'          => 'back_side',
                'dynamic_content'     => 'text',
                'show_if'             => array(
                    'use_button'      => 'on',
                ),
            ),

            'button_url'              => array(
                'label'               => esc_html__( 'Button Url', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Define the button link url for your button.', 'dibx-divi-builder-x' ),
                'type'                => 'text',
                'default'             => '',
                'toggle_slug'         => 'content',
                'sub_toggle'          => 'back_side',
                'dynamic_content'     => 'url',
                'show_if'             => array(
                    'use_button'      => 'on',
                ),
            ),

            'url_new_window'          => array(
                'label'               => esc_html__( 'Open Button link in new window', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Here you can choose whether button URL should be opened in new window.', 'dibx-divi-builder-x' ),
                'type'                => 'select',
                'option_category'     => 'configuration',
                'options'             => array(
                    'off'             => esc_html__( 'In The Same Window', 'dibx-divi-builder-x' ),
                    'on'              => esc_html__( 'In The New Tab', 'dibx-divi-builder-x' ),
                ),
                'default'             => 'off',
                'toggle_slug'         => 'content',
                'sub_toggle'          => 'back_side',
                'show_if'             => array(
                    'use_button'      => 'on',
                ),
            ),
        ); 

        // Back icon design
        $back_icon_design = array(
            'back_icon_bg'            => array(
                'label'               => esc_html__( 'Icon Background', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Here you can change your back side icon background color.', 'dibx-divi-builder-x' ),
                'type'                => 'color-alpha',
                'default'             => '',
                'custom_color'        => true,
                'tab_slug'            => 'advanced',
                'toggle_slug'         => 'image_icon',
                'sub_toggle'          => 'back',
                'show_if'             => array(
                    'back_media_type' => 'icon',
                ),
                'mobile_options'      => true,
            ),

            'back_icon_color'         => array(
                'label'               => esc_html__( 'Icon Color', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Here you can change your back side icon color.', 'dibx-divi-builder-x' ),
                'type'                => 'color-alpha',
                'default'             => '#ffffff',
                'custom_color'        => true,
                'tab_slug'            => 'advanced',
                'toggle_slug'         => 'image_icon',
                'sub_toggle'          => 'back',
                'show_if'             => array(
                    'back_media_type' => 'icon',
                ),
                'mobile_options'      => true,
                'hover'               => 'tabs',
            ),

            'back_icon_size'          => array(
                'label'               => esc_html__( 'Icon Size', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Here you can change your back side icon size.', 'dibx-divi-builder-x' ),
                'type'                => 'range',
                'default_unit'        => 'px',
                'default'             => '30px',
                'tab_slug'            => 'advanced',
                'toggle_slug'         => 'image_icon',
                'sub_toggle'          => 'back',
                'mobile_options'      => true,
                'range_settings'      => array(
                    'min'             => 0,
                    'step'            => 1,
                    'max'             => 1000,
                ),
                'show_if'             => array(
                    'back_media_type' => 'icon',
                ),
            ),
        );

        // Back side background color/image/gradient
        $back_background = $this->dibx_custom_background_fields('back', 'Back', 'general', 'back_bg', array('color', 'gradient', 'image' ), array(), '#00e091' );

        // =============== End back side ==============

        // Flip card content alignments for front and back side
        $verticla_alignment =  array(
            'front_vartical_align' => array(
                'label'            => esc_html__( 'Vartical Alignment', 'dibx-divi-builder-x' ),
                'type'             => 'select',
                'tab_slug'         => 'advanced',
                'toggle_slug'      => 'alignment',
                'sub_toggle'       => 'front',
                'options'          => array(
                    'start'        => esc_html__( 'Top', 'dibx-divi-builder-x' ),
                    'center'       => esc_html__( 'Center', 'dibx-divi-builder-x' ),
                    'end'          => esc_html__( 'Bottom', 'dibx-divi-builder-x' ),
                ),
                'default'          => 'center',
                'mobile_options'   => true,
            ),

            'front_text_align'     => array(
                'label'            => esc_html__( 'Content Alignment', 'dibx-divi-builder-x' ),
                'type'             => 'text_align',
                'option_category'  => 'configuration',
                'options'          => et_builder_get_text_orientation_options(array('justified' )),
                'tab_slug'         => 'advanced',
                'toggle_slug'      => 'alignment',
                'sub_toggle'       => 'front',
                'default'          => 'center',
                'mobile_options'   => true,
            ),

            'back_vartical_align'  => array(
                'label'            => esc_html__( 'Vartical Alignment', 'dibx-divi-builder-x' ),
                'type'             => 'select',
                'tab_slug'         => 'advanced',
                'toggle_slug'      => 'alignment',
                'sub_toggle'       => 'back',
                'options'          => array(
                    'start'        => esc_html__( 'Top', 'dibx-divi-builder-x' ),
                    'center'       => esc_html__( 'Center', 'dibx-divi-builder-x' ),
                    'end'          => esc_html__( 'Bottom', 'dibx-divi-builder-x' ),
                ),
                'default'          => 'center',
                'mobile_options'   => true,
            ),

            'back_text_align'      => array(
                'label'            => esc_html__( 'Content Alignment', 'dibx-divi-builder-x' ),
                'type'             => 'text_align',
                'option_category'  => 'configuration',
                'options'          => et_builder_get_text_orientation_options(array('justified' )),
                'tab_slug'         => 'advanced',
                'toggle_slug'      => 'alignment',
                'sub_toggle'       => 'back',
                'default'          => 'center',
                'mobile_options'   => true,
            ),
        );

        // Flip card custom spacing for varitise items
        $custom_spacing = array(
            'container_padding'        => array(
                'label'                => esc_html__( 'Container Padding', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Define custom padding for flip card conainer', 'dibx-divi-builder-x' ),
                'type'                 => 'custom_padding',
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'custom_spacing',
                'sub_toggle'           => 'wrapper',
                'default'              => '30px|0px|0px|0px',
                'mobile_options'       => true,
            ),

            'content_padding'        => array(
                'label'                => esc_html__( 'Content Wrapper Padding', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Define custom padding for flip card content wrapper', 'dibx-divi-builder-x' ),
                'type'                 => 'custom_padding',
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'custom_spacing',
                'sub_toggle'           => 'wrapper',
                'default'              => '30px|30px|30px|30px',
                'mobile_options'       => true,
            ),

            'content_margin'        => array(
                'label'                => esc_html__( 'Content Wrapper Margin', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Define custom margin for flip card content wrapper', 'dibx-divi-builder-x' ),
                'type'                 => 'custom_margin',
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'custom_spacing',
                'sub_toggle'           => 'wrapper',
                'default'              => '0px|0px|0px|0px',
                'mobile_options'       => true,
            ),

            // Front
            'front_icon_padding'       => array(
                'label'                => esc_html__( 'Icon Padding', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Define custom padding for flip card icon', 'dibx-divi-builder-x' ),
                'type'                 => 'custom_padding',
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'custom_spacing',
                'sub_toggle'           => 'front',
                'default'              => '0px|0px|0px|0px',
                'mobile_options'       => true,
                'show_if'              => array(
                    'front_media_type' => 'icon',
                ),
            ),

            'front_icon_margin'        => array(
                'label'                => esc_html__( 'Icon Margin', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Define custom margin for flip card icon', 'dibx-divi-builder-x' ),
                'type'                 => 'custom_margin',
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'custom_spacing',
                'sub_toggle'           => 'front',
                'default'              => '0px|0px|0px|0px',
                'mobile_options'       => true,
                'show_if'              => array(
                    'front_media_type' => 'icon',
                ),
            ),

            'front_img_padding'        => array(
                'label'                => esc_html__( 'Image Padding', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Define custom padding for image/icon', 'dibx-divi-builder-x' ),
                'type'                 => 'custom_padding',
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'custom_spacing',
                'sub_toggle'           => 'front',
                'default'              => '0px|0px|0px|0px',
                'mobile_options'       => true,
                'show_if'              => array(
                    'front_media_type' => 'image',
                ),
            ),

            'front_img_margin'         => array(
                'label'                => esc_html__( 'Image Margin', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Define custom margin for image/icon', 'dibx-divi-builder-x' ),
                'type'                 => 'custom_margin',
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'custom_spacing',
                'sub_toggle'           => 'front',
                'default'              => '0px|0px|0px|0px',
                'mobile_options'       => true,
                'show_if'              => array(
                    'front_media_type' => 'image',
                ),
            ),

            // Back Icon
            'back_icon_padding'        => array(
                'label'                => esc_html__( 'Icon Padding', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Define custom padding for flip card icon', 'dibx-divi-builder-x' ),
                'type'                 => 'custom_padding',
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'custom_spacing',
                'sub_toggle'           => 'back',
                'default'              => '0px|0px|0px|0px',
                'mobile_options'       => true,
                'show_if'              => array(
                    'back_media_type'  => 'icon',
                ),
            ),

            'back_icon_margin'         => array(
                'label'                => esc_html__( 'Icon Margin', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Define custom margin for flip card icon', 'dibx-divi-builder-x' ),
                'type'                 => 'custom_margin',
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'custom_spacing',
                'sub_toggle'           => 'back',
                'default'              => '0px|0px|0px|0px',
                'mobile_options'       => true,
                'show_if'              => array(
                    'back_media_type'  => 'icon',
                ),
            ),

            'back_img_padding'        => array(
                'label'               => esc_html__( 'Image Padding', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Define custom padding for image/icon', 'dibx-divi-builder-x' ),
                'type'                => 'custom_padding',
                'tab_slug'            => 'advanced',
                'toggle_slug'         => 'image_icon',
                'default'             => '0px|0px|0px|0px',
                'mobile_options'      => true,
                'show_if'             => array(
                    'back_media_type' => 'image',
                ),
            ),

            'back_img_margin'         => array(
                'label'               => esc_html__( 'Image Margin', 'dibx-divi-builder-x' ),
                'description'         => esc_html__( 'Define custom margin for image/icon', 'dibx-divi-builder-x' ),
                'type'                => 'custom_margin',
                'tab_slug'            => 'advanced',
                'toggle_slug'         => 'image_icon',
                'default'             => '0px|0px|0px|0px',
                'mobile_options'      => true,
                'show_if'             => array(
                    'back_media_type' => 'image',
                ),
            ),

        );

        // Flip card settings
        $settings = array(
            'animation_type'            => array(
                'label'                 => esc_html__( 'Flip Type', 'dibx-divi-builder-x' ),
                'description'           => esc_html__( 'Select the flip type.', 'dibx-divi-builder-x' ),
                'type'                  => 'select',
                'toggle_slug'           => 'settings',
                'default'               => 'rotate',
                'options'               => array(
                    'rotate'            => esc_html__( 'Rotate', 'dibx-divi-builder-x' ),
                ),
            ),

            'rotate_direction'          => array(
                'label'                 => esc_html__( 'Rotate Direction', 'dibx-divi-builder-x' ),
                'description'           => esc_html__( 'Select the rotate direction.', 'dibx-divi-builder-x' ),
                'type'                  => 'select',
                'toggle_slug'           => 'settings',
                'default'               => 'rotate_right',
                'options'               => array(
                    'rotate_left'       => esc_html__( 'Rotate Left', 'dibx-divi-builder-x' ),
                    'rotate_right'      => esc_html__( 'Rotate Right', 'dibx-divi-builder-x' ),
                    'rotate_up'         => esc_html__( 'Rotate Up', 'dibx-divi-builder-x' ),
                    'rotate_down'       => esc_html__( 'Rotate Down', 'dibx-divi-builder-x' ),
                ),
                'show_if'               => array(
                    'animation_type'    => 'rotate',
                )
            ),

            'animation_speed'           => array(
                'label'                 => esc_html__( 'Animation Speed', 'dibx-divi-builder-x' ),
                'description'           => esc_html__( 'Choose flip card animation speed', 'dibx-divi-builder-x' ),
                'type'                  => 'range',
                'default'               => '600ms',
                'fixed_unit'            => 'ms',
                'range_settings'        => array(
                    'min'               => 0,
                    'step'              => 50,
                    'max'               => 5000,
                ),
                'toggle_slug'           => 'settings',
            ),

            'transition_delay'          => array(
                'label'                 => esc_html__( 'Animation Delay', 'dibx-divi-builder-x' ),
                'description'           => esc_html__( 'Choose flip card animation delay, how long it will wait to animate', 'dibx-divi-builder-x' ),
                'type'                  => 'range',
                'default'               => '0ms',
                'fixed_unit'            => 'ms',
                'range_settings'        => array(
                    'min'               => 0,
                    'step'              => 50,
                    'max'               => 1000,
                ),
                'toggle_slug'           => 'settings',
            ),

            'animation_curve'           => array(
                'label'                 => esc_html__( 'Animation Speed Curve', 'dibx-divi-builder-x' ),
                'type'                  => 'select',
                'toggle_slug'           => 'settings',
                'default'               => 'ease_in_out',
                'options'               => array(
                    'ease'              => esc_html__( 'Ease', 'dibx-divi-builder-x' ),
                    'ease-in'           => esc_html__( 'Ease In', 'dibx-divi-builder-x' ),
                    'ease-in-out'       => esc_html__( 'Ease In Out', 'dibx-divi-builder-x' ),
                    'ease-out'          => esc_html__( 'Ease Out', 'dibx-divi-builder-x' ),
                    'linear'            => esc_html__( 'Linear', 'dibx-divi-builder-x' ),
                    'bounce'            => esc_html__( 'Bounce', 'dibx-divi-builder-x' ),
                ),
            ),

            'use_3d_animation'          => array(
                'label'                 => esc_html__( 'Use 3D Animation', 'dibx-divi-builder-x' ),
                'description'           => esc_html__( 'Here you can choose whether 3d animation should be used', 'dibx-divi-builder-x' ),
                'type'                  => 'yes_no_button',
                'option_category'       => 'configuration',
                'options'               => array(
                    'on'                => esc_html__( 'Yes', 'dibx-divi-builder-x' ),
                    'off'               => esc_html__( 'No', 'dibx-divi-builder-x' ),
                ),
                'default'               => 'off',
                'toggle_slug'           => 'settings',
            ),

            'translate_z'               => array(
                'label'                 => esc_html__( 'Translate Z', 'dibx-divi-builder-x' ),
                'type'                  => 'range',
                'default'               => '50px',
                'fixed_unit'            => 'px',
                'range_settings'        => array(
                    'min'               => 0,
                    'step'              => 1,
                    'max'               => 200,
                ),
                'toggle_slug'           => 'settings',
                'show_if'               => array(
                    'use_3d_animation'  => 'on',
                    'animation_type'    => 'rotate',
                )
            ),

            'scale'                     => array(
                'label'                 => esc_html__( 'Scale', 'dibx-divi-builder-x' ),
                'type'                  => 'range',
                'default'               => '.94',
                'default_unit'          => '',
                'allowed_units'         => array('' ),
                'validate_unit'         => false,
                'range_settings'        => array(
                    'min'               => '0',
                    'step'              => '.01',
                    'max'               => '2',
                ),
                'toggle_slug'           => 'settings',
                'show_if'               => array(
                    'use_3d_animation'  => 'on',
                    'animation_type'    => 'rotate',
                )
            ),

            'use_custom_height'         => array(
                'label'                 => esc_html__( 'Use Custom Height', 'dibx-divi-builder-x' ),
                'type'                  => 'yes_no_button',
                'option_category'       => 'configuration',
                'options'               => array(
                    'on'                => esc_html__( 'Yes', 'dibx-divi-builder-x' ),
                    'off'               => esc_html__( 'No', 'dibx-divi-builder-x' ),
                ),
                'default'               => 'off',
                'toggle_slug'           => 'settings',
            ),

            'flip_card_height'          => array(
                'label'                 => esc_html__( 'Flip Card Height', 'dibx-divi-builder-x' ),
                'type'                  => 'range',
                'default'               => '300px',
                'fixed_unit'            => 'px',
                'range_settings'        => array(
                    'min'               => 0,
                    'step'              => 1,
                    'max'               => 1000,
                ),
                'toggle_slug'           => 'settings',
                'show_if'               => array(
                    'use_custom_height' => 'on',
                )
            ),
        );

        return array_merge(
            $front_content,
            $front_icon_design,
            $front_background,
            $back_content,
            $back_icon_design,
            $back_background,
            $verticla_alignment,
            $custom_spacing,
            $settings,
        );
    }

    // Modify existing functionalities and add new functionalities
    public function get_advanced_fields_config() {

        // Get theme accent color
        $et_accent_color = et_builder_accent_color();

        $advanced_fields                   = array();
        $advanced_fields[ 'text' ]         = false;
        $advanced_fields[ 'filters' ]      = false;
        $advanced_fields[ "link_options" ] = false;
        $advanced_fields[ "background" ]   = false;
        $advanced_fields[ 'text_shadow' ]  = array();
        $advanced_fields[ 'fonts' ]        = array();

        // Flip card border
        $advanced_fields['borders']['card'] = array(
			'toggle_slug'           => 'border',
			'css'                   => array(
				'main'              => array(
					'border_radii'  => '%%order_class%% .dibx_flip_card-container',
					'border_styles' => '%%order_class%% .dibx_flip_card-container',
				),
				'important'         => false,
			),
			'defaults'              => array(
				'border_radii'      => 'on|0px|0px|0px|0px',
				'border_styles'     => array(
					'width'         => '0px',
					'color'         => '#333333',
					'style'         => 'solid',
				),
			),
		);

        // Front icon border
        $advanced_fields[ 'borders' ][ 'front_icon' ] = array(
            'label_prefix'          => esc_html__('Image/Icon', 'dibx-divi-builder-x'),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'image_icon',
            'sub_toggle'            => 'front',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dibx_flip_card-front-icon i.dibx_icon',
                    'border_styles' => '%%order_class%% .dibx_flip_card-front-icon i.dibx_icon',
                ),
                'important'         => false,
            ),
            'defaults'              => array(
                'border_radii'      => 'on|0px|0px|0px|0px',
                'border_styles'     => array(
                    'width'         => '0px',
                    'color'         => $et_accent_color,
                    'style'         => 'solid',
                ),
            ),
        );
        $advanced_fields[ 'borders' ][ 'front_icon' ] = array(
            'label_prefix'          => esc_html__('Image/Icon', 'dibx-divi-builder-x'),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'image_icon',
            'sub_toggle'            => 'front',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dibx_flip_card-front-img',
                    'border_styles' => '%%order_class%% .dibx_flip_card-front-img',
                ),
                'important'         => false,
            ),
            'defaults'              => array(
                'border_radii'      => 'on|0px|0px|0px|0px',
                'border_styles'     => array(
                    'width'         => '0px',
                    'color'         => $et_accent_color,
                    'style'         => 'solid',
                ),
            ),
        );

        $advanced_fields[ 'fonts' ][ 'front_title' ] = array(
            'label'             => esc_html__('Title', 'dibx-divi-builder-x'),
            'css'               => array(
                'main'          => '%%order_class%% .dibx_flip_card-front-title',
                'important'     => false,
            ),
            'header_level'      => array(
                'default'       => 'h3',
            ),
            'font_size'         => array(
                'default'       => '26px',
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'front_text',
            'sub_toggle'        => 'title',
            'line_height'       => array(
                'default'       => '1.5em',
            ),
        );

        $advanced_fields[ 'fonts' ][ 'front_subtitle' ] = array(
            'label'             => esc_html__('Subtitle', 'dibx-divi-builder-x'),
            'css'               => array(
                'main'          => '%%order_class%% .dibx_flip_card-front-subtitle',
                'important'     => false,
            ),
            'header_level'      => array(
                'default'       => 'h4',
            ),
            'font_size'         => array(
                'default'       => '18px',
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'front_text',
            'sub_toggle'        => 'subtitle',
            'line_height'       => array(
                'default'       => '1.5em',
            ),
        );

        $advanced_fields[ 'fonts' ][ 'front_description' ] = array(
            'label'             => esc_html__('Description', 'dibx-divi-builder-x'),
            'css'               => array(
                'main'          => '%%order_class%% .dibx_flip_card-front-description',
                'important'     => false,
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'front_text',
            'sub_toggle'        => 'description',
            'font_size'         => array(
                'default'       => '14px',
            ),
            'line_height'       => array(
                'default'       => '1.2em',
            ),
        );

        // Back icon border
        $advanced_fields[ 'borders' ][ 'back_icon' ] = array(
            'label_prefix'          => esc_html__('Image/Icon', 'dibx-divi-builder-x'),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'image_icon',
            'sub_toggle'            => 'back',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dibx_flip_card-back-icon i.dibx_icon',
                    'border_styles' => '%%order_class%% .dibx_flip_card-back-icon i.dibx_icon',
                ),
                'important'         => false,
            ),
            'defaults'              => array(
                'border_radii'      => 'on|0px|0px|0px|0px',
                'border_styles'     => array(
                    'width'         => '0px',
                    'color'         => $et_accent_color,
                    'style'         => 'solid',
                ),
            ),
        );
        $advanced_fields[ 'borders' ][ 'back_img' ] = array(
            'label_prefix'          => esc_html__('Image/Icon', 'dibx-divi-builder-x'),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'image_icon',
            'sub_toggle'            => 'back',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dibx_flip_card-back-img',
                    'border_styles' => '%%order_class%% .dibx_flip_card-back-img',
                ),
                'important'         => false,
            ),
            'defaults'              => array(
                'border_radii'      => 'on|0px|0px|0px|0px',
                'border_styles'     => array(
                    'width'         => '0px',
                    'color'         => $et_accent_color,
                    'style'         => 'solid',
                ),
            ),
        );

        $advanced_fields[ 'fonts' ][ 'back_title' ] = array(
            'label'             => esc_html__('Title', 'dibx-divi-builder-x'),
            'css'               => array(
                'main'          => '%%order_class%% .dibx_flip_card-back-title',
                'important'     => false,
            ),
            'header_level'      => array(
                'default'       => 'h3',
            ),
            'font_size'         => array(
                'default'       => '26px',
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'back_text',
            'sub_toggle'        => 'title',
            'line_height'       => array(
                'default'       => '1.5em',
            ),
        );

        $advanced_fields[ 'fonts' ][ 'back_subtitle' ] = array(
            'label'             => esc_html__('Subtitle', 'dibx-divi-builder-x'),
            'css'               => array(
                'main'          => '%%order_class%% .dibx_flip_card-back-subtitle',
                'important'     => false,
            ),
            'header_level'      => array(
                'default'       => 'h4',
            ),
            'font_size'         => array(
                'default'       => '18px',
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'back_text',
            'sub_toggle'        => 'subtitle',
            'line_height'       => array(
                'default'       => '1.5em',
            ),
        );

        $advanced_fields[ 'fonts' ][ 'back_description' ] = array(
            'label'             => esc_html__('Description', 'dibx-divi-builder-x'),
            'css'               => array(
                'main'          => '%%order_class%% .dibx_flip_card-back-description',
                'important'     => false,
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'back_text',
            'sub_toggle'        => 'description',
            'font_size'         => array(
                'default'       => '14px',
            ),
            'line_height'       => array(
                'default'       => '1.2em',
            ),
        );

        $advanced_fields[ 'button' ][ 'button' ] = array(
            'label'             => esc_html__('Back Button', 'dibx-divi-builder-x'),
            'toggle_slug'       => 'button',
            'css'               => array(
                'main'          => "$this->main_css_element .dibx_flip_card-btn",
                'important'     => 'all',
            ),
            'use_alignment'     => false,
            'text_shadow'       => false,
            'box_shadow'        => array(
                'css'           => array(
                    'main'      => '%%order_class%% .dibx_flip_card-btn',
                ),
            ),
            'borders'           => array(
                'css'           => array(
                    'important' => 'all',
                ),
            ),
            'margin_padding'    => array(
                'css'           => array(
                    'important' => 'all',
                ),
            ),
        );

        return $advanced_fields;
    }

    // Custom css fields for flip card     
    // Front side icon
    public function render_front_icon() {

        return sprintf(
            '<div class="dibx_flip_card-icon dibx_flip_card-front-icon">
                <i class="dibx_icon">%1$s</i>
            </div>',
            $this->dibx_render_icon('front_icon')
        );
    }

    // Front side image
    public function render_front_img() {
        return sprintf(
            '<div class="dibx_flip_card-front-img">
                <img src="%1$s" alt="%2$s"/>
            </div>',
            $this->props[ 'front_img' ],
            $this->props[ 'front_img_alt' ]
        );
    }

    // Decide what to display icon or image
    public function render_front_media() {

        $front_media_type   = $this->props[ 'front_media_type' ];
        $front_icon         = $this->props[ 'front_icon' ];
        $front_img          = $this->props[ 'front_img' ];

        if ($front_media_type === 'none') {
            return;
        }

        if (!empty($front_icon) || !empty($front_img)) {

            $media = '';

            if ($front_media_type === 'icon') {
                $media = $this->render_front_icon();
            } 
            
            if ($front_media_type === 'image') {
                $media = $this->render_front_img();
            }

            return sprintf(
                '<div class="dibx_flip_card_media">%1$s</div>',
                $media
            );
        }
    }

    // Front title
    public function render_front_title() {

        $heading = $this->props[ 'front_title' ];
        $heading_level = et_pb_process_header_level($this->props[ 'front_title_level' ], 'h3');

        if (!empty($heading)) {

            return sprintf(
                '<%1$s class="dibx_flip_card-front-title">%2$s</%1$s>',
                $heading_level,
                $heading
            );
        }
    }

    // Front sub title
    public function render_front_subtitle() {
        
        $heading = $this->props[ 'front_subtitle' ];
        $heading_level = et_pb_process_header_level($this->props[ 'front_subtitle_level' ], 'h4');

        if (!empty($heading)) {

            return sprintf(
                '<%1$s class="dibx_flip_card-front-subtitle">%2$s</%1$s>',
                $heading_level,
                $heading
            );
        }
    }

    // Render front content with condition if front title, subtitle or description inserted
    public function render_front_content()  {
        if ($this->render_front_title() || $this->render_front_subtitle() || $this->render_MCE($this->props[ 'front_description' ])) {
            return sprintf(
                '<div class="dibx_flip_card-content-wrapper">
                    %1$s
                    %2$s
                    <div class="dibx_flip_card-front-description">%3$s</div> 
                </div>',
                $this->render_front_title(), // 1
                $this->render_front_subtitle(), // 2
                $this->render_MCE($this->props[ 'front_description' ]) // 3
            );
        }
    }

    // Back side icon
    public function render_back_icon() {

        return sprintf(
            '<div class="dibx_flip_card-icon dibx_flip_card-back-icon">
                <i class="dibx_icon">%1$s</i>
            </div>',
            $this->dibx_render_icon('back_icon')
        );
    }

    // Back side image
    public function render_back_img() {
        return sprintf(
            '<div class="dibx_flip_card-back-img">
                <img src="%1$s" alt="%2$s"/>
            </div>',
            $this->props[ 'back_img' ],
            $this->props[ 'back_img_alt' ]
        );
    }

    // Decide what to display image or icon
    public function render_back_media() {

        $back_media_type   = $this->props[ 'back_media_type' ];
        $back_icon         = $this->props[ 'back_icon' ];
        $back_img          = $this->props[ 'back_img' ];

        if (!empty($back_icon) || !empty($back_img)) {

            $media = '';

            if ($back_media_type === 'icon') {
                $media = $this->render_back_icon();
            } elseif ($back_media_type === 'image') {
                $media = $this->render_back_img();
            }

            return sprintf(
                '<div class="dibx_flip_card-media">%1$s</div>',
                $media
            );
        }
    }

    // Back title
    public function render_back_title() {

        $heading = $this->props[ 'back_title' ];
        $heading_level = et_pb_process_header_level($this->props[ 'back_title_level' ], 'h3');

        if (!empty($heading)) {

            return sprintf(
                '<%1$s class="dibx_flip_card-back-title">%2$s</%1$s>',
                $heading_level,
                $heading
            );
        }
    }

    // Back sub title
    public function render_back_subtitle() {

        $heading = $this->props[ 'back_subtitle' ];
        $heading_level = et_pb_process_header_level($this->props[ 'back_subtitle_level' ], 'h4');

        if (!empty($heading)) {

            return sprintf(
                '<%1$s class="dibx_flip_card-back-subtitle">%2$s</%1$s>',
                $heading_level,
                $heading
            );
        }
    }

    // Render back content with condition if back title, subtitle or description inserted
    public function render_back_content() {
        if ($this->render_back_title() || $this->render_back_subtitle() || $this->render_MCE($this->props[ 'back_description' ])) {
            return sprintf(
                '<div class="dibx_flip_card-content-wrapper">
                    %1$s
                    %2$s
                    <div class="dibx_flip_card-back-description">%3$s</div> 
                </div>',
                $this->render_back_title(), // 1
                $this->render_back_subtitle(), // 2
                $this->render_MCE($this->props[ 'back_description' ]) // 3
            );
        }
    }

    // Render back side button
    public function render_back_button() {
        $multi_view     = et_pb_multi_view_options( $this );
		$button_url     = $this->props[ 'button_url' ];
		$button_rel     = $this->props[ 'button_rel' ];
		$button_text    = $this->_esc_attr( 'button_text', 'limited' );
		$url_new_window = $this->props[ 'url_new_window' ];
		$button_custom  = $this->props[ 'custom_button' ];

		$custom_icon_values = et_pb_responsive_options()->get_property_values( $this->props, 'button_icon' );
		$custom_icon        = isset( $custom_icon_values[ 'desktop' ] ) ? $custom_icon_values[ 'desktop' ] : '';
		$custom_icon_tablet = isset( $custom_icon_values[ 'tablet' ] ) ? $custom_icon_values[ 'tablet' ] : '';
		$custom_icon_phone  = isset( $custom_icon_values[ 'phone' ] ) ? $custom_icon_values[ 'phone' ] : '';

		// Nothing to output if neither Button Text nor Button URL defined
		$button_url = trim( $button_url );

		if ( '' === $button_text && '' === $button_url ) {
			return '';
		}

		// Render Button
		$button = $this->render_button(
			array(
				'button_id'           => $this->module_id( false ),
				'button_classname'    => array('dibx_flip_card-btn'),
				'button_custom'       => $button_custom,
				'button_rel'          => $button_rel,
				'button_text'         => $button_text,
				'button_text_escaped' => true,
				'button_url'          => $button_url,
				'custom_icon'         => $custom_icon,
				'custom_icon_tablet'  => $custom_icon_tablet,
				'custom_icon_phone'   => $custom_icon_phone,
				'has_wrapper'         => false,
				'url_new_window'      => $url_new_window,
				'multi_view_data'     => $multi_view->render_attrs(
					array(
						'content'        => '{{button_text}}',
						'hover_selector' => '%%order_class%% .dibx_flip_card-btn',
						'visibility'     => array(
							'button_text' => '__not_empty',
						),
					)
				),
			)
		);

        return sprintf(
            '<div class="dibx_flip_card-btn-wrapper">
                %1$s
            </div>',
            $button
        );
    }

    // Render
    public function render($attrs, $content, $render_slug)
    {

        $this->render_css($render_slug);

        $use_3d_animation = $this->props[ 'use_3d_animation' ];
        $animation_type = $this->props[ 'animation_type' ];
        $direction = $this->props[ 'rotate_direction' ];

        $classes            = array();

        array_push($classes, $animation_type);

        if ($animation_type === 'rotate' && isset($direction)) {
            array_push($classes, $direction);
        }

        if ($use_3d_animation === 'on') {
            array_push($classes, 'dibx_flip_card--3d');
        }

        return sprintf(
            '<div class="dibx_flip_card %1$s">
                <div class="dibx_flip_card-inner">
                    <div class="dibx_flip_card-front dibx_flip_card-container">
                        <div class="dibx_flip_card-content">
                            %2$s
                            %3$s
                        </div>
                    </div>
                    <div class="dibx_flip_card-back dibx_flip_card-container">
                        <div class="dibx_flip_card-content">
                            %4$s
                            %5$s
                            %6$s
                        </div>
                    </div>
                </div>
            </div>',
            join(' ', $classes), // 1 
            $this->render_front_media(), // 2
            $this->render_front_content(), // 3
            $this->render_back_media(), // 4
            $this->render_back_content(), // 5
            $this->render_back_button(), // 6
        );
    }

    // Apply css
    public function render_css($render_slug)
    {
        $front_align      = $this->props[ 'front_vartical_align' ];
        $front_text_align = $this->props[ 'front_text_align' ];
        $back_align       = $this->props[ 'back_vartical_align' ];
        $back_text_align  = $this->props[ 'back_text_align' ];
        $animation_speed  = $this->props[ 'animation_speed' ];
        $translate_z      = $this->props[ 'translate_z' ];
        $scale            = $this->props[ 'scale' ];
        $animation_curve  = $this->props[ 'animation_curve' ];
        $is_custom_height = $this->props[ 'use_custom_height' ];
        $height           = $this->props[ 'flip_card_height' ];
        $animation_delay  = $this->props[ 'transition_delay' ];

        // Gernerate icon style
        $this->generate_styles(
            array(
                'utility_arg'    => 'icon_font_family',
                'render_slug'    => $render_slug,
                'base_attr_name' => 'front_icon',
                'important'      => true,
                'selector'       => '%%order_class%% .dibx_flip_card-front-icon .dibx_icon',
                'processor'      => array(
                    'ET_Builder_Module_Helper_Style_Processor',
                    'process_extended_icon',
                ),
            )
        );
        $this->generate_styles(
            array(
                'utility_arg'    => 'icon_font_family',
                'render_slug'    => $render_slug,
                'base_attr_name' => 'back_icon',
                'important'      => true,
                'selector'       => '%%order_class%% .dibx_flip_card-back-icon .dibx_icon',
                'processor'      => array(
                    'ET_Builder_Module_Helper_Style_Processor',
                    'process_extended_icon',
                ),
            )
        );

        $this->dibx_responsive_css($render_slug, array(
            [
                'option_slug'   => 'container_padding',
                'property'      => 'padding',
                'selector'      => '%%order_class%% .dibx_flip_card-container',
            ], 
            [
                'option_slug'   => 'content_padding',
                'property'      => 'padding',
                'selector'      => '%%order_class%% .dibx_flip_card-content-wrapper',
            ], 
            [
                'option_slug'   => 'content_margin',
                'property'      => 'margin',
                'selector'      => '%%order_class%% .dibx_flip_card-content-wrapper',
            ], 
            [
                'option_slug'   => 'front_vartical_align',
                'property'      => 'align-items',
                'selector'      => '%%order_class%% .dibx_flip_card-front',
            ],
            [
                'option_slug'   => 'front_text_align',
                'property'      => 'text-align',
                'selector'      => '%%order_class%% .dibx_flip_card-front',
            ],
            [
                'option_slug'   => 'back_vartical_align',
                'property'      => 'align-items',
                'selector'      => '%%order_class%% .dibx_flip_card-back',
            ],
            [
                'option_slug'   => 'back_text_align',
                'property'      => 'text-align',
                'selector'      => '%%order_class%% .dibx_flip_card-back',
            ],           
            [
                'option_slug'   => 'front_icon_size',
                'property'      => 'font-size',
                'selector'      => '%%order_class%% .dibx_flip_card-front-icon i.dibx_icon',
            ],
            [
                'option_slug'   => 'front_icon_bg',
                'property'      => 'background',
                'selector'      => '%%order_class%% .dibx_flip_card-front-icon i.dibx_icon',
            ],
            [
                'option_slug'   => 'front_icon_color',
                'property'      => 'color',
                'selector'      => '%%order_class%% .dibx_flip_card-front-icon i.dibx_icon',
            ],
            [
                'option_slug'   => 'front_icon_padding',
                'property'      => 'padding',
                'selector'      => '%%order_class%% .dibx_flip_card-front-icon i.dibx_icon',
            ],
            [
                'option_slug'   => 'front_icon_margin',
                'property'      => 'margin',
                'selector'      => '%%order_class%% .dibx_flip_card-front-icon i.dibx_icon',
            ],

            [
                'option_slug'   => 'front_img_margin',
                'property'      => 'margin',
                'selector'      => '%%order_class%% .dibx_flip_card-front-img',
            ],
            [
                'option_slug'   => 'front_img_padding',
                'property'      => 'padding',
                'selector'      => '%%order_class%% .dibx_flip_card-front-img',
            ],

            [
                'option_slug'   => 'back_img_margin',
                'property'      => 'margin',
                'selector'      => '%%order_class%% .dibx_flip_card-back-img',
            ],
            [
                'option_slug'   => 'back_img_padding',
                'property'      => 'padding',
                'selector'      => '%%order_class%% .dibx_flip_card-back-img',
            ],

            [
                'option_slug'   => 'back_icon_size',
                'property'      => 'font-size',
                'selector'      => '%%order_class%% .dibx_flip_card-back-icon i.dibx_icon',
            ],    
            [
                'option_slug'   => 'back_icon_bg',
                'property'      => 'background',
                'selector'      => '%%order_class%% .dibx_flip_card-back-icon i.dibx_icon',
            ],    
            [
                'option_slug'   => 'back_icon_color',
                'property'      => 'color',
                'selector'      => '%%order_class%% .dibx_flip_card-back-icon i.dibx_icon',
            ],    
            [
                'option_slug'   => 'back_icon_padding',
                'property'      => 'padding',
                'selector'      => '%%order_class%% .dibx_flip_card-back-icon i.dibx_icon',
            ],    
            [
                'option_slug'   => 'back_icon_margin',
                'property'      => 'margin',
                'selector'      => '%%order_class%% .dibx_flip_card-back-icon i.dibx_icon',
    
            ],
        )); 

        // Front side background
        $this->dibx_custom_bg_style($render_slug, 'front', '%%order_class%% .dibx_flip_card-front', '');

        // Back side background
        $this->dibx_custom_bg_style($render_slug, 'back', '%%order_class%% .dibx_flip_card-back', '');

        // Flip card settings
        ET_Builder_Element::set_style(
            $render_slug,
            array(
                'selector'      => '%%order_class%% .dibx_flip_card-inner',
                'declaration'   => "transition-duration: $animation_speed;"
            ),
        );

        ET_Builder_Element::set_style(
            $render_slug,
            array(
                'selector'      => '%%order_class%% .dibx_flip_card-inner',
                'declaration'   => "transition-delay: $animation_delay;"
            ),
        );

        ET_Builder_Element::set_style(
            $render_slug,
            array(
                'selector'      => '%%order_class%% .dibx_flip_card--3d .dibx_flip_card-content',
                'declaration'   => "transform:  translateZ($translate_z) scale($scale);"
            ),
        );

        ET_Builder_Element::set_style(
            $render_slug,
            array(
                'selector'      => '%%order_class%% .dibx_flip_card-inner',
                'declaration'   => "transition-timing-function: $animation_curve;"
            ),
        );

        if ($is_custom_height === 'on') {
            ET_Builder_Element::set_style(
                $render_slug,
                array(
                    'selector'      => '%%order_class%% .dibx_flip_card-inner',
                    'declaration'   => "min-height: $height;"
                ),
            );
        }
    }

}
new DIBX_Flip_Card();