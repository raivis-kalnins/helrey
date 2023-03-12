<?php
/**
 * Header Global / Meta - before </head>
 */
add_action('wp_head', 'header_global');

function header_global() {
	$queriedObject = get_queried_object();
	$fields = get_fields($queriedObject);
	if (!empty($queriedObject->post_parent)) {
		$fields = array_merge(array_filter(get_fields($queriedObject->post_parent)), array_filter($fields));
	}
	$assets = get_stylesheet_directory_uri() . '/assets';
?>
	<!-- Header DP Global -->
	<meta property="og:image" content="<?=$assets?>/img/i/300x300.png" />
    <meta property="og:image:secure_url" content="<?=$assets?>/img/i/300x300.png" />
	<meta property="og:url" content="https://www.digitalpulse.click/" />
    <meta property="og:title" content="Marketing & Design Agency | Building Better Brands  | DP" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="DP" />
	<!-- /Header DP Global -->
<?php
};