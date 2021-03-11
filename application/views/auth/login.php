   <body class="my-login-page">
       <section class="h-100">
           <div class="container h-100">
               <div class="row justify-content-md-center h-100">
                   <div class="card-wrapper">
                       <div class="brand">
                           <img src="<?= base_url('assets/img/59523.jpg') ?>" alt="logo">
                       </div>
                       <div class="card fat">
                           <div class="card-body">
                               <h4 class="card-title">Login</h4>
                               <?= $this->session->flashdata('message'); ?>
                               <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                   <div class="form-group">
                                       <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                       <label for="username">Username</label>
                                       <input id="username" type="text" class="form-control" name="username" value="<?= set_value('username'); ?>" required autofocus>
                                   </div>

                                   <div class="form-group">
                                       <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                       <label for="password">Password
                                       </label>
                                       <input id="password" type="password" class="form-control" name="password" required data-eye>
                                   </div>

                                   <div class="form-group">
                                       <div class="custom-checkbox custom-control">
                                           <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                           <label for="remember" class="custom-control-label">Remember Me</label>
                                       </div>
                                   </div>

                                   <div class="form-group m-0">
                                       <button type="submit" class="btn btn-primary btn-block">
                                           Login
                                       </button>
                                   </div>
                                   <div class="mt-4 text-center">
                                       Belum jadi member? <a href="<?= base_url('auth/registrasi') ?>">Buat Sekarang</a>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>