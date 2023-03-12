<?php
	/*
	* Flexible ACF layouts
	*/
	$flex_layouts = get_fields()['flex_layouts'];

	if( !empty( $flex_layouts ) ):

		echo '<div class="section_acf-flexible-items">';

		foreach( $flex_layouts as $layout ):

			// Fexible item variables
			$hero = $layout['hero-slider'];
			$products = $layout['products'];
			$related_news = $layout['related-news']['relationship_field_news'];
			$accordion = $layout['accordion'];

			if( !empty( $hero ) ) :

				include 'flexible/hero-slider.php';

			elseif( !empty( $products ) ) :

				echo '<nav id="products-section-nav" class="products-section-nav container-fluid boxed row hidden"></nav>';

				include 'flexible/products.php';

			elseif( !empty( $related_news ) ) :

				include 'flexible/related-news.php';

			elseif( !empty( $accordion ) ) :

				include 'flexible/accordion.php';

			endif;

		endforeach;

		echo '</div>';

	endif;
?>
