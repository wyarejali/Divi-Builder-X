<?php

class DIBX_Icon_List extends DIBX_Module_Core {

    protected $module_credits = array(
        'module_uri'        => DIBX_DIVI_BUILDER_X_WEBSITE . '/module/icon-list/',
        'author'            => DIBX_DIVI_BUILDER_X_AUTHOR,
        'author_uri'        => DIBX_DIVI_BUILDER_X_WEBSITE,
    );

    public function init() {

        $this->name        = esc_html__( 'Icon List', 'dibx-divi-builder-x' );
        $this->slug        = 'dibx_icon_list';
        $this->child_slug = 'dibx_icon_list_child';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Builder X';
        $this->icon_path   = $this->dibx_module_icon('icon-list');

        $this->settings_modal_toggles = array(
            'general'                       => array(
                'toggles'                   => array(
                    'content' => esc_html__( 'Content', 'dibx-divi-builder-x' ),
                ),
            ),
            'advanced'                      => array(
                'toggles'                   => array(
                    'layout'      => esc_html__( 'Layout', 'dibx-divi-builder-x' ),
                    'icon'        => esc_html__( 'Icon', 'dibx-divi-builder-x' ),
                    'title'       => esc_html__( 'Title', 'dibx-divi-builder-x' ),
                    'description' => esc_html__( 'Description', 'dibx-divi-builder-x' ),
                    'list_item'   => esc_html__( 'List Item', 'dibx-divi-builder-x' ),
                ),
            ),
        );
    }

    public function get_fields() {

        $et_accent_color = et_builder_accent_color();

        $layout = array(

            'horizontal_align'     => array(
                'label'           => esc_html__( 'Horizontal Align', 'dibx-divi-builder-x' ),
                'type'            => 'text_align',
                'option_category' => 'configuration',
                'options'         => et_builder_get_text_orientation_options(array('justified' )),
                'default'         => 'left',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
                'mobile_options'  => true,
            ),

            'vertical_align'         => array(
                'label'          => esc_html__( 'Vartical Align', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define the content vertical alignement', 'dibx-divi-builder-x' ),
                'type'           => 'select',
                'options'        => array(
                    'flex-start' => esc_html__( 'Top', 'dibx-divi-builder-x' ),
                    'center'     => esc_html__( 'Vertically Center', 'dibx-divi-builder-x' ),
                    'flex-end'   => esc_html__( 'Bottom', 'dibx-divi-builder-x' ),
                ),
                'default'        => 'center',
                'mobile_options' => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
            ),

            'icon_gap'        => array(
                'label'          => esc_html__( 'Icon Gap', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define space between media and content', 'dibx-divi-builder-x' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '5px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'        => 0,
                    'step'       => 1,
                    'max'        => 500,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
            )
        );

        $design = array(
            'icon_bg'            => array(
                'label'          => esc_html__( 'Icon Background', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Here you can change icon background color.', 'dibx-divi-builder-x' ),
                'type'           => 'color-alpha',
                'default'        => $this->$et_accent_color,
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'mobile_options' => true,
            ),

            'icon_color'         => array(
                'label'          => esc_html__( 'Icon Color', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Here you can change icon color.', 'dibx-divi-builder-x' ),
                'type'           => 'color-alpha',
                'default'        => '#000000',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'mobile_options' => true,
            ),

            'icon_size'          => array(
                'label'          => esc_html__( 'Icon Size', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Here you can change icon size.', 'dibx-divi-builder-x' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '20px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 1000,
                ),
            ),

            'icon_padding'       => array(
                'label'          => esc_html__( 'Image/Icon Padding', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define custom padding for icon', 'dibx-divi-builder-x' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),

            'icon_margin'        => array(
                'label'          => esc_html__( 'Image/Icon Margin', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define custom margin for icon', 'dibx-divi-builder-x' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),
        );

        $items = array(
            'item_margin'        => array(
                'label'          => esc_html__( 'Item Margin', 'dibx-divi-builder-x' ),
                'descripton'     => esc_html__( 'Define custom margin for price iamge', 'dibx-divi-builder-x' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'list_item',
                'default'        => '0px|0px|10px|0px',
                'mobile_options' => true,
            ),

            'item_padding'       => array(
                'label'          => esc_html__( 'Item Padding', 'dibx-divi-builder-x' ),
                'descripton'     => esc_html__( 'Define custom padding for price iamge', 'dibx-divi-builder-x' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'list_item',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),
        );

        return array_merge($layout, $design, $items);
    }

    public function get_advanced_fields_config() {

        // Get theme accent color
        $et_accent_color = et_builder_accent_color();

        $advanced_fields                   = array();
        $advanced_fields[ 'text' ]         = false;
        $advanced_fields[ 'text_shadow' ]  = array();
        $advanced_fields[ 'fonts' ]        = array();

        // Flip card border
        $advanced_fields[ 'borders' ][ 'list_item' ] = array(
			'label_prefix'          => esc_html__( 'List Item', 'dibx-divi-builder-x' ),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'list_item',
			'css'                   => array(
				'main'              => array(
					'border_radii'  => '%%order_class%% .dibx_icon_list_item',
					'border_styles' => '%%order_class%% .dibx_icon_list_item',
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

        // icon border
        $advanced_fields[ 'borders' ][ 'icon' ] = array(
            'label_prefix'          => esc_html__( 'Icon', 'dibx-divi-builder-x' ),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'icon',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dibx_icon_list-icon i.dibx_icon',
                    'border_styles' => '%%order_class%% .dibx_icon_list-icon i.dibx_icon',
                ),
                'important'         => false,
            ),
            'depends_show_if'       => array(
                'media_type'        => 'icon',
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

        $advanced_fields[ 'fonts' ][ 'title' ] = array(
            'label'                 => esc_html__('Title', 'dibx-divi-builder-x'),
            'css'                   => array(
                'main'              => '%%order_class%% .dibx_icon_list-title',
                'important'         => false,
            ),
            'header_level'          => array(
                'default'           => 'h5',
            ),
            'font_size'             => array(
                'default'           => '18px',
            ),
            'options_priority'      => array(
                'header_text_color' => 9,
            ),
            'tab_slug'              => 'advanced',
            'sub_toggle'            => 'title',
            'line_height'           => array(
                'default'           => '1.5em',
            ),
        );

        $advanced_fields[ 'fonts' ][ 'description' ] = array(
            'label'             => esc_html__( 'Description', 'dibx-divi-builder-x' ),
            'css'               => array(
                'main'          => '%%order_class%% .dibx_icon_list-description p',
                'important'     => false,
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'description',
            'font_size'         => array(
                'default'       => '14px',
            ),
            'line_height'       => array(
                'default'       => '1.2em',
            ),
        );

        return $advanced_fields;
    }

    public function render($attrs, $content, $render_slug) {

        $this->render_css($render_slug);

        return sprintf(
            '<div class="dibx_icon_list-container">
                <div class="dibx_icon_list-items-wrapper">
                    %1$s
                </div>
            </div>',
            $this->content
        );
    }

    public function render_css($render_slug){

        $this->dibx_responsive_css($render_slug, array(
            [
                'option_slug'       => 'horizontal_align',
                'property'          => 'justify-content',
                'selector'          => '%%order_class%% .dibx_icon_list-item'
            ],
    
            [
                'option_slug'       => 'vertical_align',
                'property'          => 'align-items',
                'selector'          => '%%order_class%% .dibx_icon_list-item'
            ],
            
            [
                'option_slug'       => 'icon_gap',
                'property'          => 'gap',
                'selector'          => '%%order_class%% .dibx_icon_list-item'
            ],
    
            // Icon
            [
                'option_slug'       => 'icon_size',
                'property'          => 'font-size',
                'selector'          => '%%order_class%% .dibx_icon_list-icon i.dibx_icon'
            ],
    
            [
                'option_slug'       => 'icon_color',
                'property'          => 'color',
                'selector'          => '%%order_class%% .dibx_icon_list-icon i.dibx_icon'
            ],
    
            [
                'option_slug'       => 'icon_bg',
                'property'          => 'background',
                'selector'          => '%%order_class%% .dibx_icon_list-icon i.dibx_icon'
            ],
    
            [
                'option_slug'       => 'icon_padding',
                'property'          => 'padding',
                'selector'          => '%%order_class%% .dibx_icon_list-icon i.dibx_icon'
            ],
    
            [
                'option_slug'       => 'icon_margin',
                'property'          => 'margin',
                'selector'          => '%%order_class%% .dibx_icon_list-icon'
            ],
    
            [
                'option_slug'       => 'item_margin',
                'property'          => 'margin',
                'selector'          => '%%order_class%% .dibx_icon_list_child',
                'important'         => true,
            ],
            
            [
                'option_slug'       => 'item_padding',
                'property'          => 'padding',
                'selector'          => '%%order_class%% .dibx_icon_list_child',
                'important'         => true,
            ],
        ));

    }
}

new DIBX_Icon_List();