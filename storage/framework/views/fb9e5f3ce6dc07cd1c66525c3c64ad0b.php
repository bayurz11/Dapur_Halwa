<!-- Modal Edit Kategori Produk -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="editCategoryForm" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?> 
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Kategori Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id">
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="edit_name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="edit_description" class="form-label">Deskripsi (opsional)</label>
                        <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_image" class="form-label">Ganti Gambar </label>
                        <input type="file" class="form-control" id="edit_image" name="image" accept="image/*"
                            onchange="previewEditImage(this)">
                        <div class="mt-2">
                            <img id="edit_image_preview" src="" alt="Preview Gambar" class="img-fluid rounded"
                                style="max-height: 150px;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_status" class="form-label">Status</label>
                        <select class="form-select" id="edit_status" name="status">
                            <option value="active">Aktif</option>
                            <option value="inactive">Nonaktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Preview saat pilih gambar baru
    function previewEditImage(input) {
        const preview = document.getElementById('edit_image_preview');
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    // Mengisi data ke modal edit
    function fillEditModal(category) {
        const form = document.getElementById('editCategoryForm');
        const url = `/product_categories/update/${category.slug}`;
        form.action = url;

        document.getElementById('edit_name').value = category.name ?? '';
        document.getElementById('edit_description').value = category.description ?? '';
        document.getElementById('edit_status').value = category.status ?? 'active';

        // Set gambar preview lama
        const preview = document.getElementById('edit_image_preview');
        if (category.image) {
            preview.src = `/storage/${category.image}`;
        } else {
            preview.src = '';
        }

        // Reset input file
        document.getElementById('edit_image').value = '';
    }
</script>
<?php /**PATH C:\Users\bayur\OneDrive\Desktop\Dapur_Halwa\resources\views/product_categories/modal/edit_modal_category.blade.php ENDPATH**/ ?>