<?php

class DIBX_PriceList_item extends DIBX_Module_Core {

    protected $module_credits = array(
        'module_uri' => 'https://divi-nations/modules/pricelist/',
        'author'     => 'Divi Nations',
        'author_uri' => 'https://divi-nations.com/',
    );

    public function init() {
        $this->name                     = esc_html__( 'Price Item', 'dibx-divi-builder-x' );
        $this->slug                     = 'dibx_pricelist_child';
        $this->vb_support               = 'on';
        $this->type                     = 'child';
        $this->child_title_var          = 'title';
        $this->child_title_fallback_var = 'title';
        $this->main_css_element         = "%%order_class%%";

        $this->settings_modal_toggles = array(
            'general'                       => array(
                'toggles'                   => array(
                    'content'               => esc_html__( 'Content', 'dibx-divi-builder-x' ),
                ),
            ),
            'advanced'                      => array(
                'toggles'                   => array(
                    'content'               => array(
                        'title'             => esc_html__( 'Content', 'dibx-divi-builder-x' ),
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
                'image'                     => esc_html__( 'Price Image', 'dibx-divi-builder-x' ),
            ),
        );
    }

    public function get_fields() {

        $general =  array(
            'admin_label'            => array(
                'label'              => esc_html__( 'Admin Label', 'divi_flash' ),
                'type'               => 'text',
                'option_category'    => 'basic_option',
                'toggle_slug'        => 'admin_label',
                'default_on_front'   => 'Accordion Item'
            )
        );
        
        $content = array(
            'media_type'             => array(
                'label'              => esc_html__( 'Media Type', 'dibx-divi-builder-x' ),
                'description'        => esc_html__( 'Select front side media type.', 'dibx-divi-builder-x' ),
                'type'               => 'select',
                'tab_slug'           => 'general',
                'toggle_slug'        => 'content',
                'default'            => 'none',
                'options'            => array(
                    'none'           => esc_html__( 'None', 'dibx-divi-builder-x' ),
                    'icon'           => esc_html__( 'Icon', 'dibx-divi-builder-x' ),
                    'image'          => esc_html__( 'Image', 'dibx-divi-builder-x' ),
                ),
            ),

            'icon'                   => array(
                'label'              => esc_html__( 'Select Icon', 'dibx-divi-builder-x' ),
                'description'        => esc_html__( 'Select front side icon.', 'dibx-divi-builder-x' ),
                'type'               => 'select_icon',
                'toggle_slug'        => 'content',
                'tab_slug'           => 'general',
                'show_if'            => array(
                    'media_type'     => 'icon',
                ),
            ),
            
            'image'                  => array(
                'label'              => esc_html__( 'Upload Image', 'dibx-divi-builder-x' ),
                'description'        => esc_html__( 'Upload an image you would like to display for the price list.', 'dibx-divi-builder-x' ),
                'type'               => 'upload',
                'upload_button_text' => esc_attr__('Upload an image', 'dibx-divi-builder-x' ),
                'choose_text'        => esc_attr__('Choose an Image', 'dibx-divi-builder-x' ),
                'update_text'        => esc_attr__('Set As Image', 'dibx-divi-builder-x' ),
                'toggle_slug'        => 'content',
                'show_if'            => array(
                    'media_type'     => 'image',
                ),
            ),

            'image_alt'              => array(
                'label'              => esc_html__( 'Image Alt Text', 'dibx-divi-builder-x' ),
                'description'        => esc_html__( 'Define the front side image alt text for your flip box.', 'dibx-divi-builder-x' ),
                'type'               => 'text',
                'toggle_slug'        => 'content', 
                'show_if'            => array(
                    'media_type'     => 'image',
                ),
            ),

            'title'                  => array(
                'label'              => esc_html__( 'Title', 'dibx-divi-builder-x' ),
                'description'        => esc_html__( 'Define the price list title.', 'dibx-divi-builder-x' ),
                'type'               => 'text',
                'toggle_slug'        => 'content',
                'dynamic_content'    => 'text',
            ),

            'price'                  => array(
                'label'              => esc_html__( 'price', 'dibx-divi-builder-x' ),
                'description'        => esc_html__( 'Define the front side sub-title for your flip box.', 'dibx-divi-builder-x' ),
                'type'               => 'text',
                'default'            => '$0',
                'toggle_slug'        => 'content', 
                'dynamic_content'    => 'text',
            ),

            'description'            => array(
                'label'              => esc_html__( 'Description', 'dibx-divi-builder-x' ),
                'description'        => esc_html__( 'Define the price description', 'dibx-divi-builder-x' ),
                'type'               => 'tiny_mce',
                'toggle_slug'        => 'content',
                'dynamic_content'    => 'text',
            ),
        );

        return array_merge($general, $content);
    }

    // Modify existing functionalities and add new functionalities
    public function get_advanced_fields_config() {
        
        $advanced_fields                   = array();
        $advanced_fields[ 'text' ]         = false;
        $advanced_fields[ 'text_shadow' ]  = false;
        $advanced_fields[ 'fonts' ]        = false;

        $advanced_fields[ 'fonts' ][ 'title' ] = array(
            'label'                 => esc_html__('Title', 'dibx-divi-builder-x'),
            'css'                   => array(
                'main'              => '%%order_class%% .dibx_pricelist-title',
                'important'         => false,
            ),
            'header_level'          => array(
                'default'           => 'h4',
            ),
            'font_size'             => array(
                'default'           => '18px',
            ),
            'options_priority'      => array(
                'header_text_color' => 9,
            ),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'content',
            'sub_toggle'            => 'title',
            'line_height'           => array(
                'default'           => '1.5em',
            ),
        );

        $advanced_fields[ 'fonts' ][ 'price' ] = array(
            'label'             => esc_html__('Price', 'dibx-divi-builder-x'),
            'css'               => array(
                'main'          => '%%order_class%% .dibx_pricelist-price',
                'important'     => false,
            ),
            'header_level'      => array(
                'default'       => 'h4',
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

        $advanced_fields[ 'margin_padding' ] = array(
            'css'           => array(
                'important' => 'all',
            )
        );

        $advanced_fields[ 'filters' ] = array(
            'child_filters_target' => array(
                'tab_slug'         => 'advanced',
                'toggle_slug'      => 'image',
            ),
            'css'                  => array(
                'main'             => '%%order_class%% .dibx_pricelist-image img'
            )
        );

        return $advanced_fields;
    }


    public function render_icon() {

        if (!empty($this->props['icon'])) {

            return sprintf(
                '<div class="dibx_pricelist-icon">
                    <i class="dibx_icon">%1$s</i>
                </div>',
                $this->dibx_render_icon('icon')
            );
        }
    }

    public function render_photo() {

        if (!empty($this->props['image'])) {
            return sprintf(
                '<div class="dibx_pricelist-image-wrapper">
                    <div class="dibx_pricelist-image">
                        <img src="%1$s" alt="%2$s" />
                    </div>
                </div>',
                $this->props['image'],
                $this->props['image_alt'],
            );
        }
    }

    public function render_media() {

        $media_type  = $this->props['media_type'];

        if ($media_type === 'none') return;

        if ($media_type === 'icon') {
            return $this->render_icon();
        }

        if ($media_type === 'image') {
            return $this->render_photo();
        }
    }

    public function render_title() {

        $heading = $this->props['title'];
        $heading_level = et_pb_process_header_level($this->props['title_level'], 'h4');

        return sprintf(
            '<%1$s class="dibx_pricelist-title">%2$s</%1$s>',
            $heading_level,
            $heading
        );
    }

    public function render_price() {

        $heading = $this->props['price'];
        $heading_level = et_pb_process_header_level($this->props['price_level'], 'h4');

        return sprintf(
            '<%1$s class="dibx_pricelist-price">%2$s</%1$s>',
            $heading_level,
            $heading
        );
    }

    public function render($attrs, $content, $render_slug) {

        $this->render_css($render_slug);
        $description   = $this->props['description'];

        return sprintf(
            '<div class="dibx_pricelist-item-wrapper">
                %1$s
                <div class="dibx_pricelist-content">
                    <div class="dibx_pricelist-heading">
                        %2$s
                        <span class="dibx_pricelist-divider"></span>
                        %3$s
                    </div>
                    <div class="dibx_pricelist-description">%4$s</div>                    
                </div>
            </div>',
            $this->render_media(),
            $this->render_title(),
            $this->render_price(),
            $this->render_MCE($description),
        );
    }

    public function render_css($render_slug){
        // Generate Icon style
        $this->generate_styles(
            array(
                'utility_arg'    => 'icon_font_family',
                'render_slug'    => $render_slug,
                'base_attr_name' => 'icon',
                'important'      => true,
                'selector'       => '%%order_class%% .dibx_pricelist-icon .dibx_icon',
                'processor'      => array(
                    'ET_Builder_Module_Helper_Style_Processor',
                    'process_extended_icon',
                ),
            )
        );
    }
}

new DIBX_PriceList_item();