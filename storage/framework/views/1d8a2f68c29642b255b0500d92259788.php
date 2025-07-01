<?php $__env->startSection('title', 'Dapur Halwa'); ?>
<?php $page = 'Beranda'; ?>



<?php $__env->startSection('content'); ?>

    <!-- Hero section start -->
    <?php echo $__env->make('partials.hero', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- Hero section end -->

    <!-- Categories section start -->
    <?php echo $__env->make('partials.categories', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- Categories section end -->

    <!-- Popular products section start -->
    <?php echo $__env->make('partials.popular_products', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- Popular products section end -->

    <!-- Reviews section start -->
    <?php echo $__env->make('partials.reviews', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- Reviews section end -->

    <!-- FAQ section start -->
    <?php echo $__env->make('partials.faq', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- FAQ section end -->
    <br>
    <br>
    <br>
    <br>

    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\bayur\OneDrive\Desktop\Dapur_Halwa\resources\views/home.blade.php ENDPATH**/ ?>