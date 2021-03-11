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
                 <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPaketModal">Tambahkan Paket Baru</a>
                 <div class="clearfix"></div>
             </div>
             <div class="x_content">

                 <table id="datatable" class="table table-striped table-bordered">
                     <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Nama paket</th>
                             <th scope="col">Harga</th>
                             <th scope="col">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($paket as $p) : ?>
                             <tr>
                                 <th scope="row"><?= $i; ?></th>
                                 <td><?= $p['nama_paket']; ?> </td>
                                 <td><?= $p['harga']; ?> </td>
                                 <td>
                                 <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit<?= $p['id_paket']; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                 <a href="<?= base_url('owner/hapuspaket/' . $p['id_paket']); ?>" data-placement="top" class="btn btn-danger btn-xs tombol-hapus"><span class="glyphicon glyphicon-remove"></span> Hapus</a>
                                 </td>
                             </tr>
                             <?php $i++; ?>
                         <?php endforeach; ?>
                     </tbody>
                 </table>

             </div>
         </div>


         <div class="modal fade" id="newPaketModal" tabindex="-1" role="dialog" aria-labelledby="newPaketModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="newPaketModalLabel">Tambah Paket Baru</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <form action="<?= base_url('owner/paket'); ?>" method="post">
                         <div class="modal-body">
                             <div class="form-group">
                                 <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Nama Paket">
                             </div>
                             <div>
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

     <?php $i = 1;
        foreach ($paket as $p) : $i++; ?>
         <div class="row">
             <div class="modal fade" id="edit<?= $p['id_paket']; ?>" role="dialog">
                 <div class="modal-dialog">
                     <form action="<?= base_url('owner/editpaket'); ?>" method="post">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title">Edit paket</h5>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                             </div>
                             <div class="modal-body">

                                 <input type="hidden" value="<?= $p['id_paket']; ?>" name="id_paket">
                                 <div class="form-group row">
                                     <b><label class='col'>Nama paket</label></b><br>
                                     <input type="text" name="nama_paket" autocomplete="off" value="<?= $p['nama_paket']; ?>" required placeholder="Masukkan Nama paket" class="form-control"></div>
                                 <div class="form-group row">
                                     <b><label class='col'>Harga</label></b><br>
                                     <input type="text" name="harga" autocomplete="off" value="<?= $p['harga']; ?>" required placeholder="Masukkan harga" class="form-control"></div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                     <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     <?php endforeach; ?>
 </div>