<?php
/**
 *
 * desc: weby_city is a wordpress theme made for drinkentrepreneurs.org
 * author: antoine.angot@gmail.com
 * date: 6 Jul 2013
 *
 **/

if ( function_exists('register_sidebar') )
    register_sidebar( array(
   'name' => __( 'My Custom Widget Area - 1'),
   'id' => 'mycustomwidgetarea',
   'description' => __( 'An optional widget area for your site footer', 'ahah' ),
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget' => "</aside>",
   'before_title' => '<h3 class="widget-title">',
   'after_title' => '</h3>',
   ) );

if ( ! isset( $content_width ) )
        $content_width = 584;

add_action( 'after_setup_theme', 'wedy_setup' );

if ( ! function_exists( 'wedy_setup' ) ):
function wedy_setup() {

   register_nav_menu( 'primary', __( 'mainMenu', 'wedy' ) );
}
endif;
// setup

function tcx_register_theme_customizer( $wp_customize ) {
    $wp_customize->add_setting(
	    'tcx_link_color',
	    array(
	        'default'     => '#000000'
	    )
    );

    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'link_color',
	        array(
	            'label'      => __( 'Link Color', 'tcx' ),
	            'section'    => 'colors',
	            'settings'   => 'tcx_link_color'
	        )
	    )
	);

	function tcx_customizer_live_preview() {
	    wp_enqueue_script(
		    'tcx-theme-customizer',
		    get_template_directory_uri() . '/js/theme-customizer.js',
		    array( 'jquery', 'customize-preview' ),
		    '0.3.0',
		    true
		);
	}
	add_action( 'customize_preview_init', 'tcx_customizer_live_preview' );

	$wp_customize->add_section(
	    'tcx_display_options',
	    array(
	        'title'     => 'Display Options',
	        'priority'  => 200
	    )
	);

	$wp_customize->add_setting(
	    'tcx_display_header',
	    array(
	        'default'    =>  'true',
	        'transport'  =>  'postMessage'
	    )
	);

	$wp_customize->add_control(
	    'tcx_display_header',
	    array(
	        'section'   => 'tcx_display_options',
	        'label'     => 'Display Header?',
	        'type'      => 'checkbox'
	    )
	);

	$wp_customize->add_setting(
	    'tcx_color_scheme',
	    array(
	        'default'   => 'normal',
	        'transport' => 'postMessage'
	    )
	);
	 
	$wp_customize->add_control(
	    'tcx_color_scheme',
	    array(
	        'section'  => 'tcx_display_options',
	        'label'    => 'Color Scheme',
	        'type'     => 'radio',
	        'choices'  => array(
	            'normal'    => 'Normal',
	            'inverse'   => 'Inverse'
	        )
	    )
	);

	// DrinkEntrepreneurs Settings

	$wp_customize->add_section(
	    'tcx_drinkentrepreneurs_options',
	    array(
	        'title'     => 'DrinkEntrepreneurs',
	        'priority'  => 200
	    )
	);

	$wp_customize->add_setting(
	    'tcx_custom_header_logo',
	    array(
	        'default'    =>  get_bloginfo('template_directory').'/images/logo_aperoentrepreneurs_fin.jpg',
	        'transport'  =>  'postMessage'
	    )
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
           $wp_customize,
           'drinkentrepreneurs_logo',
           array(
               'label'          => __( 'Upload a logo', 'theme_name' ),
               'section'        => 'tcx_drinkentrepreneurs_options',
               'settings'       => 'tcx_custom_header_logo',
           )
       )
	);

	$wp_customize->add_setting(
	    'tcx_drinkentrepreneurs_date',
	    array(
	        'default'    =>  date(),
	        'transport'  =>  'postMessage'
	    )
	);

	$wp_customize->add_control(
       'drinkentrepreneurs_date',
       array(
           'label'          => __( 'Next event date MM/DD/YYYY HH:MM', 'event_date' ),
           'section'        => 'tcx_drinkentrepreneurs_options',
           'settings'       => 'tcx_drinkentrepreneurs_date',
       )
	);

	$wp_customize->add_setting(
	    'tcx_drinkentrepreneurs_venue',
	    array(
	        'default'    =>  "Unknown",
	        'transport'  =>  'postMessage'
	    )
	);

	$wp_customize->add_control(
	    'drinkentrepreneurs_venue',
	    array(
	        'section'  => 'tcx_drinkentrepreneurs_options',
	        'settings' => 'tcx_drinkentrepreneurs_venue',
	        'label'    => 'Venue Name',
	        'type'     => 'text',
	    )
	);

	$wp_customize->add_setting(
	    'tcx_drinkentrepreneurs_venue_city',
	    array(
	        'default'    =>  "City Name",
	        'transport'  =>  'postMessage'
	    )
	);

	$wp_customize->add_control(
	    'drinkentrepreneurs_venue_city',
	    array(
	        'section'  => 'tcx_drinkentrepreneurs_options',
	        'settings' => 'tcx_drinkentrepreneurs_venue_city',
	        'label'    => 'City',
	        'type'     => 'text',
	    )
	);

	$wp_customize->add_setting(
	    'tcx_drinkentrepreneurs_venue_country',
	    array(
	        'default'    =>  "Country Name",
	        'transport'  =>  'postMessage'
	    )
	);

	$wp_customize->add_control(
	    'drinkentrepreneurs_venue_country',
	    array(
	        'section'  => 'tcx_drinkentrepreneurs_options',
	        'settings' => 'tcx_drinkentrepreneurs_venue_country',
	        'label'    => 'Country',
	        'type'     => 'text',
	    )
	);

	$wp_customize->add_setting(
	    'tcx_drinkentrepreneurs_venue_street_number',
	    array(
	        'default'    =>  "Street Number",
	        'transport'  =>  'postMessage'
	    )
	);

	$wp_customize->add_control(
	    'drinkentrepreneurs_venue_street_number',
	    array(
	        'section'  => 'tcx_drinkentrepreneurs_options',
	        'settings' => 'tcx_drinkentrepreneurs_venue_street_number',
	        'label'    => 'Venue street number',
	        'type'     => 'text',
	    )
	);

	$wp_customize->add_setting(
	    'tcx_drinkentrepreneurs_venue_street_name',
	    array(
	        'default'    =>  "Street Name",
	        'transport'  =>  'postMessage'
	    )
	);

	$wp_customize->add_control(
	    'drinkentrepreneurs_venue_street_name',
	    array(
	        'section'  => 'tcx_drinkentrepreneurs_options',
	        'settings' => 'tcx_drinkentrepreneurs_venue_street_name',
	        'label'    => 'Venue street name',
	        'type'     => 'text',
	    )
	);


	$wp_customize->add_setting(
	    'tcx_drinkentrepreneurs_venue_lat',
	    array(
	        'default'    =>  "0",
	        'transport'  =>  'postMessage'
	    )
	);

	$wp_customize->add_control(
	    'drinkentrepreneurs_venue_lat',
	    array(
	        'section'  => 'tcx_drinkentrepreneurs_options',
	        'settings' => 'tcx_drinkentrepreneurs_venue_lat',
	        'label'    => 'Venue latitude',
	        'type'     => 'text',
	    )
	);

	$wp_customize->add_setting(
	    'tcx_drinkentrepreneurs_venue_long',
	    array(
	        'default'    =>  "0",
	        'transport'  =>  'postMessage'
	    )
	);

	$wp_customize->add_control(
	    'drinkentrepreneurs_venue_long',
	    array(
	        'section'  => 'tcx_drinkentrepreneurs_options',
	        'settings' => 'tcx_drinkentrepreneurs_venue_long',
	        'label'    => 'Venue longitude',
	        'type'     => 'text',
	    )
	);
}
add_action( 'customize_register', 'tcx_register_theme_customizer' );


function tcx_customizer_css() {
    ?>
    <style type="text/css">
        a { color: <?php echo get_theme_mod( 'tcx_link_color' ); ?>; }
        <?php if( false === get_theme_mod( 'tcx_display_header' ) ) { ?>
		    #header { display: none; }
		<?php } // end if ?>

		<?php if ( 'normal' === get_theme_mod( 'tcx_color_scheme' ) ) { ?>
		    background: #000;
		    color:      #fff;
		 
		<?php } else { ?>
		 
		    background: #fff;
		    color:      #000;
		 
		<?php } // end if/else ?>
    </style>
    <?php
}
add_action( 'wp_head', 'tcx_customizer_css' );


?>

<?php
//Found it here https://github.com/bueltge/WordPress-Theme-Customizer-Custom-Controls/blob/master/date_picker_custom_control.php
if (class_exists('WP_Customize_Control'))
{
    /**
     * Class to create a custom date picker
     */
    class Date_Picker_Custom_control extends WP_Customize_Control
    {
          /**
           * Enqueue the styles and scripts
           */
          public function enqueue()
          {
            wp_enqueue_style( 'jquery-ui-datepicker' );
          }

          /**
           * Render the content on the theme customizer page
           */
          public function render_content()
           {

                ?>
                    <label>
                      <span class="customize-date-picker-control"><?php echo esc_html( $this->label ); ?></span>
                      <input type="date" id="<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" value="<?php echo $this->value(); ?>" class="datepicker" />
                    </label>
                <?php
           }
    }
}
?>
