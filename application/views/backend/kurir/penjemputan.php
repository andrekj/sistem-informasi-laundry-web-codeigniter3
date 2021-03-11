 <!-- page content -->
 <div class="right_col" role="main">
     <h1 align="center" class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
     <div class="judul" data-judul="<?= $title; ?>"></div>
     <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

     <div class="col-md">
         <div class="x_panel">
             <div class="x_content">

                 <table id="datatable" class="table table-striped table-bordered">
                     <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Tgl masuk</th>
                             <th scope="col">Member</th>
                             <th scope="col">Alamat</th>
                             <th scope="col">Telepon</th>
                             <th scope="col">Paket</th>
                             <th scope="col">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($penjemputan as $p) : ?>
                             <tr>
                                 <th scope="row"><?= $i; ?></th>
                                 <td><?php echo $p->tgl_masuk; ?> </td>
                                 <td><?php echo $p->id_user; ?> </td>
                                 <td><?php echo $p->alamat; ?> </td>
                                 <td><?php echo $p->telepon; ?> </td>
                                 <td><?php echo $p->id_paket; ?> </td>
                                 <td>
                                     <a href="<?php echo base_url('kurir/selesai_penjemputan/' . $p->id_pesanan); ?>" class="btn btn-success btn-xs tombol-selesai"><span class="glyphicon glyphicon-pencil"></span> Telah Dijemput</a>
                                 </td>
                             </tr>
                             <?php $i++; ?>
                         <?php endforeach; ?>
                     </tbody>
                 </table>

             </div>
         </div>
     </div>
 </div>