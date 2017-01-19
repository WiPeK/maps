    <script src="<?php echo site_url('assets/js/jquery.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/jquery.cookie.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/bootstrap.min.js'); ?>"></script>   
    <script type="text/javascript" 
        src="https://maps.googleapis.com/maps/api/js?sensor=false">
    </script>
    <script>
            jQuery(function($){
                if($.cookie('ukryjcookie') == 'true'){
                    $('#cookieinfo').hide();
                }

                $('#cookieinfobtn').click(function(e){
                    e.preventDefault();
                    $('#cookieinfo').hide();
                    $.cookie('ukryjcookie', 'true', {expires: 365, path: '/'});
                });

                $('#panel-about-btn').click(function(){
                    $('#panel-about').hide();
                });

                $('#panel-demo-btn').click(function(){
                    $('#panel-demo').hide();
                });

            });
        var icon_url = '<?php echo base_url() . "assets/icons/"; ?>';

        $(document).ready(function(){
            resizeDiv();
            initialize();
        });

        window.onresize = function(event) {
            resizeDiv();
        }

        function resizeDiv() {

            vpw = $(window).width();
            vpd = $(window).height();

            $('.mapa_google iframe').css("width", vpw);
            $('.login_cont').css({"width": vpw + 'px'});
            $('.login_cont').css({"height": vpd + 'px'});

        }

        $('.img_iconf').click(function(){
            var ic = $(this).attr("alt");
            $("input[name=iconin]").val(ic);
            $("#icon_form").html('<img src="' + icon_url + ic + '"/>');
            $("#modalIcon").hide();
            $(".modal-backdrop").hide();
        });

        var map;

        function initialize()
        {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 50.9456095, 
                    lng: 20.9587143
                },
                zoom: 12
            });

            var infowindow = null;

            infowindow = new google.maps.InfoWindow({
                content: "holding..."
            });


            <?php $i = 0; if(isset($places)): ?>
                <?php foreach($places as $place): ?>
                    <?php echo 'var point' . $i; ?> = new google.maps.LatLng(<?php echo $place->lat; ?>, <?php echo $place->lng; ?>);
                    <?php echo 'var marker' . $i; ?> = new google.maps.Marker({
                        position: <?php echo 'point' . $i; ?>,
                        map: map,
                        title: '<?php echo $place->title; ?>',
                        icon: '<?php echo site_url() . "assets/icons/" .  $place->icon; ?>'
                    });
                    <?php echo 'var contmark' . $i; ?> = '<h4 class="head_win"><?php echo $place->title; ?></h4>';
                    <?php echo 'contmark' . $i; ?> += '<img src="<?php echo site_url() . $place->photo; ?>" alt="<?php echo $place->title; ?>" class="img_win"/>';
                    <?php echo 'contmark' . $i; ?> += '<?php echo anchor(prep_url($place->url), "Odwiedź stronę " . $place->url, array('title' => $place->title, 'target' => '_blank', 'class' => 'anch_win')); ?>';
                    <?php echo 'contmark' . $i; ?> += '<p class="par_win"><?php echo $place->opis; ?></p>';
                    
                    google.maps.event.addListener(<?php echo 'marker' . $i; ?>, 'click', function(){
                        infoWindow.setContent(<?php echo 'contmark' . $i; ?>);
                        infoWindow.open(map,this);
                    });

                <?php $i++; endforeach; ?>
            <?php endif; ?>

            

            var contmark = '<a href="http://www.wipek.pl">sdffsd</a>';
            contmark += '<img src="http://placehold.it/350x150">';

            var infoWindow = new google.maps.InfoWindow({
                content: contmark
            });

            

            <?php if(!isset($home)): ?>
                google.maps.event.addListener(map, "rightclick", function(event) {
                    var lat = event.latLng.lat();
                    var lng = event.latLng.lng();
                    $("input[name=lat]").val(lat);
                    $("input[name=lng]").val(lng);

                    var pointn = new google.maps.LatLng(lat, lng);
                    var markern = new google.maps.Marker({
                        position: pointn,
                        map: map,
                        title: 'test',
                        //icon: '/path',
                    });
                });
            <?php endif; ?>    
        }
    </script>

</body>
</html>