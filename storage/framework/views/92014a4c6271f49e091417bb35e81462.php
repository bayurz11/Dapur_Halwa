<!-- Modal Edit Produk -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="editProductForm" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?> 
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="edit_product_id">

                    <div class="mb-3">
                        <label for="edit_nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="edit_nama_produk" name="nama_produk">
                    </div>

                    <div class="mb-3">
                        <label for="edit_kategori_id" class="form-label">Kategori</label>
                        <select class="form-select" id="edit_kategori_id" name="kategori_id">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit_deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="edit_komposisi" class="form-label">Komposisi</label>
                        <textarea class="form-control" id="edit_komposisi" name="komposisi" rows="2"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_harga" class="form-label">Harga (Rp)</label>
                            <input type="number" class="form-control" id="edit_harga" name="harga">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="edit_berat" class="form-label">Berat (gram)</label>
                            <input type="number" class="form-control" id="edit_berat" name="berat">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="edit_satuan" class="form-label">Satuan</label>
                            <select class="form-select" id="edit_satuan" name="satuan">
                                <option value="pcs">pcs</option>
                                <option value="box">box</option>
                                <option value="pak">pak</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="edit_stok" name="stok">
                    </div>

                    <div class="mb-3">
                        <label for="edit_foto_utama" class="form-label">Ganti Foto Utama</label>
                        <input type="file" class="form-control" id="edit_foto_utama" name="foto_utama"
                            accept="image/*" onchange="previewEditImage(this)">
                        <div class="mt-2">
                            <img id="edit_image_preview" src="" alt="Preview Gambar" class="img-fluid rounded"
                                style="max-height: 150px;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_foto_lainnya" class="form-label">Ganti Foto Lainnya (boleh lebih dari
                            satu)</label>
                        <input type="file" class="form-control" id="edit_foto_lainnya" name="foto_lainnya[]"
                            multiple accept="image/*">
                        <div class="mt-2 d-flex flex-wrap gap-2" id="edit_foto_lainnya_preview"></div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_status" class="form-label">Status</label>
                        <select class="form-select" id="edit_status" name="status">
                            <option value="aktif">Aktif</option>
                            <option value="tidak_aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Perbarui Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // 🔄 Preview gambar utama (foto_utama)
    function previewEditImage(input) {
        const preview = document.getElementById('edit_image_preview');
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    // 🔄 Preview banyak gambar (foto_lainnya)
    document.addEventListener('DOMContentLoaded', function() {
        const fotoLainnyaInput = document.getElementById('edit_foto_lainnya');
        if (fotoLainnyaInput) {
            fotoLainnyaInput.addEventListener('change', function(event) {
                const container = document.getElementById('edit_foto_lainnya_preview');
                container.innerHTML = ''; // Kosongkan preview lama

                const files = event.target.files;

                if (files.length) {
                    Array.from(files).forEach(file => {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'img-fluid rounded';
                            img.style.maxHeight = '100px';
                            img.style.maxWidth = '100px';
                            img.style.marginRight = '8px';
                            container.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    });
                }
            });
        }
    });

    // 🔄 Isi data produk ke dalam modal edit
    function fillEditProductModal(product) {
        const form = document.getElementById('editProductForm');
        form.action = `/product_setting/update/${product.slug}`; // Gunakan slug untuk update

        // Isi nilai ke input
        document.getElementById('edit_nama_produk').value = product.nama_produk || '';
        document.getElementById('edit_kategori_id').value = product.kategori_id || '';
        document.getElementById('edit_deskripsi').value = product.deskripsi || '';
        document.getElementById('edit_komposisi').value = product.komposisi || '';
        document.getElementById('edit_harga').value = product.harga || '';
        document.getElementById('edit_berat').value = product.berat || '';
        document.getElementById('edit_satuan').value = product.satuan || 'pcs';
        document.getElementById('edit_stok').value = product.stok || 0;
        document.getElementById('edit_status').value = product.status || 'aktif';

        // Tampilkan preview foto utama
        const preview = document.getElementById('edit_image_preview');
        preview.src = product.foto_utama ? `/storage/${product.foto_utama}` : '';
        document.getElementById('edit_foto_utama').value = '';

        // Tampilkan preview foto lainnya (jika ada)
        const container = document.getElementById('edit_foto_lainnya_preview');
        container.innerHTML = '';

        try {
            let fotoArray = [];

            if (Array.isArray(product.foto_lainnya)) {
                fotoArray = product.foto_lainnya;
            } else if (typeof product.foto_lainnya === 'string') {
                fotoArray = JSON.parse(product.foto_lainnya);
            }

            fotoArray.forEach(path => {
                const img = document.createElement('img');
                img.src = `/storage/${path}`;
                img.className = 'img-fluid rounded';
                img.style.maxHeight = '100px';
                img.style.maxWidth = '100px';
                img.style.marginRight = '8px';
                container.appendChild(img);
            });
        } catch (err) {
            console.error('Gagal menampilkan foto_lainnya:', err);
        }
    }
</script>
<?php /**PATH C:\Users\bayur\OneDrive\Desktop\Dapur_Halwa\resources\views/product_setting/modal/edit_modal_product.blade.php ENDPATH**/ ?>