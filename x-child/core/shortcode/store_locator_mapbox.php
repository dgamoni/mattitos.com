<?php 

add_shortcode( 'store_locator_mapbox', 'store_locator_mapbox_func' );
function store_locator_mapbox_func( $atts ){  

	ob_start();
  
  global $post;
  //var_dump($post->ID);
	?>

  <div class='map_wrap' data-id="<?php echo $post->ID; ?>">

    <div class="sidebar">
      <div class="heading">
        <h1>Our locations</h1>
      </div>
      <div id="listings" class="listings"></div>
    </div>
    <div id="map" class="map mapboxgl-map"></div>


  </div>


	<?php
	$out .= ob_get_contents();
	ob_end_clean();

	return $out;
}	

