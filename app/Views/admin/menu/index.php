<?= $this->extend('layout/master'); ?>

<?= $this->section('style'); ?>

<style>
    /**
 * Nestable
 */

    .dd {
        position: relative;
        display: block;
        margin: 0;
        padding: 0;
        list-style: none;
        font-size: 13px;
        line-height: 20px;
    }

    .dd-list {
        display: block;
        position: relative;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .dd-list .dd-list {
        padding-left: 30px;
    }

    .dd-collapsed .dd-list {
        display: none;
    }

    .dd-item,
    .dd-empty,
    .dd-placeholder {
        display: block;
        position: relative;
        margin: 0;
        padding: 0;
        min-height: 20px;
        font-size: 13px;
        line-height: 20px;
    }

    .dd-handle {
        display: block;
        height: 30px;
        margin: 5px 0;
        padding: 5px 10px;
        color: #333;
        text-decoration: none;
        font-weight: bold;
        border: 1px solid #ccc;
        background: #fafafa;
        background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: linear-gradient(top, #fafafa 0%, #eee 100%);
        -webkit-border-radius: 3px;
        border-radius: 3px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .dd-handle:hover {
        color: #2ea8e5;
        background: #fff;
    }

    .dd-item>button {
        display: block;
        position: relative;
        cursor: pointer;
        float: left;
        width: 25px;
        height: 20px;
        margin: 5px 0;
        padding: 0;
        text-indent: 100%;
        white-space: nowrap;
        overflow: hidden;
        border: 0;
        background: transparent;
        font-size: 12px;
        line-height: 1;
        text-align: center;
        font-weight: bold;
    }

    .dd-item>button:before {
        content: '+';
        display: block;
        position: absolute;
        width: 100%;
        text-align: center;
        text-indent: 0;
    }

    .dd-item>button[data-action="collapse"]:before {
        content: '-';
    }

    .dd-placeholder,
    .dd-empty {
        margin: 5px 0;
        padding: 0;
        min-height: 30px;
        background: #f2fbff;
        border: 1px dashed #b6bcbf;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .dd-empty {
        border: 1px dashed #bbb;
        min-height: 100px;
        background-color: #e5e5e5;
        background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-image: -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-image: linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-size: 60px 60px;
        background-position: 0 0, 30px 30px;
    }

    .dd-dragel {
        position: absolute;
        pointer-events: none;
        z-index: 9999;
    }

    .dd-dragel>.dd-item .dd-handle {
        margin-top: 0;
    }

    .dd-dragel .dd-handle {
        -webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
        box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
    }

    /**
 * Nestable Extras
 */

    .nestable-lists {
        display: block;
        clear: both;
        padding: 30px 0;
        width: 100%;
        border: 0;
        border-top: 2px solid #ddd;
        border-bottom: 2px solid #ddd;
    }

    #nestable-menu {
        padding: 0;
        margin: 20px 0;
    }

    #nestable-output,
    #nestable2-output {
        width: 100%;
        height: 7em;
        font-size: 0.75em;
        line-height: 1.333333em;
        font-family: Consolas, monospace;
        padding: 5px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    #nestable2 .dd-handle {
        color: #fff;
        border: 1px solid #999;
        background: #bbb;
        background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
        background: -moz-linear-gradient(top, #bbb 0%, #999 100%);
        background: linear-gradient(top, #bbb 0%, #999 100%);
    }

    #nestable2 .dd-handle:hover {
        background: #bbb;
    }

    #nestable2 .dd-item>button:before {
        color: #fff;
    }

    @media only screen and (min-width: 700px) {

        .dd {
            float: left;
            width: 100%;
        }

        .dd+.dd {
            margin-left: 2%;
        }

    }

    .dd-hover>.dd-handle {
        background: #2ea8e5 !important;
    }

    /**
 * Nestable Draggable Handles
 */

    .dd3-content {
        display: block;
        height: 30px;
        margin: 5px 0;
        padding: 5px 10px 5px 40px;
        color: #333;
        text-decoration: none;
        font-weight: bold;
        border: 1px solid #ccc;
        background: #fafafa;
        background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: linear-gradient(top, #fafafa 0%, #eee 100%);
        -webkit-border-radius: 3px;
        border-radius: 3px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .dd3-content:hover {
        color: #2ea8e5;
        background: #fff;
    }

    .dd-dragel>.dd3-item>.dd3-content {
        margin: 0;
    }

    .dd3-item>button {
        margin-left: 30px;
    }

    .dd3-handle {
        position: absolute;
        margin: 0;
        left: 0;
        top: 0;
        cursor: pointer;
        width: 30px;
        text-indent: 100%;
        white-space: nowrap;
        overflow: hidden;
        border: 1px solid #aaa;
        background: #ddd;
        background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
        background: -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
        background: linear-gradient(top, #ddd 0%, #bbb 100%);
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .dd3-handle:before {
        content: '≡';
        display: block;
        position: absolute;
        left: 0;
        top: 3px;
        width: 100%;
        text-align: center;
        text-indent: 0;
        color: #fff;
        font-size: 20px;
        font-weight: normal;
    }

    .dd3-handle:hover {
        background: #ddd;
    }

    /**
 * Socialite
 */

    .socialite {
        display: block;
        float: left;
        height: 35px;
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
                    <a href="/admin/tentang">
                        <i class="fa-solid fa-arrow-left"></i>
                        <h6 class="d-inline">Back</h6>
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Menu Setting</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Struktur</h3>
                        <div class="card-tools">

                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="/admin/menu/save" method="post" id="form">
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="menu" id="menu">
                                    <div class="dd" id="nestable">
                                        <ol class="dd-list">
                                            <?php foreach ($menu as $data) : ?>
                                                <li class="dd-item" data-id="<?= $data['menu_id']; ?>">
                                                    <div class="dd-handle">
                                                        <?= $data['title']; ?>
                                                    </div>
                                                    <div class="dd3-actions position-absolute" style="right: 0; top: 0;">
                                                        <div class="btn-group">
                                                            <a href="/admin/menu/edit/<?= $data['menu_id']; ?>" class="btn btn-light btn-sm" type="submit">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </a>
                                                            <form action="/admin/menu/delete/<?= $data['menu_id']; ?>" method="POST">
                                                                <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                                                <button class="btn btn-light btn-sm" type="submit">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach ?>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary d-inline float-right mt-3" id="btnMenu" disabled type="submit" form="form">
                                <p class="d-inline">
                                    Save
                                </p>
                                <i class="fas fa-save"></i>
                            </button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Menu Add</h3>
                        <div class="card-tools">

                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="/admin/menu/save" method="post" id="form">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Title" name="title">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Link" name="url">
                            </div>
                            <label>Status</label>
                            <div>
                                <div class="form-check d-inline">
                                    <input class="form-check-input" type="radio" name="target" id="self" value="_self" checked>
                                    <label class="form-check-label" for="self">
                                        Self
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input class="form-check-input" type="radio" name="target" id="blank" value="_blank">
                                    <label class="form-check-label" for="blank">
                                        Blank
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary d-inline float-right" type="submit">
                                <p class="d-inline">
                                    Save
                                </p>
                                <i class="fas fa-save"></i>
                            </button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>


<?= $this->section('js'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?= base_url('jquery.nestable.js'); ?>"></script>

<script>
    $(document).ready(function() {
        var i = false;
        var updateOutput = function(e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {

                var data = window.JSON.stringify(list.nestable('serialize'));
                output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
                $('#menu').val(data);
                if (i) {
                    $("#btnMenu").removeAttr('disabled');
                }
                i = true;
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };
        // var updateOutput = function(e) {
        //     var data = list.nestable('serialize');
        //     console.log(data);
        // }

        // activate Nestable for list 1
        $('#nestable').nestable()
            .on('change', updateOutput);

        // output initial serialised data
        updateOutput($('#nestable').data('output', $('#nestable-output')));


    });
</script>

<?= $this->endSection(); ?>