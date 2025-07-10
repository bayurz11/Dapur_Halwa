<?php if($paginator->hasPages()): ?>
    <ul class="pagination d-flex align-items-center justify-content-center mt-4" role="navigation"
        style="padding-left: 0; list-style: none;">
        
        <?php if($paginator->onFirstPage()): ?>
            <li class="pagination-page disabled" aria-disabled="true" style="margin: 0 4px;">
                <span class="pagination-page_link d-flex align-items-center justify-content-center"
                    style="width: 36px; height: 36px; border: 1px solid #ddd; border-radius: 4px; color: #999; font-weight: 500;">&laquo;</span>
            </li>
        <?php else: ?>
            <li class="pagination-page" style="margin: 0 4px;">
                <a class="pagination-page_link d-flex align-items-center justify-content-center"
                    href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"
                    style="width: 36px; height: 36px; border: 1px solid #ddd; border-radius: 4px; color: #333; text-decoration: none; font-weight: 500;">&laquo;</a>
            </li>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(is_string($element)): ?>
                <li class="pagination-page disabled" aria-disabled="true" style="margin: 0 4px;">
                    <span class="pagination-page_link d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px; border: 1px solid #ddd; border-radius: 4px; color: #999; font-weight: 500;"><?php echo e($element); ?></span>
                </li>
            <?php endif; ?>

            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <li class="pagination-page active" aria-current="page" style="margin: 0 4px;">
                            <span class="pagination-page_link d-flex align-items-center justify-content-center"
                                style="width: 36px; height: 36px; background-color: #419937; border: 1px solid #419937; color: #fff; border-radius: 4px; font-weight: 600;"><?php echo e($page); ?></span>
                        </li>
                    <?php else: ?>
                        <li class="pagination-page" style="margin: 0 4px;">
                            <a class="pagination-page_link d-flex align-items-center justify-content-center"
                                href="<?php echo e($url); ?>"
                                style="width: 36px; height: 36px; border: 1px solid #ddd; border-radius: 4px; color: #333; text-decoration: none; font-weight: 500;"><?php echo e($page); ?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <li class="pagination-page" style="margin: 0 4px;">
                <a class="pagination-page_link d-flex align-items-center justify-content-center"
                    href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"
                    style="width: 36px; height: 36px; border: 1px solid #ddd; border-radius: 4px; color: #333; text-decoration: none; font-weight: 500;">&raquo;</a>
            </li>
        <?php else: ?>
            <li class="pagination-page disabled" aria-disabled="true" style="margin: 0 4px;">
                <span class="pagination-page_link d-flex align-items-center justify-content-center"
                    style="width: 36px; height: 36px; border: 1px solid #ddd; border-radius: 4px; color: #999; font-weight: 500;">&raquo;</span>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
<?php /**PATH C:\Users\bayur\OneDrive\Desktop\Dapur_Halwa\resources\views/vendor/pagination/custom.blade.php ENDPATH**/ ?>