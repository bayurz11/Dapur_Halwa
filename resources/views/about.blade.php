 @section('title', 'Dapur Halwa | Tentang Kami')
 <?php $page = 'Tentang Kami'; ?>

 @extends('partials.main')

 @section('content')

     <!-- About section start -->
     <section class="about section--nopb">
         <div class="container">
             <div class="about_main d-lg-flex justify-content-between">
                 <div class="about_main-content col-lg-6 col-xl-auto">
                     <h2 class="about_main-content_header">
                         Our knowledgeable team can help you design experiences tailored to your needs by accessing one of
                         the flower
                         selections
                     </h2>
                     <p class="about_main-content_text">
                         Elementum eu facilisis sed odio morbi quis commodo odio. Mauris rhoncus aenean vel elit scelerisque
                         mauris
                         pellentesque. Accumsan sit amet nulla facilisi morbi tempus. Suscipit tellus mauris a diam maecenas
                         sed enim
                         ut sem. Turpis egestas maecenas pharetra convallis posuere
                     </p>
                 </div>
                 <div class="about_main-media">
                     <picture>
                         <source data-srcset="{{ asset('assets_fe/img/placeholder.jpg') }}"
                             srcset="{{ asset('assets_fe/img/placeholder.jpg') }}" type="image/webp" />
                         <img class="lazy" data-src="{{ asset('assets_fe/img/placeholder.jpg') }}"
                             src="{{ asset('assets_fe/img/placeholder.jpg') }}" alt="media" />
                     </picture>
                 </div>
             </div>
             <ul class="about_numbers d-flex flex-wrap">
                 <li class="about_numbers-group col-sm-6 col-lg-3" data-order="1">
                     <div class="wrapper d-flex flex-column align-items-center align-items-sm-start">
                         <span class="countNum number d-flex align-items-center secondary" data-suffix="+"
                             data-value="180">0</span>
                         <p class="number-label">New products to explore. Arcu vitae elementum curabitur vitae nunc sed</p>
                     </div>
                 </li>
                 <li class="about_numbers-group col-sm-6 col-lg-3" data-order="2">
                     <div class="wrapper d-flex flex-column align-items-center align-items-sm-start">
                         <span class="countNum number d-flex align-items-center secondary" data-suffix="X"
                             data-value="3">0</span>
                         <p class="number-label">Quis risus sed vulputate odio ut. Arcu vitae elementum curabitur vitae nunc
                         </p>
                     </div>
                 </li>
                 <li class="about_numbers-group col-sm-6 col-lg-3" data-order="3">
                     <div class="wrapper d-flex flex-column align-items-center align-items-sm-start">
                         <span class="countNum number d-flex align-items-center secondary" data-suffix="%"
                             data-value="100">0</span>
                         <p class="number-label">Mauris a diam maecenas sed enim ut sem curabitur vitae nunc sed</p>
                     </div>
                 </li>
                 <li class="about_numbers-group col-sm-6 col-lg-3" data-order="4">
                     <div class="wrapper d-flex flex-column align-items-center align-items-sm-start">
                         <span class="countNum number d-flex align-items-center secondary" data-suffix="K"
                             data-value="11">0</span>
                         <p class="number-label">Quis risus sed vulputate odio ut. Arcu vitae elementum curabitur vitae nunc
                         </p>
                     </div>
                 </li>
             </ul>
         </div>
     </section>
     <!-- About section end -->
     <!-- Latest posts section start -->
     <section class="latest section">
         <div class="container">
             <h2 class="latest_header">Latest Posts</h2>
             <ul class="latest_posts d-md-flex flex-wrap">
                 <li class="latest_posts-post col-md-6 col-xl-4" data-order="1" data-aos="fade-up">
                     <div class="latest_posts-post_wrapper">
                         <div class="media">
                             <picture>
                                 <source data-srcset="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                     srcset="{{ asset('assets_fe/img/placeholder.jpg') }}" type="image/webp" />
                                 <img class="lazy" data-src="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                     src="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                     alt="What Are The Different Types Of Cannabis Products?" />
                             </picture>
                         </div>
                         <div class="metadata d-flex">
                             <span class="metadata_item d-flex align-items-center">
                                 <i class="icon-calendar secondary icon"></i>
                                 September 30, 2021
                             </span>
                             <span class="metadata_item d-flex align-items-center">
                                 <i class="icon-comments secondary icon"></i>
                                 <span class="metadata_item-text">No Comments</span>
                                 <span class="metadata_item-number">0</span>
                             </span>
                         </div>
                         <div class="main">
                             <a class="title" href="post.html" target="_blank" rel="noopener norefferer">What Are The
                                 Different Types Of Cannabis Products?</a>
                             <p class="preview">Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus</p>
                         </div>
                     </div>
                 </li>
                 <li class="latest_posts-post col-md-6 col-xl-4" data-order="2" data-aos="fade-up">
                     <div class="latest_posts-post_wrapper">
                         <div class="media">
                             <picture>
                                 <source data-srcset="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                     srcset="{{ asset('assets_fe/img/placeholder.jpg') }}" type="image/webp" />
                                 <img class="lazy" data-src="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                     src="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                     alt="Get the Best Out of Your Cannabis Experience" />
                             </picture>
                         </div>
                         <div class="metadata d-flex">
                             <span class="metadata_item d-flex align-items-center">
                                 <i class="icon-calendar secondary icon"></i>
                                 September 30, 2021
                             </span>
                             <span class="metadata_item d-flex align-items-center">
                                 <i class="icon-comments secondary icon"></i>
                                 <span class="metadata_item-text">No Comments</span>
                                 <span class="metadata_item-number">0</span>
                             </span>
                         </div>
                         <div class="main">
                             <a class="title" href="post.html" target="_blank" rel="noopener norefferer">Get the Best Out
                                 of Your Cannabis Experience</a>
                             <p class="preview">Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus</p>
                         </div>
                     </div>
                 </li>
                 <li class="latest_posts-post col-md-6 col-xl-4" data-order="3" data-aos="fade-up">
                     <div class="latest_posts-post_wrapper">
                         <div class="media">
                             <picture>
                                 <source data-srcset="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                     srcset="{{ asset('assets_fe/img/placeholder.jpg') }}" type="image/webp" />
                                 <img class="lazy" data-src="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                     src="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                     alt="Factors in Choosing Cannabis Products" />
                             </picture>
                         </div>
                         <div class="metadata d-flex">
                             <span class="metadata_item d-flex align-items-center">
                                 <i class="icon-calendar secondary icon"></i>
                                 September 30, 2021
                             </span>
                             <span class="metadata_item d-flex align-items-center">
                                 <i class="icon-comments secondary icon"></i>
                                 <span class="metadata_item-text">No Comments</span>
                                 <span class="metadata_item-number">0</span>
                             </span>
                         </div>
                         <div class="main">
                             <a class="title" href="post.html" target="_blank" rel="noopener norefferer">Factors in
                                 Choosing Cannabis Products</a>
                             <p class="preview">Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus</p>
                         </div>
                     </div>
                 </li>
             </ul>
         </div>
     </section>
     <!-- Latest posts section end -->
     <!-- Instagram section start -->
     <section class="instagram section--nopt">
         <div class="container">
             <div class="instagram_header">
                 <h2 class="instagram_header-title">Follow Us on Instagram</h2>
                 <p class="instagram_header-text">
                     Accumsan sit amet nulla facilisi morbi tempus. Suscipit tellus mauris a diam maecenas sed enim ut sem
                 </p>
             </div>
         </div>
         <div class="instagram_slider swiper">
             <div class="swiper-wrapper">
                 <div class="instagram_slider-slide swiper-slide">
                     <a class="link" href="https://instagram.com" target="_blank" rel="noopener norefferer">
                         <picture>
                             <source data-srcset="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                 srcset="{{ asset('assets_fe/img/placeholder.jpg') }}" type="image/webp" />
                             <img class="lazy" data-src="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                 src="{{ asset('assets_fe/img/placeholder.jpg') }}" alt="instagram post" />
                         </picture>
                         <span class="overlay d-flex justify-content-center align-items-center">
                             <i class="icon-instagram"></i>
                         </span>
                     </a>
                 </div>
                 <div class="instagram_slider-slide swiper-slide">
                     <a class="link" href="https://instagram.com" target="_blank" rel="noopener norefferer">
                         <picture>
                             <source data-srcset="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                 srcset="{{ asset('assets_fe/img/placeholder.jpg') }}" type="image/webp" />
                             <img class="lazy" data-src="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                 src="{{ asset('assets_fe/img/placeholder.jpg') }}" alt="instagram post" />
                         </picture>
                         <span class="overlay d-flex justify-content-center align-items-center">
                             <i class="icon-instagram"></i>
                         </span>
                     </a>
                 </div>
                 <div class="instagram_slider-slide swiper-slide">
                     <a class="link" href="https://instagram.com" target="_blank" rel="noopener norefferer">
                         <picture>
                             <source data-srcset="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                 srcset="{{ asset('assets_fe/img/placeholder.jpg') }}" type="image/webp" />
                             <img class="lazy" data-src="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                 src="{{ asset('assets_fe/img/placeholder.jpg') }}" alt="instagram post" />
                         </picture>
                         <span class="overlay d-flex justify-content-center align-items-center">
                             <i class="icon-instagram"></i>
                         </span>
                     </a>
                 </div>
                 <div class="instagram_slider-slide swiper-slide">
                     <a class="link" href="https://instagram.com" target="_blank" rel="noopener norefferer">
                         <picture>
                             <source data-srcset="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                 srcset="{{ asset('assets_fe/img/placeholder.jpg') }}" type="image/webp" />
                             <img class="lazy" data-src="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                 src="{{ asset('assets_fe/img/placeholder.jpg') }}" alt="instagram post" />
                         </picture>
                         <span class="overlay d-flex justify-content-center align-items-center">
                             <i class="icon-instagram"></i>
                         </span>
                     </a>
                 </div>
                 <div class="instagram_slider-slide swiper-slide">
                     <a class="link" href="https://instagram.com" target="_blank" rel="noopener norefferer">
                         <picture>
                             <source data-srcset="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                 srcset="{{ asset('assets_fe/img/placeholder.jpg') }}" type="image/webp" />
                             <img class="lazy" data-src="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                 src="{{ asset('assets_fe/img/placeholder.jpg') }}" alt="instagram post" />
                         </picture>
                         <span class="overlay d-flex justify-content-center align-items-center">
                             <i class="icon-instagram"></i>
                         </span>
                     </a>
                 </div>
             </div>
         </div>
     </section>
     <!-- Instagram section end -->

 @endsection
