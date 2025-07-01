<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet preload" as="style" href="<?php echo e(asset('assets_fe/css/preload.min.css')); ?>" />
    <link rel="stylesheet preload" as="style" href="<?php echo e(asset('assets_fe/css/icomoon.css')); ?>" />
    <link rel="stylesheet preload" as="style" href="<?php echo e(asset('assets_fe/css/libs.min.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('assets_fe/css/index2.min.css')); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <?php if(request()->routeIs('products')): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets_fe/css/shop2.min.css')); ?>" />
    <?php endif; ?>

    <?php if(request()->routeIs('about')): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets_fe/css/about.min.css')); ?>" />
    <?php endif; ?>

    <?php if(request()->routeIs('gallery')): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets_fe/css/gallery.min.css')); ?>" />
    <?php endif; ?>
    <?php if(request()->routeIs('articles')): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets_fe/css/news.min.css')); ?>" />
    <?php endif; ?>

    <?php if(!empty($isErrorPage)): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets_fe/css/error.min.css')); ?>" />
    <?php endif; ?>



</head>

<body>
    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if(request()->routeIs('products')): ?>
        <?php echo $__env->make('partials.header_page_product', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>

    <?php if(request()->routeIs('about')): ?>
        <?php echo $__env->make('partials.header_page_about', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>

    <?php if(request()->routeIs('gallery')): ?>
        <?php echo $__env->make('partials.header_page_gallery', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>
    <?php if(request()->routeIs('articles')): ?>
        <?php echo $__env->make('partials.header_page_articles', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>

    <!-- Homepage content start -->
    <main>


        <?php echo $__env->yieldContent('content'); ?>

    </main>
    <!-- Homepage content end -->

    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <a href="https://wa.me/6281234567890" target="_blank" class="whatsapp-float" id="whatsappButton"
        aria-label="Chat via WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <div id="whatsappMessage" class="whatsapp-message">
        Segera pesan!
    </div>


    <script src="<?php echo e(asset('assets_fe/js/common.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets_fe/js/index.min.js')); ?>"></script>

    <?php if(request()->routeIs('products')): ?>
        <script src="<?php echo e(asset('assets_fe/js/shop.min.js')); ?>"></script>
    <?php endif; ?>

    <script>
        const whatsappButton = document.getElementById('whatsappButton');
        const whatsappMessage = document.getElementById('whatsappMessage');
        let messageShown = false;

        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                whatsappButton.style.display = 'block';

                if (!messageShown) {
                    whatsappMessage.style.display = 'block';
                    messageShown = true;

                    // Hilangkan pesan setelah 3 detik
                    setTimeout(() => {
                        whatsappMessage.style.display = 'none';
                    }, 3000);
                }
            } else {
                whatsappButton.style.display = 'none';
                whatsappMessage.style.display = 'none';
                messageShown = false;
            }
        });
    </script>


</body>

</html>
<?php /**PATH C:\Users\bayur\OneDrive\Desktop\Dapur_Halwa\resources\views/partials/main.blade.php ENDPATH**/ ?>