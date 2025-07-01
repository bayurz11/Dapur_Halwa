<section class="popular section">
    <div class="container">
        <div class="popular_header" data-aos="fade-up">
            <h2 class="popular_header-title"> <?php echo e(__('messages.popular header title')); ?> </h2>
            <p class="popular_header-text">
                <?php echo e(__('messages.popular header text')); ?>

            </p>
        </div>

        <div class="popular_slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="popular_slider-slide swiper-slide">
                        <div class="wrapper d-flex flex-column">
                            <div class="media" style="aspect-ratio: 1/1; overflow: hidden; border-radius: 10px;">

                                <div class="overlay d-flex flex-column align-items-center justify-content-center">
                                    <ul class="action d-flex align-items-center justify-content-center">

                                        <li class="list-item">
                                            <a class="action_link d-flex align-items-center justify-content-center"
                                                href="#" data-trigger="view">
                                                <i class="icon-eye"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <picture>
                                    <source data-srcset="<?php echo e(asset('storage/' . $product->foto_utama)); ?>"
                                        srcset="<?php echo e(asset('storage/' . $product->foto_utama)); ?>" type="image/webp" />
                                    <img class="lazy" style="object-fit: cover; width: 100%; height: 100%;"
                                        data-src="<?php echo e(asset('storage/' . $product->foto_utama)); ?>"
                                        src="<?php echo e(asset('storage/' . $product->foto_utama)); ?>"
                                        alt="<?php echo e($product->nama_produk); ?>" />

                                </picture>
                            </div>
                            <div class="main d-flex flex-column">
                                <a class="main_title" href="#" target="_blank">
                                    <?php echo e($product->nama_produk); ?>

                                </a>
                                <div class="main_price d-flex justify-content-between align-items-center mt-2">
                                    <span class="price mb-0">Rp <?php echo e(number_format($product->harga, 0, ',', '.')); ?></span>

                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        Detail Produk
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="w-100 text-center py-5">
                        <p class="text-muted">Produk belum tersedia.</p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="swiper-pagination swiper-pagination--dots"></div>
        </div>

        <div class="d-flex justify-content-center mt-4" data-aos="fade-up" data-aos-delay="200">
            <a href="<?php echo e(route('products')); ?>" class="btn btn-primary">
                <?php echo e(__('messages.cte-btn')); ?>

            </a>
        </div>
    </div>
</section>
<?php /**PATH C:\Users\bayur\OneDrive\Desktop\Dapur_Halwa\resources\views/partials/popular_products.blade.php ENDPATH**/ ?>