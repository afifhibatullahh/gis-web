<?= $this->extend('layout/master'); ?>

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
                        <li class="breadcrumb-item active">Map Setting</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Map Setting</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-dark">
                        <i class="fas fa-rotate"></i>
                        <p class="d-inline">
                            Refresh
                        </p>
                    </button>
                    <a href="/admin/maps/add" class="btn btn-dark">
                        <i class="fas fa-plus"></i>
                        <p class="d-inline">
                            Add New
                        </p>
                    </a>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="map" class="table table-striped display" style="width:100%">
                    <thead>
                        <tr>
                            <th>

                            </th>
                            <th>Actions</th>
                            <th>Title</th>
                            <th>Categtory</th>
                            <th>Author</th>
                            <th>Date Publish</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach ($map as $map) : ?>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td><?= $map['title']; ?></td>
                                <td><?= $category[$i++]; ?></td>
                                <td><?= $map['author']; ?></td>
                                <td><?= $map['date_publish']; ?></td>
                                <td><?= $map['status']; ?></td>
                            </tr>

                        <?php endforeach ?>
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
<script>
    $(document).ready(function() {
        var table = $("#map").DataTable({
            columnDefs: [{
                targets: 0,
                checkboxes: {
                    selectRow: true,
                },
            }, ],
            select: {
                style: "multi",
            },
            order: [
                [1, "asc"]
            ],
        });
    });
</script>
<?= $this->endSection() ?>