<?php

/**
 * FlowPress Map
 */

    echo '<script src="//maps.googleapis.com/maps/api/js?key=' . $settings->flowpressmap_api_key . '&libraries=places"></script>';
?>

<script>
    jQuery( document ).ready(function( $ ) {
        var map,
            infoWindow,
            request,
            service,
            markers = [];

        function initialize() {
            var $initial_location = new google.maps.LatLng( 43.7181557, -79.5181401 );

            map = new google.maps.Map( document.getElementById( 'flowpressmap_map' ), {
                center: $initial_location,
                zoom: 12
            });

            request = {
                location: $initial_location,
                radius: 5000,
                types: [ 'restaurant' ]
            };

            infoWindow = new google.maps.InfoWindow();

            service = new google.maps.places.PlacesService( map );

            service.nearbySearch( request, callback );
        }

        function callback( results, status ) {
            var flowpressmap_markers_total =
            <?php 
                if ( !empty( $settings->flowpressmap_markers ) ) {
                    echo $settings->flowpressmap_markers;
                } else {
                    echo 'results.length';
                }
            ?>
            ;

            if ( status === google.maps.places.PlacesServiceStatus.OK ) {
                for ( var i = 0; i < flowpressmap_markers_total; i++ ) {
                    markers.push( createMarker( results[ i ] ) );
                }
            }
        }

        function createMarker( place ) {
            var placeLoc = place.geometry.location;

            var marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location
            });

            google.maps.event.addListener( marker, 'click', function() {
                infoWindow.setContent( place.name );

                infoWindow.open( map, this );
            });

            return marker;
        }

        google.maps.event.addDomListener( window, 'load', initialize );
    });
</script>

<?php
    if ( !empty( $settings->flowpressmap_heading ) ) {
?>
    <h4 class="fl-heading">
        <span class="fl-heading-text"><?php echo $settings->flowpressmap_heading; ?></span>
    </h4>
<?php
    }
?>

<div id="flowpressmap_map" class="flowpressmap_map"></div>
