<div class="categories section--nopb" data-aos="fade-up">
    <div class="container">
        <ul class="categories_list d-flex flex-wrap justify-content-center">
            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li class="categories_list-item col-6 col-md-4 col-xl-2" data-order="<?php echo e($loop->iteration); ?>">
                    <a class="categories_list-item_wrapper" href="#">
                        
                        <div class="media">
                            <span class="overlay d-flex flex-column justify-content-end">
                                <span class="overlay_content"><?php echo e($category->products_count ?? '0'); ?> Items</span>
                            </span>
                            <picture>
                                <source
                                    data-srcset="<?php echo e(asset($category->image ? 'storage/' . $category->image : 'assets_fe/img/placeholder.jpg')); ?>"
                                    srcset="<?php echo e(asset($category->image ? 'storage/' . $category->image : 'assets_fe/img/placeholder.jpg')); ?>"
                                    type="image/webp" />
                                <img class="lazy"
                                    data-src="<?php echo e(asset($category->image ? 'storage/' . $category->image : 'assets_fe/img/placeholder.jpg')); ?>"
                                    src="<?php echo e(asset($category->image ? 'storage/' . $category->image : 'assets_fe/img/placeholder.jpg')); ?>"
                                    alt="<?php echo e($category->name); ?>" />
                            </picture>
                        </div>
                        <h4 class="title"><?php echo e($category->name); ?></h4>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <li class="text-center w-100">
                    <p>Tidak ada kategori tersedia.</p>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php /**PATH C:\Users\bayur\OneDrive\Desktop\Dapur_Halwa\resources\views/partials/categories.blade.php ENDPATH**/ ?>