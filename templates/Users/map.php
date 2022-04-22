<div class="card mb-3">

    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="row mb-3">

                    <div class="col-md-12">
                        <label class="form-label" for="bootstrap-wizard-wizard-firstname">Latitude/Longitude <span style="color:#e63757">*</span> </label>
                        <?= $this->Form->create($user) ?>
                        <div class="input-group  ">
                            <?php $this->Form->setTemplates(['inputContainer' => ' {{content}} ']); ?>
                            <?= $this->Form->control('latitude', ['class' => 'form-control col-4', 'aria-label' => "Latitude", 'type' => 'text', 'label' => false, 'readonly' => true]); ?>
                            <?= $this->Form->control('longitude', ['class' => 'form-control col-4', 'aria-label' => "Longitude", 'type' => 'text', 'label' => false, 'readonly' => true]); ?>
                            <?= $this->Form->button('Add', ['class' => 'btn btn-outline-secondary col-4']); ?>
                        </div>
                        <?= $this->Form->end(); ?>

                    </div>

                </div>
                <div id="map" style="height:400px"></div>
            </div>
        </div>
    </div>
</div>
<script src="/vendors/leaflet/leaflet.js"></script>
<script src="/vendors/leaflet.markercluster/leaflet.markercluster.js"></script>
<script src="/vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>


<link href="/vendors/leaflet/leaflet.css" rel="stylesheet" />
<link href="/vendors/leaflet.markercluster/MarkerCluster.css" rel="stylesheet" />
<link href="/vendors/leaflet.markercluster/MarkerCluster.Default.css" rel="stylesheet" />

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
            var map = L.map("map", {
                center: L.latLng(10.737, 0),
                zoom: 0,
                layers: [tiles],
                minZoom: 1.3,
                zoomSnap: 0.5,
                dragging: !L.Browser.mobile,
                tap: !L.Browser.mobile,
            }).setView([12.8797, 121.7740], 5);
            var mcg = L.markerClusterGroup({
                chunkedLoading: false,
                spiderfyOnMaxZoom: false,
            });
            var popup = L.popup();
            var theMarker = {};

            function onMapClick(e) {
                // popup
                //     .setLatLng(e.latlng)
                //     .setContent("You clicked the map at " + e.latlng.toString())
                //     .openOn(map);
                if (theMarker != undefined) {
                    map.removeLayer(theMarker);
                };

                //Add a marker to show where you clicked. 
                theMarker = new L.marker(e.latlng).addTo(map);
                document.getElementById("latitude").value = e.latlng.lat;
                document.getElementById("longitude").value = e.latlng.lng;
            }

            map.on('click', onMapClick);

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