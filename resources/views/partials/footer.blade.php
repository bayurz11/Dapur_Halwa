<footer class="footer">
    <div class="footer_main section">
        <div
            class="container d-flex flex-column flex-md-row flex-wrap flex-xl-nowrap justify-content-xl-between align-items-center align-items-md-start text-center text-md-start gap-4">
            <!-- About -->
            <div class="footer_main-about footer_main-block col-md-6 col-xl-auto">
                <a class="brand footer_main-about_brand d-flex justify-content-center justify-content-md-start align-items-center"
                    href="{{ route('/') }}">
                    <span class="logo">
                        <img src="{{ asset('assets_fe/img/logo dapur halwa 2.png') }}" alt="Logo Dapur Halwa"
                            class="logo-img img-fluid" />
                    </span>
                </a>
                <div class="footer_main-about_wrapper">
                    <p class="text">
                        Elementum nisi quis eleifend quam adipiscing. Cursus metus aliquam eleifend mi in nulla
                        posuere sollicitudin
                    </p>
                    <ul
                        class="socials d-flex justify-content-center justify-content-md-start align-items-center accent">
                        <li class="list-item">
                            <a class="link" href="https://facebook.com" target="_blank" rel="noopener norefferer">
                                <i class="icon-facebook icon"></i>
                            </a>
                        </li>
                        <li class="list-item">
                            <a class="link" href="https://instagram.com" target="_blank" rel="noopener norefferer">
                                <i class="icon-instagram icon"></i>
                            </a>
                        </li>
                        <li class="list-item">
                            <a class="link" href="https://twitter.com" target="_blank" rel="noopener norefferer">
                                <i class="icon-twitter icon"></i>
                            </a>
                        </li>
                        <li class="list-item">
                            <a class="link" href="https://whatsapp.com" target="_blank" rel="noopener norefferer">
                                <i class="icon-whatsapp icon"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Kontak -->
            <div class="footer_main-contacts footer_main-block col-md-6 col-xl-auto d-none d-md-block">
                <h4 class="footer_main-contacts_header footer_main-header">Kontak</h4>
                <ul class="footer_main-contacts_list text-center text-md-start">
                    <li
                        class="list-item d-flex justify-content-center justify-content-md-start align-items-center gap-2">
                        <span class="icon d-flex justify-content-center align-items-center">
                            <i class="icon-call"></i>
                        </span>
                        <div class="wrapper d-flex flex-column">
                            <a class="link" href="tel:+1234567890">+1-202-555-0133</a>
                            <a class="link" href="tel:+1234567890">+1-202-555-0133</a>
                        </div>
                    </li>
                    <li
                        class="list-item d-flex justify-content-center justify-content-md-start align-items-center gap-2">
                        <span class="icon d-flex justify-content-center align-items-center">
                            <i class="icon-location"></i>
                        </span>
                        <div class="wrapper d-flex flex-column">
                            <span>192 North Border Street</span>
                            <span>Lithonia, GA 30038</span>
                        </div>
                    </li>
                    <li
                        class="list-item d-flex justify-content-center justify-content-md-start align-items-center gap-2">
                        <span class="icon d-flex justify-content-center align-items-center">
                            <i class="icon-clock"></i>
                        </span>
                        <div class="wrapper d-flex flex-column">
                            <span>9:00 am to 5:00 pm</span>
                            <span>Senin sampai Sabtu</span>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Navigasi -->
            <div class="footer_main-nav footer_main-block col-md-6 col-xl-auto d-none d-md-block">
                <h4 class="footer_main-nav_header footer_main-header">Produk Kami</h4>
                <ul
                    class="footer_main-nav_list d-flex flex-wrap flex-md-column justify-content-center justify-content-md-start">
                    <li class="list-item">
                        <a class="link d-inline-flex align-items-center" href="#"><i
                                class="icon-caret_right accent icon"></i>Kue Kering</a>
                    </li>
                    <li class="list-item">
                        <a class="link d-inline-flex align-items-center" href="#"><i
                                class="icon-caret_right accent icon"></i>Kue Basah</a>
                    </li>
                    <li class="list-item">
                        <a class="link d-inline-flex align-items-center" href="#"><i
                                class="icon-caret_right accent icon"></i>Oleh-Oleh</a>
                    </li>
                    <li class="list-item">
                        <a class="link d-inline-flex align-items-center" href="#"><i
                                class="icon-caret_right accent icon"></i>Paket Hampers</a>
                    </li>
                    <li class="list-item">
                        <a class="link d-inline-flex align-items-center" href="#"><i
                                class="icon-caret_right accent icon"></i>Lihat Semua</a>
                    </li>
                </ul>
            </div>

            <!-- Galeri Instagram -->
            <div class="footer_main-instagram footer_main-block col-md-6 col-xl-auto">
                <h4 class="footer_main-instagram_header footer_main-header">Galeri</h4>
                <ul class="footer_main-instagram_list d-grid justify-content-center">
                    @for ($i = 0; $i < 6; $i++)
                        <li class="list-item">
                            <a class="link" href="#" target="_blank" rel="noopener norefferer">
                                <picture>
                                    <source data-srcset="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                        srcset="{{ asset('assets_fe/img/placeholder.jpg') }}" type="image/webp" />
                                    <img class="lazy preview" data-src="{{ asset('assets_fe/img/placeholder.jpg') }}"
                                        src="{{ asset('assets_fe/img/placeholder.jpg') }}" alt="instagram post" />
                                </picture>
                            </a>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer Secondary -->
    <div class="footer_secondary mt-4">
        <div
            class="container d-flex flex-column-reverse flex-md-row justify-content-center justify-content-md-between align-items-center text-center text-md-start">
            <p class="footer_secondary-copyright">
                <a href="https://github.com/bayurz11" target="_blank" rel="noopener noreferrer"
                    class="text-decoration-none text-reset">
                    Bayu Rez
                </a> &copy; Dapur Halwa
                <span class="linebreak">
                    All rights reserved Copyrights <span id="currentYear"></span>
                </span>
            </p>
            <ul class="footer_secondary-list d-flex justify-content-center align-items-center gap-2 mb-2 mb-md-0">
                <li class="list-item">
                    <a class="link d-flex align-items-center gap-2" href="{{ url('/lang/id') }}">
                        <img src="{{ asset('assets/images/flags/indonesia-flag.png') }}" alt="ID"
                            width="30" height="30" class="rounded-circle" style="object-fit: cover;">
                        <span class="fw-medium">ID</span>
                    </a>
                </li>
                <li class="list-item">
                    <a class="link d-flex align-items-center gap-2" href="{{ url('/lang/en') }}">
                        <img src="{{ asset('assets/images/flags/united-kingdom.png') }}" alt="EN"
                            width="30" height="30" class="rounded-circle" style="object-fit: cover;">
                        <span class="fw-medium">EN</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
