<?php

// =============================================================================
// VIEWS/GLOBAL/_NAVBAR.PHP
// -----------------------------------------------------------------------------
// Outputs the navbar.
// =============================================================================

$navbar_position = x_get_navbar_positioning();
$logo_nav_layout = x_get_logo_navigation_layout();
$is_one_page_nav = x_is_one_page_navigation();

?>

<?php if ( ( $navbar_position == 'static-top' || $navbar_position == 'fixed-top' || $is_one_page_nav ) && $logo_nav_layout == 'stacked' ) : ?>
  <div class="x-logobar">
    <div class="x-logobar-inner">
      <div class="x-container max width">
		<a href="<?php echo bloginfo('wpurl') ?>" class="x-brand img" title="Bold Tex Mex in Dallas | Dallas Mexican Restaurant" style="outline: none;">
			<img class="shadowfilter" src="<?php echo bloginfo('wpurl') ?>/wp-content/uploads/2017/08/logo.png" alt="Bold Tex Mex in Dallas | Dallas Mexican Restaurant">
		</a>
			<img id="boldtextmex" src="<?php echo get_stylesheet_directory_uri(); ?>/images/boldtexmex.png">
      </div>
    </div>
  </div>

  <div class="x-navbar-wrap">
    <div class="<?php x_navbar_class(); ?>">
      <div class="x-navbar-inner">
        <div class="x-container max width">
          <?php x_get_view( 'global', '_nav', 'primary' ); ?>
        </div>
      </div>
    </div>
  </div>

<?php else : ?>

  <div class="x-navbar-wrap">
    <div class="<?php x_navbar_class(); ?>">
      <div class="x-navbar-inner">
        <div class="x-container max width">
          <?php x_get_view( 'global', '_brand' ); ?>
          <?php x_get_view( 'global', '_nav', 'primary' ); ?>
        </div>
      </div>
    </div>
  </div>

<?php endif; ?>