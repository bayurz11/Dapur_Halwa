  @section('title', 'Dapur Halwa | Produk Detail')
  <?php $page = 'Beranda'; ?>

  @extends('partials.main')

  @section('content')

      <!-- Single product content start -->
      <main>

          <section class="about section--nopb text-center text-lg-start">
              <div class="container">
                  <!-- Product main -->
                  <div
                      class="about_main d-lg-flex flex-nowrap flex-column flex-lg-row align-items-center align-items-lg-start justify-content-center">
                      <div class="about_main-slider">
                          <div class="about_main-slider--single" data-modal="false" data-aos="fade-right" data-aos-delay="100">
                              <div class="swiper-wrapper">
                                  <div class="swiper-slide">
                                      <a href="{{ asset('storage/' . $product->foto_utama) }}" data-role="gallery">
                                          <picture>
                                              <source data-srcset="{{ asset('storage/' . $product->foto_utama) }}"
                                                  srcset="{{ asset('storage/' . $product->foto_utama) }}"
                                                  type="image/webp" />
                                              <img class="lazy" data-src="{{ asset('storage/' . $product->foto_utama) }}"
                                                  src="{{ asset('storage/' . $product->foto_utama) }}" alt="media" />
                                          </picture>
                                      </a>
                                  </div>

                              </div>
                              <div class="swiper-controls d-flex align-items-center justify-content-between">
                                  <a class="swiper-button-prev d-inline-flex align-items-center justify-content-center"
                                      href="#">
                                      <i class="icon-caret_left icon"></i>
                                  </a>
                                  <a class="swiper-button-next d-inline-flex align-items-center justify-content-center"
                                      href="#">
                                      <i class="icon-caret_right icon"></i>
                                  </a>
                              </div>
                          </div>
                          <div class="about_main-slider--thumbs" style="display: flex; gap: 10px; margin-top: 10px;"
                              data-aos="fade-up" data-aos-delay="100">
                              {{-- Gambar lainnya --}}
                              @php
                                  $fotoLainnya = $product->foto_lainnya
                                      ? json_decode($product->foto_lainnya, true)
                                      : [];
                              @endphp
                              @foreach ($fotoLainnya as $foto)
                                  <div class="swiper-slide"
                                      style="width: 100px; height: 100px; border-radius: 6px; overflow: hidden;">
                                      <picture>
                                          <img src="{{ asset('storage/' . $foto) }}" alt="{{ $product->nama_produk }}"
                                              style="width: 100%; height: 100%; object-fit: cover;" />
                                      </picture>
                                  </div>
                              @endforeach
                          </div>
                      </div>
                      <div class="about_main-info" data-aos="fade-left" data-aos-delay="100">
                          <div class="about_main-info_product d-sm-flex align-items-center justify-content-between">
                              <h2 class="title">{{ $product->nama_produk }}</h2>

                          </div>
                          <div class="about_main-info_rating d-flex align-items-center">
                              <ul class="stars d-flex align-items-center accent">
                                  @for ($i = 0; $i < 5; $i++)
                                      <li class="stars_star" style="margin-right: 5px;">
                                          <i class="{{ $i < $product->rating ? 'icon-star_fill' : 'icon-star' }}"></i>
                                      </li>
                                  @endfor
                              </ul>
                              <a class="ingredients-amount" href="#ingredients">(2 customer ingredients)</a>
                          </div>
                          <p class="about_main-info_description">
                              {{ $product->deskripsi }}
                          </p>
                          <span class="about_main-info_price">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                          <div class="about_main-info_buy d-flex align-items-center">
                              <a class="btn" href="#">Add to Cart</a>
                          </div>
                          {{-- <ul class="about_main-info_list">
                              <li class="list-item">
                                  <span class="property">Category:</span>
                                  <span class="value">Oil</span>
                              </li>
                              <li class="list-item">
                                  <span class="property">Size:</span>
                                  <span class="value">30ml</span>
                              </li>
                              <li class="list-item">
                                  <span class="property">Plant Type:</span>
                                  <span class="value">Sativa Dominant</span>
                              </li>
                              <li class="list-item">
                                  <span class="property">THC:</span>
                                  <span class="value">10.3mg/g</span>
                              </li>
                              <li class="list-item">
                                  <span class="property">CBD:</span>
                                  <span class="value">0.33%</span>
                              </li>
                              <li class="list-item">
                                  <span class="property">Effects:</span>
                                  <span class="value">Calm, Happy, Relaxed</span>
                              </li>
                              <li class="list-item">
                                  <span class="property">Tags:</span>
                                  <span class="value">Cannabis, oil</span>
                              </li>
                              <li class="list-item">
                                  <span class="property">SKU:</span>
                                  <span class="value">1234567</span>
                              </li>
                          </ul> --}}
                      </div>
                  </div>
                  <!-- Product additional information -->
                  <div class="about_secondary">
                      <div class="about_secondary-content" data-aos="fade-up" data-aos-delay="100">
                          <ul class="about_secondary-content_nav nav nav-tabs" role="tablist">
                              <li class="nav-item" role="presentation">
                                  <div class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                      data-bs-target="#description" role="tab" aria-selected="true">
                                      Description
                                  </div>
                              </li>
                              <li class="nav-item" role="presentation">
                                  <div class="nav-link" id="ingredients-tab" data-bs-toggle="tab"
                                      data-bs-target="#ingredients" role="tab" aria-selected="false">
                                      Bahan & Komposisi
                                  </div>
                              </li>

                          </ul>
                          <div class="about_secondary-content_tabs tab-content" id="productTabs">
                              <div class="wrapper">
                                  <h4 class="accordion_component-item_header d-flex justify-content-between align-items-center"
                                      data-bs-toggle="collapse" data-bs-target="#description" aria-expanded="true">
                                      Description
                                      <i class="icon-caret_down transform icon"></i>
                                  </h4>
                                  <div class="tab-pane collapse show active" id="description" role="tabpanel"
                                      aria-labelledby="description-tab" data-bs-parent="#productTabs">
                                      <p class="text">
                                          {{ $product->deskripsi }}
                                      </p>

                                  </div>
                              </div>
                              <div class="wrapper">
                                  <h4 class="accordion_component-item_header d-flex justify-content-between align-items-center"
                                      data-bs-toggle="collapse" data-bs-target="#ingredients">
                                      Bahan & Komposisi
                                      <i class="icon-caret_down icon"></i>
                                  </h4>
                                  <div class="tab-pane collapse" id="ingredients" role="tabpanel"
                                      aria-labelledby="ingredients-tab" data-bs-parent="#productTabs">
                                      <p class="text">
                                          <strong>Komposisi:</strong> {{ $product->komposisi }}
                                      </p>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
          </section>
      </main>


      <br>
  @endsection
