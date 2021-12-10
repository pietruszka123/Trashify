<?php
require_once("header.php");
?>
<script>
    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: -34.397,
                lng: 150.644
            },
            zoom: 8,
        });
    }
</script>


<!-- container -->

    <div id="map">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_qeyK1I3H1OzVty6WmMbtUQMI0JwWxdw&callback=initMap&v=weekly" async></script>
    </div>


<script src="./js/index.js"></script>
<!-- stopka -->
<?php include_once('footer.php');
