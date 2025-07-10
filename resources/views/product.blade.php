  @section('title', 'Dapur Halwa | Produk')
  <?php $page = 'Beranda'; ?>

  @extends('partials.main')

  @section('content')
      <!-- Products section start -->
      <div class="shop-wrapper section">
          <div class="container d-flex d-lg-grid flex-column">
              <div class="promo_banner promo_banner--big" data-aos="fade-right">
                  <h3 class="promo_banner-header">Browse our selection of CBD-infused goods</h3>
                  <p class="promo_banner-text">
                      Elementum eu facilisis sed odio morbi quis commodo odio. Mauris rhoncus aenean vel elit scelerisque
                      mauris
                      pellentesque
                  </p>
                  <a class="promo_banner-btn btn" href="#">Shop Now</a>
              </div>
              <div class="shop_panel d-flex flex-wrap justify-content-between" data-aos="fade-up" data-aos-delay="100">
                  <div class="wrapper d-flex justify-content-between">
                      <label class="label" for="sorting">Sorting:</label>
                      <form method="GET" action="{{ route('products') }}" id="sortingForm">
                          {{-- Pertahankan kategori terpilih saat sorting --}}
                          @if (request()->has('category'))
                              @foreach (request('category') as $cat)
                                  <input type="hidden" name="category[]" value="{{ $cat }}">
                              @endforeach
                          @endif

                          <select name="sorting" id="sorting" onchange="document.getElementById('sortingForm').submit()">
                              <option value="default" {{ request('sorting') == 'default' ? 'selected' : '' }}>Default
                                  sorting</option>
                              <option value="lowest" {{ request('sorting') == 'lowest' ? 'selected' : '' }}>Lowest price
                              </option>
                              <option value="highest" {{ request('sorting') == 'highest' ? 'selected' : '' }}>Highest price
                              </option>
                          </select>
                          <i class="icon-caret_down icon"></i>
                      </form>
                  </div>

                  <a class="filterTrigger d-inline-flex d-lg-none align-items-center justify-content-center" href="#"
                      data-bs-toggle="collapse" data-bs-target="#shopFilters">
                      Filters
                      <i class="icon-caret_down icon"></i>
                  </a>
                  <span class="showing">Showing {{ $products->count() }} of {{ $products->total() }} results</span>
              </div>

              <div class="shop_products" id="productResults" data-aos="fade-up" data-aos-delay="200">
                  <ul class="shop_products-list row g-4">
                      @forelse ($products as $product)
                          <li class="col-12 col-sm-6 col-xl-4">
                              <div class="products_list-item_wrapper d-flex flex-column w-100 h-100 p-3"
                                  style="border: 1px solid #eee; border-radius: 8px; min-height: 100%;">
                                  <div class="media text-center mb-3">
                                      <a href="{{ route('products.detail', $product->slug) }}" target="_blank"
                                          rel="noopener noreferrer">
                                          <div class="media mb-3"
                                              style="width: 100%; height: 220px; overflow: hidden; border-radius: 8px;">
                                              <a href="{{ route('products.detail', $product->slug) }}" target="_blank"
                                                  rel="noopener noreferrer" style="display: block; height: 100%;">
                                                  <picture>
                                                      <source data-srcset="{{ asset('storage/' . $product->foto_utama) }}"
                                                          srcset="{{ asset('storage/' . $product->foto_utama) }}"
                                                          type="image/webp" />
                                                      <img class="lazy"
                                                          style="object-fit: cover; width: 100%; height: 100%;"
                                                          data-src="{{ asset('storage/' . $product->foto_utama) }}"
                                                          src="{{ asset('storage/' . $product->foto_utama) }}"
                                                          alt="{{ $product->nama_produk }}" />

                                                  </picture>
                                              </a>
                                          </div>

                                      </a>
                                  </div>

                                  <div
                                      class="main d-flex flex-column align-items-center justify-content-between flex-grow-1">
                                      <a class="main_title text-center fw-bold"
                                          href="{{ route('products.detail', $product->slug) }}">
                                          {{ $product->nama_produk }}
                                      </a>
                                      <div class="main_price mt-2 mb-3">
                                          <span class="price">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                                      </div>
                                      <a class="btn btn--green w-100 mt-auto" href="#">Pesan Sekarang</a>
                                  </div>
                              </div>
                          </li>
                      @empty
                          <li class="col-12 text-center">
                              <p class="text-muted">Tidak ada produk tersedia.</p>
                          </li>
                      @endforelse
                  </ul>

                  @if ($products->total() > 6)
                      {{ $products->links('vendor.pagination.custom') }}
                  @endif
              </div>

              <div class="shop_aside" data-aos="fade-lefts" data-aos-delay="300">
                  <div class="shop_aside-wrapper collapse" id="shopFilters">
                      <div class="shop_aside-block shop_aside-block--search">
                          <h4 class="shop_aside-block_header d-flex align-items-center">
                              Search by Products
                          </h4>
                          <form id="productSearchForm" class="form form--search" action="{{ route('products.search') }}"
                              method="get">
                              <input class="field required" type="text" name="search" placeholder="Search..." />
                              <button class="btn" type="submit">Search</button>
                          </form>
                      </div>

                      <div class="shop_aside-block shop_aside-block--categories">
                          <h4 class="shop_aside-block_header d-flex align-items-center">
                              Product Categories
                          </h4>
                          <form method="GET" action="{{ route('products') }}" id="filterForm">
                              <ul class="list" style="padding-left: 0; list-style: none;">
                                  @foreach ($categories as $category)
                                      <li class="list-item d-flex align-items-center" style="margin-bottom: 8px;">
                                          <input type="checkbox" id="category-{{ $category->slug }}" name="category[]"
                                              value="{{ $category->slug }}"
                                              onchange="document.getElementById('filterForm').submit()"
                                              {{ is_array(request('category')) && in_array($category->slug, request('category')) ? 'checked' : '' }}
                                              style="margin-right: 8px; width: 16px; height: 16px; cursor: pointer;" />
                                          <label for="category-{{ $category->slug }}"
                                              style="cursor: pointer; font-size: 14px;">
                                              {{ $category->name }} ({{ $category->products_count }})
                                          </label>
                                      </li>
                                  @endforeach

                              </ul>
                          </form>
                      </div>

                  </div>
              </div>
          </div>
      </div>
      <!-- Products section end -->

      @if ($products->count() === 1)
          <style>
              .shop_products-list {
                  display: flex !important;
                  justify-content: center;
                  align-items: stretch;
                  margin-right: auto
              }

              .shop_products-list>li {
                  flex: 0 1 100%;
                  max-width: 420px;
              }
          </style>
      @endif

      <script>
          document.addEventListener("DOMContentLoaded", function() {
              const form = document.getElementById("productSearchForm");
              const resultContainer = document.getElementById("productResults");

              form.addEventListener("submit", function(e) {
                  e.preventDefault(); // Cegah submit biasa

                  const query = form.search.value.trim();
                  if (query === "") {
                      resultContainer.innerHTML =
                          "<p class='text-center text-muted'>Masukkan kata kunci produk.</p>";
                      return;
                  }

                  const url = `${form.action}?search=${encodeURIComponent(query)}`;

                  fetch(url)
                      .then((response) => {
                          if (!response.ok) throw new Error("Gagal memuat data");
                          return response.text();
                      })
                      .then((html) => {
                          // Ambil hanya isi .shop_products dari response HTML
                          const parser = new DOMParser();
                          const doc = parser.parseFromString(html, "text/html");
                          const newContent = doc.getElementById("productResults");

                          if (newContent) {
                              resultContainer.innerHTML = newContent.innerHTML;
                          } else {
                              resultContainer.innerHTML =
                                  "<p class='text-center text-muted'>Produk tidak ditemukan.</p>";
                          }
                      })
                      .catch((err) => {
                          resultContainer.innerHTML =
                              "<p class='text-center text-danger'>Terjadi kesalahan pencarian.</p>";
                          console.error(err);
                      });
              });
          });
      </script>

  @endsection
