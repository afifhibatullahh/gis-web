<?= $this->extend('layout/master'); ?>

<?= $this->section('style'); ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />

<style>
    #coverPreview {
        width: 100%;
        max-height: 400px;
        object-fit: contain;
    }
</style>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="/admin/map">
                        <i class="fa-solid fa-arrow-left"></i>
                        <h6 class="d-inline">Back</h6>
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Map Setting</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ubah Map Setting</h3>
                <div class="card-tools">
                    <a href="/admin/map" class="btn btn-dark">
                        <i class="fa-solid fa-arrow-left"></i>
                        <p class="d-inline">
                            Back
                        </p>
                    </a>
                    <button class="btn btn-dark d-inline" type="submit" form="form">
                        <p class="d-inline">
                            Save
                        </p>
                        <i class="fas fa-save"></i>
                    </button>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <form action="/admin/maps/save" method="post" id="form" enctype="multipart/form-data">
                    <input type="hidden" name="author" value='admin'>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <div class="input-group mb-3">
                                        <input type="text" id="title" class="form-control <?= $validation->hasError('title') ? 'is-invalid' : ''; ?>" placeholder="Title" name="title">
                                        <div id="title" class="invalid-feedback">
                                            <?= $validation->getError('title'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="<?= date('Y-m-d'); ?>" id="datepicker">
                                        <span class="input-group-text" id="basic-addon2">as</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-12 col-lg-8">
                                    <div class="row">
                                        <div class="col-12 col-lg-8">
                                            <div class="input-group mb-3">
                                                <label>Category Type</label>
                                                <select class="form-control select2" style="width: 100%;">
                                                    <option value="Alabama" selected="selected">Alabama</option>
                                                    <option value="Alaska">Alaska</option>
                                                    <option value="California">California</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="input-group mb-3">
                                                <label>Category</label>
                                                <select class="form-control select2" style="width: 100%;" name="category_id">
                                                    <?php foreach ($category as $data) : ?>
                                                        <option value="<?= $data['category_id']; ?>"><?= $data['title']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="input-group mb-3">
                                        <label>Kecamatan</label>
                                        <select class="form-control select2" id="kecamatan" name="kecamatan" style="width: 100%;">
                                            <option disabled>Pilih</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="map" style="width:100%; height: 400px;" class="mb-3"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Latitude" name="latitude">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Longtitude" name="longtitude">
                                    </div>
                                </div>
                            </div>
                            <textarea id="summernote" name="content">
                            </textarea>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label>Status</label>
                            <div class="mb-3">
                                <div class="form-check d-inline">
                                    <input class="form-check-input" type="radio" name="status" id="draft" value="draft" checked>
                                    <label class="form-check-label" for="draft">
                                        Draft
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input class="form-check-input" type="radio" name="status" id="publish" value="publish">
                                    <label class="form-check-label" for="publish">
                                        Publish
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Cover</label>
                                <input class="form-control <?= $validation->hasError('cover') ? 'is-invalid' : ''; ?>" type="file" id="cover" name="cover" onchange="showPreview(event);">
                                <div id="title" class="invalid-feedback">
                                    <?= $validation->getError('cover'); ?>
                                </div>
                            </div>
                            <div class="preview mb-3" style="border: 1px solid; padding: 5px;">
                                <img id="coverPreview" src="<?= base_url('/img/poster.jpg'); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="vid" class="form-label">Video Link Youtube</label>
                                <input type="text" class="form-control" name="link">
                            </div>
                            <div class="my-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>


<?= $this->section('js'); ?>
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<!-- Summernote -->
<script src="<?= base_url('plugins/summernote/summernote-bs4.min.js'); ?>"></script>

<script>
    $(function() {
        // Summernote
        $("#summernote").summernote();
    });

    $(function() {
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd",
            beforeShow: function() {
                setTimeout(function() {
                    $('.ui-datepicker').css('z-index', 99999999999999);
                }, 0);
            }
        });
    });

    var map = L.map('map').setView([-5.086712636464035, 105.52000233838875], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker(new L.LatLng(-5.086712636464035, 105.52000233838875), {
        draggable: true
    }).addTo(map);

    marker.on('dragend', function(e) {
        $('input[name="latitude"]').val(marker.getLatLng().lat);
        $('input[name="longtitude"]').val(marker.getLatLng().lng);
    });

    function showPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("coverPreview");
            preview.src = src;
        }
    }

    $.getJSON("https://ibnux.github.io/data-indonesia/kecamatan/1801.json", function(data) {
        var items = [];
        var kecamatan = $('#kecamatan');
        $.each(data, function(key, val) {
            // items.push("<li id='" + key + "'>" + val + "</li>");
            console.log(val);
            kecamatan.append('<option value="' + val.nama + '">' + val.nama + '</option>')
        });

        // $("<ul/>", {
        //     "class": "my-new-list",
        //     html: items.join("")
        // }).appendTo("body");
    });
</script>

<?= $this->endSection(); ?>