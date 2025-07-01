<!-- Modal for adding a new product -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{ route('product_setting.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                            name="nama_produk" value="{{ old('nama_produk') }}">
                        @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="komposisi" class="form-label">Komposisi / Bahan</label>
                        <textarea class="form-control @error('komposisi') is-invalid @enderror" name="komposisi" rows="2">{{ old('komposisi') }}</textarea>
                        @error('komposisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="harga" class="form-label">Harga Produk (Rp)</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                name="harga" value="{{ old('harga') }}">
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="berat" class="form-label">Berat (gram)</label>
                            <input type="number" class="form-control @error('berat') is-invalid @enderror"
                                name="berat" value="{{ old('berat') }}">
                            @error('berat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <select class="form-select @error('satuan') is-invalid @enderror" name="satuan">
                                <option value="pcs" selected>pcs</option>
                                <option value="box">box</option>
                                <option value="pak">pak</option>
                            </select>
                            @error('satuan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok"
                            value="{{ old('stok', 0) }}">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto_utama" class="form-label">Foto Utama</label>
                        <input type="file" class="form-control @error('foto_utama') is-invalid @enderror"
                            name="foto_utama" accept="image/*" onchange="previewAddImage(this)">
                        <div class="mt-2">
                            <img id="add_image_preview" src="" alt="Preview Gambar" class="img-fluid rounded"
                                style="max-height: 150px; display: none;">
                        </div>
                        @error('foto_utama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="foto_lainnya" class="form-label">Foto Lainnya (bisa lebih dari satu)</label>
                        <input type="file" class="form-control @error('foto_lainnya.*') is-invalid @enderror"
                            name="foto_lainnya[]" id="foto_lainnya" multiple accept="image/*">
                        <div id="foto_lainnya_preview" class="mt-2 d-flex flex-wrap gap-2"></div>
                        <!-- Tambahkan ini -->
                        @error('foto_lainnya.*')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" name="status">
                            <option value="aktif" selected>Aktif</option>
                            <option value="tidak_aktif">Tidak Aktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Preview Gambar Utama -->
<script>
    function previewAddImage(input) {
        const preview = document.getElementById('add_image_preview');
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const fotoLainnyaInput = document.getElementById('foto_lainnya');
        const container = document.getElementById('foto_lainnya_preview');

        if (fotoLainnyaInput) {
            fotoLainnyaInput.addEventListener('change', function(event) {
                container.innerHTML = ''; // Kosongkan preview sebelumnya
                const files = event.target.files;

                Array.from(files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-thumbnail';
                        img.style.maxHeight = '100px';
                        img.style.maxWidth = '100px';
                        img.style.marginRight = '8px';
                        container.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            });
        }
    });
</script>
