<?php require 'modules/header.php'; ?>


<div class="container mt-4">
    <div class="row">
        <div class="col-4 offset-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <form action="login.php" method="POST">
                        
                        <div class="form-group">
                            <label>Mail</label>
                            <input class="form-control" name="email" type="email">

                        </div>
                        <div class="form-group">
                            <label>Password </label>
                            <input class="form-control" name="password" type="password">
                        </div>
                        <input class="btn btn-success btn-block" type="submit" value="Daje"></input>
                        <input class="btn btn-danger btn-block" type="reset" value="Nonzi"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
<?php require 'modules/footer.php'; ?>