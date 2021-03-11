 <!-- page content -->
 <div class="right_col" role="main">
     <h1 align="center" class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <div class="judul" data-judul="<?= $title; ?>"></div>
     <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
     <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

     <!-- <?= $this->session->flashdata('message'); ?> -->

     <div class="col-md">
         <div class="x_panel">
             <div class="x_title">
                 <a href="<?= base_url('admin/transaksibaru') ?>" class="btn btn-primary mb-3" data-toggle="modal">Transaksi Baru</a>
                 <div class="clearfix"></div>
             </div>
             <div class="x_content">
                 <table id="datatable" class="table table-striped table-bordered">
                     <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Invoice</th>
                             <th scope="col">Status</th>
                             <th scope="col">Nama</th>
                             <th scope="col">Paket</th>
                             <th scope="col">Jenis Barang</th>
                             <th scope="col">Selesai</th>
                             <th scope="col">Pmbyrn</th>
                             <th scope="col">Total</th>
                             <th scope="col">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($transaksi as $p) : ?>
                             <tr>
                                 <th scope="row"><?= $i; ?></th>
                                 <td><?php echo $p->no_nota; ?> </td>
                                 <td><?php
                                            if ($p->status == 'BARU') {
                                                echo '<label class="label label-primary">Baru</label>';
                                            } else if ($p->status == 'PROSES') {
                                                echo '<label class="label label-info">Proses</label>';
                                            } else if ($p->status == 'SELESAI') {
                                                echo '<label class="label label-warning">Selesai</label>';
                                            } else if ($p->status == 'DIAMBIL') {
                                                echo '<label class="label label-success">Diambil</label>';
                                            }
                                            ?></td>
                                 <td><?php echo $p->nama; ?> </td>
                                 <td><?php echo $p->id_paket; ?> </td>
                                 <td><?php echo $p->id_jnsbrg; ?> </td>
                                 <td><?php echo $p->tgl_selesai; ?> </td>
                                 <td><?php
                                            if ($p->pembayaran == 'DIBAYAR') {
                                                echo '<label class="label label-success">Dibayar</label>';
                                            } else if ($p->pembayaran == 'BELUM DIBAYAR') {
                                                echo '<label class="label label-danger">Belum dibayar</label>';
                                            }
                                            ?>
                                 </td>
                                 <td><?php echo 'Rp ' . number_format($p->total); ?> </td>

                                 <td>
                                     <div class="txt-center">
                                         <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#proses<?php echo $p->id_transaksi; ?>"><span class="glyphicon glyphicon-list-alt"></span> Proses</a>
                                         <a data-toggle="modal" data-target="#detail<?php echo $p->id_transaksi; ?>" class="btn btn-info btn-xs" data-placement="top"><span class="glyphicon glyphicon-search"></span> Detail</i></a>
                                         <a href="<?php echo base_url('admin/selesai/' . $p->id_transaksi); ?>" class="btn btn-primary btn-xs tombol-selesai" data-placement="top"><span class="glyphicon glyphicon-ok"> Selesai</i></a>
                                     </div>
                                 </td>
                             </tr>
                             <?php $i++; ?>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

     <!-- MODAL PROSES -->
     <?php $i = 1;
        foreach ($transaksii as $p) : $i++; ?>
         <div class="row">
             <div class="modal fade bd-example-modal-sm" id="proses<?= $p['id_transaksi']; ?>" role="dialog">
                 <div class="modal-dialog modal-sm">
                     <form action="<?= base_url('admin/statustransaksi'); ?>" method="post">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title">Status</h5>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                             </div>
                             <div class="modal-body">

                                 <input type="hidden" value="<?= $p['id_transaksi']; ?>" name="id_transaksi">
                                 <div class="form-group">
                                     <label class="col-sm-3 control-label">Status</label>

                                     <div class="col-sm-8">
                                         <select class="form-control" id="" name="status">
                                             <option selected> <?= $p['status']; ?></option>
                                             <option value="BARU"> BARU</option>
                                             <option value="PROSES"> PROSES</option>
                                             <option value="SELESAI"> SELESAI</option>
                                         </select>
                                     </div>
                                 </div><br><br><br>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                     <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Update</button>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     <?php endforeach; ?>

     <?php $i = 1; ?>
     <?php foreach ($transaksi as $p) : ?>
         <div class="row">
             <div class="modal fade fade bd-example-modal-lg" id="detail<?php echo $p->id_transaksi; ?>" role="dialog">
                 <div class="modal-dialog modal-lg">
                     <form action="<?= base_url('admin/statustransaksi'); ?>" method="post">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title">Status</h5>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                             </div>
                             <div class="modal-body">

                                 <title>Invoice</title>
                                 <style type="text/css">
                                     .table-product td {
                                         padding: 4px;
                                     }

                                     .table-price input {
                                         width: 130px;
                                     }

                                     .table-price td {
                                         text-align: right;
                                         padding: 4px;
                                     }
                                 </style>


                                 <div>
                                     <div>
                                         <table width="100%">
                                             <tbody>
                                                 <tr>
                                                     <td width="20px"><img height="60px" src="<?= base_url('assets/img/59523.jpg') ?>"></td>
                                                     <td>
                                                         <div style="padding-left:10px;font-size:14px;font-weight:bold;">
                                                             Bunga Laundry<br>
                                                             Sleman<br>
                                                             www.bunga-laundry.com<br>
                                                         </div>
                                                     </td>
                                                     <td align="right" style="font-size:25px;font-weight:bold;color:#00b6ff;;"><u>INVOICE</u></td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </div>

                                     <div style="margin-top: 20px">
                                         <table width="100%">
                                             <tbody>
                                                 <tr>
                                                     <td width="10px">Pelanggan</td>
                                                     <td width="5px;">&nbsp;:&nbsp;</td>
                                                     <td><?php echo $p->nama; ?></td>
                                                     <td width="140px">Kode Invoice</td>
                                                     <td width="5px">&nbsp;:&nbsp;</td>
                                                     <td width="140px;" class="transaction-group-code"><?php echo $p->no_nota; ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td colspan="2"></td>
                                                     <td><?php echo $p->username; ?></td>
                                                     <td>Tanggal Invoice</td>
                                                     <td>&nbsp;:&nbsp;</td>
                                                     <td><?php echo date('d-m-Y', $p->tanggal); ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td colspan="2"></td>
                                                     <td><?php echo $p->telepon; ?></td>
                                                     <td>Tanggal Selesai</td>
                                                     <td>&nbsp;:&nbsp;</td>
                                                     <td><?php echo $p->tgl_selesai; ?></td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </div>

                                     <div style="margin-top:20px;overflow-x:auto;">
                                         <table width="100%" class="table-product" cellpadding="5" cellspacing="0" border="1">
                                             <tbody>
                                                 <tr>
                                                     <th class="text-center">Paket</th>
                                                     <th class="text-center">Harga</th>
                                                     <th class="text-center">Berat</th>
                                                     <th class="text-center">Jenis Barang</th>
                                                     <th class="text-center">Harga</th>
                                                     <th class="text-center">Total</th>
                                                 </tr>
                                                 <tr>
                                                     <td align="center"><?php echo $p->id_paket; ?></td>
                                                     <td align="center"><?php echo 'Rp ' . number_format($p->sub_harga); ?></td>
                                                     <td align="center"><?php echo $p->Kg; ?></td>
                                                     <td align="center"><?php echo $p->id_jnsbrg; ?></td>
                                                     <td align="center"><?php echo 'Rp ' . number_format($p->sub_harga_jenis); ?></td>
                                                     <td align="center"><?php echo 'Rp ' . number_format($p->total); ?></td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </div>

                                     <div style="margin-top:20px">
                                         <table width="100%">
                                             <tbody>
                                                 <tr>
                                                     <td style="vertical-align:top;">
                                                         <table cellpadding="4" cellspacing="0" class="table-description" style="border-collapse: collapse" border="0">
                                                             <tbody>
                                                                 <tr>
                                                                     <th></th>
                                                                     <th></th>
                                                                     <th></th>
                                                                 </tr>
                                                                 <tr>
                                                                     <td colspan="2" align="right"></td>
                                                                     <td align="center"></td>
                                                                 </tr>
                                                             </tbody>
                                                         </table>
                                                         <br>
                                                         <p style="font-style:italic"></p>
                                                     </td>
                                                     <td align="right" style="vertical-align:top;">
                                                         <table class="table-price">
                                                             <tbody>
                                                                 <tr>
                                                                     <h1>
                                                                         <td width="150px" style="font-size: 25px;">Total : </td>
                                                                         <td style="font-size: 25px;"><?php echo 'Rp ' . number_format($p->total); ?></td>
                                                                     </h1>
                                                             </tbody>
                                                         </table>
                                                     </td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </div>

                                     <div style="margin-top:10px">
                                         <table width="100%">
                                             <tbody>
                                                 <tr>
                                                     <td valign="top">
                                                         <table>
                                                             <tbody>
                                                                 <tr>
                                                                     <td>Status</td>
                                                                     <td>&nbsp;:&nbsp;</td>
                                                                     <td><?php echo $p->status; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                     <td>Dibayar</td>
                                                                     <td>&nbsp;:&nbsp;</td>
                                                                     <td><?php echo $p->pembayaran; ?></td>
                                                                 </tr>
                                                             </tbody>
                                                         </table>
                                                     </td>
                                                     <td align="center" width="50%">
                                                         Hormat Kami <br><br><br><br>
                                                         <b>
                                                             Bunga Laundry </b>
                                                     </td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>

                             </div>
                             <br><br>
                             <div class="modal-footer">
                                 <a href="<?php echo base_url('admin/invoice/' . $p->id_transaksi); ?>" target="_blank" class="btn btn-primary" data-placement="top"><span class="glyphicon glyphicon-print"> Kecil</i></a>
                                 <a href="<?php echo base_url('admin/invoice_b/' . $p->id_transaksi); ?>" target="_blank" class="btn btn-primary" data-placement="top"><span class="glyphicon glyphicon-print"> Standart</i></a>
                             </div>
                         </div>
                 </div>
             </div>
         </div>
         </form>
 </div>
 <?php endforeach; ?>

 </div>