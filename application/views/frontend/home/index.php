 <!--==========================
    Intro Section
  ============================-->
  <?= $this->session->flashdata('message'); ?>

 <section id="intro">

     <div class="intro-content">
         <h2>Bunga <span>Laundry</span><br>pesan sekarang!</h2>
         <div>
             <a href="<?= base_url('home/pesan'); ?>" class="btn-projects scrollto">PESAN</a>
         </div>
     </div>

     <div id="intro-carousel" class="owl-carousel">
         <div class="item" style="background-image: url('<?= base_url('assets/frontend/') ?>img/intro-carousel/1.jpg');"></div>
     </div>

 </section><!-- #intro -->

 <main id="main">

     <!--==========================
      Services Section
    ============================-->
     <section id="services">
         <div class="container">
             <div class="section-header">
                 <h2>Services</h2>
             </div>

             <div class="row">

                 <div class="col-lg-6">
                     <div class="box wow fadeInLeft">
                         <div class="icon"><i class="fa fa-motorcycle"></i></div>
                         <h4 class="title"><a href="">ANTAR & JEMPUT</a></h4>
                         <p class="description">Gratis jemput dan antar laundry di depan pintu anda.</p>
                     </div>
                 </div>

                 <div class="col-lg-6">
                     <div class="box wow fadeInRight">
                         <div class="icon"><i class="fa fa-money"></i></div>
                         <h4 class="title"><a href="">HARGA TERJANGKAU</a></h4>
                         <p class="description">Dimulai dari harga Rp.4000, dan banyak lagi.</p>
                     </div>
                 </div>

                 <div class="col-lg-6">
                     <div class="box wow fadeInLeft" data-wow-delay="0.2s">
                         <div class="icon"><i class="fa fa-clock-o"></i></div>
                         <h4 class="title"><a href="">JADWAL FLEKSIBEL</a></h4>
                         <p class="description">Pilih jadwal pesanan sesuka hati anda.</p>
                     </div>
                 </div>

                 <div class="col-lg-6">
                     <div class="box wow fadeInRight" data-wow-delay="0.2s">
                         <div class="icon"><i class="fa fa-certificate"></i></div>
                         <h4 class="title"><a href="">KUALITAS TERBAIK</a></h4>
                         <p class="description">Kami melakukan pengantaran yang terbaik.</p>
                     </div>
                 </div>

             </div>

         </div>
     </section><!-- #services -->

     <!--==========================
      Contact Section
    ============================-->
     <section id="contact" class="wow fadeInUp">
         <div class="container">
             <div class="section-header">
                 <h2>Contact Us</h2>
                 <p>Bunga Laundry.</p>
             </div>

             <div class="row contact-info">

                 <div class="col-md-4">
                     <div class="contact-address">
                         <i class="ion-ios-location-outline"></i>
                         <h3>Alamat</h3>
                         <address>Sleman, YOG</address>
                     </div>
                 </div>

                 <div class="col-md-4">
                     <div class="contact-phone">
                         <i class="ion-ios-telephone-outline"></i>
                         <h3>Nomor Telp</h3>
                         <p><a href="tel:+155895548855">+62 888 111 222</a></p>
                     </div>
                 </div>

                 <div class="col-md-4">
                     <div class="contact-email">
                         <i class="ion-ios-email-outline"></i>
                         <h3>Email</h3>
                         <p><a href="mailto:info@example.com">bungalaundry@gmail.com</a></p>
                     </div>
                 </div>

             </div>
         </div>
     </section><!-- #contact -->

 </main>