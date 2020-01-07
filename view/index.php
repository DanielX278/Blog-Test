<?php require 'modules/header.php'; ?>


<div class="container">


    <?php if (empty($posts)) { ?>
        <h1 class="display-1">Non ci sono post!</h1>
    <?php } else { ?>
        <?php if (!isset($_GET['tag'])) { ?>
            <h1 class="display-1 mb-4">Ultimi post</h1>

        <?php } else { ?>
            <h1 class="display-1 mb-4">Tag: <?= $_GET['tag'] ?></h1>
        <?php } ?>
    <?php } ?>





    <?php foreach ($posts as $post) :  ?>
        <div class="card mb-5">
            <div class="card-header">
                <div class="row">
                    <div class="col order-1">
                        <h2><?= $post->title ?></h2>
                    </div>
                    <div class="col order-12 d-flex justify-content-end align-middle ">
                        <?php foreach ($post->tags as $tag) : ?>
                            <a class="text-decoration-none" href="index.php?tag=<?= $tag ?>"> <?php echo "&nbsp;$tag" ?> </a>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="card-text">
                    <p> <?= $post->content ?> </p>
                </div>
            </div>
          <!--  <div class="row mt-2">
                <?php if (isset($post->img)) : ?>
                    <img width="<?= intval($post->width) . "px" ?>" height="<?= intval($post->height) . "px" ?>" src="<?= $post->img ?>">
                <?php endif ?>
            </div> -->
            
            <div class="card-footer bg-light">
                <div class="row">
                    <div class="col order-1">
                        <h5><?= $post->author ?></h5>
                    </div>
                    <div class="col order-12">
                        <?php if (isLogged()) { ?>
                            <?php if ($_SESSION['loggedUser']['name'] == $post->author) { ?>
                                <div class="card text-right ">
                                    <a class="btn btn-danger" href="index.php?remove=<?= $post->title ?>"> RIMUOVI </a>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
</body>

<?php require 'modules/footer.php'; ?>