<?= $this->extend('layout/master'); ?>

<?= $this->section('style'); ?>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="">
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
                <h3 class="card-title">Tentang Aplikasi</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-dark">
                        <i class="fas fa-rotate"></i>
                        <p class="d-inline">
                            Refresh
                        </p>
                    </button>
                    <a href="/admin/tentang/add" class="btn btn-dark">
                        <i class="fas fa-plus"></i>
                        <p class="d-inline">
                            Add New
                        </p>
                    </a>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="table table-striped display" style="width:100%">
                    <thead>
                        <tr>
                            <th>

                            </th>
                            <th>Actions</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date Publish</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>

                            </td>
                            <td>Trident</td>
                            <td>Internet
                                Explorer 5.0
                            </td>
                            <td>Win 95+</td>
                            <td>5</td>
                            <td>C</td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>Trident</td>
                            <td>Internet
                                Explorer 5.0
                            </td>
                            <td>Win 95+</td>
                            <td>5</td>
                            <td>C</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>


<?= $this->section('js'); ?>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<script>
    $(document).ready(function() {

        var linkDatatable = "<?= base_url("admin/tentang/listdata") ?>";
        var table = $("#example").DataTable({
            // processing: true,
            // serverSide: true,
            ajax: linkDatatable,
            columnDefs: [{
                targets: 0,
                checkboxes: {
                    selectRow: true,
                },
            }, ],
            select: {
                style: "multi",
            },
            order: [],
            // order: [[1, "asc"]],
        });
    });
</script>

<?= $this->endSection(); ?>