<?php

namespace DIBX_DIVI_BUILDER_X;

/**
 * Assets handlers class
 */
class DIBX_Assets
{

    /**
     * Class constructor
     */
    function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'register_assets']);
        add_action('admin_enqueue_scripts', [$this, 'register_assets']);
    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function get_scripts()
    {
        return [
            'divi-default_values-script' => [
                'src'     => DIBX_DIVI_BUILDER_X_URL . '/assets/js/dibx-default-values.js',
                'version' => filemtime(DIBX_DIVI_BUILDER_X_PATH . '/assets/js/dibx-default-values.js'),
                'deps'    => ['jquery'],
                'enqueue' => true
            ],

            'dibx-marquee-script' => [
                'src'     => DIBX_DIVI_BUILDER_X_URL . '/assets/js/dibx-marquee-text.js',
                'version' => filemtime(DIBX_DIVI_BUILDER_X_PATH . '/assets/js/dibx-marquee-text.js'),
                'deps'    => ['jquery'],
                'enqueue' => false
            ],

            //Slick
            'dibx-slick' => [
                'src'     => DIBX_DIVI_BUILDER_X_URL . '/assets/lib/slick/slick.min.js',
                'version' => filemtime(DIBX_DIVI_BUILDER_X_PATH . '/assets/lib/slick/slick.min.js'),
                'deps'    => ['jquery'],
                'enqueue' => false
            ],
            'dibx-slick-logo-slider' => [
                'src'     => DIBX_DIVI_BUILDER_X_URL . '/assets/js/dibx-slick-logo-slider.js',
                'version' => filemtime(DIBX_DIVI_BUILDER_X_PATH . '/assets/js/dibx-slick-logo-slider.js'),
                'deps'    => ['jquery'],
                'enqueue' => false
            ],

        ];
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles()
    {
        return [
            'divi-nations-admin-style' => [
                'src'     => DIBX_DIVI_BUILDER_X_URL . '/assets/admin/css/admin.css',
                'version' => filemtime(DIBX_DIVI_BUILDER_X_PATH . '/assets/admin/css/admin.css'),
                'enqueue' => true
            ],
            'global' => [
                'src'     => DIBX_DIVI_BUILDER_X_URL . '/assets/css/global.css',
                'version' => filemtime(DIBX_DIVI_BUILDER_X_PATH . '/assets/css/global.css'),
                'enqueue' => true
            ],

            // Slick
            'dibx-slick' => [
                'src'     => DIBX_DIVI_BUILDER_X_URL . '/assets/lib/slick/slick.css',
                'version' => filemtime(DIBX_DIVI_BUILDER_X_PATH . '/assets/lib/slick/slick.css'),
                'enqueue' => false
            ],
        ];
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets()
    {
        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        foreach ($scripts as $handle => $script) {
            $deps = isset($script['deps']) ? $script['deps'] : false;

            if ($script['enqueue']) {
                wp_enqueue_script($handle, $script['src'], $deps, $script['version'], true);
            } else {
                wp_register_script($handle, $script['src'], $deps, $script['version'], true);
            }
        }

        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false;

            if ($style['enqueue']) {
                wp_enqueue_style($handle, $style['src'], $deps, $style['version']);
            } else {
                wp_register_style($handle, $style['src'], $deps, $style['version']);
            }
        }

        // wp_localize_script( 'academy-enquiry-script', 'weDevsAcademy', [
        //     'ajaxurl' => admin_url( 'admin-ajax.php' ),
        //     'error'   => __( 'Something went wrong', 'wedevs-academy' ),
        // ] );

        // wp_localize_script( 'academy-admin-script', 'weDevsAcademy', [
        //     'nonce' => wp_create_nonce( 'wd-ac-admin-nonce' ),
        //     'confirm' => __( 'Are you sure?', 'wedevs-academy' ),
        //     'error' => __( 'Something went wrong', 'wedevs-academy' ),
        // ] );
    }
}
