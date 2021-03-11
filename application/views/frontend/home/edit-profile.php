<br><br>
<center>
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
</center>
<center>
    <div class="container">
        <?= form_open_multipart('home/edit'); ?>
        <div class="form-group col-md-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
        </div>

        <div class="form-group col-md-4">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
        </div>

        <div class="form-group col-md-3">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
        </div>

        <div class="form-group col-md-3">
            <label for="telepon">Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $user['telepon']; ?>">
        </div>

        <div class="form-group col-md-4">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $user['alamat']; ?>">
        </div>

        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-5">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-8">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="form-row-">
            <div class="form-group col-md-5">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</center>
<br><br>