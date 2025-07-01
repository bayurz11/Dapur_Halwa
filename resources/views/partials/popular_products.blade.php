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
                @foreach ($products as $product)
                    <div class="popular_slider-slide swiper-slide">
                        <div class="wrapper d-flex flex-column">
                            <div class="media">
                                <div class="overlay d-flex flex-column align-items-center justify-content-center">
                                    <ul class="action d-flex align-items-center justify-content-center">
                                        <li class="list-item">
                                            <a class="action_link d-flex align-items-center justify-content-center"
                                                href="#" data-trigger="compare">
                                                <i class="icon-compare"></i>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a class="action_link d-flex align-items-center justify-content-center"
                                                href="#">
                                                <i class="icon-basket"></i>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a class="action_link d-flex align-items-center justify-content-center"
                                                href="#" data-role="wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a class="action_link d-flex align-items-center justify-content-center"
                                                href="#" data-trigger="view">
                                                <i class="icon-eye"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <picture>
                                    <source data-srcset="{{ asset('storage/' . $product->foto_utama) }}"
                                        srcset="{{ asset('storage/' . $product->foto_utama) }}" type="image/webp" />
                                    <img class="lazy" data-src="{{ asset('storage/' . $product->foto_utama) }}"
                                        src="{{ asset('storage/' . $product->foto_utama) }}"
                                        alt="{{ $product->nama_produk }}" />
                                </picture>
                            </div>
                            <div class="main d-flex flex-column">
                                <div class="main_rating">
                                    <ul class="main_rating-stars d-flex align-items-center accent">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <li class="main_rating-stars_star">
                                                <i class="{{ $i <= 4 ? 'icon-star_fill' : 'icon-star' }}"></i>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                                <a class="main_title" href="#}" target="_blank">
                                    {{ $product->nama_produk }}
                                </a>
                                <div class="main_price">
                                    <span class="price">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


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
