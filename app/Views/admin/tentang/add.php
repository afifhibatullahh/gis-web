<?= $this->extend('layout/master'); ?>

<?= $this->section('style'); ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="/admin/tentang">
                        <i class="fa-solid fa-arrow-left"></i>
                        <h6 class="d-inline">Back</h6>
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tentang Aplikasi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Tentang</h3>
                <div class="card-tools">
                    <a href="/admin/tentang" class="btn btn-dark">
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
                <form action="/admin/tentang/save" method="post" id="form">
                    <input type="hidden" name="author" value='1'>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Title" name="title">
                            </div>
                            <textarea id="summernote" name="content">
                            </textarea>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="<?= date('Y-m-d'); ?>" id="datepicker">
                                <span class="input-group-text" id="basic-addon2">as</span>
                            </div>
                            <label>Status</label>
                            <div>
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

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>

<script>
    $(function() {
        // Summernote
        $("#summernote").summernote();
    });

    $(function() {
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd",
        });
    });
</script>

<?= $this->endSection(); ?>