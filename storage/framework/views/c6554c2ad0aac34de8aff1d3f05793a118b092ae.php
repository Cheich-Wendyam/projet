
<?php $__env->startSection('content'); ?>
<br><br>
<div class="info">
    <h2>Bienvenue à Ouagadougou</h2>
    <p>
        Découvrez la magnifique ville de Ouagadougou, un joyau historique débordant de sites touristiques fascinants.
    </p>
    <p>
        Explorez une ville aux multiples facettes avec des monuments historiques impressionnants et des paysages époustouflants qui vous transporteront dans un voyage inoubliable.
    </p>
    <button class="learn-more">En savoir plus</button>
</div>

<div class="slide-container swiper">
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
        <?php $__currentLoopData = $carousel_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card swiper-slide <?php echo e($index === 0 ? 'active' : ''); ?>">
                <div class="image-content <?php echo e($index === 0 ? 'active' : ''); ?> ">
                    <span class="overlay <?php echo e($index === 0 ? 'active' : ''); ?>"></span>
                        <div class="card-image <?php echo e($index === 0 ? 'active' : ''); ?>">
                            <img src="<?php echo e(Storage::url($image->image)); ?>" alt="" class="card-img <?php echo e($index === 0 ? 'active' : ''); ?>">
                        </div>
                </div>

                <div class="card-content <?php echo e($index === 0 ? 'active' : ''); ?>">
                <h2 class="titre <?php echo e($index === 0 ? 'active' : ''); ?>"><?php echo e($image->title); ?></h2>
                <p class="description <?php echo e($index === 0 ? 'active' : ''); ?>"> <?php echo e($image->description); ?> </p>

                <button class="button <?php echo e($index === 0 ? 'active' : ''); ?>">En savoir plus</button>
            </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

           
        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>

<section>
     <!-- Icone de carte -->
     <button id="mapButton" class="btn btn-primary">
        <i class="fas fa-map-marker-alt"></i> Voir la carte
    </button>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('lay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Cheich Yalaweogo\Desktop\projet\resources\views/restos.blade.php ENDPATH**/ ?>