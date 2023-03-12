<?php
/**
 * Page About
 */
return array(
	'title'      => __( 'Page about', 'ona' ),
	'categories' => array( 'ona-pages' ),
	'content'    => '
			<!-- wp:group {"tagName":"main","className":"is-style-no-spacing","layout":{"inherit":false}} -->
			<main class="wp-block-group is-style-no-spacing">
			<!-- wp:pattern {"slug":"ona/general-page-title-with-image"} /-->

			<!-- wp:group {"className":"ona-container","layout":{"inherit":true}} -->
			<div class="wp-block-group ona-container"><!-- wp:spacer {"height":120} -->
			<div style="height:120px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:separator {"color":"foreground","className":"is-style-default"} -->
			<hr class="wp-block-separator has-text-color has-background has-foreground-background-color has-foreground-color is-style-default"/>
			<!-- /wp:separator -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.3"}},"textColor":"foreground","fontSize":"medium-large"} -->
			<p class="has-text-align-center has-foreground-color has-text-color has-medium-large-font-size" style="line-height:1.3"><em>' . __( '“To us, a healthy woman is confident in her own skin, flaws and all.”', 'ona' ) . '</em></p>
			<!-- /wp:paragraph -->

			<!-- wp:separator {"color":"foreground","className":"is-style-default"} -->
			<hr class="wp-block-separator has-text-color has-background has-foreground-background-color has-foreground-color is-style-default"/>
			<!-- /wp:separator -->

			<!-- wp:spacer -->
			<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div>
			<!-- /wp:group -->

			<!-- wp:pattern {"slug":"ona/general-promo-section-offset"} /-->

			<!-- wp:group {"className":"ona-container","layout":{"contentSize":"1170px"}} -->
			<div class="wp-block-group ona-container"><!-- wp:spacer {"height":60} -->
			<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column {"style":{"spacing":{"padding":{"right":"40px","left":"40px","top":"40px","bottom":"40px"}}}} -->
			<div class="wp-block-column" style="padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:group -->
			<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
			<h3 class="has-text-align-center has-large-font-size" id="99">' . __( '99', 'ona' ) . '</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . __( 'Houses sold in 2021 for my clients', 'ona' ) . '</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:group --></div>
			<!-- /wp:column -->

			<!-- wp:column {"style":{"spacing":{"padding":{"right":"40px","left":"40px","top":"40px","bottom":"40px"}}}} -->
			<div class="wp-block-column" style="padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:group -->
			<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
			<h3 class="has-text-align-center has-large-font-size" id="99">' . __( '1,500+', 'ona' ) . '</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . __( 'Cups of coffee drank in courtrooms in 2021', 'ona' ) . '</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:group --></div>
			<!-- /wp:column -->

			<!-- wp:column {"style":{"spacing":{"padding":{"right":"40px","left":"40px","top":"40px","bottom":"40px"}}}} -->
			<div class="wp-block-column" style="padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:group -->
			<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
			<h3 class="has-text-align-center has-large-font-size" id="99">' . __( '700K', 'ona' ) . '</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . __( 'Profits gained for my clients and money', 'ona' ) . '</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:group --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:spacer {"height":80} -->
			<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div>
			<!-- /wp:group --></main>
			<!-- /wp:group -->',
);



