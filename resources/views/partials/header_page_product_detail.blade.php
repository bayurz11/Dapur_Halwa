<header class="page">
    <div class="page_main container-fluid">
        <div class="container" data-aos="fade-up">
            <h1 class="page_header">{{ $product->nama_produk }}</h1>

        </div>
    </div>
    <div class="container" data-aos="fade-right">
        <ul class="page_breadcrumbs d-flex flex-wrap">
            <li class="page_breadcrumbs-item">
                <a class="link" href="{{ route('/') }}">{{ __('messages.beranda') }}</a>
            </li>

            <li class="page_breadcrumbs-item ">
                <a class="link" href="{{ route('products') }}">Produk</a>
            </li>
            <li class="page_breadcrumbs-item current">
                <span>{{ $product->nama_produk }}</span>
            </li>
        </ul>
    </div>
</header>
