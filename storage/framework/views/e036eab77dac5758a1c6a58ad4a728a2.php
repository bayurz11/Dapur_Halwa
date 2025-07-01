<?php $__env->startSection('title', 'Dapur Halwa | Product Setting'); ?>
<?php $page = 'Dashboard_admin'; ?>


<?php $__env->startSection('content'); ?>

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">List Categories</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="<?php echo e(route('dashboard')); ?>" class="d-flex align-items-center gap-1 hover-text-primary">
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
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <?php if($category->image): ?>
                                            <img src="<?php echo e(asset('storage/' . $category->image)); ?>"
                                                alt="<?php echo e($category->name); ?>" class="flex-shrink-0 me-2 radius-8"
                                                style="width: 40px; height: 40px; object-fit: cover;" />
                                        <?php endif; ?>
                                        <span class="fw-medium"><?php echo e($category->name); ?></span>
                                    </div>
                                </td>
                                <td><?php echo e($category->slug); ?></td>
                                <td>
                                    <span
                                        class="badge 
                                <?php echo e($category->status === 'active' ? 'bg-success-focus text-success-main' : 'bg-secondary'); ?> 
                                px-3 py-2 rounded-pill text-sm fw-medium">
                                        <?php echo e(ucfirst($category->status)); ?>

                                    </span>
                                </td>
                                <td>

                                    <?php
                                        $categoryData = [
                                            'slug' => $category->slug,
                                            'name' => $category->name,
                                            'description' => $category->description,
                                            'status' => $category->status,
                                            'image' => $category->image, // path relatif: categories/xxx.jpg
                                        ];
                                    ?>

                                    <button type="button"
                                        class="btn btn-sm btn-outline-success rounded-circle d-inline-flex align-items-center justify-content-center"
                                        style="width: 32px; height: 32px;" title="Edit Kategori" data-bs-toggle="modal"
                                        data-bs-target="#editCategoryModal"
                                        onclick='fillEditModal(<?php echo json_encode($categoryData); ?>)'>
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </button>

                                    <form id="delete-form-<?php echo e($category->id); ?>"
                                        action="<?php echo e(route('product_categories.delete', $category->slug)); ?>" method="POST"
                                        class="d-inline-block">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="button"
                                            class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center border-0"
                                            onclick="confirmDelete(<?php echo e($category->id); ?>)">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </form>


                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <?php echo $__env->make('product_categories.modal.add_modal_category', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('product_categories.modal.edit_modal_category', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.maindashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\bayur\OneDrive\Desktop\Dapur_Halwa\resources\views/product_categories/index.blade.php ENDPATH**/ ?>