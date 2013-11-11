<?php
/**
 ** Theme Name: Wedy_city
 ** Theme URI: http://www.drinkentrepreneurs.org/
 ** Description: The 2013 default theme for Drinkentrepreneurs.
 ** Author: Antoine Angot
 ** Author URI: http://antoine.angot.me
 ** Version: 1.0
 ** Tags: black, blue, white
 ** License:
 ** License URI:
 **/
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
       ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js"></script>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.4.0/moment.min.js"></script>
<!--[if lte IE 8]>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.ie.css" />
<![endif]-->

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>

<body <?php body_class(); ?>
  <body> 
    <div id="wrap"> 
      <div id="header" style="display:block;"> 
        <h1 style="display:none;">
          <?php bloginfo( 'title' ); ?>
        </h1>

        <div id="header_logo" style="margin-left:298px;"> 
          <a href="/">
            <?php if(get_theme_mod( 'tcx_custom_header_logo' )){?>
             <img id="header_logo_img" src="<?php echo get_theme_mod( 'tcx_custom_header_logo' );?>" alt="logo" /> 
            <?php }else{?>
              <img id="header_logo_img" src="./images/logo_aperoentrepreneurs_fin.png" alt="logo" /> 
           <?php }?>
          </a> 
        </div> 
        
        <div id="header_blurb"></div> 
        
        <div id="header_right"></div> 
  
         <div id="header_menu"> 
          <?php wp_nav_menu( array( 'items_wrap'       => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'theme_location'   => 'primary',
          'menu_class'       => 'nav nav-pills'
          ) ); ?>
        </div> 
      </div> 
    
      <div id="gradient_bg"> 
        <div id="main"> 

          <div id="main_header"> 
            <div align="right"> 
            </div> 
          </div>
          
  <div id="search_bar">
  <form action="/places" method="get" id="city_form" style="float: right">
    <div id="city_search_bar_choices" style="display:none;"> <select name="city" id="id_city">
<option value="/aix-en-provence/show/">Aix en provence</option>
<option value="/angers/show/">Angers</option>
<option value="/annecy/show/">Annecy</option>
<option value="/avignon/show/">Avignon</option>
<option value="/bayonne/show/">Bayonne</option>
<option value="/belfort/show/">Belfort</option>
<option value="/beziers/show/">Beziers</option>
<option value="/bordeaux/show/">Bordeaux</option>
<option value="/brest/show/">Brest</option>
<option value="/bruxelles/show/">Bruxelles</option>
<option value="/caen/show/">Caen</option>
<option value="/cannes/show/">Cannes</option>
<option value="/cergy-pontoise/show/">Cergy Pontoise</option>
<option value="/charleville-mezieres/show/">Charleville-Mézières</option>
<option value="/clermont-ferrand/show/">Clermont-Ferrand</option>
<option value="/dijon/show/">Dijon</option>
<option value="/dublin/show/">Dublin</option>
<option value="/geneve/show/">Genève</option>
<option value="/grenoble/show/">Grenoble</option>
<option value="/hong-kong/show/">Hong Kong</option>
<option value="/le-havre/show/">Le Havre</option>
<option value="/lille/show/">Lille</option>
<option value="/limoges/show/">Limoges</option>
<option value="/londres/show/">Londres</option>
<option value="/lyon/show/">Lyon</option>
<option value="/marseille/show/">Marseille</option>
<option value="/metz/show/">Metz</option>
<option value="/montauban/show/">Montauban</option>
<option value="/montpellier/show/">Montpellier</option>
<option value="/montreuil/show/">Montreuil</option>
<option value="/nancy/show/">Nancy</option>
<option value="/nantes/show/">Nantes</option>
<option value="/new-york/show/">New-York</option>
<option value="/nice/show/">Nice</option>
<option value="/paris/show/">Paris</option>
<option value="/pau/show/">Pau</option>
<option value="/perpignan/show/">Perpignan</option>
<option value="/quimper/show/">Quimper</option>
<option value="/reims/show/">Reims</option>
<option value="/rennes/show/">Rennes</option>
<option value="/rouen/show/">Rouen</option>
<option value="/saint-etienne/show/">Saint-Etienne</option>
<option value="/san-francisco/show/">San Francisco</option>
<option value="/shanghai/show/">Shanghai</option>
<option value="/strasbourg/show/">Strasbourg</option>
<option value="/toulon/show/">Toulon</option>
<option value="/toulouse/show/">Toulouse</option>
<option value="/tours/show/">Tours</option>
<option value="/valence/show/">Valence</option>
<option value="/vienne/show/">Vienne</option>
<option value="/villefranche-sur-saone/show/">Villefranche sur Saône</option>
</select></div>
    <input id="city_search_bar" name="address" placeholder="Choisissez une ville" size="20" type="text">
    <input id="city_search_submit" name="commit" type="submit" value="">
  </form>  
</div>
      
          <div id="gmap_wrap"></div> 
        
