<?php require 'modules/header.php'; ?>


<div class="container mt-4">
    <div class="row">
        <div class="col ">
            <div class="card">

                <div class="card-body">
                    <h2 class="card-title">
                        Scrivi un post</h2>
                    <form action="post.php" method="POST">
                        <div class="form-group">
                            <label>Titolo
                            </label>
                            <input class="form-control" type="text" name="title">
                        </div>
                        <div class="form-group">
                            <label>Contenuto</label>
                            <textarea class="form-control" rows="3" name="content"></textarea>

                        </div>
                        <div class="form-group">
                            <label>Tags </label>
                            <input class="form-control " type="text" name="tags">

                        </div>
                        <input class="btn btn-success px-5" type="submit" value="Post"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<?php require 'modules/footer.php'; ?>