    <link href="<?= base_url('assets/frontend/profile/'); ?>style.css" rel="stylesheet" type="text/css" media="all" />
    <br><br>
    <h1 align="center" class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('error'); ?>
    <?= $this->session->flashdata('sukses'); ?>
    <div class="container">
        <div id="user-profile-2" class="user-profile">
            <div class="tab-content no-border padding-24">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 center">
                        <span class="profile-picture">
                            <img class="card-img" alt=" Avatar" id="avatar2" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                        </span>

                        <div class="space space-4"></div>
                    </div><!-- /.col -->

                    <div class="col-xs-12 col-sm-9">
                        <h4 class="blue">
                            <span class="middle"><?= $user['nama']; ?></span>
                            <a style="float:right" href="" data-toggle="modal" data-target="#newRoleModal" class="btn btn-primary mb-3">Edit Profile</a>
                        </h4>

                        <div class="profile-user-info">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Username </div>

                                <div class="profile-info-value">
                                    <span><?= $user['username']; ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Email </div>

                                <div class="profile-info-value">
                                    <span><?= $user['email']; ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Telepon </div>

                                <div class="profile-info-value">
                                    <span><?= $user['telepon']; ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Location </div>
                                <div class="profile-info-value">
                                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                                    <span><?= $user['alamat']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /#pictures -->
    </div>
    <br><br><br>

    <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRoleModalLabel">Tambah Role Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('home/edit'); ?>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label"> Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
                        </div>
                    </div>

                    <br>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label"> Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                        </div>
                    </div>

                    <br>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label"> Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
                        </div>
                    </div>

                    <br>
                    <div class="form-group row">
                        <label for="telepon" class="col-sm-2 col-form-label"> Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $user['telepon']; ?>">
                        </div>
                    </div>

                    <br>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label"> Alamat</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input name="alamat" type="text" class="form-control" value="<?= $user['alamat']; ?>">
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label"> Gambar</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" value="<?= $user['image']; ?>">
                                        <label class="custom-file-label" for="image">Pilih Gambar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <br><br><br><br><br><br>