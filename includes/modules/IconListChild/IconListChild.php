<?php

class DIBX_Icon_List_Child extends DIBX_Module_Core {

    public function init() {

        $this->name                     = esc_html__( 'Icon List Item', 'dibx-divi-nations' );
        $this->type                     = 'child';
        $this->slug                     = 'dibx_icon_list_child';
        $this->child_title_var          = 'title';
        $this->child_title_fallback_var = 'title';
        $this->vb_support               = 'on';

        $this->settings_modal_toggles = array(
            'general'      => array(
                'toggles'      => array(
                    'content' => esc_html__( 'Content', 'dibx-divi-nations' ),
                ),
            ),
            'advanced'       => array(
                'toggles'      => array(
                    'icon' => esc_html__( 'Icon', 'dibx-divi-nations' ),
                ),
            ),
        );
    }

    public function get_fields() {

        return array(
            'icon'                   => array(
                'label'              => esc_html__( 'Select Icon', 'dibx-divi-builder-x' ),
                'type'               => 'select_icon', 
                'toggle_slug'        => 'content',
                'tab_slug'           => 'general',
            ),

            'title'                  => array(
                'label'              => esc_html__( 'Title', 'dibx-divi-builder-x' ),
                'description'        => esc_html__( 'Define icon list title.', 'dibx-divi-builder-x' ),
                'type'               => 'text',
                'toggle_slug'        => 'content',
                'dynamic_content'    => 'text',
            ),

            'description'            => array(
                'label'              => esc_html__( 'Description', 'dibx-divi-builder-x' ),
                'description'        => esc_html__( 'Define icon list description', 'dibx-divi-builder-x' ),
                'type'               => 'tiny_mce',
                'toggle_slug'        => 'content',
                'dynamic_content'    => 'text',
            ),
        );
    }

    public function get_advanced_fields_config() {

        $advanced_fields                   = array();

        $advanced_fields[ 'fonts' ][ 'title' ] = array(
            'label'                 => esc_html__( 'Title', 'dibx-divi-builder-x' ),
            'css'                   => array(
                'main'              => '%%order_class%% .dibx_icon_list-title',
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
            'toggle_slug'           => 'title',
            'line_height'           => array(
                'default'           => '1.5em',
            ),
        );

        $advanced_fields[ 'margin_padding' ] = array(
            'css'           => array(
                'important' => 'all',
            )
        );
    
        return $advanced_fields;
        
    }

    public function render_icon() {

        return sprintf(
            '<div class="dibx_icon_list-icon">
                <i class="dibx_icon">%1$s</i>
            </div>',
            $this->dibx_render_icon('icon')
        );
        
    }

    public function render_title() {

        $heading = $this->props[ 'title' ];
        $heading_level = et_pb_process_header_level($this->props[ 'title_level' ], 'h5' );

        if (!empty($heading)) {

            return sprintf(
                '<%1$s class="dibx_icon_list-title">%2$s</%1$s>',
                $heading_level,
                $heading
            );
        }
    }

    public function render_descrption() {

        return sprintf(
            '<div class="dibx_icon_list-descripton">
                %1$s
            </div>', 
            $this->render_MCE($this->props[ 'description' ])
        );
    }

    public function render($attrs, $content, $render_slug) {

        $this->render_css($render_slug);

        return sprintf(
            '<div class="dibx_icon_list-item">
                %1$s
                <div class="dibx_icon_list-content">
                    %2$s
                    %3$s
                </div>
            </div>',
            $this->render_icon(),
            $this->render_title(),
            $this->render_descrption()
        );
    }

    public function render_css($render_slug){
        // Gernerate icon style
        $this->generate_styles(
            array(
                'utility_arg'    => 'icon_font_family',
                'render_slug'    => $render_slug,
                'base_attr_name' => 'icon',
                'important'      => true,
                'selector'       => '%%order_class%% .dibx_icon_list-icon i.dibx_icon',
                'processor'      => array(
                    'ET_Builder_Module_Helper_Style_Processor',
                    'process_extended_icon',
                ),
            )
        );
    }
}

new DIBX_Icon_List_Child();