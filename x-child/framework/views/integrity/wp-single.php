<?php

// =============================================================================
// VIEWS/INTEGRITY/WP-SINGLE.PHP
// -----------------------------------------------------------------------------
// Single post output for Integrity.
// =============================================================================

$fullwidth = get_post_meta( get_the_ID(), '_x_post_layout', true );

?>

<?php get_header(); ?>
  <div class="single-custom-header">
		<div class="x-container max width offset">
			<h2>See what's trending<br><strong>Blog</strong></h2>
		</div>
	</div>
  <div class="x-container max width offset">
    <div class="<?php x_main_content_class(); ?>" role="main">

      <?php while ( have_posts() ) : the_post(); ?>
        <?php x_get_view( 'integrity', 'content', get_post_format() ); ?>
        <?php //x_get_view( 'global', '_comments-template' ); ?>
      <?php endwhile; ?>

    </div>

    <?php //if ( $fullwidth != 'on' ) : ?>
      <?php //get_sidebar(); ?>
    <?php //endif; ?>

  </div>
  <div class="single-custom-footer">
		<div id="x-content-band-30" class="x-content-band vc menu-section-bottom man" style="background-color: #c1d42e; padding-top: 0px; padding-bottom: 0px;">
			<div class="x-container max width wpb_row">
				<div class="x-column x-sm vc x-1-1" style="">
					<div id="x-content-band-31" class="x-content-band vc man" style="background-color: transparent; padding-top: 7px; padding-bottom: 5px;">
						<div class="x-container wpb_row">
							<div class="x-column x-sm vc x-1-2" style="">
								<img class="x-img x-img-none right" src="<?php echo bloginfo('wpurl'); ?>/wp-content/uploads/2017/05/gift-card.png">
							</div>
							<div class="x-column x-sm vc col-2 x-1-2" style="">
								<h3 class="h-custom-headline"><span>MATTITO’S<br>
								 GIFT CARDS</span></h3>
								<a class="x-btn x-btn-square x-btn-regular alignleft" href="https://onelink.quickgifts.com/merchant/mattitos-tex-mex/" data-options="thumbnail: ''"><em>Click here to</em><br>
								<strong>BUY SOME</strong></a>
								<p>
									They make great rewards,<br>
									 bribes and gifts.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>