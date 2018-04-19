<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title>        <?php global $pulsar_data;	
			$your_homepage_title = $pulsar_data['homepage_title'];
			$template_url = get_template_directory_uri();
			if (isset($your_homepage_title[0]) && $your_homepage_title[1]) {
				echo $your_homepage_title;
			} else {
				echo '';
			} ?></title>
<link rel="icon" href="<?php global $pulsar_data;	
			$your_uploaded_favicon = $pulsar_data['uploaded_favicon'];
			$template_url = get_template_directory_uri();
			if (isset($your_uploaded_favicon[0]) && $your_uploaded_favicon[1]) {
				echo $your_uploaded_favicon;
			} else {
				echo '';
			} ?>" type="image/x-icon">

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php global $pulsar_data;	
			$your_homepage_description = $pulsar_data['homepage_description'];
			$template_url = get_template_directory_uri();
			if (isset($your_homepage_description[0]) && $your_homepage_description[1]) {
				echo $your_homepage_description;
			} else {
				echo '';
			} ?>">
<meta name="keywords" content="<?php global $pulsar_data;	
			$your_homepage_keywords = $pulsar_data['homepage_keywords'];
			$template_url = get_template_directory_uri();
			if (isset($your_homepage_keywords[0]) && $your_homepage_keywords[1]) {
				echo $your_homepage_keywords;
			} else {
				echo '';
			} ?>">
			
<?php global $pulsar_data;	
			$your_google_analytics_code = $pulsar_data['google_analytics_code'];
			$template_url = get_template_directory_uri();
			if (isset($your_google_analytics_code[0]) && $your_google_analytics_code[1]) {
				echo $your_google_analytics_code;
			} else {
				echo '';
			} ?>
		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
<body class="sidebar-xs has-detached-left ">
		<div class="container visible-xs">
			<!--- LOGO --->
			 	<div class="col-xs-12">
				 	<div>
			        	<a href="http://baalplas.com/"><?php global $pulsar_data; //fetch options stored in $pulsar_data
						$your_uploaded_logo = $pulsar_data['uploaded_logo'];
						$template_url = get_template_directory_uri();
						if (isset($your_uploaded_logo[0]) && $your_uploaded_logo[1]) {
							echo '<img src="' .$your_uploaded_logo. '"  alt="'.$your_homepage_title.'" ="Logo" class="logo-img">'  ;
						} else {
							echo '<img src="' .$template_url. '/images/logo.png"  alt="'.$your_homepage_title.'" ="Logo" class="logo-img">';
						} ?></a>
		        	</div>
	 			</div>
			
			
			
			
			<!-- LOGO -->
			
			<!-MENU->
			
<div class="navbar navbar-default navbar-blue navbar-fixed-top clearfix" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
   
        </div>
        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav ftmenu">
	            <li class="active"><a href="/">Inicio</a></li>
	            <li><a href="/nosotros">Nosotros</a></li>

                <li><a href="/productos" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
                  <ul class="dropdown-menu multi-level ftmenu2">
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
        echo '<li><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a></li>';

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
                    </ul>
                </li>
        </li>
        	<li><a href="/galeria">Galería</a></li>
	<li><a href="/contacto">Contacto</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>


			<!-MENU->
			
			
			
			<!--- SEARCH -->
			<div class="col-xs-12">






 		<?php
$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">

<div class="input-group">
											<input type="text" class="form-control inputb m-15" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Nombre del Producto...', 'woocommerce' ) . '">
											<span class="input-group-btn">
												<button class="btn bg-primary-600 btnser " id="searchsubmit" value="'. esc_attr__( 'Search', 'woocommerce' ) .'" >Buscar</button>
											</span>
										</div>
		<input type="hidden" name="post_type" value="product" />
</form>';
echo $form;?></div>
 		<div class="col-xs-6">
 			        	<?php global $pulsar_data; //fetch options stored in $pulsar_data
			$sm_profile_url_two = $pulsar_data['sm_profile_url_two'];
			$template_url = get_template_directory_uri();
			if (isset($sm_profile_url_two[0]) && $sm_profile_url_two[1]) { 
			echo '<a href="'.$sm_profile_url_two.'" class="btn btn-grey btn-float btn-rounded btnsocial  ml-10 mr-10" target="_blank" style="padding: 15px;background-color: #cdcdcd;color: #949494;"><i class="icon-twitter" ></i></a>';
			} else {
			echo '<a href="#" class="btn btn-grey btn-float btn-rounded btnsocial  ml-10 mr-10"><i class="icon-twitter" style="padding: 15px;background-color: #cdcdcd;color: #949494;"></i></a>';
			} ?>
 			        	<?php global $pulsar_data; //fetch options stored in $pulsar_data
			$sm_profile_url_one = $pulsar_data['sm_profile_url_one'];
			$template_url = get_template_directory_uri();
			if (isset($sm_profile_url_one[0]) && $sm_profile_url_one[1]) {
			echo '<a href="'.$sm_profile_url_one.'" class="btn btn-grey btn-float btn-rounded btnsocial  ml-5 mr-5" target="_blank" style="padding: 15px;background-color: #cdcdcd;color: #949494;"><i class="icon-facebook"></i></a>';
			} else {
			echo '<a href="#" class="btn btn-grey btn-float btn-rounded btnsocial  ml-5 mr-5" style="padding: 15px;background-color: #cdcdcd;color: #949494;"><i class="icon-facebook"></i></a>';
			} ?>
 		</div>
 		
 		<div class="col-xs-6">
 			<img src="<?php echo get_template_directory_uri(); ?>/img/tagcerca.png" alt="" title="" />
 		</div>
 		
 					<!---CONTACT -->
							<div class="tabbable mt-20 clearfix">
									<div class="col-xs-5 col-xs-offset-4">
										<ul class="nav">											
										<li class="active" style="display:inline-block!important"><a href="#left-icon-pill11" class="btn btn-grey btn-float btn-rounded btnsocial  mt-10" data-toggle="tab" style="padding: 15px;background-color: #cdcdcd;color: #949494;"><i class="icon-pin-alt"></i></a></li>
										<li style="display:inline-block!important"><a href="#left-icon-pill21" class="btn btn-grey btn-float btn-rounded btnsocial  mt-10" data-toggle="tab" style="padding: 15px;    background-color: #cdcdcd;color: #949494;"><i class="icon-phone"></i></a></li>
										</ul>
									</div>
									
									<div class="col-xs-12">
										<div class="tab-content">
											<div class="tab-pane" id="left-icon-pill21">
											<ul class="phones">
											<?php global $pulsar_data; //fetch options stored in $pulsar_data
											$telefono_1 = $pulsar_data['telefono_1'];
											$template_url = get_template_directory_uri();
											if (isset($telefono_1[0]) && $telefono_1[1]) { 
											echo '<li> '.$telefono_1.'</li>';
											} else {
											echo '';
											} ?>
											<?php global $pulsar_data; //fetch options stored in $pulsar_data
											$telefono_2 = $pulsar_data['telefono_2'];
											$template_url = get_template_directory_uri();
											if (isset($telefono_2[0]) && $telefono_2[1]) { 
											echo '<li> '.$telefono_2.'</li>';
											} else {
											echo '';
											} ?>
											<?php global $pulsar_data; //fetch options stored in $pulsar_data
											$telefono_3 = $pulsar_data['telefono_3'];
											$template_url = get_template_directory_uri();
											if (isset($telefono_3[0]) && $telefono_3[1]) { 
											echo '<li> '.$telefono_3.'</li>';
											} else {
											echo '';
											} ?>
											</ul>
											</div>

											<div class="tab-pane active" id="left-icon-pill11">
											<div class="addrs">
											<?php global $pulsar_data; //fetch options stored in $pulsar_data
											$contacto_direccion = $pulsar_data['contacto_direccion'];
											$template_url = get_template_directory_uri();
											if (isset($contacto_direccion[0]) && $contacto_direccion[1]) { 
											echo $contacto_direccion;
											} else {
											echo '';
											} ?>
												
											</div>
											</div>
										</div>
										</div>
									</div>
			
			
		</div>
	<!--- CONTACT  -->
 	</div>
<!-- SEARCH -->

	
<div class="page-container">





 <div class="container hidden-xs">
 	<div class="col-md-4">
 		<div class="col-md-12">






 		<?php
$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">

<div class="input-group">
											<input type="text" class="form-control inputb m-15" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Nombre del Producto a buscar...', 'woocommerce' ) . '">
											<span class="input-group-btn">
												<button class="btn bg-primary-600 btnser " id="searchsubmit" value="'. esc_attr__( 'Search', 'woocommerce' ) .'" >Buscar</button>
											</span>
										</div>
		<input type="hidden" name="post_type" value="product" />
</form>';
echo $form;?></div>
 		<div class="col-md-12">
 			        	<?php global $pulsar_data; //fetch options stored in $pulsar_data
			$sm_profile_url_two = $pulsar_data['sm_profile_url_two'];
			$template_url = get_template_directory_uri();
			if (isset($sm_profile_url_two[0]) && $sm_profile_url_two[1]) { 
			echo '<a href="'.$sm_profile_url_two.'" class="btn btn-grey btn-float btn-rounded btnsocial  ml-10 mr-10" target="_blank" style="padding: 15px;background-color: #cdcdcd;color: #949494;"><i class="icon-twitter" ></i></a>';
			} else {
			echo '<a href="#" class="btn btn-grey btn-float btn-rounded btnsocial  ml-10 mr-10"><i class="icon-twitter" style="padding: 15px;background-color: #cdcdcd;color: #949494;"></i></a>';
			} ?>
 			        	<?php global $pulsar_data; //fetch options stored in $pulsar_data
			$sm_profile_url_one = $pulsar_data['sm_profile_url_one'];
			$template_url = get_template_directory_uri();
			if (isset($sm_profile_url_one[0]) && $sm_profile_url_one[1]) {
			echo '<a href="'.$sm_profile_url_one.'" class="btn btn-grey btn-float btn-rounded btnsocial  ml-5 mr-5" target="_blank" style="padding: 15px;background-color: #cdcdcd;color: #949494;"><i class="icon-facebook"></i></a>';
			} else {
			echo '<a href="#" class="btn btn-grey btn-float btn-rounded btnsocial  ml-5 mr-5" style="padding: 15px;background-color: #cdcdcd;color: #949494;"><i class="icon-facebook"></i></a>';
			} ?>
 			<img src="<?php echo get_template_directory_uri(); ?>/img/tagcerca.png" alt="" title="" />
 		</div>
 	</div>
 	<div class="col-md-4">
<div class="logo">
        	<a href="http://baalplas.com/"><?php global $pulsar_data; //fetch options stored in $pulsar_data
			$your_uploaded_logo = $pulsar_data['uploaded_logo'];
			$template_url = get_template_directory_uri();
			if (isset($your_uploaded_logo[0]) && $your_uploaded_logo[1]) {
				echo '<img src="' .$your_uploaded_logo. '"  alt="'.$your_homepage_title.'" ="Logo" class="logo-img">'  ;
			} else {
				echo '<img src="' .$template_url. '/images/logo.png"  alt="'.$your_homepage_title.'" ="Logo" class="logo-img">';
			} ?></a>
        </div>
 	</div>
 	<div class="col-md-4">
 	<div class="row">
<div class="col-md-9 pull-left">
	
</div>
</div>


									<div class="tabbable mt-20">
									<div class="col-md-4">
										<ul class="nav">											
										<li class="active" style="display:inline-block!important"><a href="#left-icon-pill1" class="btn btn-grey btn-float btn-rounded btnsocial  mt-10" data-toggle="tab" style="padding: 15px;background-color: #cdcdcd;color: #949494;"><i class="icon-pin-alt"></i></a></li>
										<li style="display:inline-block!important"><a href="#left-icon-pill2" class="btn btn-grey btn-float btn-rounded btnsocial  mt-10" data-toggle="tab" style="padding: 15px;    background-color: #cdcdcd;color: #949494;"><i class="icon-phone"></i></a></li>
										</ul>
</div>
<div class="col-md-8">
										<div class="tab-content">
											<div class="tab-pane" id="left-icon-pill2">
											<ul class="phones">
											<?php global $pulsar_data; //fetch options stored in $pulsar_data
											$telefono_1 = $pulsar_data['telefono_1'];
											$template_url = get_template_directory_uri();
											if (isset($telefono_1[0]) && $telefono_1[1]) { 
											echo '<li> '.$telefono_1.'</li>';
											} else {
											echo '';
											} ?>
											<?php global $pulsar_data; //fetch options stored in $pulsar_data
											$telefono_2 = $pulsar_data['telefono_2'];
											$template_url = get_template_directory_uri();
											if (isset($telefono_2[0]) && $telefono_2[1]) { 
											echo '<li> '.$telefono_2.'</li>';
											} else {
											echo '';
											} ?>
											<?php global $pulsar_data; //fetch options stored in $pulsar_data
											$telefono_3 = $pulsar_data['telefono_3'];
											$template_url = get_template_directory_uri();
											if (isset($telefono_3[0]) && $telefono_3[1]) { 
											echo '<li> '.$telefono_3.'</li>';
											} else {
											echo '';
											} ?>
											</ul>
											</div>

											<div class="tab-pane active" id="left-icon-pill1">
											<div class="addrs">
											<?php global $pulsar_data; //fetch options stored in $pulsar_data
											$contacto_direccion = $pulsar_data['contacto_direccion'];
											$template_url = get_template_directory_uri();
											if (isset($contacto_direccion[0]) && $contacto_direccion[1]) { 
											echo $contacto_direccion;
											} else {
											echo '';
											} ?>
												
											</div>
											</div>
										</div>
										</div>
									</div>



 			



 	</div>
 </div>







						

