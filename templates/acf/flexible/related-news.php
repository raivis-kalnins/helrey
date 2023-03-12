<!-- acf flexible - related news -->
<div class="row cpt-news swiper-container-cards">
	<div class="swiper-wrapper">
		<?php 
			foreach( $related_news as $post ): //var_dump($post); 
				$post_id = $post->ID; 
				$bg = get_the_post_thumbnail_url( $post_id, 'hd' );
				$img_url = get_the_post_thumbnail_url('full');
				$permalink = get_permalink( $post->ID );
				$title = get_the_title( $post->ID );
				$cats = get_the_category( $post->ID  );
				$tags = get_the_tags();
				//var_dump($post_id);
		?>
			<div class="cpt-news-item blog-post <?php //swiper-slide ?>">
				<div class="blog-post-wrap wp-block-dpwpblocks-cta-card faux-link__element">
					<div class="img-box"><?php if (!empty($bg)): ?><img src="<?=$bg?>" alt="" /><?php endif; ?></div>
					<div class="desc">
						<h3><a href="<?php echo get_permalink( $post_id ); ?>"><?php echo esc_html( $title ); ?></a></h3>
						<div class="cat-list"><?php if ($cats) { echo '<i class="cat-ico"></i> '; echo join(' ', array_map(function($cats) { echo '<a href="' . esc_url( get_permalink( $post_id ) ) . '">' . $cats->name . '</a> '; }, get_the_category())); } ?></div>
					</div>
					<a href="<?php echo get_permalink( $post_id ); ?>" class="faux-link__overlay-link"></a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="swiper-button-prev"></div><div class="swiper-button-next"></div><div class="swiper-pagination"></div>
</div>
<!-- /acf flexible - related news -->
