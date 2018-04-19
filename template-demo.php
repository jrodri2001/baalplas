<?php /* Template Name: Galeria */ get_header(); ?>




<?php get_header(); ?>
<div class="col-md-12 bplasin" >

</div>


<div class="col-md-12 upper hidden-xs">
	<div class="col-md-2"></div>
	<div class="col-md-2"><a href="/nosotros" class="nosotros"></a></div>
	<div class="col-md-2" onmouseover="chds('block')" onmouseout="chds('none')"><a href="/productos" class="productos"></a>
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
	<div class="col-md-2"><a href="/galeria" class="galeria"></a></div>
	<div class="col-md-2"><a href="/contacto" class="contacto"></a></div>
	<div class="col-md-2"></div>

</div>
<div class="container">
<div class="page-container">
<div class="content-wrapper">
				

				<!-- Content area -->
				<div class="content no-padding-top">

					<!-- Detached sidebar -->
					
		            <!-- /detached sidebar -->


					<!-- Detached content -->
					<div class="sidebar-detached">
						<div class="sidebar sidebar-default">
							<div class="sidebar-content">

	


								<!-- Sub navigation -->
								<div class="sidebar-category">
									<div class="category-title">
										<span class="titcatl">seleccione su <strong>Galeria</strong></span>
									</div>

									<div class="category-content no-padding">
		
	
<?php if ( is_active_sidebar( 'widget-area-2' ) ) { ?>

		<?php dynamic_sidebar( 'widget-area-2' ); ?>

<?php } ?>
									
			
			</div>


								</div>
								<!-- /sub navigation -->
<div class="sidebar-category">
									<div class="category-title">
										<span class="titcatl">Descarga de <strong>Catalogo</strong></span>
									</div>

									<div class="category-content">
										<div class="row">
											<div class="col-xs-12">
										<a href="<?php global $pulsar_data; //fetch options stored in $pulsar_data
											$contacto_catalogo = $pulsar_data['contacto_catalogo'];
											$template_url = get_template_directory_uri();
											if (isset($contacto_catalogo[0]) && $contacto_catalogo[1]) { 
											echo $contacto_catalogo;
											} else {
											echo '';
											} ?>" class="descar"  download></a>
											</div>
											
										</div>
									</div>
								</div>

							</div>
						</div>
					</div><div class="container-detached">
						<div class="content-detached">

							<!-- Button classes -->
							<div class="panel panel-flat">

							<div class="panel-body">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

				<?php comments_template( '', true ); // Remove if you don't want comments ?>

				<br class="clear">

				<?php edit_post_link(); ?>

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

							</div>
							<!-- /button classes -->





						</div>
					</div>
					<!-- /detached content -->

				</div>
				<!-- /content area -->

			</div>
</div>

</div>


<?php get_footer(); ?>

