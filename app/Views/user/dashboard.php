<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <style>
        .map {
            width: 100%;
            height: 500px;
            border: 1px solid;
        }
    </style>
</head>

<body>
    <h1>Map</h1>

    <div class="map" id="map">

    </div>
</body>


<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script>
    var map = L.map('map').setView([-5.388374694342063, 105.25094079726196], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    <?php foreach ($map as $data) : ?>
        L.marker([<?= $data->latitude; ?>, <?= $data->longitude; ?>]).addTo(map)
            .bindPopup('<?= $data->address; ?>')
            .openPopup('<?= $data->longitude; ?>');
    <?php endforeach ?>
</script>

</html>