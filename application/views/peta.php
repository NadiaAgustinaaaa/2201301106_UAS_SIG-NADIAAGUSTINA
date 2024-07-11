<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Dapur Arang</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Dapur Arang Di Desa Ranggang</h6>
        </div>
        <div class="card-body">
            <div id="map" style="height: 400px;"></div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->

<!-- End of Content Wrapper -->

<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Load Leaflet CSS and JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Script to display map -->
<script>
    // Inisialisasi peta dengan OpenStreetMap
    var map = L.map('map').setView([-3.8333818150407377, 114.68521269011461], 15);

    // Tambahkan layer OpenStreetMap sebagai base layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // Data marker yang akan ditampilkan
    var locations = <?php echo json_encode($data); ?>;

    var customIcon = L.icon({
        iconUrl: '<?php echo base_url('assets/img/real.png'); ?>', // Path to your custom icon
        iconSize: [40, 40], // Size of the icon
        iconAnchor: [20, 40], // Point of the icon which corresponds to marker's location
        popupAnchor: [0, -40] // Point from which the popup should open relative to the iconAnchor
    });

    // Loop to add markers for each location
    locations.forEach(function(location) {
        // Add marker with custom icon to the map
        var marker = L.marker([location.lat, location.long], {
            icon: customIcon
        }).addTo(map);

        // Bind popup content to the marker
        marker.bindPopup("<b>" + location.nama_pemilik + "</b><br>" + location.keterangan);
    });
</script>