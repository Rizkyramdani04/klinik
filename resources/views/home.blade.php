@extends('layouts.main')

@include('partials.navbar')
@section('container')
   <!--Header-->
   <section class="jumbotron jumbotron-fluid background-header">
    <div class="container-fluid text-center">
         <h1 class="display-4" style="font-weight: 375; color:rgb(22, 8, 221); ">Selamat datang di Klinik Kecantikan</h1>
         <p class="lead" style="font-weight: bold;color:rgb(22, 8, 221);">Kami siap memberikan Anda perawatan kecantikan terbaik.</p>
         <a href="#" class="btn button-primer btn-lg" role="button">Gabung Sekarang</a>
         <a href="#" class="btn btn-secondary btn-lg" role="button">Pelajari dulu</a>
     </div>
    </section>

    <div class="b-example-divider"></div>

   <!--Layanan-->
   <section id="layanan" class="container">
    <div class="row text-center">
       <div class="col-12 pb-6">
          <h2 class="display-4 text-center mb-5" style="margin-top: 4rem!important;" >Layanan Kami</h2>
       </div>
        <!--Produk Pertama -->
       <div class="col-md-4 mb-4">
         <div class="card">
          <img class="card-img-top" style="max-height:400px" src="../assets/img/treatmentwajah.jpg" alt ="Product 1">
          <div class="card-body" style="min-height:250px">
            <h4 class="card-title">Treatment Wajah</h4>
            <p class="card-text">Jenisnya adalah facial rejuvenation. Ini adalah teknik peremajaan kulit wajah dengan prosedur non bedah menggunakan teknologi modern berbasis cahaya. Treatment ini bermanfaat untuk membantu proses regenerasi sel kulit agar lebih optimal.</p>

         </div>
       </div>
      </div>

      <!--Produk Kedua -->
      <div class="col-md-4 mb-4">
         <div class="card">
           <img class="card-img-top" style="max-height:400px" src="../assets/img/Tanam-Benang.jpg" alt ="Product 1">
           <div class="card-body" style="min-height:250px">
             <h4 class="card-title">Tanam Benang</h4>
              <p class="card-text">Tanam benang memang bisa membantu meremajakan dan mengencangkan kulit wajah dengan harga lebih murah dibandingkan operasi plastik, namun efeknya hanya bersifat sementara.</p>
          </div>
         </div>
     </div>
     <!--Produk Ketiga -->
    <div class="col-md-4 mb-4">
      <div class="card">
        <img class="card-img-top" style="max-height:400px" src="../assets/img/whitening.jpg" alt ="Product 1">
        <div class="card-body" style="min-height:250px">
           <h4 class="card-title">Suntik Whitening</h4>
           <p class="card-text">Suntik Whitening adalah perawatan yang bertujuan untuk mencerahkan kulit. Vitamin C bermanfaat untuk mencegah kerusakan sel, merangsang kolagen, penyembuhan luka, serta memberikan efek cerah dan kenyal pada beberapa bagian kulit, terutama wajah.</p>
         </div>
       </div>
     </div>
   </div>
 </section>
    <div class="b-example-divider"></div>

   <!--Contact-->
   <section id="kontak" class="container-fluid text-center" style="background-color: #e9f2eb; padding-top: 25px;">
    <h2 class="display-4 pb-4">Hubungi Kami Sekarang!</h2>
    <p class="lead pb-3">Kirim pesan untuk bergabung bersama kami.</p>
    <a href="#" class="btn button-primer btn-lg mb-4">WhatsApp Kami</a>
</section>
   <!--Footer-->
   <footer>
   ...
   </footer>
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->

@endsection
