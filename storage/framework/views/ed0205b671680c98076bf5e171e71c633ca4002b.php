
<?php $__env->startSection('content'); ?>

<!-- Carousel -->
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php $__currentLoopData = $carousel_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>" data-bs-interval="2000">
                <img src="<?php echo e(Storage::url($image->image)); ?>" class="d-block w-100" alt="<?php echo e($image->title); ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo e($site_settings['title']); ?></h5>
                    <p><?php echo e($site_settings['description']); ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('lay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Cheich Yalaweogo\Desktop\projet\resources\views/welcome.blade.php ENDPATH**/ ?>