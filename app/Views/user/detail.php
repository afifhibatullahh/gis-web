<?= $this->extend('user/layout'); ?>
<?= $this->section('style'); ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
<style>
    .map {
        width: 100%;
        min-height: 847px;
        /* border: 1px solid; */
    }

    #foto {
        width: 100%;
        max-height: 400px;
        object-fit: contain;
    }
</style>
<?= $this->endSection(); ?>
<?= $this->section('contentUser'); ?>
<section class="content">
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <h3 class="pl-2 mt-3"><?= $title['title']; ?></h3>
            </div>
            <div class="row pl-2">
                <div class="col-md-8">
                    <div class="map" id="map">
                    </div>
                </div>
                <div class="col-md-4 ">
                    <h3>Foto</h3>
                    <img src="/img/<?= $image['image']; ?>" id="foto" alt="gambar <?= $title['title']; ?>">
                    <h3>Video</h3>
                    <?php if (isset($map->youtube)) : ?>
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?= $map->youtube; ?>">
                        </iframe>
                    <?php endif ?>
                    <h3>Address</h3>
                    <p>
                        <?= $map->address; ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3">
                    <h3>Deskripsi Singkat</h3>
                    <div>
                        <?= $map->description; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>


<?= $this->section('js'); ?>

<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script>
    var map = L.map('map').setView([<?= $map->latitude; ?>, <?= $map->longitude; ?>], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    L.marker([<?= $map->latitude; ?>, <?= $map->longitude; ?>]).addTo(map)
        .bindPopup('<?= $map->address; ?>');
</script>

<?= $this->endSection(); ?>

</html