<section class="faq section--nopb">
    <div class="container d-flex flex-column-reverse flex-xl-row">
        <div class="faq_media" data-aos="fade-right">
            <picture>
                <source data-srcset="<?php echo e(asset('assets_fe/img/placeholder.jpg')); ?>"
                    srcset="<?php echo e(asset('assets_fe/img/placeholder.jpg')); ?>" type="image/webp" />
                <img class="lazy" data-src="<?php echo e(asset('assets_fe/img/placeholder.jpg')); ?>"
                    src="<?php echo e(asset('assets_fe/img/placeholder.jpg')); ?>" alt="media" />
            </picture>
        </div>
        <div class="faq_main col-xl-6" data-aos="fade-left">
            <div class="faq_main-header">
                <h2 class="faq_main-header_title"><?php echo e(__('messages.faq header title')); ?></h2>
                <p class="faq_main-header_text">
                    <?php echo e(__('messages.faq header text')); ?>

                </p>
            </div>
            <div class="accordion">
                <div class="accordion_component" id="accordionComponent">
                    <!-- item 1 -->
                    <div class="accordion_component-item">
                        <h4 class="accordion_component-item_header d-flex justify-content-between align-items-center collapsed"
                            data-bs-toggle="collapse" data-bs-target="#item-1">
                            <?php echo e(__('messages.faq 1 title')); ?>

                            <span class="wrapper">
                                <i class="icon-caret_down icon"></i>
                            </span>
                        </h4>
                        <div id="item-1" class="accordion-collapse collapse" data-bs-parent="#accordionComponent">
                            <div class="accordion_component-item_body">
                                <?php echo e(__('messages.faq 1 text')); ?>

                            </div>
                        </div>
                    </div>
                    <!-- item 2 -->
                    <div class="accordion_component-item">
                        <h4 class="accordion_component-item_header d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse" data-bs-target="#item-2">
                            <?php echo e(__('messages.faq 2 title')); ?>

                            <span class="wrapper">
                                <i class="icon-caret_down transform icon"></i>
                            </span>
                        </h4>
                        <div id="item-2" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionComponent">
                            <div class="accordion_component-item_body">
                                <?php echo e(__('messages.faq 2 text')); ?>

                            </div>
                        </div>
                    </div>
                    <!-- item 3 -->
                    <div class="accordion_component-item">
                        <h4 class="accordion_component-item_header d-flex justify-content-between align-items-center collapsed"
                            data-bs-toggle="collapse" data-bs-target="#item-3">
                            <?php echo e(__('messages.faq 3 title')); ?>

                            <span class="wrapper">
                                <i class="icon-caret_down icon"></i>
                            </span>
                        </h4>
                        <div id="item-3" class="accordion-collapse collapse" data-bs-parent="#accordionComponent">
                            <div class="accordion_component-item_body">
                                <?php echo e(__('messages.faq 3 text')); ?>

                            </div>
                        </div>
                    </div>
                    <!-- item 4 -->
                    <div class="accordion_component-item">
                        <h4 class="accordion_component-item_header d-flex justify-content-between align-items-center collapsed"
                            data-bs-toggle="collapse" data-bs-target="#item-4">
                            <?php echo e(__('messages.faq 4 title')); ?>

                            <span class="wrapper">
                                <i class="icon-caret_down icon"></i>
                            </span>
                        </h4>
                        <div id="item-4" class="accordion-collapse collapse" data-bs-parent="#accordionComponent">
                            <div class="accordion_component-item_body">
                                <?php echo e(__('messages.faq 4 text')); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\Users\bayur\OneDrive\Desktop\Dapur_Halwa\resources\views/partials/faq.blade.php ENDPATH**/ ?>