@section('title', 'Dapur Halwa')
<?php $page = 'Beranda'; ?>

@extends('partials.main')

@section('content')

    <!-- Hero section start -->
    @include('partials.hero')
    <!-- Hero section end -->

    <!-- Categories section start -->
    @include('partials.categories')
    <!-- Categories section end -->

    <!-- Popular products section start -->
    @include('partials.popular_products')
    <!-- Popular products section end -->

    <!-- Reviews section start -->
    @include('partials.reviews')
    <!-- Reviews section end -->

    <!-- FAQ section start -->
    @include('partials.faq')
    <!-- FAQ section end -->
    <br>
    <br>
    <br>
    <br>

    {{-- <!--  Contacts section start -->
    @include('partials.contacts')
    <!--  Contacts section end --> --}}

@endsection
