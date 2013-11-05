<?php
/**
 *
 * desc: weby_city is a wordpress theme made for drinkentrepreneurs.org
 * author: antoine.angot@gmail.com
 * date: 6 Jul 2013
 *
 **/

load_theme_textdomain('wedy-drinkentrepreneurs');

if ( function_exists('register_sidebar') )
    register_sidebar( array(
   'name' => __( 'Widget area','wedy-drinkentrepreneurs'),
   'id' => 'mycustomwidgetarea',
   'description' => __( 'An optional widget area where to put the mailing list widget', 'wedy-drinkentrepreneurs' ),
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

   register_nav_menu( 'primary', __( 'mainMenu', 'wedy-drinkentrepreneurs' ) );
}
endif;
// setup


function wedy_drinkentrepreneurs_customize_register($wp_customize) {
	class Example_Customize_Textarea_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	        <label>
	        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	        </label>
	        <?php
	    }
	}
}

add_action( 'customize_register', 'wedy_drinkentrepreneurs_customize_register' );

function tcx_register_theme_customizer( $wp_customize ) {

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
               'label'          => __( 'Upload a logo', 'wedy-drinkentrepreneurs' ),
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
           'label'          => __( 'Next event date MM/DD/YYYY HH:MM', 'wedy-drinkentrepreneurs' ),
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
	        'label'    => __('Venue Name','wedy-drinkentrepreneurs'),
	        'type'     => 'text',
	    )
	);

	$wp_customize->add_setting(
	    'tcx_drinkentrepreneurs_venue_city',
	    array(
	        'default'    =>  __("City Name",'wedy-drinkentrepreneurs'),
	        'transport'  =>  'postMessage'
	    )
	);

	$wp_customize->add_control(
	    'drinkentrepreneurs_venue_city',
	    array(
	        'section'  => 'tcx_drinkentrepreneurs_options',
	        'settings' => 'tcx_drinkentrepreneurs_venue_city',
	        'label'    => __('City','wedy-drinkentrepreneurs'),
	        'type'     => 'text',
	    )
	);

	$wp_customize->add_setting(
	    'tcx_drinkentrepreneurs_venue_country',
	    array(
	        'default'    =>  __("Country Name",'wedy-drinkentrepreneurs'),
	        'transport'  =>  'postMessage'
	    )
	);

	$wp_customize->add_control(
	    'drinkentrepreneurs_venue_country',
	    array(
	        'section'  => 'tcx_drinkentrepreneurs_options',
	        'settings' => 'tcx_drinkentrepreneurs_venue_country',
	        'label'    => __('Country','wedy-drinkentrepreneurs'),
	        'type'     => 'text',
	    )
	);

	$wp_customize->add_setting(
	    'tcx_drinkentrepreneurs_venue_street_number',
	    array(
	        'default'    =>  __("Street Number",'wedy-drinkentrepreneurs'),
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
	        'default'    =>  __("Street Name",'wedy-drinkentrepreneurs'),
	        'transport'  =>  'postMessage'
	    )
	);

	$wp_customize->add_control(
	    'drinkentrepreneurs_venue_street_name',
	    array(
	        'section'  => 'tcx_drinkentrepreneurs_options',
	        'settings' => 'tcx_drinkentrepreneurs_venue_street_name',
	        'label'    => __('Venue street name','wedy-drinkentrepreneurs'),
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
	        'label'    => __('Venue latitude','wedy-drinkentrepreneurs'),
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
	        'label'    => __('Venue longitude','wedy-drinkentrepreneurs'),
	        'type'     => 'text',
	    )
	);

	// DrinkEntrepreneurs organizing team
	// Organizer 1
	$wp_customize->add_section(
	    'drinkentrepreneurs_team_options',
	    array(
	        'title'     => 'DrinkEntrepreneurs Team',
	        'priority'  => 200
	    )
	);

	$wp_customize->add_setting(
	    'drinkentrepreneurs_team_org1_name',
	    array(
	        'default'    =>  "Organizer1",
	        'transport'  =>  'postMessage',
	        
	    )
	);

	$wp_customize->add_control(
       'drinkentrepreneurs_team_org1_name_ctrl',
       array(
           'label'          => __( "Organizer's name", 'wedy-drinkentrepreneurs' ),
           'section'        => 'drinkentrepreneurs_team_options',
           'settings'       => 'drinkentrepreneurs_team_org1_name',
           'type'     		=> 'text',
           'priority'	 => 1
       )
	);

	$wp_customize->add_setting(
	    'drinkentrepreneurs_team_org1_description',
	    array(
	        'default'    =>  "Organizer 1 description",
	        'transport'  =>  'postMessage',
	    )
	);

	$wp_customize->add_control(
		new Example_Customize_Textarea_Control(
			$wp_customize,
			'drinkentrepreneurs_team_org1_description_ctrl',
			array(
			    'label'   => __( "Organizer's description", 'wedy-drinkentrepreneurs' ),
			    'section' => 'drinkentrepreneurs_team_options',
			    'settings'   => 'drinkentrepreneurs_team_org1_description',
			    'priority'	 => 2
	) ) );


	$wp_customize->add_setting(
	    'drinkentrepreneurs_team_org1_picture',
	    array(
	        'default'    =>  'http://placehold.it/200x200',
	        'transport'  =>  'postMessage',
	    )
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
           $wp_customize,
           'drinkentrepreneurs_team_org1_picture_ctrl',
           array(
               'label'          => __( "Organizer's picture", 'wedy-drinkentrepreneurs' ),
               'section'        => 'drinkentrepreneurs_team_options',
               'settings'       => 'drinkentrepreneurs_team_org1_picture',
               'priority'	 => 3
           )
       )
	);

	// Organizer 2
	$wp_customize->add_setting(
	    'drinkentrepreneurs_team_org2_name',
	    array(
	        'default'    =>  "Organizer2",
	        'transport'  =>  'postMessage',

	    )
	);

	$wp_customize->add_control(
       'drinkentrepreneurs_team_org2_name_ctrl',
       array(
           'label'          => __( "Organizer's name", 'wedy-drinkentrepreneurs' ),
           'section'        => 'drinkentrepreneurs_team_options',
           'settings'       => 'drinkentrepreneurs_team_org2_name',
           'type'     		=> 'text',
	       'priority'	 => 4           
       )
	);

	$wp_customize->add_setting(
	    'drinkentrepreneurs_team_org2_description',
	    array(
	        'default'    =>  "Organizer 2 description",
	        'transport'  =>  'postMessage',
	    )
	);

	$wp_customize->add_control(
		new Example_Customize_Textarea_Control(
			$wp_customize,
			'drinkentrepreneurs_team_org2_description_ctrl',
			array(
			    'label'   => __( "Organizer's description", 'wedy-drinkentrepreneurs' ),
			    'section' => 'drinkentrepreneurs_team_options',
			    'settings'   => 'drinkentrepreneurs_team_org2_description',
			    'priority'	 => 5
	) ) );

	$wp_customize->add_setting(
	    'drinkentrepreneurs_team_org2_picture',
	    array(
	        'default'    =>  'http://placehold.it/200x200',
	        'transport'  =>  'postMessage',
	    )
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
           $wp_customize,
           'drinkentrepreneurs_team_org2_picture_ctrl',
           array(
               'label'          => __( "Organizer's picture", 'wedy-drinkentrepreneurs' ),
               'section'        => 'drinkentrepreneurs_team_options',
               'settings'       => 'drinkentrepreneurs_team_org2_picture',
               'priority'	 => 6
           )
       )
	);

	// Organizer 3
	$wp_customize->add_setting(
	    'drinkentrepreneurs_team_org3_name',
	    array(
	        'default'    =>  "Organizer3",
	        'transport'  =>  'postMessage',
	    )
	);

	$wp_customize->add_control(
       'drinkentrepreneurs_team_org3_name_ctrl',
       array(
           'label'          => __( "Organizer's name", 'wedy-drinkentrepreneurs' ),
           'section'        => 'drinkentrepreneurs_team_options',
           'settings'       => 'drinkentrepreneurs_team_org3_name',
           'type'     		=> 'text',
           'priority'	 => 7
       )
	);

	$wp_customize->add_setting(
	    'drinkentrepreneurs_team_org3_description',
	    array(
	        'default'    =>  "Organizer 3 description",
	        'transport'  =>  'postMessage',
	    )
	);

	$wp_customize->add_control(
		new Example_Customize_Textarea_Control(
			$wp_customize,
			'drinkentrepreneurs_team_org3_description_ctrl',
			array(
			    'label'   => __( "Organizer's description", 'wedy-drinkentrepreneurs' ),
			    'section' => 'drinkentrepreneurs_team_options',
			    'settings'   => 'drinkentrepreneurs_team_org3_description',
			    'priority'	 => 8
	) ) );


	$wp_customize->add_setting(
	    'drinkentrepreneurs_team_org3_picture',
	    array(
	        'default'    =>  'http://placehold.it/200x200',
	        'transport'  =>  'postMessage',
	    )
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
           $wp_customize,
           'drinkentrepreneurs_team_org3_picture_ctrl',
           array(
               'label'          => __( "Organizer's picture", 'wedy-drinkentrepreneurs' ),
               'section'        => 'drinkentrepreneurs_team_options',
               'settings'       => 'drinkentrepreneurs_team_org3_picture',
               'priority'	 => 9
           )
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