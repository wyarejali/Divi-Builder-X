<?php

class DIBX_PriceList extends DIBX_Module_Core {

    protected $module_credits = array(
        'module_uri' => DIBX_DIVI_BUILDER_X_WEBSITE . 'modules/image-accordion/',
        'author'     => DIBX_DIVI_BUILDER_X_AUTHOR,
        'author_uri' => DIBX_DIVI_BUILDER_X_WEBSITE,
    );

    public function init() {

        $this->name        = esc_html__( 'Price List', 'dibx-divi-builder-x' );
        $this->icon_path   = $this->dibx_module_icon('price-list');
        $this->slug        = 'dibx_pricelist';
        $this->child_slug  = 'dibx_pricelist_child';
        $this->child_item_text = esc_html__( 'Price Item', 'dibx-divi-builder-x' );
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Builder X';

        $this->settings_modal_toggles = array(
            'general'                       => array(
                'toggles'                   => array(
                    'content'               => esc_html__( 'Content', 'dibx-divi-builder-x' ),
                ),
            ),
            'advanced'                      => array(
                'toggles'                   => array(
                    'layout'                => esc_html__( 'Layout', 'dibx-divi-builder-x' ),
                    'icon'                  => esc_html__( 'Price Icon', 'dibx-divi-builder-x' ),
                    'image'                 => esc_html__( 'Price Image', 'dibx-divi-builder-x' ),
                    'item'                  => esc_html__( 'List Item', 'dibx-divi-builder-x' ),
                    'content'               => array(
                        'title'             => esc_html__( 'Price List Texts', 'dibx-divi-builder-x' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'title'         => array(
                                'name'      => esc_html__( 'Title', 'dibx-divi-builder-x' ),
                            ),
                            'description'   => array(
                                'name'      => esc_html__( 'Description', 'dibx-divi-builder-x' ),
                            ),
                            'price'         => array(
                                'name'      => esc_html__( 'Price', 'dibx-divi-builder-x' ),
                            ),
                        )
                    ),
                ),
            ),
        );

        $this->custom_css_fields = array(
			'separator'     => array(
				'label'        => esc_html__( 'Divider', 'dibx-divi-builder-x' ),
				'selector'     => '%%order_class%% .dibx_pricelist-content .dibx_pricelist-divider',
            ),
			'icon_wrapper'  => array(
				'label'        => esc_html__( 'Icon Wrapper', 'dibx-divi-builder-x' ),
				'selector'     => '%%order_class%% .dibx_pricelist-icon',
            ),
			'icon'          => array(
				'label'        => esc_html__( 'Icon', 'dibx-divi-builder-x' ),
				'selector'     => '%%order_class%% .dibx_pricelist-icon i.dibx_icon',
            ),
			'image_wrapper' => array(
				'label'        => esc_html__( 'Image Wrapper', 'dibx-divi-builder-x' ),
				'selector'     => '%%order_class%% .dibx_pricelist-image',
            ),
			'image'         => array(
				'label'        => esc_html__( 'Image', 'dibx-divi-builder-x' ),
				'selector'     => '%%order_class%% .dibx_pricelist-image img',
            ),
			'title'         => array(
				'label'        => esc_html__( 'Price Title', 'dibx-divi-builder-x' ),
				'selector'     => '%%order_class%% .dibx_pricelist-content .dibx_pricelist-title',
            ),
			'price'         => array(
				'label'        => esc_html__( 'Price', 'dibx-divi-builder-x' ),
				'selector'     => '%%order_class%% .dibx_pricelist-content .dibx_pricelist-price',
            ),
			'description'   => array(
				'label'        => esc_html__( 'Description', 'dibx-divi-builder-x' ),
				'selector'     => '%%order_class%% .dibx_pricelist-content .dibx_pricelist-description p',
            ),
        );
    }

    public function get_fields() {
         
        $layout = array(
            'layout'             => array(
                'label'          => esc_html__( 'Choose Layout', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Here you can choose different type of style', 'dibx-divi-builder-x' ),
                'type'           => 'select',
                'options'        => array(
                    'flex'       => esc_html__( 'Media position left', 'dibx-divi-builder-x' ),
                    'block'      => esc_html__( 'Media position top', 'dibx-divi-builder-x' ),
                ),
                'default'        => 'flex',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'mobile_options' => true,
            ),

            'content_position'   => array(
                'label'          => esc_html__( 'Content alignement', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define the content vertical alignement', 'dibx-divi-builder-x' ),
                'type'           => 'select',
                'options'        => array(
                    'flex-start' => esc_html__( 'Top', 'dibx-divi-builder-x' ),
                    'center'     => esc_html__( 'Vertically Center', 'dibx-divi-builder-x' ),
                    'flex-end'   => esc_html__( 'Bottom', 'dibx-divi-builder-x' ),
                ),
                'default'        => 'flex-start',
                'mobile_options' => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'show_if'        => array(
                    'layout'     => 'flex',
                ),
            ),

            'content_gap'        => array(
                'label'          => esc_html__( 'Content space', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define space between media and content', 'dibx-divi-builder-x' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '15px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'        => 0,
                    'step'       => 1,
                    'max'        => 500,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'show_if'        => array(
                    'layout'     => 'flex',
                ),
            )
        );

        $icon_design = array(
            'icon_bg'            => array(
                'label'          => esc_html__( 'Icon Background', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Here you can change icon background color.', 'dibx-divi-builder-x' ),
                'type'           => 'color-alpha',
                'default'        => '',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),

            'icon_color'         => array(
                'label'          => esc_html__( 'Icon Color', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Here you can change icon color.', 'dibx-divi-builder-x' ),
                'type'           => 'color-alpha',
                'default'        => '#333333',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),

            'icon_size'          => array(
                'label'          => esc_html__( 'Icon Size', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Here you can change icon size.', 'dibx-divi-builder-x' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '30px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'hover'          => 'tabs',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'        => 0,
                    'step'       => 1,
                    'max'        => 1000,
                ),
            ),

            'icon_padding'       => array(
                'label'          => esc_html__( 'Image/Icon Padding', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define custom padding for divider icon', 'dibx-divi-builder-x' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),

            'icon_margin'        => array(
                'label'          => esc_html__( 'Image/Icon Margin', 'dibx-divi-builder-x' ),
                'description'    => esc_html__( 'Define custom margin for divider icon', 'dibx-divi-builder-x' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),
        );

        $image_design = array(
            'image_align'         => array(
                'label'           => esc_html__( 'Image Alignment', 'dibx-divi-builder-x' ),
                'type'            => 'select',
                'option_category' => 'configuration',
                'options'         => array(
                    'flex-start'  => esc_html__( 'Left', 'dibx-divi-builder-x' ),
                    'center'      => esc_html__( 'Center', 'dibx-divi-builder-x' ),
                    'flex-end'    => esc_html__( 'Right', 'dibx-divi-builder-x' ),
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'image',
                'default'         => 'flex-start',
                'mobile_options'  => true
            ),

            'image_width'         => array(
                'label'           => esc_html__( 'Image Width', 'dibx-divi-builder-x' ),
                'description'     => esc_html__( 'Here you can change image width.', 'dibx-divi-builder-x' ),
                'type'            => 'range',
                'default_unit'    => '%',
                'default'         => '50%',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'image',
                'mobile_options'  => true,
                'range_settings'  => array(
                    'min'         => 0,
                    'step'        => 1,
                    'max'         => 100,
                ),
            ),

            'image_margin'        => array(
                'label'           => esc_html__( 'Image Margin', 'dibx-divi-builder-x' ),
                'descripton'      => esc_html__( 'Define custom margin for price iamge', 'dibx-divi-builder-x' ),
                'type'            => 'custom_margin',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'image',
                'default'         => '0px|0px|0px|0px',
                'mobile_options'  => true,
            ),

            'image_padding'       => array(
                'label'           => esc_html__( 'Image Padding', 'dibx-divi-builder-x' ),
                'descripton'      => esc_html__( 'Define custom padding for price iamge', 'dibx-divi-builder-x' ),
                'type'            => 'custom_padding',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'image',
                'default'         => '0px|0px|0px|0px',
                'mobile_options'  => true,
            ),
        );

        $divider = array(
            'divider_color'      => array(
                'label'          => esc_html__( 'Divider Color', 'dibx-divi-builder-x' ),
                'discription'    => esc_html__( 'Define the divi line color', 'dibx-divi-builder-x' ),
                'type'           => 'color-alpha',
                'default'        => '#333333',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'default'        => '#0dc8f1',
                'hover'          => 'tabs',
                'mobile_options' => true,

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
                'label'          => esc_html__( 'Divider Vertical Align', 'dibx-divi-builder-x' ),
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
                    'max'        => 25,
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
        );

        $custom_spacing = array(
            'item_margin'        => array(
                'label'           => esc_html__( 'Item Margin', 'dibx-divi-builder-x' ),
                'descripton'      => esc_html__( 'Define custom margin for price iamge', 'dibx-divi-builder-x' ),
                'type'            => 'custom_margin',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'item',
                'default'         => '0px|0px|20px|0px',
                'mobile_options'  => true,
            ),

            'item_padding'       => array(
                'label'           => esc_html__( 'Item Padding', 'dibx-divi-builder-x' ),
                'descripton'      => esc_html__( 'Define custom padding for price iamge', 'dibx-divi-builder-x' ),
                'type'            => 'custom_padding',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'item',
                'default'         => '0px|0px|0px|0px',
                'mobile_options'  => true,
            ),
        );


        return array_merge( $layout, $icon_design, $image_design, $divider, $custom_spacing );
    }

     // Modify existing functionalities and add new functionalities
     public function get_advanced_fields_config() {

        // Get theme accent color
        $et_accent_color = et_builder_accent_color();

        $advanced_fields                   = array();
        $advanced_fields[ 'text' ]         = false;
        $advanced_fields[ 'text_shadow' ]  = array();
        $advanced_fields[ 'fonts' ]        = array();

        // Flip card border
        $advanced_fields[ 'borders' ][ 'list_item' ] = array(
			'label_prefix'          => esc_html__( 'Price item', 'dibx-divi-builder-x' ),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'item',
			'css'                   => array(
				'main'              => array(
					'border_radii'  => '%%order_class%% .dibx_pricelist_item',
					'border_styles' => '%%order_class%% .dibx_pricelist_item',
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
                    'border_radii'  => '%%order_class%% .dibx_pricelist-icon i.dibx_icon',
                    'border_styles' => '%%order_class%% .dibx_pricelist-icon i.dibx_icon',
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

        // Image border
        $advanced_fields[ 'borders' ][ 'image' ] = array(
            'label_prefix'          => esc_html__( 'Image', 'dibx-divi-builder-x' ),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'image',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dibx_pricelist-image',
                    'border_styles' => '%%order_class%% .dibx_pricelist-image',
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
            'label'             => esc_html__( 'Title', 'dibx-divi-builder-x' ),
            'css'               => array(
                'main'          => '%%order_class%% .dibx_pricelist-title',
                'important'     => false,
            ),
            'font_size'         => array(
                'default'       => '18px',
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'content',
            'sub_toggle'        => 'title',
            'line_height'       => array(
                'default'       => '1.5em',
            ),
        );

        $advanced_fields[ 'fonts' ][ 'price' ] = array(
            'label'             => esc_html__( 'Price', 'dibx-divi-builder-x' ),
            'css'               => array(
                'main'          => '%%order_class%% .dibx_pricelist-price',
                'important'     => false,
            ),
            'font_size'         => array(
                'default'       => '18px',
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'content',
            'sub_toggle'        => 'price',
            'line_height'       => array(
                'default'       => '1.3em',
            ),
        );

        $advanced_fields[ 'fonts' ][ 'description' ] = array(
            'label'             => esc_html__( 'Description', 'dibx-divi-builder-x' ),
            'css'               => array(
                'main'          => '%%order_class%% .dibx_pricelist-description p',
                'important'     => false,
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'content',
            'sub_toggle'        => 'description',
            'font_size'         => array(
                'default'       => '14px',
            ),
            'line_height'       => array(
                'default'       => '1.2em',
            ),
        );

        return $advanced_fields;
    }

    public function render($attrs, $content, $render_slug)
    {

        $this->render_css($render_slug);      

        return sprintf(
            '<div class="dibx_pricelist-container">
                <div class="dibx_pricelist-wrapper">
                    %1$s
                </div>
            </div>',
            $this->content,
            $this->props[ 'layout' ]
        );
    }

    public function render_css($render_slug) {

        $this->dibx_responsive_css($render_slug, array(
            [
                'option_slug'       => 'layout',
                'property'          => 'display',
                'selector'          => '%%order_class%% .dibx_pricelist-item-wrapper'
            ],
            [
                'option_slug'       => 'content_position',
                'property'          => 'align-items',
                'selector'          => '%%order_class%% .dibx_pricelist-item-wrapper'
            ],
            [
                'option_slug'       => 'content_gap',
                'property'          => 'gap',
                'selector'          => '%%order_class%% .dibx_pricelist-item-wrapper'
            ],
            [
                'option_slug'       => 'icon_size',
                'property'          => 'font-size',
                'selector'          => '%%order_class%% .dibx_pricelist-icon i.dibx_icon',
                'hover'             => '%%order_class%% .dibx_pricelist_child:hover .dibx_pricelist-icon i.dibx_icon'
            ],
            [
                'option_slug'       => 'icon_color',
                'property'          => 'color',
                'selector'          => '%%order_class%% .dibx_pricelist-icon i.dibx_icon',
                'hover'             => '%%order_class%% .dibx_pricelist_child:hover .dibx_pricelist-icon i.dibx_icon'
            ],
            [
                'option_slug'       => 'icon_bg',
                'property'          => 'background',
                'selector'          => '%%order_class%% .dibx_pricelist-icon i.dibx_icon',
                'hover'             => '%%order_class%% .dibx_pricelist_child:hover .dibx_pricelist-icon i.dibx_icon'
            ],
            [
                'option_slug'       => 'icon_padding',
                'property'          => 'padding',
                'selector'          => '%%order_class%% .dibx_pricelist-icon i.dibx_icon'
            ],
            [
                'option_slug'       => 'icon_margin',
                'property'          => 'margin',
                'selector'          => '%%order_class%% .dibx_pricelist-icon'
            ],
            [
                'option_slug'       => 'image_width',
                'property'          => 'width',
                'selector'          => '%%order_class%% .dibx_pricelist-image-wrapper'
            ],
            [
                'option_slug'       => 'image_margin',
                'property'          => 'margin',
                'selector'          => '%%order_class%% .dibx_pricelist-image'
            ],
            [
                'option_slug'       => 'image_padding',
                'property'          => 'padding',
                'selector'          => '%%order_class%% .dibx_pricelist-image'
            ],
            [
                'option_slug'       => 'image_align',
                'property'          => 'justify-content',
                'selector'          => '%%order_class%% .dibx_pricelist-image-wrapper'
            ],
            [
                'option_slug'       => 'divider_color',
                'property'          => 'border-color',
                'selector'          => '%%order_class%% .dibx_pricelist-divider',
                'hover'             => '%%order_class%% .dibx_pricelist_child:hover .dibx_pricelist-divider',
            ],
            [
                'option_slug'       => 'divider_style',
                'property'          => 'border-style',
                'selector'          => '%%order_class%% .dibx_pricelist-divider'
            ],
            [
                'option_slug'       => 'divider_weight',
                'property'          => 'border-bottom-width',
                'selector'          => '%%order_class%% .dibx_pricelist-divider'
            ],
            [
                'option_slug'       => 'divider_gap',
                'property'          => 'gap',
                'selector'          => '%%order_class%% .dibx_pricelist-heading'
            ],
            [
                'option_slug'       => 'divider_position',
                'property'          => 'align-items',
                'selector'          => '%%order_class%% .dibx_pricelist-heading'
            ],
            [
                'option_slug'       => 'item_margin',
                'property'          => 'margin',
                'selector'          => '%%order_class%% .dibx_pricelist_item',
                'important'         => true,
            ],
            [
                'option_slug'       => 'item_padding',
                'property'          => 'padding',
                'selector'          => '%%order_class%% .dibx_pricelist_item',
                'important'         => true,
            ],
        ));

        
    }

}

new DIBX_PriceList();