<?php

// =============================================================================
// VIEWS/INTEGRITY/WP-INDEX.PHP
// -----------------------------------------------------------------------------
// Index page output for Integrity.
// =============================================================================

?>

<?php get_header(); ?>

  <div class="x-container max width offset">
    <div class="<?php x_main_content_class(); ?>" role="main">

      <?php x_get_view( 'global', '_index' ); ?>

    </div>

    <?php get_sidebar(); ?>

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
								<a class="x-btn x-btn-square x-btn-regular alignleft" target="_blank" href="https://onelink.quickgifts.com/merchant/mattitos-tex-mex/"><em>Click here to</em><br>
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