<!-- footer content -->
<footer>
    <div class="pull-right">
        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/backend/'); ?>vendors/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/jquery/dist/jquery-ui.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/backend/'); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/backend/'); ?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url('assets/backend/'); ?>vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?= base_url('assets/backend/'); ?>vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?= base_url('assets/backend/'); ?>vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?= base_url('assets/backend/'); ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url('assets/backend/'); ?>vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?= base_url('assets/backend/'); ?>vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?= base_url('assets/backend/'); ?>vendors/Flot/jquery.flot.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/Flot/jquery.flot.time.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?= base_url('assets/backend/'); ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?= base_url('assets/backend/'); ?>vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/backend/'); ?>vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url('assets/backend/'); ?>vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- bootstrap-datetimepicker -->
<script src="<?= base_url('assets/backend/'); ?>vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<script src="<?= base_url('assets/backend/'); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/jszip/dist/jszip.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url('assets/backend/'); ?>vendors/pdfmake/build/vfs_fonts.js"></script>

<script src="<?= base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/myscript.js'); ?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?= base_url('assets/backend/'); ?>build/js/custom.min.js"></script>

<script>
    $('#myDatepicker').datetimepicker();

    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });

    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });

    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();

    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });

    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });

    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });


    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('owner/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('owner/roleaccess/'); ?>" + roleId;
            }
        });

    });
</script>

<!-- Ajax jquery paket -->
<script type="text/javascript">
    $(document).ready(function() {

        $('#id_paket').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('admin/get_paket'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].harga + '>' + data[i].harga + '</option>';
                    }
                    $('#sub_harga').html(html);

                }
            });
            return false;
        });
    });
</script>

<!-- Ajax jquery paket id -->
<script type="text/javascript">
    $(document).ready(function() {

        $('#id_paket').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('admin/get_paket'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_paket + '>' + data[i].id_paket + '</option>';
                    }
                    $('#sub_id').html(html);

                }
            });
            return false;
        });
    });
</script>

<!-- Ajax jquery jenis -->
<script type="text/javascript">
    $(document).ready(function() {

        $('#id_jnsbrg').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('admin/get_jenis_barang'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].harga + '>' + data[i].harga + '</option>';
                    }
                    $('#sub_harga_jenis').html(html);

                }
            });
            return false;
        });

    });
</script>

<!-- Ajax user  -->
<script type="text/javascript">
    $(document).ready(function() {

        $('#id_user').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('admin/get_user'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].harga + '>' + data[i].harga + '</option>';
                    }
                    $('#sub_harga_jenis').html(html);

                }
            });
            return false;
        });

    });
</script>

<!-- Ajax jquery id jenis -->
<script type="text/javascript">
    $(document).ready(function() {

        $('#id_jnsbrg').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('admin/get_jenis_barang'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_jnsbrg + '>' + data[i].id_jnsbrg + '</option>';
                    }
                    $('#sub_id_jenis').html(html);

                }
            });
            return false;
        });

    });
</script>

<!-- perhitungan--->

<script type="text/javascript">
    $('.Kg input').keyup(multiply);
    $('td.sub_harga select').change(multiply);
    $('td.sub_harga_jenis select').change(multiply);

    function multiply() {
        var dollars = parseInt($('td.sub_harga select').val());

        var quantity = parseFloat($('.Kg input').val());

        var tambahan = parseFloat($('td.sub_harga_jenis select').val());

        $('#total').val(quantity * dollars + tambahan);
    }
</script>

<!-- search member -->
<script type="text/javascript">
    $(document).ready(function() {

        $('#username').autocomplete({
            source: "<?php echo site_url('admin/get_user'); ?>",

            select: function(event, ui) {
                $('[name="username"]').val(ui.item.label);
                $('[name="nama"]').val(ui.item.description);
                $('[name="telepon"]').val(ui.item.tele);
            }
        });

    });
</script>

</body>

</html>