<?php $__env->startSection('title', 'Dapur Halwa | Product Setting'); ?>
<?php $page = 'Dashboard_admin'; ?>


<?php $__env->startSection('content'); ?>

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">List Product</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="<?php echo e(route('dashboard')); ?>" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">List Product</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Data Produk</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    + Add Produk
                </button>

            </div>
            <div class="card-body">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Slug</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo e(asset('storage/' . $product->foto_utama)); ?>"
                                            alt="<?php echo e($product->nama_produk); ?>" class="flex-shrink-0 me-12 radius-8"
                                            width="50" />
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">
                                            <?php echo e($product->nama_produk); ?>

                                        </h6>
                                    </div>
                                </td>
                                <td><?php echo e($product->category->name ?? '-'); ?></td>
                                <td>Rp <?php echo e(number_format($product->harga, 0, ',', '.')); ?></td>
                                <td>
                                    <?php if($product->status === 'aktif'): ?>
                                        <span
                                            class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Aktif</span>
                                    <?php else: ?>
                                        <span
                                            class="bg-warning-focus text-warning-main px-24 py-4 rounded-pill fw-medium text-sm">Tidak
                                            Aktif</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($product->slug); ?></td>
                                <td>

                                    <a href="javascript:void(0);"
                                        class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                        title="Edit" data-bs-toggle="modal" data-bs-target="#editProductModal"
                                        onclick="fillEditProductModal(<?php echo e(json_encode($product)); ?>)">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </a>

                                    <form id="delete-form-<?php echo e($product->id); ?>"
                                        action="<?php echo e(route('product_setting.delete', $product->slug)); ?>" method="POST"
                                        class="d-inline-block">
                                        <?php echo csrf_field(); ?>
                                        <button type="button"
                                            class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center border-0"
                                            onclick="confirmDelete(<?php echo e($product->id); ?>)" title="Hapus Produk">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </form>


                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($products->isEmpty()): ?>
                            <tr>
                                <td colspan="7" class="text-center">Belum ada produk.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php echo $__env->make('product_setting.modal.add_modal_produk', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('product_setting.modal.edit_modal_product', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data produk ini tidak dapat dikembalikan!",
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
        });
    }
</script>

<?php echo $__env->make('partials.maindashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\bayur\OneDrive\Desktop\Dapur_Halwa\resources\views/product_setting/index.blade.php ENDPATH**/ ?>