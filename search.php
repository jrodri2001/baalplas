<?php get_header(); ?>



<?php
  if ( function_exists( 'woocommerce_product_search' ) ) {
    echo woocommerce_product_search( array( 'limit' => 20 ) );
  } else {


?>
	<main role="main">
		<!-- section -->
		<section>

			<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>
	<?php } ?>
<?php get_footer(); ?>
