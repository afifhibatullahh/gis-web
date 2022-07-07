<?= $this->extend('layout/master'); ?>

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
                    <button href="/admin/tentang/add" class="btn btn-dark d-inline" type="submit" form="form">
                        <p class="d-inline">
                            Save
                        </p>
                        <i class="fas fa-save"></i>
                    </button>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <textarea id="summernote">
                        </textarea>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">@example.com</span>
                        </div>
                        <label>Status</label>
                        <div>
                            <div class="form-check d-inline">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Default radio
                                </label>
                            </div>
                            <div class="form-check d-inline">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                    Second default radio
                                </label>
                            </div>
                        </div>
                        <div class="my-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>