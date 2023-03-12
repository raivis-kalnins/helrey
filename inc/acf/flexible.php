<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder( 'flex-layouts' );
$builder
	->addFlexibleContent('flex_layouts', ['label' => ''])

		// Hero Slider
		->addLayout('Hero/Slider')
		->addGroup('hero-slider', ['layout' => 'block', 'label' => 'Hero Slider'])
			->addRepeater('hero_items')
				->addGroup('hero_settings', ['layout' => 'block', 'label' => 'Hero Settings', 'wrapper' => ['width' => 25]])
					->addImage('hero_image', ['return_format' => 'id', 'label' => 'Hero Bg Image'])
					->addLink('hero_link', ['label' => 'Hero Link'])
				->endGroup()
				->addWysiwyg('hero_content')
			->endRepeater()
		->endGroup()

		// Products
		->addLayout('Products/Portfolio')
		->addGroup('products', ['layout' => 'block', 'label' => 'Products Group'])
			->addText('prod_category_name', ['label' => 'Product Group Category Name'])
			->addTextarea('prod_group_description', ['label' => 'Product Group Description', 'rows' => 3])
			->addRepeater('product_items', ['layout' => 'table', 'label' => 'Product Items'])
				->addImage('product_image', ['return_format' => 'id', 'wrapper' => ['width' => 25], 'label' => 'Image'])
				->addGroup('product_description', ['layout' => 'block', 'label' => 'Description'])
					->addText('product_caption', ['label' => 'Product Name'])
					->addLink('product_link', ['label' => 'Product Link'])
					->addTextarea('product_short_description', ['label' => 'Product Short Description', 'rows' => 3])
				->endGroup()
				->addGroup('product_prices', ['layout' => 'block', 'label' => 'Prices', 'wrapper' => ['width' => 25]])
					->addNumber('product_price', ['label' => 'Price'])
					->addNumber('product_new_price', ['label' => 'New Price'])
				->endGroup()
			->endRepeater()
		->endGroup()

		// Related News Posts
		->addLayout('Related News Posts')
		->addGroup('related-news', ['layout' => 'block', 'label' => 'Related News'])
			->addRelationship('relationship_field_news', [
				'label' => 'Relationship Field',
				'instructions' => '',
				'required' => 0,
				//'conditional_logic' => 0,
				'wrapper' => [
					'width' => '',
					'class' => '',
					'id' => '',
				],
				'post_type' => ['post'],
				'taxonomy' => [],
				'filters' => [
					0 => 'post_type',
					1 => 'taxonomy',
					2 => 'search', 
				],
				'elements' => '',
				'min' => '',
				'max' => '',
				'return_format' => 'object',
			])
		->endGroup()

		// Accordion
		->addLayout('Accordion')
		->addGroup('accordion', ['layout' => 'block', 'label' => 'Accordion Group'])
			->addRepeater('accordion_items')
				->addText('accordion_title', ['layout' => 'block', 'label' => 'Accordion Caption', 'wrapper' => ['width' => 25] ])
				->addWysiwyg('accordion_content')
			->endRepeater()
		->endGroup()
		
	->endFlexibleContent()
	//->setLocation('post_type', '==', 'post'); // If static bottom
	//->setLocation('post_type', '==', 'page'); // If static bottom
	//->setLocation('post_type', '==', 'all'); // If static bottom all post types
	->setLocation('block', '==', 'acf/flex-layouts');

	add_action('acf/init', function() use ($builder) {
		acf_add_local_field_group( $builder->build() );
		//print_r($builder->build());
	});
