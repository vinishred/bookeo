<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<div class="container text-center">
    <img src="<?= $book->getImage() ?>" alt="image de livre">
    <div class="card-body">
        <h2 class="card-title"><?= $book->getTitle() ?></h2>
        <h5 class="card-title"><?= $book->getAuthor() ?></h5>
        <p class="card-text"><?= $book->getDescription() ?></p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>
