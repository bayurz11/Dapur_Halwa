@section('title', 'Dapur Halwa | Product Setting')
<?php $page = 'Dashboard_admin'; ?>

@extends('partials.maindashboard')
@section('content')

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">List Categories</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">List Categories</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Data Kategori Produk</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    + Add Category
                </button>

            </div>
            <div class="card-body">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if ($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}"
                                                alt="{{ $category->name }}" class="flex-shrink-0 me-2 radius-8"
                                                style="width: 40px; height: 40px; object-fit: cover;" />
                                        @endif
                                        <span class="fw-medium">{{ $category->name }}</span>
                                    </div>
                                </td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <span
                                        class="badge 
                                {{ $category->status === 'active' ? 'bg-success-focus text-success-main' : 'bg-secondary' }} 
                                px-3 py-2 rounded-pill text-sm fw-medium">
                                        {{ ucfirst($category->status) }}
                                    </span>
                                </td>
                                <td>

                                    @php
                                        $categoryData = [
                                            'slug' => $category->slug,
                                            'name' => $category->name,
                                            'description' => $category->description,
                                            'status' => $category->status,
                                            'image' => $category->image, // path relatif: categories/xxx.jpg
                                        ];
                                    @endphp

                                    <button type="button"
                                        class="btn btn-sm btn-outline-success rounded-circle d-inline-flex align-items-center justify-content-center"
                                        style="width: 32px; height: 32px;" title="Edit Kategori" data-bs-toggle="modal"
                                        data-bs-target="#editCategoryModal"
                                        onclick='fillEditModal({!! json_encode($categoryData) !!})'>
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </button>

                                    <form id="delete-form-{{ $category->id }}"
                                        action="{{ route('product_categories.delete', $category->slug) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center border-0"
                                            onclick="confirmDelete({{ $category->id }})">
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

    @include('product_categories.modal.add_modal_category')
    @include('product_categories.modal.edit_modal_category')

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data kategori ini tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }

        function fillEditModal(category) {
            const form = document.getElementById('editCategoryForm');
            const url = `/product_categories/update/${category.slug}`;

            form.action = url;
            document.getElementById('edit_name').value = category.name ?? '';
            document.getElementById('edit_description').value = category.description ?? '';
            document.getElementById('edit_status').value = category.status ?? 'active';
        }
    </script>

@endsection
