<?php

// =============================================================================
// VIEWS/INTEGRITY/WP-SINGLE-STORE_LOCATIONS.PHP
// -----------------------------------------------------------------------------
// Single portfolio post output for Integrity.
// =============================================================================

?>

<?php get_header(); ?>
  
  <div class="x-container max width offset">
    <div class="x-main full" role="main">

      <?php while ( have_posts() ) : the_post(); ?>
        <?php x_get_view( 'integrity', 'content', 'store-locations' ); ?>
        <?php //x_get_view( 'global', '_comments-template' ); ?>
      <?php endwhile; ?>

    </div>
  </div>

<?php get_footer(); ?>