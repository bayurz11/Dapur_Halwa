<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <link rel="stylesheet preload" as="style" href="{{ asset('assets_fe/css/preload.min.css') }}" />
    <link rel="stylesheet preload" as="style" href="{{ asset('assets_fe/css/icomoon.css') }}" />
    <link rel="stylesheet preload" as="style" href="{{ asset('assets_fe/css/libs.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets_fe/css/index2.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    @if (request()->routeIs('products'))
        <link rel="stylesheet" href="{{ asset('assets_fe/css/shop2.min.css') }}" />
    @endif

    @if (request()->routeIs('about'))
        <link rel="stylesheet" href="{{ asset('assets_fe/css/about.min.css') }}" />
    @endif

    @if (request()->routeIs('gallery'))
        <link rel="stylesheet" href="{{ asset('assets_fe/css/gallery.min.css') }}" />
    @endif
    @if (request()->routeIs('articles'))
        <link rel="stylesheet" href="{{ asset('assets_fe/css/news.min.css') }}" />
    @endif

    @if (!empty($isErrorPage))
        <link rel="stylesheet" href="{{ asset('assets_fe/css/error.min.css') }}" />
    @endif



</head>

<body>
    @include('partials.header')

    @if (request()->routeIs('products'))
        @include('partials.header_page_product')
    @endif

    @if (request()->routeIs('about'))
        @include('partials.header_page_about')
    @endif

    @if (request()->routeIs('gallery'))
        @include('partials.header_page_gallery')
    @endif
    @if (request()->routeIs('articles'))
        @include('partials.header_page_articles')
    @endif

    <!-- Homepage content start -->
    <main>


        @yield('content')

    </main>
    <!-- Homepage content end -->

    @include('partials.footer')

    <a href="https://wa.me/6281234567890" target="_blank" class="whatsapp-float" id="whatsappButton"
        aria-label="Chat via WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <div id="whatsappMessage" class="whatsapp-message">
        Segera pesan!
    </div>


    <script src="{{ asset('assets_fe/js/common.min.js') }}"></script>

    <script src="{{ asset('assets_fe/js/index.min.js') }}"></script>

    @if (request()->routeIs('products'))
        <script src="{{ asset('assets_fe/js/shop.min.js') }}"></script>
    @endif

    <script>
        const whatsappButton = document.getElementById('whatsappButton');
        const whatsappMessage = document.getElementById('whatsappMessage');
        let messageShown = false;

        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                whatsappButton.style.display = 'block';

                if (!messageShown) {
                    whatsappMessage.style.display = 'block';
                    messageShown = true;

                    // Hilangkan pesan setelah 3 detik
                    setTimeout(() => {
                        whatsappMessage.style.display = 'none';
                    }, 3000);
                }
            } else {
                whatsappButton.style.display = 'none';
                whatsappMessage.style.display = 'none';
                messageShown = false;
            }
        });
    </script>


</body>

</html>
