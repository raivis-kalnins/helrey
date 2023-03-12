<?php
/**
 * Footer Global / Scripts & global settings - before </body>
 */
add_action('wp_footer', 'footer_global');

function footer_global() {
?>
<!-- Footer DP Global -->

<?php /* if( has_post_thumbnail() ) :  $hero_bg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<!-- BG Hero -->
<style>.hero-banner{background-image:url('<?=$hero_bg[0]; ?>');}</style>
<!-- /BG Hero -->
<?php endif; */ ?>
<?php edit_post_link(); ?>
<div id="close-menu-body"></div>
<!-- /Footer DP Global -->
<?php
};
