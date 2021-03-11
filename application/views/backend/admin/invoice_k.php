<?php $i = 1; ?>
<?php foreach ($transaksi as $p) : ?>


    <html moznomarginboxes mozdisallowselectionprint>

    <head>
        <title>
            Bunga Laundry - Print Nota </title>
        <style type="text/css">
            html {
                font-family: "Verdana";
            }

            .content {
                /*width: 58mm;*/
                font-size: 12px;
                padding: 5px;
            }

            .content .title {
                text-align: center;
            }

            .content .head-desc {
                margin-top: 10px;
                display: table;
                width: 100%;
            }

            .content .head-desc>div {
                display: table-cell;
            }

            .content .head-desc .user {
                text-align: right;
            }

            .content .nota {
                text-align: center;
                margin-top: 5px;
                margin-bottom: 5px;
            }

            .content .separate {
                margin-top: 10px;
                margin-bottom: 15px;
                border-top: 1px dashed #000;
            }

            .content .transaction-table {
                width: 100%;
                font-size: 12px;
            }

            .content .transaction-table .name {
                width: 185px;
            }

            .content .transaction-table .qty {
                text-align: center;
            }

            .content .transaction-table .sell-price,
            .content .transaction-table .final-price {
                text-align: right;
                width: 65px;
            }

            .content .transaction-table tr td {
                vertical-align: top;
            }

            .content .transaction-table .price-tr td {
                padding-top: 7px;
                padding-bottom: 7px;
            }

            .content .transaction-table .discount-tr td {
                padding-top: 7px;
                padding-bottom: 7px;
            }

            .content .transaction-table .separate-line {
                height: 1px;
                border-top: 1px dashed #000;
            }

            .content .thanks {
                margin-top: 15px;
                text-align: center;
            }

            .content .azost {
                margin-top: 5px;
                text-align: center;
                font-size: 10px;
            }

            /*@media print {
                @page  { 
                    width: 80mm;
                    margin: 0mm;
                }
            }*/
        </style>
    </head>

    <body onload="window.print();">
        <div class="content">
            <div style="text-align:center;">
                <img style="display:inline-block;" height="58px" src="<?= base_url('assets/img/59523.jpg') ?>">
            </div>
            <div class="title">
                Bunga Laundry<br>
                Sleman<br>
                www.bunga-laundry.com<br>
            </div>

            <div class="head-desc">
                <div class="date">
                    <?php echo date('d-m-Y', $p->tanggal); ?> </div>
                <div class="user">
                    <?php echo $p->nama; ?> </div>
            </div>

            <div class="nota">
                <?php echo $p->no_nota; ?> </div>

            <div class="separate"></div>

            <div class="transaction">
                <table class="transaction-table" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class='name'><?php echo $p->id_paket; ?></td>
                        <td class='qty'><?php echo $p->Kg; ?></td>
                        <td class='sell-price'><?php echo 'Rp ' . number_format($p->sub_harga); ?></td>
                        <table class="transaction-table" cellspacing="0" cellpadding="0">
                            <td class='name-1'><?php echo $p->id_jnsbrg; ?></td>
                            <td></td>
                            <td></td>
                            <td class='final-price'><?php echo 'Rp ' . number_format($p->sub_harga_jenis); ?></td>
                    </tr>
                    <tr class="discount-tr">
                        <td colspan="4">
                            <div class="separate-line"></div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" class="final-price">
                            TOTAL
                        </td>
                        <td class="final-price">
                            <?php echo 'Rp ' . number_format($p->total); ?> </td>
                    </tr>
                </table>
                </table>
            </div>
            <div>
            </div>
            <div style="margin-top:5px;margin-bottom:5px;">
                <div>Tanggal Selesai: <?php echo $p->tgl_selesai; ?></div>
                <div>Status Bayar: <?php echo $p->pembayaran; ?></div>
            </div>
            <div style="margin-top:10px;margin-bottom:10px;">
            </div>
        </div>
    </body>

    </html>
<?php endforeach; ?>