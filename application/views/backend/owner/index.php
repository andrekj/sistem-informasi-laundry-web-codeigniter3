 <!-- page content -->
 <div class="right_col" role="main">
     <!-- top tiles -->
     <div class="row tile_count">
         <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
             <span class="count_top"><i class="fa fa-user"></i> Total Member</span>
             <div align="center" class="count blue"><?php echo $total_user; ?></div>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
             <span class="count_top"><i class="fa fa-exchange"></i> Total Transaksi</span>
             <div align="center" class="count dark"><?php echo $total_transaksi; ?></div>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
             <span class="count_top"><i class="fa fa-file-o"></i> Baru</span>
             <div align="center" class="count green"><?php echo $baru; ?></div>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
             <span class="count_top"><i class="fa fa-refresh"></i> Proses</span>
             <div align="center" class="count red"><?php echo $proses; ?></div>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
             <span class="count_top"><i class="fa fa-check"></i> Selesai</span>
             <div align="center" class="count purple"><?php echo $selesai; ?></div>
         </div>
         <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
             <span class="count_top"><i class="fa fa-check-square"></i> Diambil</span>
             <div align="center" class="count light"><?php echo $diambil; ?></div>
         </div>
     </div>

     <!-- /top tiles -->

     <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
             <div class="x_panel">
                 <center>
                     <h2>Pendapatan Harian</h2>
                 </center>

                 <div class="dashboard_graph">

                     <div id="graph"></div>
                     <script src="<?php echo base_url() . 'assets/js/chart/raphael-min.js' ?>"></script>
                     <script src="<?php echo base_url() . 'assets/js/chart/morris.min.js' ?>"></script>
                     <script>
                         Morris.Line({
                             element: 'graph',
                             data: <?php echo $chart; ?>,
                             xkey: 'tgl_bayar',
                             ykeys: ['total'],
                             labels: ['total']
                         });
                     </script>

                 </div>
             </div>
         </div>


         <div class="col-md">
             <div class="x_panel">
                 <center>
                     <h2>Transaksi</h2>
                 </center>
                 <div class="x_title">
                     <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                     <table id="datatable" class="table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">No_nota</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Nama</th>
                                 <th scope="col">Paket</th>
                                 <th scope="col">Jenis Barang</th>
                                 <th scope="col">Selesai</th>
                                 <th scope="col">Pembayaran</th>
                                 <th scope="col">Total</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $i = 1; ?>
                             <?php foreach ($transaksi as $p) : ?>
                                 <tr>
                                     <th scope="row"><?= $i; ?></th>
                                     <td><?php echo $p->no_nota; ?> </td>
                                     <td><?php echo $p->status; ?></td>
                                     <td><?php echo $p->nama; ?> </td>
                                     <td><?php echo $p->id_paket; ?> </td>
                                     <td><?php echo $p->id_jnsbrg; ?> </td>
                                     <td><?php echo $p->tgl_selesai; ?> </td>
                                     <td><?php echo $p->pembayaran; ?> </td>
                                     <td><?php echo 'Rp ' . number_format($p->total); ?> </td>
                                 </tr>
                                 <?php $i++; ?>
                             <?php endforeach; ?>
                         </tbody>
                     </table>
                     <div id="txt_total_price" style="text-align:right;font-size:20px;">Total: <?php echo 'Rp ' . number_format($total); ?></div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- /page content -->