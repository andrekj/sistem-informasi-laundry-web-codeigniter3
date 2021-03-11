<!-- page content -->
<div class="right_col" role="main">
    <h1 align="center" class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

    <?= $this->session->flashdata('message'); ?>


    <div class="x_panel">
        <div class="card" style="width: 200rem;">
            <div class="card-body">
                <?php foreach ($query->result() as $b) { ?>

                    <h2 class="card-title">Username &nbsp: <?php echo $b->id_user; ?></h2>
                    <h2 class="card-title">Paket &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $b->id_paket; ?></h2>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="x_panel">
            <div class="x_title">
                <a href="<?= base_url('admin/pesanan') ?>" class="btn btn-primary mb-3" data-toggle="modal">
                    ❮ Kembali</a>
                <div class="clearfix">
                </div>
            </div>
            <div class="x_content">
                <form action="<?= base_url('admin/save_proses'); ?>" method="post" class="form-horizontal form-label-left input_mask">

                <?php foreach ($query->result() as $b) { ?>
                        <input type="hidden" value="<?php echo $b->id_pesanan; ?>" name="id_pesanan">
                        <?php } ?>

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">No Nota
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="no_nota" value="<?php echo $invoice; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Member
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="username" value="-">Belum Member</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class=" form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Lengkap
                            </label>
                            <div class="col-sm-5">
                                <input type="text" id="nama" name="nama" required="required" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class=" form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Telepon
                            </label>
                            <div class="col-sm-5">
                                <input type="text" id="telepon" name="telepon" required="required" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_selesai">Tanggal Selesai
                            </label>
                            <div class="col-sm-5">
                                <input type='date' class="form-control" name="tgl_selesai">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                    </div>

                    <hr>

                    <div class="table-responsive">
                        <table class="table table-condensed table-transaction">
                            <thead>
                                <tr>
                                    <th width="150px">Produk</th>
                                    <th width="80px">Harga per kg</th>
                                    <th width="200px">Jenis Produk</th>
                                    <th width="100px">Harga Satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select name="id_paket" id="id_paket" class="form-control">
                                            <option value="">Pilih Paket</option>
                                            <?php foreach ($paket as $m) : ?>
                                                <option value="<?= $m['id_paket']; ?>"> <?= $m['nama_paket']; ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <select hidden class="hidden" name="sub_id" id="sub_id">
                                            <option></option>
                                        </select>
                                    </td>

                                    <td class="sub_harga"><select class="form-control" name="sub_harga" id="sub_harga">
                                            <option></option>
                                        </select></td>
                                    <td><select name="id_jnsbrg" id="id_jnsbrg" class="form-control">
                                            <option value="13">Jenis Barang Satuan</option>
                                            <?php foreach ($jenis as $m) : ?>
                                                <option value="<?= $m['id_jnsbrg']; ?>"><?= $m['nama_barang']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <select hidden class="hidden" name="sub_id_jenis" id="sub_id_jenis">
                                        </select>
                                    </td>

                                    <td class="sub_harga_jenis"><select class="form-control" id="sub_harga_jenis" name="sub_harga_jenis" required>
                                            <option>0</option>
                                        </select></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div align="right" class="box-price">
                        <table class="table-info">
                            <tbody>
                                <tr>
                                    <td width="150px">Berat kg</td>
                                    <td colspan="3"><span class="Kg">
                                            <input type="text" name="Kg" size="2" class="form-control">
                                        </span></td>
                                </tr>
                                <tr>
                                    <td>Total Pembayaran</td>
                                    <td width="120px">
                                        <div class="input-group">
                                            <input type="text" readonly id="total" name="total" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr>


                    <div class="form-group">
                        <label class="control-label col-sm-2">Pembayaran</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="pay" name="pembayaran">
                                <option value="BELUM DIBAYAR">BELUM DIBAYAR</option>
                                <option value="DIBAYAR">DIBAYAR</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Status</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="transaction_group_status" name="status">
                                <option value="BARU">BARU</option>
                                <option value="PROSES">PROSES</option>
                                <option value="SELESAI">SELESAI</option>
                                <option value="DIAMBIL">DIAMBIL</option>
                            </select>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>