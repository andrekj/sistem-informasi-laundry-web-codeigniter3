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
                 <a href="<?= base_url('owner/rolemenu'); ?>" class="btn btn-primary mb-3">❮ Kembali</a>
                 <a>
                     <h5>Role : <?= $role['role']; ?></h5>
                 </a>
                 <div class="clearfix"></div>
             </div>
             <div class="x_content">

                 <table class="table table-bordered">
                     <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Menu</th>
                             <th scope="col">Access</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($menu as $m) : ?>
                             <tr>
                                 <th scope="row"><?= $i; ?></th>
                                 <td><?= $m['menu']; ?> </td>
                                 <td>
                                     <div class="form-check">
                                         <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu=" <?= $m['id']; ?>">
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
 </div>