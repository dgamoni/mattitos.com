<?php

// =============================================================================
// VIEWS/INTEGRITY/CONTENT.PHP
// -----------------------------------------------------------------------------
// Standard post output for Integrity.
// =============================================================================

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( !is_single() ) : ?>
		<?php x_get_view( 'integrity', '_content', 'post-header' ); ?>
		<div class="entry-featured">
			<!-- Featured Image Tracer -->
			<?php if(has_post_thumbnail()){
				x_featured_image();
			} else {
				?>
				<a href="<?php the_permalink(); ?>" class="entry-thumb" title="<?php the_title(); ?>" style="outline: none;"><img width="477" height="249" src="<?php echo bloginfo('wpurl'); ?>/wp-content/uploads/2017/08/default_featured.png" class="attachment-entry size-entry wp-post-image" alt=""></a>
				<?php
			}; ?>
			
			<!-- END Featured Image Tracer -->
		</div>
	<?php endif; ?>  
  <div class="entry-wrap">
		<?php if ( is_single() ) : ?>
			<?php x_get_view( 'integrity', '_content', 'post-header' ); ?>			
		<?php endif; ?>  
    <?php x_get_view( 'global', '_content' ); ?>
  </div>
  <?php x_get_view( 'integrity', '_content', 'post-footer' ); ?>
</article>