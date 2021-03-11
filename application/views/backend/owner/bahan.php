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
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newBahanModal">Tambahkan Bahan Baru</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama bahan</th>
                                <th scope="col">Tgl pembelian</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($bahan as $b) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $b['nama_bahan']; ?> </td>
                                    <td><?= $b['tgl_pembelian']; ?> </td>
                                    <td><?= $b['jumlah']; ?> </td>
                                    <td><?= $b['harga']; ?> </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="newBahanModal" tabindex="-1" role="dialog" aria-labelledby="newBahanModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newBahanModalLabel">Tambah Bahan Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('owner/bahan'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_bahan" name="nama_bahan" placeholder="Nama bahan">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="tgl_pembelian" name="tgl_pembelian" placeholder="Tgl Pembelian">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>