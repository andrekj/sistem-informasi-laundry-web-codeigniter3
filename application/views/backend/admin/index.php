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
             
             <center><h2>Pendapatan Harian</h2></center>
         
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
     </div>
 <!-- /page content -->