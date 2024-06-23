


<?php $__env->startSection('content'); ?>
<br><br>
<div class="info">
    <h2>Bienvenue à Ouagadougou</h2>
    <p>
        Vous cherchez des restaurants et des bars à Ouagadougou,envie de manger des plats africains et exotiques? Laissez-vous guider par cette belle selection de restaurants. La carte indique les restaurants et bars à proximite.
    </p>
    <p>
        Explorez et trouvez la meilleur adresse. Vous serez rapidement dans le meilleur endroit.
    </p>
    <p>
        <form class="d-flex" role="search" action="<?php echo e(route('search')); ?>" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Rechercher" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
    </p>
    <p>
        <a href="/map" class="learn-more"><i class="fas fa-map-marker-alt"></i> Voir la carte</a>
    </p>
</div>

<div class="slide-container swiper">
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
        <?php $__currentLoopData = $restos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card swiper-slide <?php echo e($index === 0 ? 'active' : ''); ?>">
                <div class="image-content <?php echo e($index === 0 ? 'active' : ''); ?> ">
                    <span class="overlay <?php echo e($index === 0 ? 'active' : ''); ?>"></span>
                    <div class="card-image <?php echo e($index === 0 ? 'active' : ''); ?>">
                        <img src="<?php echo e(Storage::url($image->image)); ?>" alt="" class="card-img <?php echo e($index === 0 ? 'active' : ''); ?>">
                    </div>
                </div>

                <div class="card-content <?php echo e($index === 0 ? 'active' : ''); ?>">
                    <h2 class="titre <?php echo e($index === 0 ? 'active' : ''); ?>"><?php echo e($image->Titre); ?></h2>
                    <p class="description <?php echo e($index === 0 ? 'active' : ''); ?>"> <?php echo e($image->description); ?> </p>

                    <a href="<?php echo e(route('restos.show', $image->id)); ?>" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
<script src="<?php echo e(asset('css/all.min.js')); ?>"></script>
<script src="<?php echo e(asset('css/swiper-bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('css/scr.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('lay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Cheich Yalaweogo\Desktop\projet\resources\views/restos.blade.php ENDPATH**/ ?>