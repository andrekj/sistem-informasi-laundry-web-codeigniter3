<div class="right_col" role="main">
    <h1 align="center" class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="judul" data-judul="<?= $title; ?>"></div>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

    <!-- <?= $this->session->flashdata('message'); ?> -->

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <a><?= $title; ?></a>
                    <div class="clearfix"></div>
                </div>


                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-1">Tanggal</label>
                        <div class="col-sm-4">
                            <table>
                                <tr>
                                    <td>
                                        <div class="input-group az-datetime">
                                            <input type="text" class="form-control" id="single_cal4" name="start_date">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </td>
                                    <td>&nbsp;s/d&nbsp;</td>
                                    <td>
                                        <div class="input-group az-datetime">
                                            <input type="text" class="form-control" id="single_cal3" name="end_date">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <input type="button" name="search" id="search" value="Search" class="btn btn-info form-control" />
                </form>

            </div>

            <div class="row" align="center">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <h4 class="mb-3">Data</h4>
                        <div class="x_content">
                            <table id="order_data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Transaksi</th>
                                        <th>Pengeluaran</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                    <?php foreach ($data as $data) { ?>
                                        <tr>
                                        <th scope="row"><?= $i; ?></th>
                                            <td><?= $data->tgl_bayar = $data->tgl_pembelian?></td>
                                            <td><?= $data->total ?></td>
                                            <td><?= $data->harga ?></td>
                                            <td></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>