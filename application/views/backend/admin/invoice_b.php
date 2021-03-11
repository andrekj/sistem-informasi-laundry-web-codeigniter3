<?php $i = 1; ?>
<?php foreach ($transaksi as $p) : ?>
<html>
<head>

    <title>Invoice</title>
    <style type="text/css">
        .table-product td {
            padding: 4px;
        }

        .table-price input {
            width: 130px;
        }

        .table-price td {
            text-align: right;
            padding: 4px;
        }
    </style>
</head>
<body style="font-family:'Helvetica';font-size:12px;" onload="window.print();">

    <div>
        <div>
            <table width="100%">
                <tbody>
                    <tr>
                        <td width="20px"><img height="60px" src="<?= base_url('assets/img/59523.jpg') ?>"></td>
                        <td>
                            <div style="padding-left:10px;font-size:14px;font-weight:bold;">
                                Bunga Laundry<br>
                                Sleman<br>
                                www.bunga-laundry.com<br>
                            </div>
                        </td>
                        <td align="right" style="font-size:25px;font-weight:bold;color:#00b6ff;;"><u>INVOICE</u></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 20px">
            <table width="100%">
                <tbody>
                    <tr>
                        <td width="10px">Pelanggan</td>
                        <td width="5px;">&nbsp;:&nbsp;</td>
                        <td><?php echo $p->nama; ?></td>
                        <td width="140px">Kode Invoice</td>
                        <td width="5px">&nbsp;:&nbsp;</td>
                        <td width="140px;" class="transaction-group-code"><?php echo $p->no_nota; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td><?php echo $p->username; ?></td>
                        <td>Tanggal Invoice</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?php echo date('d-m-Y', $p->tanggal); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td><?php echo $p->telepon; ?></td>
                        <td>Tanggal Selesai</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?php echo $p->tgl_selesai; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top:20px;overflow-x:auto;">
            <table width="100%" class="table-product" cellpadding="5" cellspacing="0" border="1">
                <tbody>
                    <tr>
                        <th class="text-center">Paket</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Berat</th>
                        <th class="text-center">Jenis Barang</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Total</th>
                    </tr>
                    <tr>
                        <td align="center"><?php echo $p->id_paket; ?></td>
                        <td align="center"><?php echo 'Rp ' . number_format($p->sub_harga); ?></td>
                        <td align="center"><?php echo $p->Kg; ?></td>
                        <td align="center"><?php echo $p->id_jnsbrg; ?></td>
                        <td align="center"><?php echo 'Rp ' . number_format($p->sub_harga_jenis); ?></td>
                        <td align="center"><?php echo 'Rp ' . number_format($p->total); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top:20px">
            <table width="100%">
                <tbody>
                    <tr>
                        <td style="vertical-align:top;">
                            <table cellpadding="4" cellspacing="0" class="table-description" style="border-collapse: collapse" border="0">
                                <tbody>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="right"></td>
                                        <td align="center"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <p style="font-style:italic"></p>
                        </td>
                        <td align="right" style="vertical-align:top;">
                            <table class="table-price">
                                <tbody>
                                    <tr>
                                        <h1>
                                            <td width="150px" style="font-size: 25px;">Total : </td>
                                            <td style="font-size: 25px;"><?php echo 'Rp ' . number_format($p->total); ?></td>
                                        </h1>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top:10px">
            <table width="100%">
                <tbody>
                    <tr>
                        <td valign="top">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Status</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?php echo $p->status; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Dibayar</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?php echo $p->pembayaran; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td align="center" width="50%">
                            Hormat Kami <br><br><br><br>
                            <b>
                                Bunga Laundry </b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </body>
</html>
<?php endforeach; ?>