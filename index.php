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
  <div id="tagline_overlay">
    <img alt="" src="/wp-content/themes/wedy/images/bullehome2.png"/>
  </div><!-- #tagline_overlay -->
  <?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>
 
  <div id="main_content" > 
    <div id="actions_wrap" style="height:356px;">
    <ul>
      <li class="actions_entrepreneur">
        <iframe width="503" height="283" src="//www.youtube.com/embed/aeeYpbGVeFc" frameborder="0" allowfullscreen></iframe>
      </li>
      <li class="actions_facebook">
        <span style="font-size:16px"><b>Entrepreneurs :</b> Rejoignez-nous</span>
        <p style="margin-top:18px;"> Tous les premiers jeudis du mois, <a href="#">DrinkEntrepreneurs</a> vous invite à vous retrouver dans un cadre informel, ouvert et convivial, pour se rencontrer, échanger, et pourquoi pas se filer un coup de pouce. DrinkEntrepreneurs est une association à but non lucratif.</p>
        <a href="#newsletter" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-envelope"></span> Inscrivez vous</a>
      </li>
  </ul>
      
  </div><!-- #actions_wrap -->
  
  <div>
    <?php //print get_page_by_title('Where')->post_content;?>
    <?php 
      if(get_theme_mod( 'tcx_drinkentrepreneurs_date' )){
        $event_date = get_theme_mod( 'tcx_drinkentrepreneurs_date' );
      }else{
        $event_date = "not set";
      }
      if(get_theme_mod( 'tcx_drinkentrepreneurs_venue' )){
        $event_venue = get_theme_mod( 'tcx_drinkentrepreneurs_venue' );
      }else{
        $event_venue = "NOT SET";
      }
      
      if(get_theme_mod( 'tcx_drinkentrepreneurs_venue_addr' )){
        $event_address = get_theme_mod( 'tcx_drinkentrepreneurs_venue_addr' );
      }else{
        $event_address = "NOT SET";
      }
  ?>
    
    <h1 style="text-align: center">Où se passe l'événement?</h1>
    <p style="text-align: center;font: quicksand">Le prochain événement est le <span id="event_date"></span> au <span id="event_venue"><?php echo $event_venue ?></span></p>
    <p style="text-align: center">Adresse : <span id="event_address"><?php echo $event_address ?></span></p>
    <p style="text-align: center">
    <div id="map"></div>
  </div>

  <div style="margin-top:20px;">
    <?php print get_page_by_title('FAQ')->post_content;?>
  </div>
  
  <div style="margin-top:20px;">
    <div class="row">
      <h1 style="text-align: center"><?php echo __('Team in','wedy-drinkentrepreneurs');?> <?php echo get_theme_mod('tcx_drinkentrepreneurs_venue_city');?></h1>
      <?php
      //Create an array of organizers
      //TODO this logic should be somewhere else and less dirty
        $organizers = array();
        for ($i = 1; $i <= 3; $i++) {
          $img = get_theme_mod("drinkentrepreneurs_team_org".$i."_picture");
          $name = get_theme_mod("drinkentrepreneurs_team_org".$i."_name");
          $description = get_theme_mod("drinkentrepreneurs_team_org".$i."_description");
          if(!preg_match("/^Organizer/", $name)) {
            $orga = array(
              "name"=>$name,
              "img"=>$img,
              "description"=>$description
            );
            array_push($organizers, $orga);
          }
        }
        ?> 
        <?php
          $class = "col-md-".(12/count($organizers));
          foreach ($organizers as &$orga) {?>
              <div style="text-align: center" class="<?php echo $class; ?>">
                <img class="img-circle" alt="<?php echo $orga['name']; ?>" src="<?php echo $orga['img']; ?>" width="200" height="200" />
                <h4><?php echo $orga['name']; ?> </h4>
                <p style="text-align: center"><?php echo $orga['description']; ?></p>
              </div>
        <?php 
          }
        ?>
    </div>
  </div>

  <div id="newsletter" style="text-align: center;">
    <?php 
       // Custom widget Area Start
       if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Widget area') ) : ?>
      <?php endif;
      // Custom widget Area End
      ?>
  </div>

  <style type="text/css">
    #map {
      width: 779px;
      height: 513px;
    }
  </style>
  <script type="text/javascript">
    var deIcon = L.icon({
      iconUrl: 'http://mapde.meteor.com/pinMap.png',
      iconSize:     [50, 63], // size of the icon
      shadowSize:   [50, 64], // size of the shadow
      iconAnchor:   [25, 63], // point of the icon which will correspond to marker's location
      shadowAnchor: [4, 62],  // the same for the shadow
      popupAnchor:  [-3, -5] // point from which the popup should open relative to the iconAnchor
  });

    var url = "http://beta.geocoding.cloudmade.com/v3/985246eebf324ad29e1ca207ab5b745e/api/geo.location.search.2?source=OSM&q=";
    url += "[country=<?php echo get_theme_mod('tcx_drinkentrepreneurs_venue_country');?>]%20";
    url += "[city=<?php echo get_theme_mod('tcx_drinkentrepreneurs_venue_city');?>]%20";
    url += "[street=<?php echo get_theme_mod('tcx_drinkentrepreneurs_venue_street_name');?>]%20";
    url += "[housenumber=<?php echo get_theme_mod('tcx_drinkentrepreneurs_venue_street_number');?>]";
    url += "&format=json"

    console.log(url);

    // $.getJSON(url,{format: "json"}).done(funtion(data){
    //   console.log(data)
    // });
    var lat= <?php echo get_theme_mod('tcx_drinkentrepreneurs_venue_lat');?>;
    var long=<?php echo get_theme_mod('tcx_drinkentrepreneurs_venue_long');?>;

    var map = L.map('map').setView([lat, long], 16);
    L.tileLayer('http://{s}.tile.cloudmade.com/985246eebf324ad29e1ca207ab5b745e/997/256/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
      maxZoom: 18
  }).addTo(map);

    var marker = L.marker([lat, long],{icon: deIcon});
    marker.bindPopup("<h2><?php echo $event_venue ?></h2><br>");
    marker.addTo(map)
  </script>

  <script type="text/javascript">
    $( document ).ready(function() {
      console.log( "ready!" );
      var lang = "<?php echo get_bloginfo('language'); ?>";
      console.log(lang);
      var l = lang.split('-')[0];
      moment.lang('fr');
      $("#event_date").text(moment("<?php echo $event_date;?> ").calendar());
    });
  </script>
  <?php
/*
         $mypages = get_pages( array( 'include' => '22,20', sort_order => 'desc') );
  foreach ($mypages as $page ) {
    $content = $page->post_content;
    if ( ! $content ) // Check for empty page
      continue;

    $content = apply_filters( 'the_content', $content );

    echo $content;

  }
*/
  ?>
  </div><!-- #main_content -->
<?php get_footer(); ?>

