<?php require 'modules/header.php'; ?>


<div class="container">



    <?php if (!isset($_GET['tag'])) { ?>
        <h1 class="display-1">Ultimi post</h1>

    <?php } else { ?>
        <h1 class="display-1">Tag: <?= $_GET['tag'] ?></h1>
    <?php } ?>





    <?php foreach ($posts as $post) :  ?>
        <div class="row mt-4">
            <h2><?= $post->title ?></h2>
        </div>
        <div class="row mt-4">
            <h5><?= $post->author ?></h5>
        </div>
        <div class="row mt-4">
            <p> <?= $post->content ?> </p>
        </div>
        <div class="row mt-4">
            <?php if (isset($post->img)) : ?>
                <img width="<?= intval($post->width) . "px" ?>" height="<?= intval($post->height) . "px" ?>" src="<?= $post->img ?>">
            <?php endif ?>
        </div>
        <div class="d-flex justify-content-start">
            Tags:
            <?php foreach ($post->tags as $tag) : ?>
                <a href="index.php?tag=<?= $tag ?>"> <?php echo "&nbsp;$tag" ?> </a>
            <?php endforeach ?>
        </div>
        <?php if (isLogged()) { ?>
            <?php if ($_SESSION['loggedUser']['name']==$post->author) {?>
            <div class="d-flex justify-content-end">
                <a href="index.php?remove=<?= $post->title ?>"> RIMUOVI </a>
            </div>
            <?php } ?>
        <?php } ?>

    <?php endforeach ?>
</div>
</body>

<?php require 'modules/footer.php'; ?>