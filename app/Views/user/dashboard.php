<?= $this->extend('user/layout'); ?>
<?= $this->section('style'); ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
<style>
    .map {
        width: 100%;
        min-height: 847px;
        border: 1px solid;
    }
</style>
<?= $this->endSection(); ?>
<?= $this->section('contentUser'); ?>
<div class="content-wrapper">
    <div class="map" id="map">
</div>
</div>
<?= $this->endSection(); ?>


<?= $this->section('js'); ?>

<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script>
    var map = L.map('map').setView([-5.388374694342063, 105.25094079726196], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    <?php foreach ($map as $data) : ?>
        L.marker([<?= $data->latitude; ?>, <?= $data->longitude; ?>]).addTo(map)
            .bindPopup('<?= $data->address; ?>');
    <?php endforeach ?>
</script>

<?= $this->endSection(); ?>

</html