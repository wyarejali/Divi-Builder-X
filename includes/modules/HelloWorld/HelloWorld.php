<?php

class DIBX_HelloWorld extends ET_Builder_Module {

	public $slug       = 'dibx_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divibuilderx.unique-ui.com',
		'author'     => 'Unique UI',
		'author_uri' => 'https://unique-ui.com',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'dibx-divi-builder-x' );
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'dibx-divi-builder-x' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dibx-divi-builder-x' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new DIBX_HelloWorld;
