    <script src="<?php echo site_url('assets/js/jquery.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/jquery.cookie.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/bootstrap.min.js'); ?>"></script>   
    <script type="text/javascript" 
        src="https://maps.googleapis.com/maps/api/js?sensor=false">
    </script>
    <script>
        var icon_url = '<?php echo base_url() . "assets/icons/"; ?>';

        $(document).ready(function(){
            resizeDiv();
            initialize();

            jQuery(function($){
                if($.cookie('ukryjcookie') == 'true'){
                    $('#cookieinfo').hide();
                }

                $('#cookieinfobtn').click(function(e){
                    e.preventDefault();
                    $('#cookieinfo').hide();
                    $.cookie('ukryjcookie', 'true', {path: '/'});
                });
            });
        });

        window.onresize = function(event) {
            resizeDiv();
        }

        function resizeDiv() {

        }

        var map;

        function initialize()
        {
            <?php if(isset($adminmap) && ($adminmap === true)): ?>
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: 50.94069054852026, 
                        lng: 20.950584411621094
                    },
                    zoom: 12
                });
            <?php else: ?>
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: <?php echo $place->lat; ?>, 
                        lng: <?php echo $place->lng; ?>
                    },
                    zoom: 12
                });

                //var infowindow = null;

                // infowindow = new google.maps.InfoWindow({
                //     content: "holding..."
                // });

                var point = new google.maps.LatLng(<?php echo $place->lat; ?>, <?php echo $place->lng; ?>);

                var marker = new google.maps.Marker({
                    position: point,
                    map: map,
                    title: '<?php echo $place->title; ?>',
                    icon: '<?php echo site_url() . "assets/icons/" .  $place->icon; ?>'
                });

                var contmark = '<h4 class="head_win"><?php echo $place->title; ?></h4>';
                contmark += '<img src="<?php echo site_url() . $place->photo; ?>" alt="<?php echo $place->title; ?>" class="img_win"/>';
                contmark += '<?php echo anchor(prep_url($place->url), "Odwiedź stronę " . $place->url, array('title' => $place->title, 'target' => '_blank', 'class' => 'anch_win')); ?>';
                contmark += '<p class="par_win"><?php echo $place->opis; ?></p>';
                        
                        google.maps.event.addListener(marker, 'click', function(){
                            infoWindow.setContent(contmark);
                            infoWindow.open(map,this);
                        });

                //var contmark = '<a href="http://www.wipek.pl">sdffsd</a>';
                //contmark += '<img src="http://placehold.it/350x150">';

                var infoWindow = new google.maps.InfoWindow({
                    content: contmark
                });
            <?php endif; ?>       
        }
    </script>

</body>
</html>