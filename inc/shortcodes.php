<?php
/*
*  Create Shortcode to Display Components Post Types [com id=14]
*/
function dp_shortcode_com( $atts ) {
	$atts = shortcode_atts( array( 'id' => null, ), $atts,'com' );
	$content_post = get_post( $atts['id'] );
	$blocks = $content_post->post_content;
	return '<div class="short-component">'. do_blocks( $blocks ).'</div>';
}
add_shortcode( 'com', 'dp_shortcode_com' );

/*
*  Create Shortcode to Display Swiper navigation [swipernav]
*/
function dp_shortcode_swiper_nav( $sw ) {
	$sw = shortcode_atts( array(), $sw,'swipernav' );
	return '<div class="swiper-life"><div class="swiper-life--pagination"></div></div>';
}
add_shortcode( 'swipernav', 'dp_shortcode_swiper_nav' );

/*
*  Create Shortcode to Display Swiper navigation [swipernav_prod]
*/
function dp_shortcode_swiper_nav_prod( $sw ) {
	$sw = shortcode_atts( array(), $sw,'swipernav_prod' );
	return '<div class="swiper_prod"><div class="swiper_prod-prev"></div><div class="swiper_prod-next"></div><hr /></div>';
}
add_shortcode( 'swipernav_prod', 'dp_shortcode_swiper_nav_prod' );

/*
*  Create Shortcode to Display Swiper navigation [swipernav_blog]
*/
function dp_shortcode_swiper_nav_blog( $sw ) {
	$sw = shortcode_atts( array(), $sw,'swipernav_blog' );
	return '<div class="swiper_blog-button-prev"></div><div class="swiper_blog-button-next"></div><div class="swiper_blog-pagination"></div>';
}
add_shortcode( 'swipernav_blog', 'dp_shortcode_swiper_nav_blog' );

/*
*  Create Shortcode to Display Google map [googlemap]
*/
function dp_shortcode_googlemap( $gm ) {
	$gm = shortcode_atts( array(), $gm,'googlemap' );
	return '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2453.0870658134468!2d-0.7624742!3d52.0599383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4877ab6cbc0046f3%3A0xea0128e49be8b3d1!2sRuptura%20InfoSecurity%20Ltd!5e0!3m2!1sen!2suk!4v1673361581173!5m2!1sen!2suk&amp;t=m&amp;z=15&amp;output=embed&amp;iwloc=near" width="100%" height="330" style="border:0;margin-bottom:-25px" allowfullscreen="" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
}
add_shortcode( 'googlemap', 'dp_shortcode_googlemap' );

/*
*  Create Shortcode to Display Intro preload video [intro-video]
*/
// function dp_shortcode_introvideo( $gm ) {
// 	$gm = shortcode_atts( array(), $gm,'intro-video' );
// 	return '<div class="intro-video intro-video__wrap"><video class="intro-video__video" id="introVideo" webkit-playsinline="true" playsinline="true" autoplay="true" muted="" loop="true" preload="auto" src="'. get_template_directory_uri() .'/assets/media/etymax-intro.mp4"></video></div>';
// }
// add_shortcode( 'intro-video', 'dp_shortcode_introvideo' );

/*
*  Create Shortcode to Display scroll down btn [scroll-down]
*/
function dp_shortcode_scrolldown( $gm ) {
	$gm = shortcode_atts( array(), $gm,'scroll-down' );
	return '<div class="scroll-down"><svg xmlns="http://www.w3.org/2000/svg" width="20.05" height="47.012" viewBox="0 0 20.05 47.012"><g id="Group_22636" data-name="Group 22636" transform="translate(-949.985 -1006.5)"><line id="Line_5" data-name="Line 5" y2="46" transform="translate(960 1006.5)" fill="none" stroke="#fff" stroke-width="1.5"/><path id="Path_30" data-name="Path 30" d="M969.52,1043.49l-9.52,8.99-9.5-8.99" fill="none" stroke="#fff" stroke-width="1.5"/></g></svg></div>';
}
add_shortcode( 'scroll-down', 'dp_shortcode_scrolldown' );
