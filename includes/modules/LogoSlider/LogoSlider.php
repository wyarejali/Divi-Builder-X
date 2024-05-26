<?php

class DIBX_Logo_Slider extends DIBX_Module_Core {

    protected $module_credits = array(
        'module_uri' => DIBX_DIVI_BUILDER_X_WEBSITE . '/modules/logo-slider/',
        'author'     => DIBX_DIVI_BUILDER_X_AUTHOR,
        'author_uri' => DIBX_DIVI_BUILDER_X_WEBSITE,
    );

    public function init() {

        $this->name        = esc_html__('Logo Slider', 'dibx-divi-builder-x');
        $this->icon_path   = $this->dibx_module_icon('logo-slider');
        $this->slug        = 'dibx_logo_slider';
        $this->child_slug  = 'dibx_logo_slider_child';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Builder X';

        $this->settings_modal_toggles = array(
            'general'                       => array(
                'toggles'                   => array(
                    'content'               => esc_html__('Content', 'dibx-divi-builder-x'),
                    'slider_settings'       => esc_html__( 'Slider Settings', 'dibx-divi-builder-x' ),
                    'navigation_settings'       => esc_html__( 'Navigation Settings', 'dibx-divi-builder-x' ),
                ),
            ),
            'advanced'                      => array(
                'toggles'                   => array(
                    'image_border'          => esc_html__( 'Image Border', 'dibx-divi-builder-x' ),
                    'dots'          => esc_html__( 'Dots', 'dibx-divi-builder-x' ),
                    'arrows'          => esc_html__( 'Arrows', 'dibx-divi-builder-x' ),
                    'slider_item'          => esc_html__( 'Slider Item', 'dibx-divi-builder-x' ),
                ),
            ),
        );

        $this->custom_css_fields = array(
			'slider_item'     => array(
				'label'        => esc_html__( 'Slider Item', 'dibx-divi-builder-x' ),
				'selector'     => '%%order_class%% .dibx_logo_slider-container img.dibx_logo_slider-item',
            ),
			'left_arrow'     => array(
				'label'        => esc_html__( 'Slider Left Arrow', 'dibx-divi-builder-x' ),
				'selector'     => '%%order_class%% .dibx_slider_icon.dibx_prev_icon .dibx_icon',
            ),
			'right_arrow'     => array(
				'label'        => esc_html__( 'Slider Right Arrow', 'dibx-divi-builder-x' ),
				'selector'     => '%%order_class%% .dibx_slider_icon.dibx_next_icon .dibx_icon',
            ),
			'dots'     => array(
				'label'        => esc_html__( 'Dots', 'dibx-divi-builder-x' ),
				'selector'     => '%%order_class%% .dibx_logo_slider-container .slick-dots li button',
            ),
			'active_dots'     => array(
				'label'        => esc_html__( 'Active Dot', 'dibx-divi-builder-x' ),
				'selector'     => '%%order_class%% .dibx_logo_slider-container .slick-dots li.slick-active button',
            ),
        );
    }


    public function get_fields() {

        $et_accent_color = et_builder_accent_color();

        $slider_settings = array(
            'autoplay'            => array(
                'label'           => esc_html__('Autoplay', 'dibx-divi-builder-x'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__('Content entered here will appear inside the module.', 'dibx-divi-builder-x'),
                'options'         => array(
                    'on'          => esc_html__('Yes', 'dibx-divi-builder-x'),
                    'off'         => esc_html__('No', 'dibx-divi-builder-x'),
                ),
                'default'         => 'on',
                'toggle_slug'     => 'slider_settings',
                'mobile_options'   => true,
            ),
            'autoplay_delay'      => array(
                'label'           => esc_html__('Autoplay Delay', 'dibx-divi-builder-x'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Adjust the autoplay delay in milliseconds (ms)', 'dibx-divi-builder-x'),
                'default'         => '2000',
                'toggle_slug'     => 'slider_settings',
                'show_if'         => array(
                    'autoplay'    => 'on'
                )
            ),
            'loop'                => array(
                'label'           => esc_html__('Loop', 'dibx-divi-builder-x'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__('Content entered here will appear inside the module.', 'dibx-divi-builder-x'),
                'options'         => array(
                    'on'          => esc_html__('Yes', 'dibx-divi-builder-x'),
                    'off'         => esc_html__('No', 'dibx-divi-builder-x'),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'slider_settings',
            ),
            'centered_mode'       => array(
                'label'           => esc_html__('Center Slide', 'dibx-divi-builder-x'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__('Content entered here will appear inside the module.', 'dibx-divi-builder-x'),
                'options'         => array(
                    'on'          => esc_html__('Yes', 'dibx-divi-builder-x'),
                    'off'         => esc_html__('No', 'dibx-divi-builder-x'),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'slider_settings',
            ),

            'pause_on_hover'      => array(
                'label'           => esc_html__('Pause On Hover', 'dibx-divi-builder-x'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__('Enable this option if you want to pause the slider on mouse hover', 'dibx-divi-builder-x'),
                'options'         => array(
                    'on'          => esc_html__('Yes', 'dibx-divi-builder-x'),
                    'off'         => esc_html__('No', 'dibx-divi-builder-x'),
                ),
                'default'         => 'on',
                'toggle_slug'     => 'slider_settings',
                'show_if'         => array(
                    'autoplay'    => 'on'
                )
            ),

            'is_grab'             => array(
                'label'           => esc_html__('Use Grab Cursor', 'dibx-divi-builder-x'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__('Content entered here will appear inside the module.', 'dibx-divi-builder-x'),
                'options'         => array(
                    'on'          => esc_html__('Yes', 'dibx-divi-builder-x'),
                    'off'         => esc_html__('No', 'dibx-divi-builder-x'),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'slider_settings',
            ),
            'slider_speed'        => array(
                'label'           => esc_html__('Speed', 'dibx-divi-builder-x'),
                'type'            => 'range',
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step'        => 1,
                    'min'         => 1,
                    'max'         => 1000,
                ),
                'default'         => '500',
                'fixed_unit'      => '',
                'validate_unit'   => false,
                'unitless'        => true,
                'toggle_slug'     => 'slider_settings',
            ),
            'rtl'                 => array(
                'label'           => esc_html__('RTL (Slide Right to Left)', 'dibx-divi-builder-x'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__('Turn on if you want to Slide Right to Left', 'dibx-divi-builder-x'),
                'options'         => array(
                    'on'          => esc_html__('Yes', 'dibx-divi-builder-x'),
                    'off'         => esc_html__('No', 'dibx-divi-builder-x'),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'slider_settings',
            ),

            'slide_to_show'        => array(
                'label'             => esc_html__( 'Slide to Show', 'dibx-divi-builder-x' ),
                'description'       => esc_html__( 'Define how many slide you want to show at a time', 'dibx-divi-builder-x' ),
                'type'            => 'range',
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step'        => 1,
                    'min'         => 1,
                    'max'         => 100,
                ),
                'default'         => 4,
                'fixed_unit'      => '',
                'validate_unit'   => false,
                'toggle_slug'   => 'slider_settings',
                'mobile_options'    => true,
            ),

            'slide_to_scroll'        => array(
                'label'             => esc_html__( 'Slide to Scroll', 'dibx-divi-builder-x' ),
                'description'       => esc_html__( 'Define how many slide you want to scroll at a time', 'dibx-divi-builder-x' ),
                'type'            => 'range',
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step'        => 1,
                    'min'         => 1,
                    'max'         => 100,
                ),
                'default'         => 1,
                'fixed_unit'      => '',
                'validate_unit'   => false,
                'toggle_slug'   => 'slider_settings',
                'mobile_options'    => true,
            ),

        );

        $controller = array(
            'is_dots'         => array(
                'label'       => esc_html__('Show Navigation', 'dibx-divi-builder-x'),
                'type'        => 'yes_no_button',
                'description' => esc_html__('Turn on if you want to display slider navigation dots', 'dibx-divi-builder-x'),
                'options'     => array(
                    'on'      => esc_html__('Yes', 'dibx-divi-builder-x'),
                    'off'     => esc_html__('No', 'dibx-divi-builder-x'),
                ),
                'default'     => 'on',
                'toggle_slug' => 'navigation_settings',
                'mobile_options'    => true,
            ),

            'is_arrows'       => array(
                'label'       => esc_html__('Show Arrows', 'dibx-divi-builder-x'),
                'type'        => 'yes_no_button',
                'description' => esc_html__('Turn on if you want to display slider arrows', 'dibx-divi-builder-x'),
                'options'     => array(
                    'on'      => esc_html__('Yes', 'dibx-divi-builder-x'),
                    'off'     => esc_html__('No', 'dibx-divi-builder-x'),
                ),
                'default'     => 'off',
                'toggle_slug' => 'navigation_settings',
                'mobile_options'    => true,
            ),

            'arrow_show_on_hover'       => array(
                'label'       => esc_html__('Show Arrows on Hover', 'dibx-divi-builder-x'),
                'type'        => 'yes_no_button',
                'description' => esc_html__('Turn on if you want to show arrows on hover the slider', 'dibx-divi-builder-x'),
                'options'     => array(
                    'on'      => esc_html__('Yes', 'dibx-divi-builder-x'),
                    'off'     => esc_html__('No', 'dibx-divi-builder-x'),
                ),
                'default'     => 'off',
                'toggle_slug' => 'navigation_settings',
                'show_if'       => array(
                    'is_arrows' => 'on'
                )
            ),

        );

        $slider = array(
            'space_between'       => array(
                'label'           => esc_html__('Space Between Sliders', 'dibx-divi-builder-x'),
                'type'            => 'range',
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step'        => 1,
                    'min'         => 0,
                    'max'         => 100,
                ),
                'default'         => '15px',
                'default_unit'         => 'px',
                'tab_slug'      => 'advanced',
                'toggle_slug'     => 'slider_item',
            ),
        );

        $arrows = array(
            'prev_icon'     => array(
                'label'           => esc_html__( 'Previous Icon', 'dibx-divi-builder-x' ),
                'description'     => esc_html__( 'Change previous arrow icon', 'dibx-divi-builder-x' ),
                'type'            => 'select_icon',
                'default'         => '&#x34;||divi||400',
                'toggle_slug'     => 'navigation_settings',
                'show_if'         => array(
                    'is_arrows'   => 'on'
                )
            ),

            'next_icon'     => array(
                'label'           => esc_html__( 'Next Icon', 'dibx-divi-builder-x' ),
                'description'     => esc_html__( 'Change next arrow icon', 'dibx-divi-builder-x' ),
                'type'            => 'select_icon',
                'default'         => '&#x35;||divi||400',
                'toggle_slug'     => 'navigation_settings',
                'show_if'         => array(
                    'is_arrows'   => 'on'
                )
            ),

            'icon_color'         => array(
                'label'          => esc_html__( 'Icon Color', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define arrows icon color', 'dibx-divi-builder-x' ),
                'type'           => 'color-alpha',
                'default'        => '#ffffff',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'arrows',
                'hover'          => 'tabs',
                'mobile_options' => true,
                'show_if'         => array(
                    'is_arrows'   => 'on'
                )
            ),

            'icon_bg'            => array(
                'label'          => esc_html__( 'Icon Background', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define arrows icon background color', 'dibx-divi-builder-x' ),
                'type'           => 'color-alpha',
                'default'        => '#bdbdbd',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'arrows',
                'hover'          => 'tabs',
                'mobile_options' => true,
                'show_if'         => array(
                    'is_arrows'   => 'on'
                )
            ),

            'icon_size'          => array(
                'label'          => esc_html__( 'Icon Size', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Here you can change your arrows icon size.', 'dibx-divi-builder-x' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '20px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'        => 10,
                    'step'       => 1,
                    'max'        => 250,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'arrows',
                'show_if'         => array(
                    'is_arrows'   => 'on'
                )
            ),
            'icon_padding'        => array(
                'label'                => esc_html__( 'Icon Padding', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Define custom padding for arrow icon', 'dibx-divi-builder-x' ),
                'type'                 => 'custom_padding',
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'arrows',
                'sub_toggle'           => 'back',
                'default'              => '10px|10px|10px|10px',
                'mobile_options'       => true,
                'show_if'         => array(
                    'is_arrows'   => 'on'
                )
            ),

            'icon_margin'         => array(
                'label'                => esc_html__( 'Icon Margin', 'dibx-divi-builder-x' ),
                'description'          => esc_html__( 'Define custom margin for arrow icon', 'dibx-divi-builder-x' ),
                'type'                 => 'custom_margin',
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'arrows',
                'sub_toggle'           => 'back',
                'default'              => '0px|0px|0px|0px',
                'mobile_options'       => true,
                'show_if'         => array(
                    'is_arrows'   => 'on'
                )
            ),
        );

        $dots = array(
            'dots_color'         => array(
                'label'          => esc_html__( 'Dots Color', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define dots icon color', 'dibx-divi-builder-x' ),
                'type'           => 'color-alpha',
                'default'        => '#bdbdbd',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'dots',
                'hover'          => 'tabs',
                'mobile_options' => true,
                'show_if'         => array(
                    'is_dots'   => 'on'
                ),
                'mobile_optios'     => true,
            ),

            'active_dot_color'         => array(
                'label'          => esc_html__( 'Acitve Dot Color', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define active dots color', 'dibx-divi-builder-x' ),
                'type'           => 'color-alpha',
                'default'        => '#000000',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'dots',
                'hover'          => 'tabs',
                'mobile_options' => true,
                'show_if'         => array(
                    'is_dots'   => 'on'
                ),
                'mobile_optios'     => true,
            ),

            'dots_size'          => array(
                'label'          => esc_html__( 'Dots Size', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Here you can change your arrows dots size.', 'dibx-divi-builder-x' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '10px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'        => 10,
                    'step'       => 1,
                    'max'        => 250,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'dots',
                'show_if'         => array(
                    'is_dots'   => 'on'
                ),
                'mobile_optios'     => true,
            ),

        );

        return array_merge($slider_settings, $controller, $slider, $arrows, $dots);
    }

    public function get_advanced_fields_config() {

        // Get theme accent color
        $et_accent_color = et_builder_accent_color();

        $advanced_fields                   = array();
        $advanced_fields[ 'text' ]         = false;
        $advanced_fields[ 'text_shadow' ]  = false;
        $advanced_fields[ 'fonts' ]        = false;

        $advanced_fields[ 'borders' ][ 'arrow_icon' ] = array(
            'label_prefix'          => esc_html__('Arrow Icon', 'dibx-divi-builder-x'),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'arrows', 
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dibx_slider_icon',
                    'border_styles' => '%%order_class%% .dibx_slider_icon',
                ),
                'important'         => true,
            ),
            'defaults'              => array(
                'border_radii'      => 'on|50px|50px|50px|50px',
                'border_styles'     => array(
                    'width'         => '0px',
                    'color'         => $et_accent_color,
                    'style'         => 'solid',
                ),
            ),
        );

        $advanced_fields[ 'borders' ][ 'slider_item' ] = array(
            'label_prefix'          => esc_html__('Arrow Icon', 'dibx-divi-builder-x'),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'slider_item', 
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dibx_logo_slider-item',
                    'border_styles' => '%%order_class%% .dibx_logo_slider-item',
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

        return $advanced_fields;
        
    }

    public function render_prev_icon() {

        return sprintf(
            '<button class="dibx_slider_icon dibx_prev_icon">
                <i class="dibx_icon">%1$s</i>
            </button>',
            $this->dibx_render_icon('prev_icon')
        );
    }

    public function render_next_icon() {

        return sprintf(
            '<button class="dibx_slider_icon dibx_next_icon">
                <i class="dibx_icon">%1$s</i>
            </button>',
            $this->dibx_render_icon('next_icon')
        );
    }

    public function render($attrs, $content ,$render_slug) {

        $show_on_hover = $this->props['arrow_show_on_hover'] === 'on' ? 'show-arrow-on-hover': '';
        
        // Enqueue slick slider css and js
        wp_enqueue_style('dibx-slick');
        wp_enqueue_script('dibx-slick');
        wp_enqueue_script('dibx-slick-logo-slider');

        $this->render_css($render_slug);
        
        return sprintf(
            '<div class="dibx_logo_slider-container %3$s" data-settings=\'%2$s\'> 
                %1$s 
            </div>',
            $this->content,
            $this->dibx_get_slick_slider_settings(),
            $show_on_hover
            
        );
    }

   public function render_css($render_slug) {

    $space_between = $this->props['space_between'];

        $this->generate_styles(
            array(
                'utility_arg'    => 'icon_font_family',
                'render_slug'    => $render_slug,
                'base_attr_name' => 'prev_icon',
                'important'      => true,
                'selector'       => '%%order_class%% .dibx_prev_icon .dibx_icon',
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
                'base_attr_name' => 'next_icon',
                'important'      => true,
                'selector'       => '%%order_class%% .dibx_next_icon .dibx_icon',
                'processor'      => array(
                    'ET_Builder_Module_Helper_Style_Processor',
                    'process_extended_icon',
                ),
            )
        );

        // Space between slider
        ET_Builder_Element::set_style(
            $render_slug,
            array(
                'selector' => '%%order_class%% .slick-list',
                'declaration' => "margin: 0 -$space_between",
            ),
        );
        ET_Builder_Element::set_style(
            $render_slug,
            array(
                'selector' => '%%order_class%% .slick-list .slick-slide',
                'declaration'   => "margin: 0 $space_between;"
            ),
        );

        $this->dibx_responsive_css($render_slug, array(
            [
                'option_slug'   => 'icon_size',
                'property'      => 'font-size',
                'selector'      => '%%order_class%% .dibx_slider_icon i.dibx_icon',
            ],
            [
                'option_slug'   => 'icon_bg',
                'property'      => 'background',
                'selector'      => '%%order_class%% .dibx_slider_icon',
                'hover'      => '%%order_class%% .dibx_slider_icon:hover',
            ],
            [
                'option_slug'   => 'icon_color',
                'property'      => 'color',
                'selector'      => '%%order_class%% .dibx_slider_icon i.dibx_icon',
                'hover'      => '%%order_class%% .dibx_slider_icon:hover i.dibx_icon',
            ],
            [
                'option_slug'   => 'icon_padding',
                'property'      => 'padding',
                'selector'      => '%%order_class%% .dibx_slider_icon',
            ],
            [
                'option_slug'   => 'icon_margin',
                'property'      => 'margin',
                'selector'      => '%%order_class%% .dibx_slider_icon',
            ],
            // Dots
            [
                'option_slug'   => 'dots_color',
                'property'      => 'background',
                'selector'      => '%%order_class%% .slick-dots li button',
            ],
            [
                'option_slug'   => 'active_dot_color',
                'property'      => 'background',
                'selector'      => '%%order_class%% .slick-dots li.slick-active button',
            ],
            [
                'option_slug'   => 'active_dot_color',
                'property'      => 'background',
                'selector'      => '%%order_class%% .slick-dots li button:hover',
            ],
            [
                'option_slug'   => 'dots_size',
                'property'      => 'width',
                'selector'      => '%%order_class%% .slick-dots li button',
            ],
            [
                'option_slug'   => 'dots_size',
                'property'      => 'height',
                'selector'      => '%%order_class%% .slick-dots li button',
            ],
        ));

        // Arrows
        
   }
}

new DIBX_Logo_Slider();