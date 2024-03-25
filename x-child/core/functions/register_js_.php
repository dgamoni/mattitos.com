<?php
function custom_child_scripts() {

	wp_enqueue_style(
		'mapbox-gl-css', 
		CORE_URL .  '/css/mapbox-gl.css',
		array(),
		'1.1'
	);

	wp_enqueue_style(
		'custom-child-style', 
		CORE_URL .  '/css/custom-child.css',
		array('mapbox-gl-css'),
		rand()
	);


	wp_enqueue_script(
	    'mapbox_custom_script',
	    CORE_URL . '/js/mapbox-gl.js',
        array(), 
        '1.1', 
        true  
	);

	wp_enqueue_script(
	    'map_custom_script',
	    CORE_URL . '/js/map.js',
        array('jquery'), 
        '1.42', 
        true  
	);

	wp_enqueue_script(
	    'custom_script',
	    CORE_URL . '/js/custom.js',
        array(), 
        '1.1', 
        true  
	);

	wp_localize_script( 'custom_script', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	
}
add_action( 'wp_enqueue_scripts', 'custom_child_scripts' ); 

