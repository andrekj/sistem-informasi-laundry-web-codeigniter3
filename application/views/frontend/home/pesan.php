    <br><br>
    <h1 align="center" class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="container">
        <div class="panel panel-primary" style="width:750px;margin:0px auto">

            <div class="panel-body">

                <form action="<?= base_url('home/pesan'); ?>" method="post">
                    <!-- <form data-toggle="validator" role="form"> -->

                    <div class="form-group">
                        <label class="control-label" for="tgl_msk">Tanggal Masuk</label>
                        <input type='date' readonly name="tgl_masuk" value="<?php echo date('Y-m-d'); ?>" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="inputName">Username</label>
                        <input class="form-control" id="inputName" type="text" value="<?= $user['username']; ?>" readonly>
                        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="inputName">Nama</label>
                        <input class="form-control" id="inputName" type="text" value="<?= $user['nama']; ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="alamat">Alamat Penjemputan & Pengantaran
                        </label>
                        <select name="alamat" id="alamat" class="form-control">
                            <option value="">Pilih Alamat</option>
                            <option value="<?= $user['alamat']; ?>"><?= $user['alamat']; ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="inputName">Telepon</label>
                        <input class="form-control" id="inputName" type="text" name="telepon" value="<?= $user['telepon']; ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="id_paket">Paket
                        </label>
                        <select name="id_paket" id="id_paket" class="form-control">
                            <option value="">Pilih Paket</option>
                            <?php foreach ($paket as $m) : ?>
                                <option value="<?= $m['id_paket']; ?>"> <?= $m['nama_paket']; ?> <?= $m['harga']; ?>/kg </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br><br><br>