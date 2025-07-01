@section('title', 'Analytics | Dashboard Admin')
<?php $page = 'Dashboard_admin'; ?>

@extends('partials.maindashboard')
@section('content')

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Analytics</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Analytics</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-body p-20">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="row g-3">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="radius-8 h-100 text-center p-20 bg-purple-light">
                                        <span
                                            class="w-44-px h-44-px radius-8 d-inline-flex justify-content-center align-items-center text-xl mb-12 bg-lilac-200 border border-lilac-400 text-lilac-600">
                                            <i class="ri-price-tag-3-fill"></i>
                                        </span>
                                        <span class="text-neutral-700 d-block">Total Sales</span>
                                        <h6 class="mb-0 mt-4">$170,500.09</h6>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="radius-8 h-100 text-center p-20 bg-success-100">
                                        <span
                                            class="w-44-px h-44-px radius-8 d-inline-flex justify-content-center align-items-center text-xl mb-12 bg-success-200 border border-success-400 text-success-600">
                                            <i class="ri-shopping-cart-2-fill"></i>
                                        </span>
                                        <span class="text-neutral-700 d-block">Total Orders</span>
                                        <h6 class="mb-0 mt-4">1,500</h6>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="radius-8 h-100 text-center p-20 bg-info-focus">
                                        <span
                                            class="w-44-px h-44-px radius-8 d-inline-flex justify-content-center align-items-center text-xl mb-12 bg-info-200 border border-info-400 text-info-600">
                                            <i class="ri-user-3-line"></i>
                                        </span>
                                        <span class="text-neutral-700 d-block">Total Visitors</span>
                                        <h6 class="mb-0 mt-4">{{ $totalVisitors }}</h6>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="radius-8 h-100 text-center p-20 bg-lilac-100">
                                        <span
                                            class="w-44-px h-44-px radius-8 d-inline-flex justify-content-center align-items-center text-xl mb-12 bg-lilac-200 border border-lilac-400 text-lilac-600">
                                            <i class="ri-group-line"></i>
                                        </span>
                                        <span class="text-neutral-700 d-block">Visitors Today</span>
                                        <h6 class="mb-0 mt-4">{{ $todayVisitors }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-12">
            <div class="card h-100">
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <h6 class="fw-semibold mb-3">Visitors by Country</h6>
                            <p class="text-secondary mb-3">
                                This is a map showing the distribution of visitors by country.
                            </p>
                            <div id="map" class="w-100 border rounded" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Include vector map library --}}
        @push('styles')
            <link href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.css" rel="stylesheet">
        @endpush

        @push('scripts')
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/maps/jquery-jvectormap-world-mill-en.js"></script>

            <script>
                const markers = @json($markers);

                $(function() {
                    $('#map').vectorMap({
                        map: 'world_mill_en',
                        backgroundColor: 'transparent',
                        regionStyle: {
                            initial: {
                                fill: '#D1D5DB'
                            }
                        },
                        markerStyle: {
                            initial: {
                                r: 5,
                                fill: '#22C55E',
                                stroke: '#000',
                                'stroke-width': 1,
                                'stroke-opacity': 0.4
                            },
                        },
                        markers: markers
                    });
                });
            </script>
        @endpush

    @endsection
