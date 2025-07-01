/**
 * Herbalist
 * Herbalist – is a website template created for selling the cannabis, medical marijuana and CBD products, cannabis blogging and others
 * Exclusively on https://1.envato.market/herbalist-html
 *
 * @encoding        UTF-8
 * @version         1.0.4
 * @copyright       (C) 2018 - 2022 Merkulove ( https://merkulov.design/ ). All rights reserved.
 * @license         Envato License https://1.envato.market/KYbje
 * @contributors    Lamber Lilit (winter.rituel@gmail.com)
 * @support         help@merkulov.design
 **/
"use strict";

import Swal from "sweetalert2/dist/sweetalert2.js";
import { initProductSlider } from "./slider";

export function initModal(settings, customPopupClass) {
    Swal.fire({
        showClass: {
            popup: "fadeIn",
        },
        hideClass: {
            popup: "fadeOut",
        },
        showConfirmButton: false,
        showCloseButton: true,
        closeButtonHtml: `
                <i class="icon-close"></i>
            `,
        customClass: {
            container: "modal",
            popup: customPopupClass
                ? `modal_popup ${customPopupClass}`
                : "modal_popup",
            closeButton: "modal_popup-close",
            htmlContainer: "modal_popup-content",
        },
        ...settings,
    });

    function close() {
        if (customPopupClass === "modal_popup--search") {
            if (window.innerWidth > 767) {
                Swal.close();
            }
        }
    }

    window.addEventListener("resize", close);
}

export function addToCompare() {
    document.addEventListener("click", (e) => {
        if (
            (e.target.dataset.trigger !== null &&
                e.target.dataset.trigger === "compare") ||
            e.target.classList.contains("icon-compare")
        ) {
            initModal(
                {
                    html: `
                    <h2 class="title">Product Added to Compare</h2>
                    <div class="content d-sm-flex">
                        <div class="content_media">
                            <picture>
                                <source srcset="img/placeholder.jpg" type="image/webp">
                                <img src="img/placeholder.jpg" alt="media">
                            </picture>
                        </div>
                        <div class="content_main d-flex flex-column align-items-center align-items-sm-start">
                            <h4 class="content_main-title">Pure Sun CBD Oil 1:10</h4>
                            <span class="content_main-price">$16.90</span>
                            <a class="content_main-btn btn--underline" href="#">Remove</a>
                        </div>
                    </div>
                `,
                },
                "modal_popup--compare"
            );
        }
    });
}

export function triggerQuickView() {
    const viewTriggers = document.querySelectorAll('[data-trigger="view"]');

    viewTriggers.forEach((el) => {
        el.addEventListener("click", () => {
            initModal(
                {
                    html: `
                     <div class="modal_popup modal_popup--view" id="productModal">
    <div class="about_main d-lg-flex flex-nowrap">
        <div class="about_main-slider">
            <div class="about_main-slider--single swiper">
                <div class="swiper-wrapper">
                    @foreach (json_decode($product->foto_lainnya, true) ?? [] as $foto)
                        <div class="swiper-slide">
                            <picture>
                                <source srcset="{{ asset('storage/' . $foto) }}" type="image/webp">
                                <img class="lazy" src="{{ asset('storage/' . $foto) }}" alt="{{ $product->nama_produk }}">
                            </picture>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-controls d-flex align-items-center justify-content-between">
                    <a class="swiper-button-prev"><i class="icon-caret_left icon"></i></a>
                    <a class="swiper-button-next"><i class="icon-caret_right icon"></i></a>
                </div>
            </div>
            <div class="about_main-slider--thumbs swiper">
                <div class="swiper-wrapper">
                    @foreach (json_decode($product->foto_lainnya, true) ?? [] as $foto)
                        <div class="swiper-slide">
                            <picture>
                                <source srcset="{{ asset('storage/' . $foto) }}" type="image/webp">
                                <img class="lazy" src="{{ asset('storage/' . $foto) }}" alt="thumb">
                            </picture>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="about_main-info">
            <div class="about_main-info_product d-sm-flex align-items-center justify-content-between">
                <h2 class="title">{{ $product->nama_produk }}</h2>
            </div>

            <p class="about_main-info_description">{{ $product->deskripsi }}</p>

            <div class="about_main-info_block d-flex flex-column flex-sm-row align-items-sm-center">
                <h5 class="title">Berat</h5>
                <p class="mb-0">{{ $product->berat }} {{ $product->satuan }}</p>
            </div>

            <div class="about_main-info_block d-flex flex-column flex-sm-row align-items-sm-center">
                <h5 class="title">Stok</h5>
                <p class="mb-0">{{ $product->stok }}</p>
            </div>

            <div class="about_main-info_action d-flex flex-column flex-sm-row align-items-sm-center">
                <span class="about_main-info_price">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                <a class="btn ms-sm-3" href="#">Tambah ke Keranjang</a>
                <div class="action d-flex ms-sm-3">
                    <a class="action_link d-flex align-items-center justify-content-center" href="#" data-role="wishlist">
                        <i class="icon-heart"></i>
                    </a>
                </div>
            </div>

            <a class="btn--underline mt-3" href="{{ route('product.show', $product->slug) }}">Lihat Detail</a>
        </div>
    </div>
</div>

                `,
                },
                "modal_popup--view"
            );
            initProductSlider();
        });
    });
}

export function triggerSearchForm() {
    const searchTriggers = document.querySelectorAll('[data-trigger="search"]');

    function check() {
        let callback = function (e) {
            e.preventDefault();
            if (window.innerWidth <= 767) {
                initModal(
                    {
                        html: `
                    <form class="form" method="get" action="#">
                        <input class="field required" type="text" placeholder="{{ __('messages.Search placeholder') }}">
                        <button class="btn" type="submit">Search</button>
                    <form>
                    `,
                    },
                    "modal_popup--search"
                );
            }
        };

        if (window.innerWidth <= 767) {
            searchTriggers.forEach((el) => {
                el.addEventListener("click", callback);
            });
        } else {
            searchTriggers.forEach((el) => {
                el.removeEventListener("click", callback);
            });
        }
    }

    window.addEventListener("load", check);
    window.addEventListener("resize", check);
}
