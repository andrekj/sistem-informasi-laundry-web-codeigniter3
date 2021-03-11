<br><br>
<h1 align="center" class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="container">
    <div class="panel panel-primary" style="width:1000px;margin:0px auto">

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No_nota</th>
                            <th scope="col">Member</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Paket</th>
                            <th scope="col">Jenis Barang</th>
                            <th scope="col">Selesai</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($customer as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?php echo $p->no_nota; ?> </td>
                                <td><?php echo $p->username; ?> </td>
                                <td><?php echo $p->nama; ?> </td>
                                <td><?php echo $p->id_paket; ?> </td>
                                <td><?php echo $p->id_jnsbrg; ?> </td>
                                <td><?php echo $p->tgl_selesai; ?> </td>
                                <td><?php echo $p->total; ?> </td>
                                <td><?php echo $p->status; ?> </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>