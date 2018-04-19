<?php get_header(); ?>
<div class="col-md-12 bplasin hidden-xs" >

</div>

<div class="col-md-12 upper hidden-xs">
	
	<div class="col-sm-3 col-md-2 col-md-offset-2"><a href="/nosotros" class="nosotros"></a></div>
	<div class="col-sm-3 col-md-2"><a href="/productos" class="productos"></a></div>
	<div class="col-sm-3 col-md-2"><a href="/galeria" class="galeria"></a></div>
	<div class="col-sm-3 col-md-2"><a href="/contacto" class="contacto"></a></div>

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
										<span class="titcatl">seleccione su <strong>Categoria</strong></span>
									</div>

									<div class="category-content no-padding">
		
<ul class="navigation navigation-alt navigation-accordion">	
										
				
				
<?php
    $option_name = 'category_custom_order_' . $tag->term_id;
        $category_custom_order = get_option( $option_name );


  $taxonomy     = 'product_cat';
  $orderby      = 'id';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;

  $args = array(
         'taxonomy'     => $taxonomy,
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
    $qrch= $wpdb->get_results(" SELECT * FROM wp_term_taxonomy WHERE parent = '$category_id' ");
   if( $qrch == NULL){
echo '<li><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a></li>';
} else{
   echo '<li><a href="#" class="has-ul">'. $cat->name .'</a>';
   
}

     

        $args2 = array(
                'taxonomy'     => $taxonomy,
                'child_of'     => 0,
                'parent'       => $category_id,
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty
        );
        

        $sub_cats = get_categories( $args2 );
        if($sub_cats) {
echo'<ul class="hidden-ul">';
            foreach($sub_cats as $sub_category) {
                echo '<li><a href="'. get_term_link($sub_category->slug, 'product_cat') .'">'.$sub_category->name.'</a></li>' ;
            }   
echo'</ul></li>';
        }
    }       
}
?>
</ul>
		

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
									<?php woocommerce_content(); ?>

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

