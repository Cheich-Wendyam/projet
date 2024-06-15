<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title><?php echo e($site_settings['title']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('css/swiper-bundle.min.css')); ?>">
    
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top  ">
    <a class="navbar-brand" href="#">
        <img src="<?php echo e(Storage::url($site_settings['logo'])); ?>" style="max-height: 50px">
        <?php echo e($site_settings['title']); ?>

    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php $__currentLoopData = $menu->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e($menuItem->link()); ?>"><?php echo e($menuItem->title); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</nav>
<div>
                     
<p>
    <?php echo $__env->yieldContent('menu'); ?>
</p>

</div>

<section class="contenu">
    <?php echo $__env->yieldContent('content'); ?>
</section>







<footer>
    <p>Copyright 2024 - Tous droits reservés</p>
</footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('css/swiper-bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('css/scr.js')); ?>"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</html><?php /**PATH C:\Users\Cheich Yalaweogo\Desktop\projet\resources\views/lay.blade.php ENDPATH**/ ?>