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
                 <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newJenisBarangModal">Tambahkan Jenis Barang</a>
                 <div class="clearfix"></div>
             </div>
             <div class="x_content">

                 <table id="datatable" class="table table-striped table-bordered">
                     <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Nama Barang</th>
                             <th scope="col">Harga</th>
                             <th scope="col">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($jenis as $j) : ?>
                             <tr>
                                 <th scope="row"><?= $i; ?></th>
                                 <td><?= $j['nama_barang']; ?> </td>
                                 <td><?= $j['harga']; ?> </td>
                                 <td>
                                 <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit<?= $j['id_jnsbrg']; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
								 <a href="<?= base_url('owner/hapusjenis/' . $j['id_jnsbrg']); ?>" data-placement="top" class="btn btn-danger btn-xs tombol-hapus"><span class="glyphicon glyphicon-remove"></span> Hapus</a>
                                 </td>
                             </tr>
                             <?php $i++; ?>
                         <?php endforeach; ?>
                     </tbody>
                 </table>

             </div>
         </div>
     </div>

     <div class="modal fade" id="newJenisBarangModal" tabindex="-1" role="dialog" aria-labelledby="newJenisBarangModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="newJenisBarangModalLabel">Tambah Jenis Barang Baru</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <form action="<?= base_url('owner/jenis'); ?>" method="post">
                     <div class="modal-body">
                         <div class="form-group">
                             <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama barang">
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
        foreach ($jenis as $p) : $i++; ?>
         <div class="row">
             <div class="modal fade" id="edit<?= $p['id_jnsbrg']; ?>" role="dialog">
                 <div class="modal-dialog">
                     <form action="<?= base_url('owner/editjenis'); ?>" method="post">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title">Edit jenis barang</h5>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                             </div>
                             <div class="modal-body">

                                 <input type="hidden" value="<?= $p['id_jnsbrg']; ?>" name="id_jnsbrg">
                                 <div class="form-group row">
                                     <b><label class='col'>Nama barang</label></b><br>
                                     <input type="text" name="nama_barang" autocomplete="off" value="<?= $p['nama_barang']; ?>" required placeholder="Masukkan Nama barang" class="form-control"></div>
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