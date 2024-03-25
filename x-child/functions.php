<?php
// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to X in this file.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );

// Posts Link Attributes
// =============================================================================

if ( ! function_exists( 'posts_link_attributes' ) ) :
  function posts_link_attributes() {
    return 'class="prev-next hidden-phone"';
  }

  function posts_link_attributes2() {
    return 'class="next-prev hidden-phone"';
  }

  add_filter( 'next_posts_link_attributes', 'posts_link_attributes2' );
  add_filter( 'previous_posts_link_attributes', 'posts_link_attributes' );
endif;


// Excerpt More String
// =============================================================================

if ( ! function_exists( 'x_excerpt_string' ) ) :
  function x_excerpt_string( $more ) {
    
    $stack = x_get_stack();

    if ( $stack == 'integrity' ) {
      return ' ... <div><a href="' . get_permalink() . '" class="more-links">' . __( 'Interested?<br><strong>Read More</strong>', '__x__' ) . '</a></div>';
    }
  }
  add_filter( 'excerpt_more', 'x_excerpt_string' );
endif;


if ( ! function_exists( 'x_integrity_entry_meta' ) ) :
  function x_integrity_entry_meta() {

    // Author.
    $author = '';
		//sprintf( '<span><i class="x-icon-pencil" data-x-icon="&#xf040;"></i> %s</span>',
      //get_the_author()
    //);

    // Date.
    $date =  sprintf( '<span>Posted <time class="entry-date" datetime="%1$s"> %2$s</time></span> in ',
      esc_attr( get_the_date( 'c' ) ),
      esc_html( get_the_date() )
    );

    // Categories.
    if ( get_post_type() == 'x-portfolio' ) {
      if ( has_term( '', 'portfolio-category', NULL ) ) {
        $categories        = get_the_terms( get_the_ID(), 'portfolio-category' );
        $separator         = ', ';
        $categories_output = '';
        foreach ( $categories as $category ) {
          $categories_output .= '<a href="'
                              . get_term_link( $category->slug, 'portfolio-category' )
                              . '" title="'
                              . esc_attr( sprintf( __( "View all posts in: &ldquo;%s&rdquo;", '__x__' ), $category->name ) )
                              . '"> '
                              . $category->name
                              . '</a>'
                              . $separator;
        }

        $categories_list = sprintf( '<span>%s</span>',
          trim( $categories_output, $separator )
        );
      } else {
        $categories_list = '';
      }
    } else {
      $categories        = get_the_category();
      $separator         = ', ';
      $categories_output = '';
      foreach ( $categories as $category ) {
        $categories_output .= '<a href="'
                            . get_category_link( $category->term_id )
                            . '" title="'
                            . esc_attr( sprintf( __( "View all posts in: &ldquo;%s&rdquo;", '__x__' ), $category->name ) )
                            . '"> '
                            . $category->name
                            . '</a>'
                            . $separator;
      }

      $categories_list = sprintf( '<span>%s</span>',
        trim( $categories_output, $separator )
      );
    }

    // Comments link.
    if ( comments_open() ) {
      $title  = apply_filters( 'x_entry_meta_comments_title', get_the_title() );
      $link   = apply_filters( 'x_entry_meta_comments_link', get_comments_link() );
      $number = apply_filters( 'x_entry_meta_comments_number', get_comments_number() );

	  $text = ( 0 === $number ) ? 'Leave a Comment' : sprintf( _n( '%s Comment', '%s Comments', $number, '__x__' ), $number );

		$comments = '';
		// sprintf( '<span><a href="%1$s" title="%2$s" class="meta-comments"><i class="x-icon-comments" data-x-icon="&#xf086;"></i> %3$s</a></span>',
        // esc_url( $link ),
        // esc_attr( sprintf( __( 'Leave a comment on: &ldquo;%s&rdquo;', '__x__' ), $title ) ),
        // $text
      // );

    } else {
      $comments = '';
    }

    // Output.
    if ( x_does_not_need_entry_meta() ) {
      return;
    } else {
      printf( '<p class="p-meta">%1$s%2$s%3$s%4$s</p>',
        $author,
        $date,
        $categories_list,
        $comments
      );
    }

  }
endif;

// Additional Functions
// =============================================================================

add_action('wp_head', 'heads_meta');
function heads_meta () { ?>
<meta name="msvalidate.01" content="A87E82EC5F66230C609DF67AD0234DB5" />
<!-- Bing Verification Code -->
<?php }
// Display custom post on homepage
function shortcode_store_locations() {
	ob_start();
  $rows = get_field('location_list');	
	echo '<div id="store-location-items">';
	if($rows)
	{		
		foreach($rows as $row)
		{
			$title = $row['name'];
			$address = $row['address'];
			$phone = $row['phone'];
			$url = $row['url'];
			$google_url = $row['google_map_url'];
			
	?>
		
		<div class="store-location-item">				
			<h3><?php echo $title; ?></h3>
			<p class="store-address"><?php echo $address; ?></p>
			<p class="phone"><?php echo $phone; ?></p>
			<div>
				<a href="<?php echo $url; ?>">Let's see the<br><strong>INFO/MENU</strong></a>
				<a href="<?php echo $google_url; ?>" target="_blank">Show me<br><strong>A MAP</strong></a>
			</div>
		</div>

<?php 
	
		}
	}
echo '</div>';
	return ob_get_clean();
}
add_shortcode( 'store_locations_shortcode', 'shortcode_store_locations' );

//////////////////////// Make the Logo Glow
function logo_glow() {
    ?>
    <script>
	jQuery(document).ready(function($) {
		var glow = $('.shadowfilter');
		setInterval(function(){
    		glow.hasClass('glow') ? glow.removeClass('glow') : glow.addClass('glow');
		}, 1000);
		console.log('Got here');
	});
	</script>
    <?php
}
add_action( 'wp_footer', 'logo_glow', 100 );


//////////////////////// Add Sharpspring Master Tracking Code (Cant include in gtm)
include('form-tracking.php');

// load core functions
require_once get_stylesheet_directory() . '/core/load.php';
