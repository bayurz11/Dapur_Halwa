<section class="popular section">
    <div class="container">
        <div class="popular_header" data-aos="fade-up">
            <h2 class="popular_header-title"> {{ __('messages.popular header title') }} </h2>
            <p class="popular_header-text">
                {{ __('messages.popular header text') }}
            </p>
        </div>

        <div class="popular_slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                @forelse ($products as $product)
                    <div class="popular_slider-slide swiper-slide">
                        <div class="wrapper d-flex flex-column">
                            <div class="media" style="aspect-ratio: 1/1; overflow: hidden; border-radius: 10px;">
                                <div class="overlay d-flex flex-column align-items-center justify-content-center">
                                    <ul class="action d-flex align-items-center justify-content-center">

                                        <li class="list-item">
                                            <a class="action_link d-flex align-items-center justify-content-center"
                                                href="{{ route('products.detail', $product->slug) }}">
                                                <i class="icon-eye"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <picture>
                                    <source data-srcset="{{ asset('storage/' . $product->foto_utama) }}"
                                        srcset="{{ asset('storage/' . $product->foto_utama) }}" type="image/webp" />
                                    <img class="lazy" style="object-fit: cover; width: 100%; height: 100%;"
                                        data-src="{{ asset('storage/' . $product->foto_utama) }}"
                                        src="{{ asset('storage/' . $product->foto_utama) }}"
                                        alt="{{ $product->nama_produk }}" />

                                </picture>
                            </div>
                            <div class="main d-flex flex-column">
                                <a class="main_title" href="{{ route('products.detail', $product->slug) }}"
                                    target="_blank">
                                    {{ $product->nama_produk }}
                                </a>
                                <div class="main_price d-flex justify-content-between align-items-center mt-2">
                                    <span class="price mb-0">Rp
                                        {{ number_format($product->harga, 0, ',', '.') }}</span>

                                    <a href="{{ route('products.detail', $product->slug) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        Detail Produk
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="w-100 text-center py-5">
                        <p class="text-muted">Produk belum tersedia.</p>
                    </div>
                @endforelse
            </div>

            <div class="swiper-pagination swiper-pagination--dots"></div>
        </div>

        <div class="d-flex justify-content-center mt-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('products') }}" class="btn btn-primary">
                {{ __('messages.cte-btn') }}
            </a>
        </div>
    </div>
</section>
