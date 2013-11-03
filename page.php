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

?>
<?php get_header(); ?>

<div id="main_content">
     <div id="inner_content">
        <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', 'page' ); ?>

        <?php //comments_template( '', true ); ?>

        <?php endwhile; // end of the loop. ?>
     </div><!-- #inner-content -->
</div><!-- #main_content -->


<?php get_footer(); ?>
