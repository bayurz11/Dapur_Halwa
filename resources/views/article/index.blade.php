@section('title', 'Dapur Halwa | Articles Category Setting')
<?php $page = 'Dashboard_admin'; ?>

@extends('partials.maindashboard')

@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">List Article</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Article</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Data Artikel</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addArticleModal">
                    + Add Article
                </button>
            </div>

            <div class="card-body">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Thumbnail</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Dipublikasikan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $index => $article)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $article->title }}">
                                    {{ \Illuminate\Support\Str::words($article->title, 5, '...') }}
                                </td>

                                <td>
                                    @if ($article->thumbnail)
                                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail"
                                            width="50">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $article->category?->name ?? '-' }}</td>
                                <td>{{ $article->author?->name ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-{{ $article->status === 'published' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($article->status) }}
                                    </span>
                                </td>
                                <td>{{ $article->published_at ? $article->published_at->format('d M Y') : '-' }}</td>
                                <td>
                                    <button type="button"
                                        class="btn btn-sm btn-outline-success rounded-circle d-inline-flex align-items-center justify-content-center"
                                        style="width: 32px; height: 32px;" title="Edit Artikel" data-bs-toggle="modal"
                                        data-bs-target="#editArticleModal"
                                        onclick='fillEditModal(@json($article))'>
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </button>

                                    <form id="delete-form-{{ $article->id }}" action="#" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center border-0"
                                            onclick="confirmDelete({{ $article->id }})">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @include('article.modal.add_modal_article')
    @include('article.modal.edit_modal_article')


    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.forEach(function(tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

@endsection
