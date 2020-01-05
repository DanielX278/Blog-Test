<html>
<?php ob_start(); ?>
<?php require_once 'core/login-handler.php' ?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Blog</title>
  <meta charset="UTF-8" />
</head>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">PiNO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link " href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
    </ul>

    <?php if (!isLogged()) { ?>

      <!--    <a class="btn px-5 btn-secondary mr-3" role="button" href="login.php">Login</a> -->
      <button type="button" class="btn px-5 btn-success mr-3 nav-item" data-toggle="modal" data-target="#exampleModalCenter">
        Login
      </button>
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="login.php" method="POST">
                <div class="form-group">
                  <label>Mail</label>
                  <input class="form-control" name="email" type="email">
                </div>
                <div class="form-group">
                  <label>Password </label>
                  <input class="form-control" name="password" type="password">
                </div>
            </div>
            <div class="modal-footer">
              <div class="container-fluid ">
                <div class="row ">
                  <input class="btn btn-success btn-block" type="submit" value="Daje"></input>
                  <input class="btn btn-danger btn-block" type="reset" value="Nonzi"></input>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>

    <?php } else { ?>

      <span class="navbar-text mr-4">Benvenuto, <b><?= $_SESSION['loggedUser']['name'] ?></b></span>
      <a class="btn px-5 btn-primary  mr-3" role="button" href="post.php">Post</a>
      <a class="btn px-5 btn-danger" role="button" href="core/logout.php">Logout</a>

    <?php } ?>
  </div>
</nav>

<body>