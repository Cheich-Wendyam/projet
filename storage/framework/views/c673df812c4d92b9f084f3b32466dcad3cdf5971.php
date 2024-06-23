<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title><?php echo e($site_settings['title']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('css/swiper-bundle.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/all.min.css')); ?>">
</head>
<style>
    .checked {
        color: orange;
    }
</style>
<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="#">
        <img src="<?php echo e(Storage::url($site_settings['logo'])); ?>" style="max-height: 50px">
        <?php echo e($site_settings['title']); ?>

    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
            <?php $__currentLoopData = $menu->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e($menuItem->link()); ?>"><?php echo e($menuItem->title); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="btn btn-outline-primary me-2" href="<?php echo e(route('register')); ?>">Inscription</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-success" href="<?php echo e(route('login')); ?>">Connexion</a>
            </li>
        </ul>
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

<footer class="text-center text-lg-start text-muted">
    <div class="container p-4">
        <div class="row">
            <!-- Section: Stats -->
            <div class="col-lg-6 col-md-12 mb-4">
                <h5 class="text-uppercase">Statistiques des visiteurs</h5>
                <ul class="list-unstyled mb-0">
                    <li>
                        <p>Visiteurs aujourd'hui : <?php echo e($today_visitors); ?></p>
                    </li>
                    <li>
                        <p>Visiteurs ce mois-ci : <?php echo e($month_visitors); ?></p>
                    </li>
                    <li>
                        <p>Total des visiteurs : <?php echo e($total_visitors); ?></p>
                    </li>
                </ul>
            </div>
            <!-- Section: Stats -->

            <!-- Section: Contact -->
            <div class="col-lg-6 col-md-12 mb-4">
                <h5 class="text-uppercase">Contact</h5>
                <ul class="list-unstyled mb-0">
                    <li>
                        <p>Email : cheich.yalaweogo61@gmail.com</p>
                    </li>
                    <li>
                        <p>Téléphone : +226 66 05 41 15</p>
                    </li>
                    <li>
                        <p>Adresse : Ouagadougou, Tampouy, Burkina Faso</p>
                    </li>
                </ul>
            </div>
            <!-- Section: Contact -->
        </div>

     
        <!-- Section: Commentaires -->
        <div class="row">
            <div class="col-md-12 mb-4">
                <h5 class="text-uppercase">Laissez un commentaire</h5>
                <form action="<?php echo e(route('comments.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>


        <!-- Section: Commentaires -->

        <!-- Section: Affichage des  Commentaires -->
        <div class="row">
            <div class="col-md-12 mb-4">
                <h5 class="text-uppercase">Commentaires des visiteurs</h5>
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6 class="card-title"><?php echo e($comment->name); ?> <small class="text-muted">(<?php echo e($comment->created_at->format('d/m/Y H:i')); ?>)</small></h6>
                            <p class="card-text" style="color: black;"><?php echo e($comment->message); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <!-- Section: Affichage des  Commentaires -->


        <!-- Section: Social media -->
        <section class="social mb-4">
            <a class="btn btn-outline-dark btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-outline-dark btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-outline-dark btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
            <a class="btn btn-outline-dark btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
            <a class="btn btn-outline-dark btn-floating m-1" href="#!" role="button"><i class="fab fa-youtube"></i></a>
        </section>
        <!-- Section: Social media -->
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        &copy; <?php echo e(date('Y')); ?> <?php echo e($site_settings['title']); ?>. Tous droits réservés.
    </div>
</footer>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('css/swiper-bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('css/scr.js')); ?>"></script>
<script src="<?php echo e(asset('css/all.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

</html>
<?php /**PATH C:\Users\Cheich Yalaweogo\Desktop\projet\resources\views/lay.blade.php ENDPATH**/ ?>