<?php
add_action( 'wp_footer', 'sharpspring_masterCode', 100 );
function sharpspring_masterCode() { ?>
<script type="text/javascript">
var _ss = _ss || [];
_ss.push(['_setDomain', 'https://koi-3QN9SDISN0.marketingautomation.services/net']);
_ss.push(['_setAccount', 'KOI-3SEY3QOI88']);
_ss.push(['_trackPageView']);
(function() {
    var ss = document.createElement('script');
    ss.type = 'text/javascript'; ss.async = true;

    ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-3QN9SDISN0.marketingautomation.services/client/ss.js?ver=1.1.1';
    var scr = document.getElementsByTagName('script')[0];
    scr.parentNode.insertBefore(ss, scr);
})();
</script>


<?php if(is_page(192)){ ?>
<script type="text/javascript">
    var __ss_noform = __ss_noform || [];
    __ss_noform.push(['baseURI', 'https://app-3QN9SDISN0.marketingautomation.services/webforms/receivePostback/MzawMDG1NDEzAAA/']);
    __ss_noform.push(['endpoint', '8217cd2a-de00-4dd9-9ba6-09cd70a2a184']);
</script>
<script type="text/javascript" src="https://koi-3QN9SDISN0.marketingautomation.services/client/noform.js?ver=1.24" ></script>
<?php } ?>
<?php if(is_page(130)){ /*Banquet Page*/ ?> 
<script type="text/javascript">
    var __ss_noform = __ss_noform || [];
    __ss_noform.push(['baseURI', 'https://app-3QN9SDISN0.marketingautomation.services/webforms/receivePostback/MzawMDG1NDEzAAA/']);
    __ss_noform.push(['endpoint', '2f492707-8bff-442c-8f31-26d6684dc733']);
</script>
<script type="text/javascript" src="https://koi-3QN9SDISN0.marketingautomation.services/client/noform.js?ver=1.24" ></script>
<script>
// document.addEventListener( 'wpcf7mailsent', function( event ) {
//     location = '<?php echo bloginfo('wpurl'); ?>/thank-you-for-your-reservation/';
// }, false );
</script>
<?php } ?>
<?php if(is_page(213)){ ?>
<script type="text/javascript">
    var __ss_noform = __ss_noform || [];
    __ss_noform.push(['baseURI', 'https://app-3QN9SDISN0.marketingautomation.services/webforms/receivePostback/MzawMDG1NDEzAAA/']);
    __ss_noform.push(['endpoint', '8eaf08bb-bafb-44f3-97a4-36d472299f53']);
</script>
<script type="text/javascript" src="https://koi-3QN9SDISN0.marketingautomation.services/client/noform.js?ver=1.24" ></script>
<?php } ?>
<?php if(is_page(116) || is_page(199) || is_page(202) || is_page(206) || is_page(211)){ ?>
<script type="text/javascript">
    var __ss_noform = __ss_noform || [];
    __ss_noform.push(['baseURI', 'https://app-3QN9SDISN0.marketingautomation.services/webforms/receivePostback/MzawMDG1NDEzAAA/']);
    __ss_noform.push(['endpoint', '03394ef2-6d82-49a5-ba95-bc998001095c']);
</script>
<script type="text/javascript" src="https://koi-3QN9SDISN0.marketingautomation.services/client/noform.js?ver=1.24" ></script>
<?php }
} // Close Hook Code

//////////////////////////////////////// CF7 Redirect Forms Pages
function contactForm7() {
  if( is_page(130) || is_page(192) || is_page(199) || is_page(116) || is_page(202) || is_page(206) || is_page(211) || is_page(224) ) { ?>
  <script>
    document.addEventListener( 'wpcf7mailsent', function( event ) {
      location = '<?php echo bloginfo('wpurl'); ?>/thank-you';
    }, false );
  </script>
  <?php }
}
add_action( 'wp_footer', 'contactForm7', 100 );

// fixing date picker

add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

add_action('wp_head', 'replacethiswithyourthemename_wcf7_datepickerfix');
function replacethiswithyourthemename_wcf7_datepickerfix(){
    ?><style>#ui-datepicker-div {z-index:99999999!important;}</style><?php
}
?>