<?php
/*
Template Name: Contact Template
*/
?>

<?php while (have_posts()) : the_post(); ?>

<div class="wrapper wrapper--wide">
	

	<div class="contactpage__content">
		<div class="incsi">
			<div class="balja">
				<?php the_content(); ?>
			</div>
			<div class="jobbja">
				<h3>Follow Us</h3>
				<a href="#"><i class="ion ion-social-facebook"></i>Facebook</a>
				<a href="#"><i class="ion ion-social-instagram"></i>Instagram</a>
			</div>
		</div>
		<section class="mapblock">
			<div id="map-canvas"></div>
		</section>



  </div>

	<figure class="contactpage__ill">
  	<?php the_post_thumbnail('large31') ?>
  </figure>

</div>


<?php endwhile; ?>
<!-- Google MAps -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script>

  function initialize() {

    var mapOptions = {
      center: new google.maps.LatLng(47.505175, 19.054692),
      zoom: 14,
      zoomControl: false,
      zoomControlOptions: {style: google.maps.ZoomControlStyle.DEFAULT,},
      disableDoubleClickZoom: true,
      mapTypeControl: true,
      mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,},
      scaleControl: true,
      scrollwheel: true,
      streetViewControl: true,
      draggable: true,
      overviewMapControl: true,
      overviewMapControlOptions: {opened: false,},
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles: [{featureType: "landscape",stylers: [{saturation: -100}, {lightness: 65}, {visibility: "on"}]}, {featureType: "poi",stylers: [{saturation: -100}, {lightness: 51}, {visibility: "simplified"}]}, {featureType: "road.highway",stylers: [{saturation: -100}, {visibility: "simplified"}]}, {featureType: "road.arterial",stylers: [{saturation: -100}, {lightness: 30}, {visibility: "on"}]}, {featureType: "road.local",stylers: [{saturation: -100}, {lightness: 40}, {visibility: "on"}]}, {featureType: "transit",stylers: [{saturation: -100}, {visibility: "simplified"}]}, {featureType: "administrative.province",stylers: [{visibility: "off"}]/** /},{featureType: "administrative.locality",stylers: [{ visibility: "off" }]},{featureType: "administrative.neighborhood",stylers: [{ visibility: "on" }]/**/}, {featureType: "water",elementType: "labels",stylers: [{visibility: "on"}, {lightness: -25}, {saturation: -100}]}, {featureType: "water",elementType: "geometry",stylers: [{hue: "#ffff00"}, {lightness: -25}, {saturation: -97}]}],
    }
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    //var image = '<?php echo get_stylesheet_directory_uri(); ?>/assets/img/flag.png';
    var myLatLng = new google.maps.LatLng(47.505175, 19.054692);
    var officeMarker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      //icon: image,
      animation: google.maps.Animation.DROP,
    });
    //officeMarker.setAnimation(google.maps.Animation.BOUNCE);
	 }

  google.maps.event.addDomListener(window, 'load', initialize);

</script>