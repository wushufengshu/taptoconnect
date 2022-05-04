<?php if ($user->user_cards == null) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-1">Please activate your card now</h4>

                    <div class="col-lg-10">

                        <?= $this->element('forms/activatecard') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>

    <?php
    $activeexpiration_date = null;
    foreach ($user->user_cards as $userCard) {
        if ($userCard->status == 1) {
            $activeexpiration_date = $userCard->expiration_date;
        }
    }

    $expiration_date = date('Y-m-d', strtotime($activeexpiration_date));
    $monthbeforeexpiration = date('Y-m-d', (strtotime('-1 month', strtotime($expiration_date))));

    if (date('Y-m-d') > $expiration_date) { ?>

        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <h4 class="mb-1">Your subscription is expired!</h4>
                        <p>Hi, your subscription has expired. </p>
                        <div class="col-lg-6">

                            <?= $this->element('forms/activatecard') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <?php if ((date('Y-m-d') >= $monthbeforeexpiration && date('Y-m-d') <= $expiration_date) && $identity) { ?>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <h4 class="mb-1">Your subscription is about to expire!</h4>
                            <p>Hi, we would like to notify you that your subscription is soon to be expired. Please extend your subscription now using voucher.</p>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Use voucher
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Extens subscription</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <?= $this->element('forms/extendviavoucher') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="card mb-3">
            <div class="card-header position-relative min-vh-25 mb-7">
                <div class="bg-holder rounded-3 rounded-bottom-0">
                    <img src="../../assets/img/generic/ubtap.png" style="width: 100%; height: auto;">
                </div>
                <!--/.bg-holder-->

                <div class="avatar avatar-5xl avatar-profile">
                    <!--
                    <img class="rounded-circle img-thumbnail shadow-sm" src="../../assets/img/team/<?= h($user->image); ?>" width="200" alt="" />
                    -->
                    <?php
                    $imagestyle = 'width:200;';
                    if (!$user->image) {
                        echo $this->Html->image('avatar.png', ['style' => $imagestyle, 'class' => 'rounded-circle img-thumbnail shadow-sm', 'alt' => 'User img']);
                    } else {
                        echo $this->Html->image('uploads/profilepicture/' . $user->id . '/' . $user->image, ['style' => $imagestyle, 'class' => 'rounded-circle img-thumbnail shadow-sm', 'alt' => 'User img']);
                    }
                    ?>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <h4 class="mb-1"> <?= h($user->firstname . " " . $user->middlename . " " . $user->lastname) ?><span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
                        </h4>
                        <h5 class="fs-0 fw-normal"><?= h($user->email . "-" . $user->contactno) ?></h5>
                        <p class="text-500"><?= $this->Text->autoParagraph(h($user->address)); ?></p>
                        <a href="<?php echo "http://" . $user->website; ?>" target="_blank"><?= $this->Text->autoParagraph(h($user->website)); ?></a>
                        <!--<button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button>-->

                        <?= $this->Html->link(__('Add to contact'), ['controller' => 'Users', 'action' => 'generatevcard', $user->id], ['class' => 'button float-right btn btn-primary float-right']) ?>
                        <div class="border-dashed-bottom my-4 d-lg-none"></div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <iframe style="border: 0px #FFFFFF none;" src="https://www.partyviberadio.com/player-https/embed-auto-cassette/pop.html" name="embed" width="450px" height="225x" frameborder="1" marginwidth="0px" marginheight="0px" scrolling="no"></iframe>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header bg-light d-flex justify-content-between">
                <h5 class="mb-0">Social Media</h5>
                <!--<a class="font-sans-serif" href="#">All Social Media</a>-->
                <?= $this->Html->link(__('All Social Media'), ['controller' => 'Users', 'action' => 'allsocial/' . $user->id], ['class' => 'font-sans-serif']) ?>
            </div>
            <div class="card-body fs-1 pb-0">
                <div class="row">
                    <?php
                    foreach ($socials as $key => $value) {
                        $s_id = $value->id;
                        $s_social_link = $value->social_link;
                        $s_image = $value->image;
                    ?>
                        <div class="col-sm-6 mb-3">

                            <div class="d-flex position-relative align-items-center mb-2">
                                <!--<i class="fa fa-link"></i>-->

                                <img class="d-flex align-self-center me-2 rounded-3" src="../../assets/img/logos/<?php echo $s_image; ?>" alt="" width="50" />
                                &nbsp;
                                <div class="flex-1">
                                    <h6 class="fs-0 mb-0"><a class="stretched-link" href="<?php echo "http://" . $s_social_link; ?>" style="text-decoration: none;" target="_blank"><?= h($s_social_link) ?></a></h6>
                                    <!--<p class="mb-1">2 followers</p>-->
                                </div>

                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row g-0">
            <div class="col-lg-12 pe-lg-2">
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Bio</h5>
                    </div>
                    <div class="card-body text-justify">
                        <div class="collapse show" id="profile-intro">
                            <?= $this->Text->autoParagraph(h($user->user_desc)); ?>
                        </div>
                    </div>
                    <div class="card-footer bg-light p-0 border-top">
                        <button class="btn btn-link d-block w-100 btn-intro-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#profile-intro" aria-expanded="true" aria-controls="profile-intro">Show <span class="less">less<span class="fas fa-chevron-up ms-2 fs--2"></span></span><span class="full">full<span class="fas fa-chevron-down ms-2 fs--2"></span></span></button>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Meetings</h5>
                    </div>

                    <div class="card-body fs--1">
                        <?php
                        foreach ($meetingnow as $key => $value) {
                            $m_id = $value->id;
                            $month = $value->month;
                            $day = $value->day;

                            $meeting_name = $value->meeting_name;
                            $time_from = $value->time_from;
                            $time_to = $value->time_to;
                            $organized_by = $value->organized_by;
                            $meeting_place = $value->meeting_place;
                        ?>
                            <div class="d-flex btn-reveal-trigger">
                                <div class="calendar"><span class="calendar-month"><?= h($month) ?></span><span class="calendar-day"><?= h($day) ?></span></div>
                                <div class="flex-1 position-relative ps-3">
                                    <h6 class="fs-0 mb-0"><?= h($meeting_name) ?></h6>
                                    <p class="mb-1">Organized by <?= h($organized_by) ?></p>
                                    <p class="text-1000 mb-0">Time: <?= h($time_from) ?></p>
                                    <p class="text-1000 mb-0">Duration: <?= h($time_from) ?> - <?= h($time_to) ?></p>Place: <?= h($meeting_place) ?>

                                    <div class="border-dashed-bottom my-3"></div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                    <div class="card-footer bg-light p-0 border-top">
                        <!--
                        <a class="btn btn-link d-block w-100" href="#">All Meetings<span class="fas fa-chevron-right ms-1 fs--2"></span></a>
                        -->
                        <?= $this->Html->link(__('All Meetings'), ['controller' => 'Users', 'action' => 'allmeeting/' . $user->id], ['class' => 'btn btn-link d-block w-100']) ?>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-light d-flex justify-content-between">
                        <h5 class="mb-0">Music & Video Links</h5>
                        <!--<a class="font-sans-serif" href="#">All Music & Video Links</a>-->
                        <?= $this->Html->link(__('All Music & Video Links'), ['controller' => 'Users', 'action' => 'allmusicvideo/' . $user->id], ['class' => 'font-sans-serif']) ?>
                    </div>
                    <div class="card-body fs--1 pb-0">
                        <div class="row">
                            <?php
                            foreach ($music_videos as $key => $value) {
                                $m_id = $value->id;
                                $music_video_link = trim($value->music_video_link);
                            ?>
                                <div class="col-sm-6 mb-3">
                                    <div class="d-flex position-relative align-items-center mb-2">
                                        <div class="flex-1">
                                            <h6 class="fs-0 mb-0">
                                                <?php
                                                if (str_contains($music_video_link, 'youtube')) {
                                                    //echo 'true';
                                                    $url = $music_video_link;
                                                    $parse = parse_url($url, PHP_URL_QUERY);
                                                    parse_str($parse, $output);
                                                    $youtube_id = $output['v']; //get youtube id
                                                    $youtubelink = "https://www.youtube.com/embed/" . $youtube_id;
                                                    //echo $youtube_id;
                                                    //echo $youtubelink;
                                                ?>
                                                    <iframe width="auto" height="auto" src="<?php echo $youtubelink; ?>" frameborder="0" allowfullscreen></iframe>
                                                <?php
                                                } else {
                                                ?>
                                                    <iframe src="<?php echo "http://" . $music_video_link; ?>" style="width: auto; height: auto;" scrolling="no"></iframe>
                                                    <br>
                                                    <i class="fa fa-link"></i>&nbsp;
                                                    <a class="stretched-link" style="text-decoration: none;" href="<?php echo "http://" . $music_video_link; ?>" target="_blank"><?= h($music_video_link) ?></a>
                                                <?php
                                                }
                                                ?>
                                            </h6>
                                            <!--<p class="mb-1">2 followers</p>-->
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-light d-flex justify-content-between">
                        <h5 class="mb-0">Office</h5>
                    </div>
                    <div class="card-body fs--1 pb-0 pt-0 px-3">
                        <div class="row">
                            <input type="hidden" id="latitude" value="<?= $user->latitude ?>">
                            <input type="hidden" id="longitude" value="<?= $user->longitude ?>">
                            <div id="map" style="height:300px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<?php endif; ?>
<link href="/vendors/leaflet/leaflet.css" rel="stylesheet" />
<link href="/vendors/leaflet.markercluster/MarkerCluster.css" rel="stylesheet" />
<link href="/vendors/leaflet.markercluster/MarkerCluster.Default.css" rel="stylesheet" />

<script src="/vendors/leaflet/leaflet.js"></script>
<script src="/vendors/leaflet.markercluster/leaflet.markercluster.js"></script>
<script src="/vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>


<script>
    var docReady = function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "loading") {
            document.addEventListener("DOMContentLoaded", fn);
        } else {
            setTimeout(fn, 1);
        }
    };
    /* -------------------------------------------------------------------------- */

    /*                                   leaflet                                  */

    /* -------------------------------------------------------------------------- */
    var leafletActiveUserInit = function leafletActiveUserInit() {

        var _window2 = window,
            L = _window2.L;
        var mapContainer = document.getElementById("map");

        if (L && mapContainer) {
            var getFilterColor = function getFilterColor() {
                return localStorage.getItem("theme") === "dark" ? [
                    "invert:98%",
                    "grayscale:69%",
                    "bright:89%",
                    "contrast:111%",
                    "hue:205deg",
                    "saturate:1000%",
                ] : [
                    "bright:101%",
                    "contrast:101%",
                    "hue:23deg",
                    "saturate:225%",
                ];
            };
            var tileLayerTheme =
                "https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png";
            var tiles = L.tileLayer.colorFilter(tileLayerTheme, {
                attribution: null,
                transparent: true,
                filter: getFilterColor(),
            });

            var myIcon = L.icon({
                iconUrl: '/vendors/leaflet/images/marker-icon.png',
                iconSize: [15, 15],
            });
            var map = L.map("map", {
                center: L.latLng(10.737, 0),
                zoom: 0,
                layers: [tiles],
                minZoom: 1.3,
                zoomSnap: 0.5,
                dragging: !L.Browser.mobile,
                tap: !L.Browser.mobile,
            }).setView([12.8797, 121.7740], 5);

            var inputLatitude = document.getElementById("latitude").value;
            var inputLongitude = document.getElementById("longitude").value;


            var theMarker = L.marker([inputLatitude, inputLongitude], {
                icon: myIcon
            }).addTo(map);


            var mcg = L.markerClusterGroup({
                chunkedLoading: false,
                spiderfyOnMaxZoom: false,
            });
            // var popup = L.popup();
            // var theMarker = {};

            // function onMapClick(e) {
            //     // popup
            //     //     .setLatLng(e.latlng)
            //     //     .setContent("You clicked the map at " + e.latlng.toString())
            //     //     .openOn(map);
            //     if (theMarker != undefined) {
            //         map.removeLayer(theMarker);
            //     };

            //     //Add a marker to show where you clicked. 
            //     theMarker = new L.marker(e.latlng).addTo(map);
            //     document.getElementById("latitude").value = e.latlng.lat;
            //     document.getElementById("longitude").value = e.latlng.lng;
            // }

            // map.on('click', onMapClick);

            map.addLayer(mcg);
            var themeController = document.body;
            themeController.addEventListener("clickControl", function(_ref9) {
                var _ref9$detail = _ref9.detail,
                    control = _ref9$detail.control,
                    value = _ref9$detail.value;

                if (control === "theme") {
                    tiles.updateFilter(
                        value === "dark" ? [
                            "invert:98%",
                            "grayscale:69%",
                            "bright:89%",
                            "contrast:111%",
                            "hue:205deg",
                            "saturate:1000%",
                        ] : [
                            "bright:101%",
                            "contrast:101%",
                            "hue:23deg",
                            "saturate:225%",
                        ]
                    );
                }
            });
        }
    };
    docReady(leafletActiveUserInit);
</script>