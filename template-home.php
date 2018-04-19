<?php /* Template Name: Template Inicio */ get_header(); ?>

<div class="col-md-12 bplas2 visible-xs" >
<?php layerslider(3) ?>
</div>

<div class="col-md-12 bplas hidden-xs" >
<?php layerslider(1) ?>
</div>

<div class="col-md-12 upper hidden-xs">
	<div class="col-sm-3 col-md-offset-2 col-md-2"><a href="/nosotros" class="nosotros"></a></div>
	<div class="col-sm-3 col-md-2" onmouseover="chds('block')" onmouseout="chds('none')"><a href="/productos" class="productos"></a>
		<div class="subprod" id="subprod" style="display: none;">
			<span class="arrow"></span>
<?php

  $taxonomy     = 'product_cat';
  $orderby      = 'name';
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no
  $title        = '';
  $empty        = 0;

  $args = array(
         'taxonomy'     => $taxonomy,
         'orderby'      => $orderby,
         'show_count'   => $show_count,
         'pad_counts'   => $pad_counts,
         'hierarchical' => $hierarchical,
         'title_li'     => $title,
         'hide_empty'   => $empty
  );
 $all_categories = get_categories( $args );
 foreach ($all_categories as $cat) {
    if($cat->category_parent == 0) {
        $category_id = $cat->term_id;
        echo '<div><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a></div>';

        $args2 = array(
                'taxonomy'     => $taxonomy,
                'child_of'     => 0,
                'parent'       => $category_id,
                'orderby'      => $orderby,
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty
        );
     
        
    }
}
?>
		<script>
			function chds(display) {
    document.getElementById('subprod').style.display = display;
}
		</script>
	</div>
	</div>
	<div class="col-sm-3 col-md-2"><a href="/galeria" class="galeria"></a></div>
	<div class="col-sm-3 col-md-2"><a href="/contacto" class="contacto"></a></div>

</div>

<div class="container">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>		
</div>
<?php get_footer(); ?>

