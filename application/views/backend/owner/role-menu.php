 <!-- page content -->
 <div class="right_col" role="main">
     <h1 align="center" class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	 <div class="judul" data-judul="<?= $title; ?>"></div>
     <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
     <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

     <!-- <?= $this->session->flashdata('message'); ?> -->

 <!-- role -->
 <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
 <h2>Role</h2>
                  <div class="x_title">
                    <div class="clearfix"></div>
                  <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Tambahkan Role Baru</a>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                    <thead>
                         <tr>
                             <th scope="col">Id</th>
                             <th scope="col">Role</th>
                             <th scope="col">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($role as $r) : ?>
                             <tr>
                                 <th scope="row"><?= $i; ?></th>
                                 <td><?= $r['role']; ?> </td>
                                 <td>
                                     <a href="<?= base_url('owner/roleaccess/') . $r['id']; ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-lock"></span>Access</a>
                                 </td>
                             </tr>
                             <?php $i++; ?>
                         <?php endforeach; ?>
                     </tbody>
                    </table>

                  </div>
                </div>
              </div>

<!-- modal -->

<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="newRoleModalLabel">Tambah Role Baru</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <form action="<?= base_url('owner/role'); ?>" method="post">
                     <div class="modal-body">
                         <div class="form-group">
                             <input type="text" class="form-control" id="role" name="role" placeholder="Nama role">
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

   <!-- menu  -->
   <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
 <h2>Menu</h2>
                  <div class="x_title">
                    <div class="clearfix"></div>
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Tambahkan Menu Baru</a>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                    <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Menu</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($menu as $m) : ?>
                             <tr>
                                 <th scope="row"><?= $i; ?></th>
                                 <td><?= $m['menu']; ?> </td>
                             </tr>
                             <?php $i++; ?>
                         <?php endforeach; ?>
                     </tbody>
                    </table>

                  </div>
                </div>
              </div>

              <!-- modal menu  -->
              <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="newMenuModalLabel">Tambah Menu Baru</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <form action="<?= base_url('owner/menu'); ?>" method="post">
                     <div class="modal-body">
                         <div class="form-group">
                             <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama menu">
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

<!-- submenu -->
<?php if (validation_errors()) : ?>
         '<div class="alert alert-danger" role="alert">
             <?= validation_errors(); ?>
         </div>
     <?php endif; ?>
     <div class="col-md">
         <div class="x_panel">
	 <h2>Submenu</h2>
             <div class="x_title">
                 <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambahkan Submenu Baru</a>
                 <div class="clearfix"></div>
             </div>
             <div class="x_content">

			 <table id="datatable" class="table table-striped table-bordered">
                     <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Title</th>
                             <th scope="col">Menu</th>
                             <th scope="col">Url</th>
                             <th scope="col">Icon</th>
                             <th scope="col">Active</th>
                             <th scope="col">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($subMenu as $sm) : ?>
                             <tr>
                                 <th scope="row"><?= $i; ?></th>
                                 <td><?= $sm['title']; ?> </td>
                                 <td><?= $sm['menu']; ?> </td>
                                 <td><?= $sm['url']; ?> </td>
                                 <td><?= $sm['icon']; ?> </td>
                                 <td><?= $sm['is_active']; ?> </td>
                                 <td>
								 <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit<?= $sm['id']; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
								 <a href="<?= base_url('owner/hapussub/' . $sm['id']); ?>" data-placement="top" class="btn btn-danger btn-xs tombol-hapus"><span class="glyphicon glyphicon-remove"></span> Hapus</a>
                                 </td>
                             </tr>
                             <?php $i++; ?>
                         <?php endforeach; ?>
                     </tbody>
                 </table>

             </div>
         </div>
     </div>

     <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Sub Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('owner/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Pilih menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                    <!-- Icon FontAwesome-->
                    <div class="form-group">
<style>
	select{
		font-family: fontAwesome
	}
</style>

<select id="icon" name="icon" class="form-control">
<option selected>Icon</option>
     <option value='fa fa-500px'>&#xf26e; fa fa-500px</option>
		<option value='fa fa-address-book'>&#xf2b9; fa fa-address-book</option>
		<option value='fa fa-address-book-o'>&#xf2ba; fa fa-address-book-o</option>
		<option value='fa fa-address-card'>&#xf2bb; fa fa-address-card</option>
		<option value='fa fa-address-card-o'>&#xf2bc; fa fa-address-card-o</option>
		<option value='fa fa-adjust'>&#xf042; fa fa-adjust</option>
		<option value='fa fa-adn'>&#xf170; fa fa-adn</option>
		<option value='fa fa-align-center'>&#xf037; fa fa-align-center</option>
		<option value='fa fa-align-justify'>&#xf039; fa fa-align-justify</option>
		<option value='fa fa-align-left'>&#xf036; fa fa-align-left</option>
		<option value='fa fa-align-right'>&#xf038; fa fa-align-right</option>
		<option value='fa fa-amazon'>&#xf270; fa fa-amazon</option>
		<option value='fa fa-ambulance'>&#xf0f9; fa fa-ambulance</option>
		<option value='fa fa-american-sign-language-interpreting'>&#xf2a3; fa fa-american-sign-language-interpreting</option>
		<option value='fa fa-anchor'>&#xf13d; fa fa-anchor</option>
		<option value='fa fa-android'>&#xf17b; fa fa-android</option>
		<option value='fa fa-angellist'>&#xf209; fa fa-angellist</option>
		<option value='fa fa-angle-double-down'>&#xf103; fa fa-angle-double-down</option>
		<option value='fa fa-angle-double-left'>&#xf100; fa fa-angle-double-left</option>
		<option value='fa fa-angle-double-right'>&#xf101; fa fa-angle-double-right</option>
		<option value='fa fa-angle-double-up'>&#xf102; fa fa-angle-double-up</option>
		<option value='fa fa-angle-down'>&#xf107; fa fa-angle-down</option>
		<option value='fa fa-angle-left'>&#xf104; fa fa-angle-left</option>
		<option value='fa fa-angle-right'>&#xf105; fa fa-angle-right</option>
		<option value='fa fa-angle-up'>&#xf106; fa fa-angle-up</option>
		<option value='fa fa-apple'>&#xf179; fa fa-apple</option>
		<option value='fa fa-archive'>&#xf187; fa fa-archive</option>
		<option value='fa fa-area-chart'>&#xf1fe; fa fa-area-chart</option>
		<option value='fa fa-arrow-circle-down'>&#xf0ab; fa fa-arrow-circle-down</option>
		<option value='fa fa-arrow-circle-left'>&#xf0a8; fa fa-arrow-circle-left</option>
		<option value='fa fa-arrow-circle-o-down'>&#xf01a; fa fa-arrow-circle-o-down</option>
		<option value='fa fa-arrow-circle-o-left'>&#xf190; fa fa-arrow-circle-o-left</option>
		<option value='fa fa-arrow-circle-o-right'>&#xf18e; fa fa-arrow-circle-o-right</option>
		<option value='fa fa-arrow-circle-o-up'>&#xf01b; fa fa-arrow-circle-o-up</option>
		<option value='fa fa-arrow-circle-right'>&#xf0a9; fa fa-arrow-circle-right</option>
		<option value='fa fa-arrow-circle-up'>&#xf0aa; fa fa-arrow-circle-up</option>
		<option value='fa fa-arrow-down'>&#xf063; fa fa-arrow-down</option>
		<option value='fa fa-arrow-left'>&#xf060; fa fa-arrow-left</option>
		<option value='fa fa-arrow-right'>&#xf061; fa fa-arrow-right</option>
		<option value='fa fa-arrow-up'>&#xf062; fa fa-arrow-up</option>
		<option value='fa fa-arrows'>&#xf047; fa fa-arrows</option>
		<option value='fa fa-arrows-alt'>&#xf0b2; fa fa-arrows-alt</option>
		<option value='fa fa-arrows-h'>&#xf07e; fa fa-arrows-h</option>
		<option value='fa fa-arrows-v'>&#xf07d; fa fa-arrows-v</option>
		<option value='fa fa-asl-interpreting'>&#xf2a3; fa fa-asl-interpreting</option>
		<option value='fa fa-assistive-listening-systems'>&#xf2a2; fa fa-assistive-listening-systems</option>
		<option value='fa fa-asterisk'>&#xf069; fa fa-asterisk</option>
		<option value='fa fa-at'>&#xf1fa fa; fa fa-at</option>
		<option value='fa fa-audio-description'>&#xf29e; fa fa-audio-description</option>
		<option value='fa fa-automobile'>&#xf1b9; fa fa-automobile</option>
		<option value='fa fa-backward'>&#xf04a; fa fa-backward</option>
		<option value='fa fa-balance-scale'>&#xf24e; fa fa-balance-scale</option>
		<option value='fa fa-ban'>&#xf05e; fa fa-ban</option>
		<option value='fa fa-bandcamp'>&#xf2d5; fa fa-bandcamp</option>
		<option value='fa fa-bank'>&#xf19c; fa fa-bank</option>
		<option value='fa fa-bar-chart'>&#xf080; fa fa-bar-chart</option>
		<option value='fa fa-bar-chart-o'>&#xf080; fa fa-bar-chart-o</option>
		<option value='fa fa-barcode'>&#xf02a; fa fa-barcode</option>
		<option value='fa fa-bars'>&#xf0c9; fa fa-bars</option>
		<option value='fa fa-bath'>&#xf2cd; fa fa-bath</option>
		<option value='fa fa-bathtub'>&#xf2cd; fa fa-bathtub</option>
		<option value='fa fa-battery'>&#xf240; fa fa-battery</option>
		<option value='fa fa-battery-0'>&#xf244; fa fa-battery-0</option>
		<option value='fa fa-battery-1'>&#xf243; fa fa-battery-1</option>
		<option value='fa fa-battery-2'>&#xf242; fa fa-battery-2</option>
		<option value='fa fa-battery-3'>&#xf241; fa fa-battery-3</option>
		<option value='fa fa-battery-4'>&#xf240; fa fa-battery-4</option>
		<option value='fa fa-battery-empty'>&#xf244; fa fa-battery-empty</option>
		<option value='fa fa-battery-full'>&#xf240; fa fa-battery-full</option>
		<option value='fa fa-battery-half'>&#xf242; fa fa-battery-half</option>
		<option value='fa fa-battery-quarter'>&#xf243; fa fa-battery-quarter</option>
		<option value='fa fa-battery-three-quarters'>&#xf241; fa fa-battery-three-quarters</option>
		<option value='fa fa-bed'>&#xf236; fa fa-bed</option>
		<option value='fa fa-beer'>&#xf0fc; fa fa-beer</option>
		<option value='fa fa-behance'>&#xf1b4; fa fa-behance</option>
		<option value='fa fa-behance-square'>&#xf1b5; fa fa-behance-square</option>
		<option value='fa fa-bell'>&#xf0f3; fa fa-bell</option>
		<option value='fa fa-bell-o'>&#xf0a2; fa fa-bell-o</option>
		<option value='fa fa-bell-slash'>&#xf1f6; fa fa-bell-slash</option>
		<option value='fa fa-bell-slash-o'>&#xf1f7; fa fa-bell-slash-o</option>
		<option value='fa fa-bicycle'>&#xf206; fa fa-bicycle</option>
		<option value='fa fa-binoculars'>&#xf1e5; fa fa-binoculars</option>
		<option value='fa fa-birthday-cake'>&#xf1fd; fa fa-birthday-cake</option>
		<option value='fa fa-bitbucket'>&#xf171; fa fa-bitbucket</option>
		<option value='fa fa-bitbucket-square'>&#xf172; fa fa-bitbucket-square</option>
		<option value='fa fa-bitcoin'>&#xf15a; fa fa-bitcoin</option>
		<option value='fa fa-black-tie'>&#xf27e; fa fa-black-tie</option>
		<option value='fa fa-blind'>&#xf29d; fa fa-blind</option>
		<option value='fa fa-bluetooth'>&#xf293; fa fa-bluetooth</option>
		<option value='fa fa-bluetooth-b'>&#xf294; fa fa-bluetooth-b</option>
		<option value='fa fa-bold'>&#xf032; fa fa-bold</option>
		<option value='fa fa-bolt'>&#xf0e7; fa fa-bolt</option>
		<option value='fa fa-bomb'>&#xf1e2; fa fa-bomb</option>
		<option value='fa fa-book'>&#xf02d; fa fa-book</option>
		<option value='fa fa-bookmark'>&#xf02e; fa fa-bookmark</option>
		<option value='fa fa-bookmark-o'>&#xf097; fa fa-bookmark-o</option>
		<option value='fa fa-braille'>&#xf2a1; fa fa-braille</option>
		<option value='fa fa-briefcase'>&#xf0b1; fa fa-briefcase</option>
		<option value='fa fa-btc'>&#xf15a; fa fa-btc</option>
		<option value='fa fa-bug'>&#xf188; fa fa-bug</option>
		<option value='fa fa-building'>&#xf1ad; fa fa-building</option>
		<option value='fa fa-building-o'>&#xf0f7; fa fa-building-o</option>
		<option value='fa fa-bullhorn'>&#xf0a1; fa fa-bullhorn</option>
		<option value='fa fa-bullseye'>&#xf140; fa fa-bullseye</option>
		<option value='fa fa-bus'>&#xf207; fa fa-bus</option>
		<option value='fa fa-buysellads'>&#xf20d; fa fa-buysellads</option>
		<option value='fa fa-cab'>&#xf1ba; fa fa-cab</option>
		<option value='fa fa-calculator'>&#xf1ec; fa fa-calculator</option>
		<option value='fa fa-calendar'>&#xf073; fa fa-calendar</option>
		<option value='fa fa-calendar-check-o'>&#xf274; fa fa-calendar-check-o</option>
		<option value='fa fa-calendar-minus-o'>&#xf272; fa fa-calendar-minus-o</option>
		<option value='fa fa-calendar-o'>&#xf133; fa fa-calendar-o</option>
		<option value='fa fa-calendar-plus-o'>&#xf271; fa fa-calendar-plus-o</option>
		<option value='fa fa-calendar-times-o'>&#xf273; fa fa-calendar-times-o</option>
		<option value='fa fa-camera'>&#xf030; fa fa-camera</option>
		<option value='fa fa-camera-retro'>&#xf083; fa fa-camera-retro</option>
		<option value='fa fa-car'>&#xf1b9; fa fa-car</option>
		<option value='fa fa-caret-down'>&#xf0d7; fa fa-caret-down</option>
		<option value='fa fa-caret-left'>&#xf0d9; fa fa-caret-left</option>
		<option value='fa fa-caret-right'>&#xf0da; fa fa-caret-right</option>
		<option value='fa fa-caret-square-o-down'>&#xf150; fa fa-caret-square-o-down</option>
		<option value='fa fa-caret-square-o-left'>&#xf191; fa fa-caret-square-o-left</option>
		<option value='fa fa-caret-square-o-right'>&#xf152; fa fa-caret-square-o-right</option>
		<option value='fa fa-caret-square-o-up'>&#xf151; fa fa-caret-square-o-up</option>
		<option value='fa fa-caret-up'>&#xf0d8; fa fa-caret-up</option>
		<option value='fa fa-cart-arrow-down'>&#xf218; fa fa-cart-arrow-down</option>
		<option value='fa fa-cart-plus'>&#xf217; fa fa-cart-plus</option>
		<option value='fa fa-cc'>&#xf20a; fa fa-cc</option>
		<option value='fa fa-cc-amex'>&#xf1f3; fa fa-cc-amex</option>
		<option value='fa fa-cc-diners-club'>&#xf24c; fa fa-cc-diners-club</option>
		<option value='fa fa-cc-discover'>&#xf1f2; fa fa-cc-discover</option>
		<option value='fa fa-cc-jcb'>&#xf24b; fa fa-cc-jcb</option>
		<option value='fa fa-cc-mastercard'>&#xf1f1; fa fa-cc-mastercard</option>
		<option value='fa fa-cc-paypal'>&#xf1f4; fa fa-cc-paypal</option>
		<option value='fa fa-cc-stripe'>&#xf1f5; fa fa-cc-stripe</option>
		<option value='fa fa-cc-visa'>&#xf1f0; fa fa-cc-visa</option>
		<option value='fa fa-certificate'>&#xf0a3; fa fa-certificate</option>
		<option value='fa fa-chain'>&#xf0c1; fa fa-chain</option>
		<option value='fa fa-chain-broken'>&#xf127; fa fa-chain-broken</option>
		<option value='fa fa-check'>&#xf00c; fa fa-check</option>
		<option value='fa fa-check-circle'>&#xf058; fa fa-check-circle</option>
		<option value='fa fa-check-circle-o'>&#xf05d; fa fa-check-circle-o</option>
		<option value='fa fa-check-square'>&#xf14a; fa fa-check-square</option>
		<option value='fa fa-check-square-o'>&#xf046; fa fa-check-square-o</option>
		<option value='fa fa-chevron-circle-down'>&#xf13a; fa fa-chevron-circle-down</option>
		<option value='fa fa-chevron-circle-left'>&#xf137; fa fa-chevron-circle-left</option>
		<option value='fa fa-chevron-circle-right'>&#xf138; fa fa-chevron-circle-right</option>
		<option value='fa fa-chevron-circle-up'>&#xf139; fa fa-chevron-circle-up</option>
		<option value='fa fa-chevron-down'>&#xf078; fa fa-chevron-down</option>
		<option value='fa fa-chevron-left'>&#xf053; fa fa-chevron-left</option>
		<option value='fa fa-chevron-right'>&#xf054; fa fa-chevron-right</option>
		<option value='fa fa-chevron-up'>&#xf077; fa fa-chevron-up</option>
		<option value='fa fa-child'>&#xf1ae; fa fa-child</option>
		<option value='fa fa-chrome'>&#xf268; fa fa-chrome</option>
		<option value='fa fa-circle'>&#xf111; fa fa-circle</option>
		<option value='fa fa-circle-o'>&#xf10c; fa fa-circle-o</option>
		<option value='fa fa-circle-o-notch'>&#xf1ce; fa fa-circle-o-notch</option>
		<option value='fa fa-circle-thin'>&#xf1db; fa fa-circle-thin</option>
		<option value='fa fa-clipboard'>&#xf0ea; fa fa-clipboard</option>
		<option value='fa fa-clock-o'>&#xf017; fa fa-clock-o</option>
		<option value='fa fa-clone'>&#xf24d; fa fa-clone</option>
		<option value='fa fa-close'>&#xf00d; fa fa-close</option>
		<option value='fa fa-cloud'>&#xf0c2; fa fa-cloud</option>
		<option value='fa fa-cloud-download'>&#xf0ed; fa fa-cloud-download</option>
		<option value='fa fa-cloud-upload'>&#xf0ee; fa fa-cloud-upload</option>
		<option value='fa fa-cny'>&#xf157; fa fa-cny</option>
		<option value='fa fa-code'>&#xf121; fa fa-code</option>
		<option value='fa fa-code-fork'>&#xf126; fa fa-code-fork</option>
		<option value='fa fa-codepen'>&#xf1cb; fa fa-codepen</option>
		<option value='fa fa-codiepie'>&#xf284; fa fa-codiepie</option>
		<option value='fa fa-coffee'>&#xf0f4; fa fa-coffee</option>
		<option value='fa fa-cog'>&#xf013; fa fa-cog</option>
		<option value='fa fa-cogs'>&#xf085; fa fa-cogs</option>
		<option value='fa fa-columns'>&#xf0db; fa fa-columns</option>
		<option value='fa fa-comment'>&#xf075; fa fa-comment</option>
		<option value='fa fa-comment-o'>&#xf0e5; fa fa-comment-o</option>
		<option value='fa fa-commenting'>&#xf27a; fa fa-commenting</option>
		<option value='fa fa-commenting-o'>&#xf27b; fa fa-commenting-o</option>
		<option value='fa fa-comments'>&#xf086; fa fa-comments</option>
		<option value='fa fa-comments-o'>&#xf0e6; fa fa-comments-o</option>
		<option value='fa fa-compass'>&#xf14e; fa fa-compass</option>
		<option value='fa fa-compress'>&#xf066; fa fa-compress</option>
		<option value='fa fa-connectdevelop'>&#xf20e; fa fa-connectdevelop</option>
		<option value='fa fa-contao'>&#xf26d; fa fa-contao</option>
		<option value='fa fa-copy'>&#xf0c5; fa fa-copy</option>
		<option value='fa fa-copyright'>&#xf1f9; fa fa-copyright</option>
		<option value='fa fa-creative-commons'>&#xf25e; fa fa-creative-commons</option>
		<option value='fa fa-credit-card'>&#xf09d; fa fa-credit-card</option>
		<option value='fa fa-credit-card-alt'>&#xf283; fa fa-credit-card-alt</option>
		<option value='fa fa-crop'>&#xf125; fa fa-crop</option>
		<option value='fa fa-crosshairs'>&#xf05b; fa fa-crosshairs</option>
		<option value='fa fa-css3'>&#xf13c; fa fa-css3</option>
		<option value='fa fa-cube'>&#xf1b2; fa fa-cube</option>
		<option value='fa fa-cubes'>&#xf1b3; fa fa-cubes</option>
		<option value='fa fa-cut'>&#xf0c4; fa fa-cut</option>
		<option value='fa fa-cutlery'>&#xf0f5; fa fa-cutlery</option>
		<option value='fa fa-dashboard'>&#xf0e4; fa fa-dashboard</option>
		<option value='fa fa-dashcube'>&#xf210; fa fa-dashcube</option>
		<option value='fa fa-database'>&#xf1c0; fa fa-database</option>
		<option value='fa fa-deaf'>&#xf2a4; fa fa-deaf</option>
		<option value='fa fa-deafness'>&#xf2a4; fa fa-deafness</option>
		<option value='fa fa-dedent'>&#xf03b; fa fa-dedent</option>
		<option value='fa fa-delicious'>&#xf1a5; fa fa-delicious</option>
		<option value='fa fa-desktop'>&#xf108; fa fa-desktop</option>
		<option value='fa fa-deviantart'>&#xf1bd; fa fa-deviantart</option>
		<option value='fa fa-diamond'>&#xf219; fa fa-diamond</option>
		<option value='fa fa-digg'>&#xf1a6; fa fa-digg</option>
		<option value='fa fa-dollar'>&#xf155; fa fa-dollar</option>
		<option value='fa fa-dot-circle-o'>&#xf192; fa fa-dot-circle-o</option>
		<option value='fa fa-download'>&#xf019; fa fa-download</option>
		<option value='fa fa-dribbble'>&#xf17d; fa fa-dribbble</option>
		<option value='fa fa-drivers-license'>&#xf2c2; fa fa-drivers-license</option>
		<option value='fa fa-drivers-license-o'>&#xf2c3; fa fa-drivers-license-o</option>
		<option value='fa fa-dropbox'>&#xf16b; fa fa-dropbox</option>
		<option value='fa fa-drupal'>&#xf1a9; fa fa-drupal</option>
		<option value='fa fa-edge'>&#xf282; fa fa-edge</option>
		<option value='fa fa-edit'>&#xf044; fa fa-edit</option>
		<option value='fa fa-eercast'>&#xf2da; fa fa-eercast</option>
		<option value='fa fa-eject'>&#xf052; fa fa-eject</option>
		<option value='fa fa-ellipsis-h'>&#xf141; fa fa-ellipsis-h</option>
		<option value='fa fa-ellipsis-v'>&#xf142; fa fa-ellipsis-v</option>
		<option value='fa fa-empire'>&#xf1d1; fa fa-empire</option>
		<option value='fa fa-envelope'>&#xf0e0; fa fa-envelope</option>
		<option value='fa fa-envelope-o'>&#xf003; fa fa-envelope-o</option>
		<option value='fa fa-envelope-open'>&#xf2b6; fa fa-envelope-open</option>
		<option value='fa fa-envelope-open-o'>&#xf2b7; fa fa-envelope-open-o</option>
		<option value='fa fa-envelope-square'>&#xf199; fa fa-envelope-square</option>
		<option value='fa fa-envira'>&#xf299; fa fa-envira</option>
		<option value='fa fa-eraser'>&#xf12d; fa fa-eraser</option>
		<option value='fa fa-etsy'>&#xf2d7; fa fa-etsy</option>
		<option value='fa fa-eur'>&#xf153; fa fa-eur</option>
		<option value='fa fa-euro'>&#xf153; fa fa-euro</option>
		<option value='fa fa-exchange'>&#xf0ec; fa fa-exchange</option>
		<option value='fa fa-exclamation'>&#xf12a; fa fa-exclamation</option>
		<option value='fa fa-exclamation-circle'>&#xf06a; fa fa-exclamation-circle</option>
		<option value='fa fa-exclamation-triangle'>&#xf071; fa fa-exclamation-triangle</option>
		<option value='fa fa-expand'>&#xf065; fa fa-expand</option>
		<option value='fa fa-expeditedssl'>&#xf23e; fa fa-expeditedssl</option>
		<option value='fa fa-external-link'>&#xf08e; fa fa-external-link</option>
		<option value='fa fa-external-link-square'>&#xf14c; fa fa-external-link-square</option>
		<option value='fa fa-eye'>&#xf06e; fa fa-eye</option>
		<option value='fa fa-eye-slash'>&#xf070; fa fa-eye-slash</option>
		<option value='fa fa-eyedropper'>&#xf1fb; fa fa-eyedropper</option>
		<option value='fa fa-fa fa'>&#xf2b4; fa fa-fa fa</option>
		<option value='fa fa-fa facebook'>&#xf09a; fa fa-fa facebook</option>
		<option value='fa fa-fa facebook-f'>&#xf09a; fa fa-fa facebook-f</option>
		<option value='fa fa-fa facebook-official'>&#xf230; fa fa-fa facebook-official</option>
		<option value='fa fa-fa facebook-square'>&#xf082; fa fa-fa facebook-square</option>
		<option value='fa fa-fa fast-backward'>&#xf049; fa fa-fa fast-backward</option>
		<option value='fa fa-fa fast-forward'>&#xf050; fa fa-fa fast-forward</option>
		<option value='fa fa-fa fax'>&#xf1ac; fa fa-fa fax</option>
		<option value='fa fa-feed'>&#xf09e; fa fa-feed</option>
		<option value='fa fa-female'>&#xf182; fa fa-female</option>
		<option value='fa fa-fighter-jet'>&#xf0fb; fa fa-fighter-jet</option>
		<option value='fa fa-file'>&#xf15b; fa fa-file</option>
		<option value='fa fa-file-archive-o'>&#xf1c6; fa fa-file-archive-o</option>
		<option value='fa fa-file-audio-o'>&#xf1c7; fa fa-file-audio-o</option>
		<option value='fa fa-file-code-o'>&#xf1c9; fa fa-file-code-o</option>
		<option value='fa fa-file-excel-o'>&#xf1c3; fa fa-file-excel-o</option>
		<option value='fa fa-file-image-o'>&#xf1c5; fa fa-file-image-o</option>
		<option value='fa fa-file-movie-o'>&#xf1c8; fa fa-file-movie-o</option>
		<option value='fa fa-file-o'>&#xf016; fa fa-file-o</option>
		<option value='fa fa-file-pdf-o'>&#xf1c1; fa fa-file-pdf-o</option>
		<option value='fa fa-file-photo-o'>&#xf1c5; fa fa-file-photo-o</option>
		<option value='fa fa-file-picture-o'>&#xf1c5; fa fa-file-picture-o</option>
		<option value='fa fa-file-powerpoint-o'>&#xf1c4; fa fa-file-powerpoint-o</option>
		<option value='fa fa-file-sound-o'>&#xf1c7; fa fa-file-sound-o</option>
		<option value='fa fa-file-text'>&#xf15c; fa fa-file-text</option>
		<option value='fa fa-file-text-o'>&#xf0f6; fa fa-file-text-o</option>
		<option value='fa fa-file-video-o'>&#xf1c8; fa fa-file-video-o</option>
		<option value='fa fa-file-word-o'>&#xf1c2; fa fa-file-word-o</option>
		<option value='fa fa-file-zip-o'>&#xf1c6; fa fa-file-zip-o</option>
		<option value='fa fa-files-o'>&#xf0c5; fa fa-files-o</option>
		<option value='fa fa-film'>&#xf008; fa fa-film</option>
		<option value='fa fa-filter'>&#xf0b0; fa fa-filter</option>
		<option value='fa fa-fire'>&#xf06d; fa fa-fire</option>
		<option value='fa fa-fire-extinguisher'>&#xf134; fa fa-fire-extinguisher</option>
		<option value='fa fa-firefox'>&#xf269; fa fa-firefox</option>
		<option value='fa fa-first-order'>&#xf2b0; fa fa-first-order</option>
		<option value='fa fa-flag'>&#xf024; fa fa-flag</option>
		<option value='fa fa-flag-checkered'>&#xf11e; fa fa-flag-checkered</option>
		<option value='fa fa-flag-o'>&#xf11d; fa fa-flag-o</option>
		<option value='fa fa-flash'>&#xf0e7; fa fa-flash</option>
		<option value='fa fa-flask'>&#xf0c3; fa fa-flask</option>
		<option value='fa fa-flickr'>&#xf16e; fa fa-flickr</option>
		<option value='fa fa-floppy-o'>&#xf0c7; fa fa-floppy-o</option>
		<option value='fa fa-folder'>&#xf07b; fa fa-folder</option>
		<option value='fa fa-folder-o'>&#xf114; fa fa-folder-o</option>
		<option value='fa fa-folder-open'>&#xf07c; fa fa-folder-open</option>
		<option value='fa fa-folder-open-o'>&#xf115; fa fa-folder-open-o</option>
		<option value='fa fa-font'>&#xf031; fa fa-font</option>
		<option value='fa fa-font-awesome'>&#xf2b4; fa fa-font-awesome</option>
		<option value='fa fa-fonticons'>&#xf280; fa fa-fonticons</option>
		<option value='fa fa-fort-awesome'>&#xf286; fa fa-fort-awesome</option>
		<option value='fa fa-forumbee'>&#xf211; fa fa-forumbee</option>
		<option value='fa fa-forward'>&#xf04e; fa fa-forward</option>
		<option value='fa fa-foursquare'>&#xf180; fa fa-foursquare</option>
		<option value='fa fa-free-code-camp'>&#xf2c5; fa fa-free-code-camp</option>
		<option value='fa fa-frown-o'>&#xf119; fa fa-frown-o</option>
		<option value='fa fa-futbol-o'>&#xf1e3; fa fa-futbol-o</option>
		<option value='fa fa-gamepad'>&#xf11b; fa fa-gamepad</option>
		<option value='fa fa-gavel'>&#xf0e3; fa fa-gavel</option>
		<option value='fa fa-gbp'>&#xf154; fa fa-gbp</option>
		<option value='fa fa-ge'>&#xf1d1; fa fa-ge</option>
		<option value='fa fa-gear'>&#xf013; fa fa-gear</option>
		<option value='fa fa-gears'>&#xf085; fa fa-gears</option>
		<option value='fa fa-genderless'>&#xf22d; fa fa-genderless</option>
		<option value='fa fa-get-pocket'>&#xf265; fa fa-get-pocket</option>
		<option value='fa fa-gg'>&#xf260; fa fa-gg</option>
		<option value='fa fa-gg-circle'>&#xf261; fa fa-gg-circle</option>
		<option value='fa fa-gift'>&#xf06b; fa fa-gift</option>
		<option value='fa fa-git'>&#xf1d3; fa fa-git</option>
		<option value='fa fa-git-square'>&#xf1d2; fa fa-git-square</option>
		<option value='fa fa-github'>&#xf09b; fa fa-github</option>
		<option value='fa fa-github-alt'>&#xf113; fa fa-github-alt</option>
		<option value='fa fa-github-square'>&#xf092; fa fa-github-square</option>
		<option value='fa fa-gitlab'>&#xf296; fa fa-gitlab</option>
		<option value='fa fa-gittip'>&#xf184; fa fa-gittip</option>
		<option value='fa fa-glass'>&#xf000; fa fa-glass</option>
		<option value='fa fa-glide'>&#xf2a5; fa fa-glide</option>
		<option value='fa fa-glide-g'>&#xf2a6; fa fa-glide-g</option>
		<option value='fa fa-globe'>&#xf0ac; fa fa-globe</option>
		<option value='fa fa-google'>&#xf1a0; fa fa-google</option>
		<option value='fa fa-google-plus'>&#xf0d5; fa fa-google-plus</option>
		<option value='fa fa-google-plus-circle'>&#xf2b3; fa fa-google-plus-circle</option>
		<option value='fa fa-google-plus-official'>&#xf2b3; fa fa-google-plus-official</option>
		<option value='fa fa-google-plus-square'>&#xf0d4; fa fa-google-plus-square</option>
		<option value='fa fa-google-wallet'>&#xf1ee; fa fa-google-wallet</option>
		<option value='fa fa-graduation-cap'>&#xf19d; fa fa-graduation-cap</option>
		<option value='fa fa-gratipay'>&#xf184; fa fa-gratipay</option>
		<option value='fa fa-grav'>&#xf2d6; fa fa-grav</option>
		<option value='fa fa-group'>&#xf0c0; fa fa-group</option>
		<option value='fa fa-h-square'>&#xf0fd; fa fa-h-square</option>
		<option value='fa fa-hacker-news'>&#xf1d4; fa fa-hacker-news</option>
		<option value='fa fa-hand-grab-o'>&#xf255; fa fa-hand-grab-o</option>
		<option value='fa fa-hand-lizard-o'>&#xf258; fa fa-hand-lizard-o</option>
		<option value='fa fa-hand-o-down'>&#xf0a7; fa fa-hand-o-down</option>
		<option value='fa fa-hand-o-left'>&#xf0a5; fa fa-hand-o-left</option>
		<option value='fa fa-hand-o-right'>&#xf0a4; fa fa-hand-o-right</option>
		<option value='fa fa-hand-o-up'>&#xf0a6; fa fa-hand-o-up</option>
		<option value='fa fa-hand-paper-o'>&#xf256; fa fa-hand-paper-o</option>
		<option value='fa fa-hand-peace-o'>&#xf25b; fa fa-hand-peace-o</option>
		<option value='fa fa-hand-pointer-o'>&#xf25a; fa fa-hand-pointer-o</option>
		<option value='fa fa-hand-rock-o'>&#xf255; fa fa-hand-rock-o</option>
		<option value='fa fa-hand-scissors-o'>&#xf257; fa fa-hand-scissors-o</option>
		<option value='fa fa-hand-spock-o'>&#xf259; fa fa-hand-spock-o</option>
		<option value='fa fa-hand-stop-o'>&#xf256; fa fa-hand-stop-o</option>
		<option value='fa fa-handshake-o'>&#xf2b5; fa fa-handshake-o</option>
		<option value='fa fa-hard-of-hearing'>&#xf2a4; fa fa-hard-of-hearing</option>
		<option value='fa fa-hashtag'>&#xf292; fa fa-hashtag</option>
		<option value='fa fa-hdd-o'>&#xf0a0; fa fa-hdd-o</option>
		<option value='fa fa-header'>&#xf1dc; fa fa-header</option>
		<option value='fa fa-headphones'>&#xf025; fa fa-headphones</option>
		<option value='fa fa-heart'>&#xf004; fa fa-heart</option>
		<option value='fa fa-heart-o'>&#xf08a; fa fa-heart-o</option>
		<option value='fa fa-heartbeat'>&#xf21e; fa fa-heartbeat</option>
		<option value='fa fa-history'>&#xf1da; fa fa-history</option>
		<option value='fa fa-home'>&#xf015; fa fa-home</option>
		<option value='fa fa-hospital-o'>&#xf0f8; fa fa-hospital-o</option>
		<option value='fa fa-hotel'>&#xf236; fa fa-hotel</option>
		<option value='fa fa-hourglass'>&#xf254; fa fa-hourglass</option>
		<option value='fa fa-hourglass-1'>&#xf251; fa fa-hourglass-1</option>
		<option value='fa fa-hourglass-2'>&#xf252; fa fa-hourglass-2</option>
		<option value='fa fa-hourglass-3'>&#xf253; fa fa-hourglass-3</option>
		<option value='fa fa-hourglass-end'>&#xf253; fa fa-hourglass-end</option>
		<option value='fa fa-hourglass-half'>&#xf252; fa fa-hourglass-half</option>
		<option value='fa fa-hourglass-o'>&#xf250; fa fa-hourglass-o</option>
		<option value='fa fa-hourglass-start'>&#xf251; fa fa-hourglass-start</option>
		<option value='fa fa-houzz'>&#xf27c; fa fa-houzz</option>
		<option value='fa fa-html5'>&#xf13b; fa fa-html5</option>
		<option value='fa fa-i-cursor'>&#xf246; fa fa-i-cursor</option>
		<option value='fa fa-id-badge'>&#xf2c1; fa fa-id-badge</option>
		<option value='fa fa-id-card'>&#xf2c2; fa fa-id-card</option>
		<option value='fa fa-id-card-o'>&#xf2c3; fa fa-id-card-o</option>
		<option value='fa fa-ils'>&#xf20b; fa fa-ils</option>
		<option value='fa fa-image'>&#xf03e; fa fa-image</option>
		<option value='fa fa-imdb'>&#xf2d8; fa fa-imdb</option>
		<option value='fa fa-inbox'>&#xf01c; fa fa-inbox</option>
		<option value='fa fa-indent'>&#xf03c; fa fa-indent</option>
		<option value='fa fa-industry'>&#xf275; fa fa-industry</option>
		<option value='fa fa-info'>&#xf129; fa fa-info</option>
		<option value='fa fa-info-circle'>&#xf05a; fa fa-info-circle</option>
		<option value='fa fa-inr'>&#xf156; fa fa-inr</option>
		<option value='fa fa-instagram'>&#xf16d; fa fa-instagram</option>
		<option value='fa fa-institution'>&#xf19c; fa fa-institution</option>
		<option value='fa fa-internet-explorer'>&#xf26b; fa fa-internet-explorer</option>
		<option value='fa fa-intersex'>&#xf224; fa fa-intersex</option>
		<option value='fa fa-ioxhost'>&#xf208; fa fa-ioxhost</option>
		<option value='fa fa-italic'>&#xf033; fa fa-italic</option>
		<option value='fa fa-joomla'>&#xf1aa; fa fa-joomla</option>
		<option value='fa fa-jpy'>&#xf157; fa fa-jpy</option>
		<option value='fa fa-jsfiddle'>&#xf1cc; fa fa-jsfiddle</option>
		<option value='fa fa-key'>&#xf084; fa fa-key</option>
		<option value='fa fa-keyboard-o'>&#xf11c; fa fa-keyboard-o</option>
		<option value='fa fa-krw'>&#xf159; fa fa-krw</option>
		<option value='fa fa-language'>&#xf1ab; fa fa-language</option>
		<option value='fa fa-laptop'>&#xf109; fa fa-laptop</option>
		<option value='fa fa-lastfm'>&#xf202; fa fa-lastfm</option>
		<option value='fa fa-lastfm-square'>&#xf203; fa fa-lastfm-square</option>
		<option value='fa fa-leaf'>&#xf06c; fa fa-leaf</option>
		<option value='fa fa-leanpub'>&#xf212; fa fa-leanpub</option>
		<option value='fa fa-legal'>&#xf0e3; fa fa-legal</option>
		<option value='fa fa-lemon-o'>&#xf094; fa fa-lemon-o</option>
		<option value='fa fa-level-down'>&#xf149; fa fa-level-down</option>
		<option value='fa fa-level-up'>&#xf148; fa fa-level-up</option>
		<option value='fa fa-life-bouy'>&#xf1cd; fa fa-life-bouy</option>
		<option value='fa fa-life-buoy'>&#xf1cd; fa fa-life-buoy</option>
		<option value='fa fa-life-ring'>&#xf1cd; fa fa-life-ring</option>
		<option value='fa fa-life-saver'>&#xf1cd; fa fa-life-saver</option>
		<option value='fa fa-lightbulb-o'>&#xf0eb; fa fa-lightbulb-o</option>
		<option value='fa fa-line-chart'>&#xf201; fa fa-line-chart</option>
		<option value='fa fa-link'>&#xf0c1; fa fa-link</option>
		<option value='fa fa-linkedin'>&#xf0e1; fa fa-linkedin</option>
		<option value='fa fa-linkedin-square'>&#xf08c; fa fa-linkedin-square</option>
		<option value='fa fa-linode'>&#xf2b8; fa fa-linode</option>
		<option value='fa fa-linux'>&#xf17c; fa fa-linux</option>
		<option value='fa fa-list'>&#xf03a; fa fa-list</option>
		<option value='fa fa-list-alt'>&#xf022; fa fa-list-alt</option>
		<option value='fa fa-list-ol'>&#xf0cb; fa fa-list-ol</option>
		<option value='fa fa-list-ul'>&#xf0ca; fa fa-list-ul</option>
		<option value='fa fa-location-arrow'>&#xf124; fa fa-location-arrow</option>
		<option value='fa fa-lock'>&#xf023; fa fa-lock</option>
		<option value='fa fa-long-arrow-down'>&#xf175; fa fa-long-arrow-down</option>
		<option value='fa fa-long-arrow-left'>&#xf177; fa fa-long-arrow-left</option>
		<option value='fa fa-long-arrow-right'>&#xf178; fa fa-long-arrow-right</option>
		<option value='fa fa-long-arrow-up'>&#xf176; fa fa-long-arrow-up</option>
		<option value='fa fa-low-vision'>&#xf2a8; fa fa-low-vision</option>
		<option value='fa fa-magic'>&#xf0d0; fa fa-magic</option>
		<option value='fa fa-magnet'>&#xf076; fa fa-magnet</option>
		<option value='fa fa-mail-forward'>&#xf064; fa fa-mail-forward</option>
		<option value='fa fa-mail-reply'>&#xf112; fa fa-mail-reply</option>
		<option value='fa fa-mail-reply-all'>&#xf122; fa fa-mail-reply-all</option>
		<option value='fa fa-male'>&#xf183; fa fa-male</option>
		<option value='fa fa-map'>&#xf279; fa fa-map</option>
		<option value='fa fa-map-marker'>&#xf041; fa fa-map-marker</option>
		<option value='fa fa-map-o'>&#xf278; fa fa-map-o</option>
		<option value='fa fa-map-pin'>&#xf276; fa fa-map-pin</option>
		<option value='fa fa-map-signs'>&#xf277; fa fa-map-signs</option>
		<option value='fa fa-mars'>&#xf222; fa fa-mars</option>
		<option value='fa fa-mars-double'>&#xf227; fa fa-mars-double</option>
		<option value='fa fa-mars-stroke'>&#xf229; fa fa-mars-stroke</option>
		<option value='fa fa-mars-stroke-h'>&#xf22b; fa fa-mars-stroke-h</option>
		<option value='fa fa-mars-stroke-v'>&#xf22a; fa fa-mars-stroke-v</option>
		<option value='fa fa-maxcdn'>&#xf136; fa fa-maxcdn</option>
		<option value='fa fa-meanpath'>&#xf20c; fa fa-meanpath</option>
		<option value='fa fa-medium'>&#xf23a; fa fa-medium</option>
		<option value='fa fa-medkit'>&#xf0fa fa; fa fa-medkit</option>
		<option value='fa fa-meetup'>&#xf2e0; fa fa-meetup</option>
		<option value='fa fa-meh-o'>&#xf11a; fa fa-meh-o</option>
		<option value='fa fa-mercury'>&#xf223; fa fa-mercury</option>
		<option value='fa fa-microchip'>&#xf2db; fa fa-microchip</option>
		<option value='fa fa-microphone'>&#xf130; fa fa-microphone</option>
		<option value='fa fa-microphone-slash'>&#xf131; fa fa-microphone-slash</option>
		<option value='fa fa-minus'>&#xf068; fa fa-minus</option>
		<option value='fa fa-minus-circle'>&#xf056; fa fa-minus-circle</option>
		<option value='fa fa-minus-square'>&#xf146; fa fa-minus-square</option>
		<option value='fa fa-minus-square-o'>&#xf147; fa fa-minus-square-o</option>
		<option value='fa fa-mixcloud'>&#xf289; fa fa-mixcloud</option>
		<option value='fa fa-mobile'>&#xf10b; fa fa-mobile</option>
		<option value='fa fa-mobile-phone'>&#xf10b; fa fa-mobile-phone</option>
		<option value='fa fa-modx'>&#xf285; fa fa-modx</option>
		<option value='fa fa-money'>&#xf0d6; fa fa-money</option>
		<option value='fa fa-moon-o'>&#xf186; fa fa-moon-o</option>
		<option value='fa fa-mortar-board'>&#xf19d; fa fa-mortar-board</option>
		<option value='fa fa-motorcycle'>&#xf21c; fa fa-motorcycle</option>
		<option value='fa fa-mouse-pointer'>&#xf245; fa fa-mouse-pointer</option>
		<option value='fa fa-music'>&#xf001; fa fa-music</option>
		<option value='fa fa-navicon'>&#xf0c9; fa fa-navicon</option>
		<option value='fa fa-neuter'>&#xf22c; fa fa-neuter</option>
		<option value='fa fa-newspaper-o'>&#xf1ea; fa fa-newspaper-o</option>
		<option value='fa fa-object-group'>&#xf247; fa fa-object-group</option>
		<option value='fa fa-object-ungroup'>&#xf248; fa fa-object-ungroup</option>
		<option value='fa fa-odnoklassniki'>&#xf263; fa fa-odnoklassniki</option>
		<option value='fa fa-odnoklassniki-square'>&#xf264; fa fa-odnoklassniki-square</option>
		<option value='fa fa-opencart'>&#xf23d; fa fa-opencart</option>
		<option value='fa fa-openid'>&#xf19b; fa fa-openid</option>
		<option value='fa fa-opera'>&#xf26a; fa fa-opera</option>
		<option value='fa fa-optin-monster'>&#xf23c; fa fa-optin-monster</option>
		<option value='fa fa-outdent'>&#xf03b; fa fa-outdent</option>
		<option value='fa fa-pagelines'>&#xf18c; fa fa-pagelines</option>
		<option value='fa fa-paint-brush'>&#xf1fc; fa fa-paint-brush</option>
		<option value='fa fa-paper-plane'>&#xf1d8; fa fa-paper-plane</option>
		<option value='fa fa-paper-plane-o'>&#xf1d9; fa fa-paper-plane-o</option>
		<option value='fa fa-paperclip'>&#xf0c6; fa fa-paperclip</option>
		<option value='fa fa-paragraph'>&#xf1dd; fa fa-paragraph</option>
		<option value='fa fa-paste'>&#xf0ea; fa fa-paste</option>
		<option value='fa fa-pause'>&#xf04c; fa fa-pause</option>
		<option value='fa fa-pause-circle'>&#xf28b; fa fa-pause-circle</option>
		<option value='fa fa-pause-circle-o'>&#xf28c; fa fa-pause-circle-o</option>
		<option value='fa fa-paw'>&#xf1b0; fa fa-paw</option>
		<option value='fa fa-paypal'>&#xf1ed; fa fa-paypal</option>
		<option value='fa fa-pencil'>&#xf040; fa fa-pencil</option>
		<option value='fa fa-pencil-square'>&#xf14b; fa fa-pencil-square</option>
		<option value='fa fa-pencil-square-o'>&#xf044; fa fa-pencil-square-o</option>
		<option value='fa fa-percent'>&#xf295; fa fa-percent</option>
		<option value='fa fa-phone'>&#xf095; fa fa-phone</option>
		<option value='fa fa-phone-square'>&#xf098; fa fa-phone-square</option>
		<option value='fa fa-photo'>&#xf03e; fa fa-photo</option>
		<option value='fa fa-picture-o'>&#xf03e; fa fa-picture-o</option>
		<option value='fa fa-pie-chart'>&#xf200; fa fa-pie-chart</option>
		<option value='fa fa-pied-piper'>&#xf2ae; fa fa-pied-piper</option>
		<option value='fa fa-pied-piper-alt'>&#xf1a8; fa fa-pied-piper-alt</option>
		<option value='fa fa-pied-piper-pp'>&#xf1a7; fa fa-pied-piper-pp</option>
		<option value='fa fa-pinterest'>&#xf0d2; fa fa-pinterest</option>
		<option value='fa fa-pinterest-p'>&#xf231; fa fa-pinterest-p</option>
		<option value='fa fa-pinterest-square'>&#xf0d3; fa fa-pinterest-square</option>
		<option value='fa fa-plane'>&#xf072; fa fa-plane</option>
		<option value='fa fa-play'>&#xf04b; fa fa-play</option>
		<option value='fa fa-play-circle'>&#xf144; fa fa-play-circle</option>
		<option value='fa fa-play-circle-o'>&#xf01d; fa fa-play-circle-o</option>
		<option value='fa fa-plug'>&#xf1e6; fa fa-plug</option>
		<option value='fa fa-plus'>&#xf067; fa fa-plus</option>
		<option value='fa fa-plus-circle'>&#xf055; fa fa-plus-circle</option>
		<option value='fa fa-plus-square'>&#xf0fe; fa fa-plus-square</option>
		<option value='fa fa-plus-square-o'>&#xf196; fa fa-plus-square-o</option>
		<option value='fa fa-podcast'>&#xf2ce; fa fa-podcast</option>
		<option value='fa fa-power-off'>&#xf011; fa fa-power-off</option>
		<option value='fa fa-print'>&#xf02f; fa fa-print</option>
		<option value='fa fa-product-hunt'>&#xf288; fa fa-product-hunt</option>
		<option value='fa fa-puzzle-piece'>&#xf12e; fa fa-puzzle-piece</option>
		<option value='fa fa-qq'>&#xf1d6; fa fa-qq</option>
		<option value='fa fa-qrcode'>&#xf029; fa fa-qrcode</option>
		<option value='fa fa-question'>&#xf128; fa fa-question</option>
		<option value='fa fa-question-circle'>&#xf059; fa fa-question-circle</option>
		<option value='fa fa-question-circle-o'>&#xf29c; fa fa-question-circle-o</option>
		<option value='fa fa-quora'>&#xf2c4; fa fa-quora</option>
		<option value='fa fa-quote-left'>&#xf10d; fa fa-quote-left</option>
		<option value='fa fa-quote-right'>&#xf10e; fa fa-quote-right</option>
		<option value='fa fa-ra'>&#xf1d0; fa fa-ra</option>
		<option value='fa fa-random'>&#xf074; fa fa-random</option>
		<option value='fa fa-ravelry'>&#xf2d9; fa fa-ravelry</option>
		<option value='fa fa-rebel'>&#xf1d0; fa fa-rebel</option>
		<option value='fa fa-recycle'>&#xf1b8; fa fa-recycle</option>
		<option value='fa fa-reddit'>&#xf1a1; fa fa-reddit</option>
		<option value='fa fa-reddit-alien'>&#xf281; fa fa-reddit-alien</option>
		<option value='fa fa-reddit-square'>&#xf1a2; fa fa-reddit-square</option>
		<option value='fa fa-refresh'>&#xf021; fa fa-refresh</option>
		<option value='fa fa-registered'>&#xf25d; fa fa-registered</option>
		<option value='fa fa-remove'>&#xf00d; fa fa-remove</option>
		<option value='fa fa-renren'>&#xf18b; fa fa-renren</option>
		<option value='fa fa-reorder'>&#xf0c9; fa fa-reorder</option>
		<option value='fa fa-repeat'>&#xf01e; fa fa-repeat</option>
		<option value='fa fa-reply'>&#xf112; fa fa-reply</option>
		<option value='fa fa-reply-all'>&#xf122; fa fa-reply-all</option>
		<option value='fa fa-resistance'>&#xf1d0; fa fa-resistance</option>
		<option value='fa fa-retweet'>&#xf079; fa fa-retweet</option>
		<option value='fa fa-rmb'>&#xf157; fa fa-rmb</option>
		<option value='fa fa-road'>&#xf018; fa fa-road</option>
		<option value='fa fa-rocket'>&#xf135; fa fa-rocket</option>
		<option value='fa fa-rotate-left'>&#xf0e2; fa fa-rotate-left</option>
		<option value='fa fa-rotate-right'>&#xf01e; fa fa-rotate-right</option>
		<option value='fa fa-rouble'>&#xf158; fa fa-rouble</option>
		<option value='fa fa-rss'>&#xf09e; fa fa-rss</option>
		<option value='fa fa-rss-square'>&#xf143; fa fa-rss-square</option>
		<option value='fa fa-rub'>&#xf158; fa fa-rub</option>
		<option value='fa fa-ruble'>&#xf158; fa fa-ruble</option>
		<option value='fa fa-rupee'>&#xf156; fa fa-rupee</option>
		<option value='fa fa-s15'>&#xf2cd; fa fa-s15</option>
		<option value='fa fa-safa fari'>&#xf267; fa fa-safa fari</option>
		<option value='fa fa-save'>&#xf0c7; fa fa-save</option>
		<option value='fa fa-scissors'>&#xf0c4; fa fa-scissors</option>
		<option value='fa fa-scribd'>&#xf28a; fa fa-scribd</option>
		<option value='fa fa-search'>&#xf002; fa fa-search</option>
		<option value='fa fa-search-minus'>&#xf010; fa fa-search-minus</option>
		<option value='fa fa-search-plus'>&#xf00e; fa fa-search-plus</option>
		<option value='fa fa-sellsy'>&#xf213; fa fa-sellsy</option>
		<option value='fa fa-send'>&#xf1d8; fa fa-send</option>
		<option value='fa fa-send-o'>&#xf1d9; fa fa-send-o</option>
		<option value='fa fa-server'>&#xf233; fa fa-server</option>
		<option value='fa fa-share'>&#xf064; fa fa-share</option>
		<option value='fa fa-share-alt'>&#xf1e0; fa fa-share-alt</option>
		<option value='fa fa-share-alt-square'>&#xf1e1; fa fa-share-alt-square</option>
		<option value='fa fa-share-square'>&#xf14d; fa fa-share-square</option>
		<option value='fa fa-share-square-o'>&#xf045; fa fa-share-square-o</option>
		<option value='fa fa-shekel'>&#xf20b; fa fa-shekel</option>
		<option value='fa fa-sheqel'>&#xf20b; fa fa-sheqel</option>
		<option value='fa fa-shield'>&#xf132; fa fa-shield</option>
		<option value='fa fa-ship'>&#xf21a; fa fa-ship</option>
		<option value='fa fa-shirtsinbulk'>&#xf214; fa fa-shirtsinbulk</option>
		<option value='fa fa-shopping-bag'>&#xf290; fa fa-shopping-bag</option>
		<option value='fa fa-shopping-basket'>&#xf291; fa fa-shopping-basket</option>
		<option value='fa fa-shopping-cart'>&#xf07a; fa fa-shopping-cart</option>
		<option value='fa fa-shower'>&#xf2cc; fa fa-shower</option>
		<option value='fa fa-sign-in'>&#xf090; fa fa-sign-in</option>
		<option value='fa fa-sign-language'>&#xf2a7; fa fa-sign-language</option>
		<option value='fa fa-sign-out'>&#xf08b; fa fa-sign-out</option>
		<option value='fa fa-signal'>&#xf012; fa fa-signal</option>
		<option value='fa fa-signing'>&#xf2a7; fa fa-signing</option>
		<option value='fa fa-simplybuilt'>&#xf215; fa fa-simplybuilt</option>
		<option value='fa fa-sitemap'>&#xf0e8; fa fa-sitemap</option>
		<option value='fa fa-skyatlas'>&#xf216; fa fa-skyatlas</option>
		<option value='fa fa-skype'>&#xf17e; fa fa-skype</option>
		<option value='fa fa-slack'>&#xf198; fa fa-slack</option>
		<option value='fa fa-sliders'>&#xf1de; fa fa-sliders</option>
		<option value='fa fa-slideshare'>&#xf1e7; fa fa-slideshare</option>
		<option value='fa fa-smile-o'>&#xf118; fa fa-smile-o</option>
		<option value='fa fa-snapchat'>&#xf2ab; fa fa-snapchat</option>
		<option value='fa fa-snapchat-ghost'>&#xf2ac; fa fa-snapchat-ghost</option>
		<option value='fa fa-snapchat-square'>&#xf2ad; fa fa-snapchat-square</option>
		<option value='fa fa-snowflake-o'>&#xf2dc; fa fa-snowflake-o</option>
		<option value='fa fa-soccer-ball-o'>&#xf1e3; fa fa-soccer-ball-o</option>
		<option value='fa fa-sort'>&#xf0dc; fa fa-sort</option>
		<option value='fa fa-sort-alpha-asc'>&#xf15d; fa fa-sort-alpha-asc</option>
		<option value='fa fa-sort-alpha-desc'>&#xf15e; fa fa-sort-alpha-desc</option>
		<option value='fa fa-sort-amount-asc'>&#xf160; fa fa-sort-amount-asc</option>
		<option value='fa fa-sort-amount-desc'>&#xf161; fa fa-sort-amount-desc</option>
		<option value='fa fa-sort-asc'>&#xf0de; fa fa-sort-asc</option>
		<option value='fa fa-sort-desc'>&#xf0dd; fa fa-sort-desc</option>
		<option value='fa fa-sort-down'>&#xf0dd; fa fa-sort-down</option>
		<option value='fa fa-sort-numeric-asc'>&#xf162; fa fa-sort-numeric-asc</option>
		<option value='fa fa-sort-numeric-desc'>&#xf163; fa fa-sort-numeric-desc</option>
		<option value='fa fa-sort-up'>&#xf0de; fa fa-sort-up</option>
		<option value='fa fa-soundcloud'>&#xf1be; fa fa-soundcloud</option>
		<option value='fa fa-space-shuttle'>&#xf197; fa fa-space-shuttle</option>
		<option value='fa fa-spinner'>&#xf110; fa fa-spinner</option>
		<option value='fa fa-spoon'>&#xf1b1; fa fa-spoon</option>
		<option value='fa fa-spotify'>&#xf1bc; fa fa-spotify</option>
		<option value='fa fa-square'>&#xf0c8; fa fa-square</option>
		<option value='fa fa-square-o'>&#xf096; fa fa-square-o</option>
		<option value='fa fa-stack-exchange'>&#xf18d; fa fa-stack-exchange</option>
		<option value='fa fa-stack-overflow'>&#xf16c; fa fa-stack-overflow</option>
		<option value='fa fa-star'>&#xf005; fa fa-star</option>
		<option value='fa fa-star-half'>&#xf089; fa fa-star-half</option>
		<option value='fa fa-star-half-empty'>&#xf123; fa fa-star-half-empty</option>
		<option value='fa fa-star-half-full'>&#xf123; fa fa-star-half-full</option>
		<option value='fa fa-star-half-o'>&#xf123; fa fa-star-half-o</option>
		<option value='fa fa-star-o'>&#xf006; fa fa-star-o</option>
		<option value='fa fa-steam'>&#xf1b6; fa fa-steam</option>
		<option value='fa fa-steam-square'>&#xf1b7; fa fa-steam-square</option>
		<option value='fa fa-step-backward'>&#xf048; fa fa-step-backward</option>
		<option value='fa fa-step-forward'>&#xf051; fa fa-step-forward</option>
		<option value='fa fa-stethoscope'>&#xf0f1; fa fa-stethoscope</option>
		<option value='fa fa-sticky-note'>&#xf249; fa fa-sticky-note</option>
		<option value='fa fa-sticky-note-o'>&#xf24a; fa fa-sticky-note-o</option>
		<option value='fa fa-stop'>&#xf04d; fa fa-stop</option>
		<option value='fa fa-stop-circle'>&#xf28d; fa fa-stop-circle</option>
		<option value='fa fa-stop-circle-o'>&#xf28e; fa fa-stop-circle-o</option>
		<option value='fa fa-street-view'>&#xf21d; fa fa-street-view</option>
		<option value='fa fa-strikethrough'>&#xf0cc; fa fa-strikethrough</option>
		<option value='fa fa-stumbleupon'>&#xf1a4; fa fa-stumbleupon</option>
		<option value='fa fa-stumbleupon-circle'>&#xf1a3; fa fa-stumbleupon-circle</option>
		<option value='fa fa-subscript'>&#xf12c; fa fa-subscript</option>
		<option value='fa fa-subway'>&#xf239; fa fa-subway</option>
		<option value='fa fa-suitcase'>&#xf0f2; fa fa-suitcase</option>
		<option value='fa fa-sun-o'>&#xf185; fa fa-sun-o</option>
		<option value='fa fa-superpowers'>&#xf2dd; fa fa-superpowers</option>
		<option value='fa fa-superscript'>&#xf12b; fa fa-superscript</option>
		<option value='fa fa-support'>&#xf1cd; fa fa-support</option>
		<option value='fa fa-table'>&#xf0ce; fa fa-table</option>
		<option value='fa fa-tablet'>&#xf10a; fa fa-tablet</option>
		<option value='fa fa-tachometer'>&#xf0e4; fa fa-tachometer</option>
		<option value='fa fa-tag'>&#xf02b; fa fa-tag</option>
		<option value='fa fa-tags'>&#xf02c; fa fa-tags</option>
		<option value='fa fa-tasks'>&#xf0ae; fa fa-tasks</option>
		<option value='fa fa-taxi'>&#xf1ba; fa fa-taxi</option>
		<option value='fa fa-telegram'>&#xf2c6; fa fa-telegram</option>
		<option value='fa fa-television'>&#xf26c; fa fa-television</option>
		<option value='fa fa-tencent-weibo'>&#xf1d5; fa fa-tencent-weibo</option>
		<option value='fa fa-terminal'>&#xf120; fa fa-terminal</option>
		<option value='fa fa-text-height'>&#xf034; fa fa-text-height</option>
		<option value='fa fa-text-width'>&#xf035; fa fa-text-width</option>
		<option value='fa fa-th'>&#xf00a; fa fa-th</option>
		<option value='fa fa-th-large'>&#xf009; fa fa-th-large</option>
		<option value='fa fa-th-list'>&#xf00b; fa fa-th-list</option>
		<option value='fa fa-themeisle'>&#xf2b2; fa fa-themeisle</option>
		<option value='fa fa-thermometer'>&#xf2c7; fa fa-thermometer</option>
		<option value='fa fa-thermometer-0'>&#xf2cb; fa fa-thermometer-0</option>
		<option value='fa fa-thermometer-1'>&#xf2ca; fa fa-thermometer-1</option>
		<option value='fa fa-thermometer-2'>&#xf2c9; fa fa-thermometer-2</option>
		<option value='fa fa-thermometer-3'>&#xf2c8; fa fa-thermometer-3</option>
		<option value='fa fa-thermometer-4'>&#xf2c7; fa fa-thermometer-4</option>
		<option value='fa fa-thermometer-empty'>&#xf2cb; fa fa-thermometer-empty</option>
		<option value='fa fa-thermometer-full'>&#xf2c7; fa fa-thermometer-full</option>
		<option value='fa fa-thermometer-half'>&#xf2c9; fa fa-thermometer-half</option>
		<option value='fa fa-thermometer-quarter'>&#xf2ca; fa fa-thermometer-quarter</option>
		<option value='fa fa-thermometer-three-quarters'>&#xf2c8; fa fa-thermometer-three-quarters</option>
		<option value='fa fa-thumb-tack'>&#xf08d; fa fa-thumb-tack</option>
		<option value='fa fa-thumbs-down'>&#xf165; fa fa-thumbs-down</option>
		<option value='fa fa-thumbs-o-down'>&#xf088; fa fa-thumbs-o-down</option>
		<option value='fa fa-thumbs-o-up'>&#xf087; fa fa-thumbs-o-up</option>
		<option value='fa fa-thumbs-up'>&#xf164; fa fa-thumbs-up</option>
		<option value='fa fa-ticket'>&#xf145; fa fa-ticket</option>
		<option value='fa fa-times'>&#xf00d; fa fa-times</option>
		<option value='fa fa-times-circle'>&#xf057; fa fa-times-circle</option>
		<option value='fa fa-times-circle-o'>&#xf05c; fa fa-times-circle-o</option>
		<option value='fa fa-times-rectangle'>&#xf2d3; fa fa-times-rectangle</option>
		<option value='fa fa-times-rectangle-o'>&#xf2d4; fa fa-times-rectangle-o</option>
		<option value='fa fa-tint'>&#xf043; fa fa-tint</option>
		<option value='fa fa-toggle-down'>&#xf150; fa fa-toggle-down</option>
		<option value='fa fa-toggle-left'>&#xf191; fa fa-toggle-left</option>
		<option value='fa fa-toggle-off'>&#xf204; fa fa-toggle-off</option>
		<option value='fa fa-toggle-on'>&#xf205; fa fa-toggle-on</option>
		<option value='fa fa-toggle-right'>&#xf152; fa fa-toggle-right</option>
		<option value='fa fa-toggle-up'>&#xf151; fa fa-toggle-up</option>
		<option value='fa fa-trademark'>&#xf25c; fa fa-trademark</option>
		<option value='fa fa-train'>&#xf238; fa fa-train</option>
		<option value='fa fa-transgender'>&#xf224; fa fa-transgender</option>
		<option value='fa fa-transgender-alt'>&#xf225; fa fa-transgender-alt</option>
		<option value='fa fa-trash'>&#xf1f8; fa fa-trash</option>
		<option value='fa fa-trash-o'>&#xf014; fa fa-trash-o</option>
		<option value='fa fa-tree'>&#xf1bb; fa fa-tree</option>
		<option value='fa fa-trello'>&#xf181; fa fa-trello</option>
		<option value='fa fa-tripadvisor'>&#xf262; fa fa-tripadvisor</option>
		<option value='fa fa-trophy'>&#xf091; fa fa-trophy</option>
		<option value='fa fa-truck'>&#xf0d1; fa fa-truck</option>
		<option value='fa fa-try'>&#xf195; fa fa-try</option>
		<option value='fa fa-tty'>&#xf1e4; fa fa-tty</option>
		<option value='fa fa-tumblr'>&#xf173; fa fa-tumblr</option>
		<option value='fa fa-tumblr-square'>&#xf174; fa fa-tumblr-square</option>
		<option value='fa fa-turkish-lira'>&#xf195; fa fa-turkish-lira</option>
		<option value='fa fa-tv'>&#xf26c; fa fa-tv</option>
		<option value='fa fa-twitch'>&#xf1e8; fa fa-twitch</option>
		<option value='fa fa-twitter'>&#xf099; fa fa-twitter</option>
		<option value='fa fa-twitter-square'>&#xf081; fa fa-twitter-square</option>
		<option value='fa fa-umbrella'>&#xf0e9; fa fa-umbrella</option>
		<option value='fa fa-underline'>&#xf0cd; fa fa-underline</option>
		<option value='fa fa-undo'>&#xf0e2; fa fa-undo</option>
		<option value='fa fa-universal-access'>&#xf29a; fa fa-universal-access</option>
		<option value='fa fa-university'>&#xf19c; fa fa-university</option>
		<option value='fa fa-unlink'>&#xf127; fa fa-unlink</option>
		<option value='fa fa-unlock'>&#xf09c; fa fa-unlock</option>
		<option value='fa fa-unlock-alt'>&#xf13e; fa fa-unlock-alt</option>
		<option value='fa fa-unsorted'>&#xf0dc; fa fa-unsorted</option>
		<option value='fa fa-upload'>&#xf093; fa fa-upload</option>
		<option value='fa fa-usb'>&#xf287; fa fa-usb</option>
		<option value='fa fa-usd'>&#xf155; fa fa-usd</option>
		<option value='fa fa-user'>&#xf007; fa fa-user</option>
		<option value='fa fa-user-circle'>&#xf2bd; fa fa-user-circle</option>
		<option value='fa fa-user-circle-o'>&#xf2be; fa fa-user-circle-o</option>
		<option value='fa fa-user-md'>&#xf0f0; fa fa-user-md</option>
		<option value='fa fa-user-o'>&#xf2c0; fa fa-user-o</option>
		<option value='fa fa-user-plus'>&#xf234; fa fa-user-plus</option>
		<option value='fa fa-user-secret'>&#xf21b; fa fa-user-secret</option>
		<option value='fa fa-user-times'>&#xf235; fa fa-user-times</option>
		<option value='fa fa-users'>&#xf0c0; fa fa-users</option>
		<option value='fa fa-vcard'>&#xf2bb; fa fa-vcard</option>
		<option value='fa fa-vcard-o'>&#xf2bc; fa fa-vcard-o</option>
		<option value='fa fa-venus'>&#xf221; fa fa-venus</option>
		<option value='fa fa-venus-double'>&#xf226; fa fa-venus-double</option>
		<option value='fa fa-venus-mars'>&#xf228; fa fa-venus-mars</option>
		<option value='fa fa-viacoin'>&#xf237; fa fa-viacoin</option>
		<option value='fa fa-viadeo'>&#xf2a9; fa fa-viadeo</option>
		<option value='fa fa-viadeo-square'>&#xf2aa; fa fa-viadeo-square</option>
		<option value='fa fa-video-camera'>&#xf03d; fa fa-video-camera</option>
		<option value='fa fa-vimeo'>&#xf27d; fa fa-vimeo</option>
		<option value='fa fa-vimeo-square'>&#xf194; fa fa-vimeo-square</option>
		<option value='fa fa-vine'>&#xf1ca; fa fa-vine</option>
		<option value='fa fa-vk'>&#xf189; fa fa-vk</option>
		<option value='fa fa-volume-control-phone'>&#xf2a0; fa fa-volume-control-phone</option>
		<option value='fa fa-volume-down'>&#xf027; fa fa-volume-down</option>
		<option value='fa fa-volume-off'>&#xf026; fa fa-volume-off</option>
		<option value='fa fa-volume-up'>&#xf028; fa fa-volume-up</option>
		<option value='fa fa-warning'>&#xf071; fa fa-warning</option>
		<option value='fa fa-wechat'>&#xf1d7; fa fa-wechat</option>
		<option value='fa fa-weibo'>&#xf18a; fa fa-weibo</option>
		<option value='fa fa-weixin'>&#xf1d7; fa fa-weixin</option>
		<option value='fa fa-whatsapp'>&#xf232; fa fa-whatsapp</option>
		<option value='fa fa-wheelchair'>&#xf193; fa fa-wheelchair</option>
		<option value='fa fa-wheelchair-alt'>&#xf29b; fa fa-wheelchair-alt</option>
		<option value='fa fa-wifi'>&#xf1eb; fa fa-wifi</option>
		<option value='fa fa-wikipedia-w'>&#xf266; fa fa-wikipedia-w</option>
		<option value='fa fa-window-close'>&#xf2d3; fa fa-window-close</option>
		<option value='fa fa-window-close-o'>&#xf2d4; fa fa-window-close-o</option>
		<option value='fa fa-window-maximize'>&#xf2d0; fa fa-window-maximize</option>
		<option value='fa fa-window-minimize'>&#xf2d1; fa fa-window-minimize</option>
		<option value='fa fa-window-restore'>&#xf2d2; fa fa-window-restore</option>
		<option value='fa fa-windows'>&#xf17a; fa fa-windows</option>
		<option value='fa fa-won'>&#xf159; fa fa-won</option>
		<option value='fa fa-wordpress'>&#xf19a; fa fa-wordpress</option>
		<option value='fa fa-wpbeginner'>&#xf297; fa fa-wpbeginner</option>
		<option value='fa fa-wpexplorer'>&#xf2de; fa fa-wpexplorer</option>
		<option value='fa fa-wpforms'>&#xf298; fa fa-wpforms</option>
		<option value='fa fa-wrench'>&#xf0ad; fa fa-wrench</option>
		<option value='fa fa-xing'>&#xf168; fa fa-xing</option>
		<option value='fa fa-xing-square'>&#xf169; fa fa-xing-square</option>
		<option value='fa fa-y-combinator'>&#xf23b; fa fa-y-combinator</option>
		<option value='fa fa-y-combinator-square'>&#xf1d4; fa fa-y-combinator-square</option>
		<option value='fa fa-yahoo'>&#xf19e; fa fa-yahoo</option>
		<option value='fa fa-yc'>&#xf23b; fa fa-yc</option>
		<option value='fa fa-yc-square'>&#xf1d4; fa fa-yc-square</option>
		<option value='fa fa-yelp'>&#xf1e9; fa fa-yelp</option>
		<option value='fa fa-yen'>&#xf157; fa fa-yen</option>
		<option value='fa fa-yoast'>&#xf2b1; fa fa-yoast</option>
		<option value='fa fa-youtube'>&#xf167; fa fa-youtube</option>
		<option value='fa fa-youtube-play'>&#xf16a; fa fa-youtube-play</option>
		<option value='fa fa-youtube-square'>&#xf166; fa fa-youtube-square</option>
</select>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
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
</div>
 </div>

 <?php $i = 1;
        foreach ($subMenu as $p) : $i++; ?>
         <div class="row">
             <div class="modal fade" id="edit<?= $p['id']; ?>" role="dialog">
                 <div class="modal-dialog">
                     <form action="<?= base_url('owner/editsub'); ?>" method="post">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title">Edit submenu</h5>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                             </div>
                             <div class="modal-body">

                                 <input type="hidden" value="<?= $p['id']; ?>" name="id">
                                 <div class="form-group row">
                                     <b><label class='col'>Submenu title</label></b><br>
                                     <input type="text" name="title" autocomplete="off" value="<?= $p['title']; ?>" required placeholder="Masukkan title" class="form-control"></div>
                                 <div class="form-group row">
                                     <b><label class='col'>Menu</label></b><br>
												<select name="menu_id" id="menu_id" class="form-control">
										<option selected> <?= $p['menu']; ?></option>
										<option value="">Pilih menu</option>
										<?php foreach ($menu as $m) : ?>
											<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
										<?php endforeach; ?>
									</select></div>
                                 <div class="form-group row">
                                     <b><label class='col'>Url</label></b><br>
                                     <input type="text" name="url" autocomplete="off" value="<?= $p['url']; ?>" required placeholder="Masukkan url" class="form-control"></div>
                                 <div class="form-group row">
                                     <b><label class='col'>Icon</label></b><br>
									 <input type="text" name="icon" readonly autocomplete="off" value="<?= $p['icon']; ?>" class="form-control"></div>
									 <div class="form-group row">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
										<label class="form-check-label" for="is_active">
											Active?
										</label>
									</div>
								</div>
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

     </div>