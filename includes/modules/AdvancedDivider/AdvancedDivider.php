<?php

class DIBX_Divider extends DIBX_Module_Core {

    protected $module_credits = array(
        'module_uri'        => DIBX_DIVI_BUILDER_X_WEBSITE . 'module/advanced-divider/',
        'author'            => DIBX_DIVI_BUILDER_X_AUTHOR,
        'author_uri'        => DIBX_DIVI_BUILDER_X_WEBSITE,
    );

    public function init()
    {
        $this->name        = esc_html__( 'Advanced Divider', 'dibx-divi-builder-x' );
        $this->slug        = 'dibx_divider';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Builder X';
        $this->icon_path   = $this->dibx_module_icon('divider');

        $this->settings_modal_toggles = array(
            'general'                       => array(
                'toggles'                   => array(
                    'content'               => esc_html__( 'Content', 'dibx-divi-builder-x' ),
                ),
            ),
            'advanced'                      => array(
                'toggles'                   => array(
                    'divider'               => esc_html__( 'Divider', 'dibx-divi-builder-x' ),
                    'divider_text'          => array(
                        'title'             => esc_html__( 'Divider Text', 'dibx-divi-builder-x' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'text'          => array(
                                'name'      => esc_html__( 'Text', 'dibx-divi-builder-x' ),
                            ),
                            'style'         => array(
                                'name'      => esc_html__( 'Style', 'dibx-divi-builder-x' ),
                            ),
                        )
                    ),
                    'icon'                  => esc_html__( 'Icon', 'dibx-divi-builder-x' ),
                ),
            ),
        );

        $this->custom_css_fields = array(
            'divider' => array(
				'label'    => esc_html__( 'Divider', 'dibx-divi-builder-x' ),
				'selector' => '%%order_class%% .dibx_divider_wrapper .dibx_divider',
            ),
            'icon' => array(
				'label'    => esc_html__( 'Icon', 'dibx-divi-builder-x' ),
				'selector' => '%%order_class%% .dibx_divider_icon i.dibx_icon',
            ),
            'divider_text' => array(
				'label'    => esc_html__( 'Divider Text', 'dibx-divi-builder-x' ),
				'selector' => '%%order_class%% .dibx_divider-title',
            ),
        );
    }

    public function get_fields() {
        $et_accent_color = et_builder_accent_color();

        $content = array(
            'use_text'            => array(
                'label'           => esc_html__( 'Use Text', 'dibx-divi-builder-x' ),
                'description'     => esc_html__( 'Define content type icon/text', 'dibx-divi-builder-x' ), 
                'type'            => 'yes_no_button',
                'toggle_slug'     => 'content',
                'option_category' => 'configuration',
                'options'         => array(
                    'on'          => esc_html__( 'Yes', 'dibx-divi-builder-x' ),
                    'off'         => esc_html__( 'No', 'dibx-divi-builder-x' ),
                ),
                'default'         => 'off',
            ),

            'divider_icon'        => array(
                'label'           => esc_html__( 'Icon', 'dibx-divi-builder-x' ),
                'description'     => esc_html__( 'Define divider icon', 'dibx-divi-builder-x' ),
                'type'            => 'select_icon',
                'toggle_slug'     => 'content',
                'show_if'         => array(
                    'use_text'    => 'off'
                )
            ),

            'divider_text'        => array(
                'label'           => esc_html__( 'Divider Text', 'dibx-divi-builder-x' ),
                'description'     => esc_html__( 'Enter your divider text here', 'dibx-divi-builder-x' ),
                'type'            => 'text',
                'toggle_slug'     => 'content',
                'show_if'         => array(
                    'use_text'    => 'on'
                ),
            ),

        );

        $styles = array(
            'icon_color'         => array(
                'label'          => esc_html__( 'Icon Color', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define divider icon color', 'dibx-divi-builder-x' ),
                'type'           => 'color-alpha',
                'default'        => $et_accent_color,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'show_if'        => array(
                    'use_text'   => 'off',
                ),
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),

            'icon_bg'            => array(
                'label'          => esc_html__( 'Icon Background', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define divider iocn background color', 'dibx-divi-builder-x' ),
                'type'           => 'color-alpha',
                'default'        => '',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'show_if'        => array(
                    'use_text'   => 'off'
                ),
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),

            'icon_size'          => array(
                'label'          => esc_html__( 'Icon Size', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Here you can change your divider icon size.', 'dibx-divi-builder-x' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '30px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'        => 10,
                    'step'       => 1,
                    'max'        => 250,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'show_if'        => array(
                    'use_text'   => 'off',
                ),
            ),

            'icon_padding'       => array(
                'label'          => esc_html__( 'Padding', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define custom padding for divider icon', 'dibx-divi-builder-x' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '10px|10px|10px|10px',
                'mobile_options' => true,
                'show_if'        => array(
                    'use_text'   => 'off',
                ),
            ),

            'divider_color'      => array(
                'label'          => esc_html__( 'Divider Color', 'dibx-divi-builder-x' ),
                'discription'    => esc_html__( 'Define the divi line color', 'dibx-divi-builder-x' ),
                'type'           => 'color-alpha',
                'default'        => $et_accent_color,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'default'        => '#0dc8f1',

            ),

            'divider_style'      => array(
                'label'          => esc_html__( 'Divider Style', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define the divider style', 'dibx-divi-builder-x' ),
                'type'           => 'select',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'options'        => array(
                    'dotted'     => esc_html__( 'Dotted', 'dibx-divi-builder-x' ),
                    'dashed'     => esc_html__( 'Dashed', 'dibx-divi-builder-x' ),
                    'solid'      => esc_html__( 'Solid', 'dibx-divi-builder-x' ),
                    'double'     => esc_html__( 'Double', 'dibx-divi-builder-x' ),
                    'groove'     => esc_html__( 'Groove', 'dibx-divi-builder-x' ),
                    'ridge'      => esc_html__( 'Ridge', 'dibx-divi-builder-x' ),
                    'inset'      => esc_html__( 'Inset', 'dibx-divi-builder-x' ),
                    'outset'     => esc_html__( 'Outset', 'dibx-divi-builder-x' ),
                    'none'       => esc_html__( 'None', 'dibx-divi-builder-x' ),
                ),
                'default'        => 'solid',
                'mobile_options' => true,
            ),
            'divider_position'   => array(
                'label'          => esc_html__( 'Divider Postions', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define the divider positions', 'dibx-divi-builder-x' ),
                'type'           => 'select',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'options'        => array(
                    'flex-start' => esc_html__( 'Top', 'dibx-divi-builder-x' ),
                    'center'     => esc_html__( 'Vertically Center', 'dibx-divi-builder-x' ),
                    'flex-end'   => esc_html__( 'Bottom', 'dibx-divi-builder-x' ),
                ),
                'default'        => 'center',
                'mobile_options' => true,
            ),
            'divider_weight'     => array(
                'label'          => esc_html__( 'Divider Weight', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define space between divider and text/icon', 'dibx-divi-builder-x' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'        => 0,
                    'step'       => 1,
                    'max'        => 250,
                ),
                'default'        => '1px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'mobile_options' => true,
            ),
            'divider_gap'        => array(
                'label'          => esc_html__( 'Divider Space', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define space between divider and text/icon', 'dibx-divi-builder-x' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'        => 0,
                    'step'       => 1,
                    'max'        => 250,
                ),
                'default'        => '15px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'mobile_options' => true,
            ),

            'text_bg'            => array(
                'label'          => esc_html__( 'Text Background', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define divider text background color', 'dibx-divi-builder-x' ),
                'type'           => 'color-alpha',
                'default'        => '',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider_text',
                'sub_toggle'     => 'style',
                'show_if'        => array(
                    'use_text'   => 'on'
                ),
                'mobile_options' => true,
            ),

            'text_padding'       => array(
                'label'          => esc_html__( 'Text Padding', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define custom padding for divider text', 'dibx-divi-builder-x' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider_text',
                'sub_toggle'     => 'style',
                'default'        => '6px|10px|6px|10px',
                'mobile_options' => true,
                'show_if'        => array(
                    'use_text'   => 'on',
                ),
            ),

        );

        return array_merge($content, $styles);
    }

    public function get_advanced_fields_config() {

        $et_accent_color = et_builder_accent_color();

        $advanced_fields                = array();
        $advanced_fields['text']        = false;
        $advanced_fields['text_shadow'] = false;
        $advanced_fields['fonts']       = array();

        $advanced_fields['fonts']['divider_text'] = array(
            'label'             => esc_html__( 'Divider', 'dibx-divi-builder-x' ),
            'css'               => array(
                'main'          => '%%order_class%% .dibx_divider_wrapper .dibx_divider-title',
                'important'     => 'all',
            ),
            'header_level'      => array(
                'default'       => 'h3',
            ),
            'font_size'         => array(
                'default'       => '26px',
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'divider_text',
            'sub_toggle'        => 'text',
            'show_if'           => array(
                'use_text'      => 'on'
            )
        );

        $advanced_fields['borders']['divider_icon'] = array(
            'label_prefix'          => esc_html__( 'Icon', 'dibx-divi-builder-x' ),
            'toggle_slug'           => 'icon',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dibx_divider_icon',
                    'border_styles' => '%%order_class%% .dibx_divider_icon',
                ),
                'important'         => 'all',
            ),
            'defaults'              => array(
                'border_radii'      => 'on|0px|0px|0px|0px',
                'border_styles'     => array(
                    'width'         => '0px',
                    'color'         => $et_accent_color,
                    'style'         => 'none',
                ),
            ),
            'show_if'               => array(
                'use_text'          => 'off',
            )
        );
        $advanced_fields['borders']['divider_text'] = array(
            'label_prefix'          => esc_html__( 'Divider Text', 'dibx-divi-builder-x' ),
            'toggle_slug'           => 'divider_text',
            'sub_toggle'            => 'style',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dibx_divider-title',
                    'border_styles' => '%%order_class%% .dibx_divider-title',
                ),
                'important'         => 'all',
            ),
            'defaults'              => array(
                'border_radii'      => 'on|0px|0px|0px|0px',
                'border_styles'     => array(
                    'width'         => '0px',
                    'color'         => $et_accent_color,
                    'style'         => 'none',
                ),
            ),
        );

        return $advanced_fields;
    }

    public function render_icon() {

        return sprintf(
            '<div class="dibx_divider_icon">
                <i class="dibx_icon">%1$s</i>
            </div>',
            $this->dibx_render_icon('divider_icon')
        );
    }

    public function render_heading() {

        $heading = $this->props['divider_text'];
        $heading_level = et_pb_process_header_level($this->props['divider_text_level'], 'h3' );

        return sprintf(
            '<%1$s class="dibx_divider-title">%2$s</%1$s>',
            $heading_level,
            $heading
        );
    }

    public function render_content() {

        $is_text = $this->props['use_text'];

        if ($is_text === 'on' ) {
            return $this->render_heading();
        }

        return $this->render_icon();
    }

    public function render($attrs, $content, $render_slug) {

        $this->render_css($render_slug);
        $dividier_position = $this->props['divider_position'];
        $classes = array();
        array_push($classes, 'dibx_divider-' . $dividier_position);

        return sprintf(
            '<div class="dibx_divider_wrapper %1$s">
                <div class="dibx_divider-before dibx_divider"></div>
                %2$s
                <div class="dibx_divider-after dibx_divider"></div>
            </div>',
            join( ' ', $classes), // 1
            $this->render_content(), // 2
        );
    }

    public function render_css($render_slug) {
 
        $divider_style  = $this->props['divider_style'];
        $divider_weight = $this->props['divider_weight'];
        $divider_color  = $this->props['divider_color'];

        $this->generate_styles(
            array(
                'utility_arg'    => 'icon_font_family',
                'render_slug'    => $render_slug,
                'base_attr_name' => 'divider_icon',
                'important'      => true,
                'selector'       => '%%order_class%% .dibx_divider_icon .dibx_icon',
                'processor'      => array(
                    'ET_Builder_Module_Helper_Style_Processor',
                    'process_extended_icon',
                ),
            )
        );

        ET_Builder_Element::set_style(
            $render_slug,
            array(
                'selector' => '%%order_class%% .dibx_divider',
                'declaration' => sprintf(
                    'border-top-style: %1$s; border-top-width: %2$s; border-top-color: %3$s',
                    $divider_style,
                    $divider_weight,
                    $divider_color
                ),
            )
        );

        $this->dibx_responsive_css($render_slug, array(
            [
                'option_slug'   => 'icon_color',
                'property'      => 'color',
                'selector'      => '%%order_class%% .dibx_divider_icon i.dibx_icon',
                'hover'      => '%%order_class%% .dibx_divider_icon:hover i.dibx_icon',
            ], 
            [
                'option_slug'   => 'icon_bg',
                'property'      => 'background',
                'selector'      => '%%order_class%% .dibx_divider_icon i.dibx_icon',
                'hover'         => '%%order_class%% .dibx_divider_icon:hover i.dibx_icon',
            ], 
            [
                'option_slug'   => 'icon_size',
                'property'      => 'font-size',
                'selector'      => '%%order_class%% .dibx_divider_icon i.dibx_icon',
            ], 
            [
                'option_slug'   => 'icon_padding',
                'property'      => 'padding',
                'selector'      => '%%order_class%% .dibx_divider_icon i.dibx_icon',
            ],
            [
                'option_slug'   => 'text_bg',
                'property'      => 'background',
                'selector'      => '%%order_class%% .dibx_divider-title',
            ],
            [
                'option_slug'   => 'text_padding',
                'property'      => 'padding',
                'selector'      => '%%order_class%% .dibx_divider-title',
            ],
            [
                'option_slug'   => 'divider_gap',
                'property'      => 'gap',
                'selector'      => '%%order_class%% .dibx_divider_wrapper',
            ], 
        ));

    }
}

new DIBX_Divider();
